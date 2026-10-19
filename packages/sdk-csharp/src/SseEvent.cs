using System.Text;
using System.Text.Json;

namespace Octavia.CmsSDK;

/// <summary>
/// One Server-Sent Event (D-24), produced by
/// <see cref="Client.StreamSSEAsync"/> and yielded in arrival order.
/// </summary>
public sealed class SseEvent
{
    /// <summary>The <c>event:</c> name, or "message" when the frame omits it.</summary>
    public string Event { get; init; } = "message";

    /// <summary>
    /// The <c>data:</c> payload: deserialized JSON when it parses, otherwise the
    /// raw text — several AI endpoints stream plain deltas rather than JSON.
    /// </summary>
    public object? Data { get; init; }

    /// <summary>The <c>id:</c> field, if present.</summary>
    public string? Id { get; init; }

    /// <summary>The <c>retry:</c> field in milliseconds, if present and numeric.</summary>
    public int? Retry { get; init; }

    /// <summary>
    /// Parses one <c>event:</c>/<c>data:</c> block. Returns null for an empty
    /// frame (a comment-only heartbeat, or blank padding).
    /// </summary>
    public static SseEvent? Parse(string frame)
    {
        var name = "message";
        string? id = null;
        int? retry = null;
        var dataLines = new List<string>();

        foreach (var rawLine in frame.Replace("\r\n", "\n").Replace('\r', '\n').Split('\n'))
        {
            if (rawLine.Length == 0 || rawLine[0] == ':')
            {
                continue;
            }

            var colon = rawLine.IndexOf(':');
            var field = colon == -1 ? rawLine : rawLine[..colon];
            var value = colon == -1 ? "" : rawLine[(colon + 1)..];
            if (value.StartsWith(" ", StringComparison.Ordinal))
            {
                value = value[1..];
            }

            if (field == "event") name = value;
            else if (field == "data") dataLines.Add(value);
            else if (field == "id") id = value;
            else if (field == "retry" && int.TryParse(value, out var retryMs)) retry = retryMs;
        }

        if (dataLines.Count == 0 && name == "message")
        {
            return null;
        }

        var rawData = string.Join("\n", dataLines);
        object? data = rawData;
        if (rawData.Length > 0)
        {
            try
            {
                using var doc = JsonDocument.Parse(rawData);
                data = doc.RootElement.Clone();
            }
            catch (JsonException)
            {
                // Not JSON — the raw text is the payload.
            }
        }

        return new SseEvent { Event = name, Data = data, Id = id, Retry = retry };
    }

    /// <summary>
    /// Reassembles frames from an arbitrarily chunked byte stream. A chunk
    /// boundary can fall anywhere — mid-field, mid-frame, even mid-character —
    /// so bytes are buffered until a whole frame (terminated by a blank line)
    /// is available. The last frame is emitted without one.
    /// </summary>
    internal static async IAsyncEnumerable<SseEvent> ReadFramesAsync(
        Stream body,
        [System.Runtime.CompilerServices.EnumeratorCancellation] System.Threading.CancellationToken cancellationToken = default)
    {
        var buffer = new StringBuilder();
        var reader = new StreamReader(body, Encoding.UTF8);
        var chunk = new char[4096];

        while (true)
        {
            var read = await reader.ReadAsync(chunk.AsMemory(0, chunk.Length), cancellationToken).ConfigureAwait(false);
            if (read == 0)
            {
                break;
            }

            buffer.Append(chunk, 0, read);

            string frame;
            while (ExtractFrame(buffer, out frame))
            {
                var parsed = Parse(frame);
                if (parsed != null)
                {
                    yield return parsed;
                }
            }
        }

        var tail = Parse(buffer.ToString());
        if (tail != null)
        {
            yield return tail;
        }
    }

    private static bool ExtractFrame(StringBuilder buffer, out string frame)
    {
        var text = buffer.ToString();
        var boundary = text.IndexOf("\n\n", StringComparison.Ordinal);
        if (boundary == -1)
        {
            frame = "";
            return false;
        }

        frame = text[..boundary];
        buffer.Clear();
        buffer.Append(text[(boundary + 2)..]);
        return true;
    }
}