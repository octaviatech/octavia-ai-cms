from __future__ import annotations

import json
import urllib.error
import urllib.parse
import urllib.request
from dataclasses import dataclass
from typing import Any, Dict, Iterator, Optional

from .sse import SseEvent, iter_sse_frames, sse_headers

# @generated imports:begin
from .resources.ai import AIResource
from .resources.ai_conversation import AIConversationResource
from .resources.articles import ArticlesResource
from .resources.authors import AuthorsResource
from .resources.campaigns import CampaignsResource
from .resources.categories import CategoriesResource
from .resources.content_plan import ContentPlanResource
from .resources.forms import FormsResource
from .resources.form_submissions import FormSubmissionsResource
from .resources.languages import LanguagesResource
from .resources.media import MediaResource
from .resources.reports import ReportsResource
from .resources.seo_hub import SEOHubResource
from .resources.subcategories import SubcategoriesResource
from .resources.tags import TagsResource
from .resources.taxonomy import TaxonomyResource
# @generated imports:end


class ApiError(RuntimeError):
    def __init__(self, message: str, status: int, payload: Any = None) -> None:
        super().__init__(message)
        self.status = status
        self.payload = payload


@dataclass
class ClientConfig:
    base_url: str
    api_key: str
    timeout_ms: Optional[int] = None

    def __post_init__(self) -> None:
        if not self.base_url:
            raise ValueError("base_url is required")
        if not self.api_key:
            raise ValueError("api_key is required")
        self.base_url = self.base_url.rstrip("/")


class Client:
    def __init__(self, config: ClientConfig) -> None:
        self._config = config
        # @generated resources:begin
        self.ai = AIResource(self)
        self.ai_conversation = AIConversationResource(self)
        self.articles = ArticlesResource(self)
        self.authors = AuthorsResource(self)
        self.campaigns = CampaignsResource(self)
        self.categories = CategoriesResource(self)
        self.content_plan = ContentPlanResource(self)
        self.forms = FormsResource(self)
        self.form_submissions = FormSubmissionsResource(self)
        self.languages = LanguagesResource(self)
        self.media = MediaResource(self)
        self.reports = ReportsResource(self)
        self.seo_hub = SEOHubResource(self)
        self.subcategories = SubcategoriesResource(self)
        self.tags = TagsResource(self)
        self.taxonomy = TaxonomyResource(self)
        # @generated resources:end

    def request(
        self,
        method: str,
        path: str,
        query: Optional[Dict[str, Any]] = None,
        body: Any = None,
    ) -> Any:
        """Untyped request, for endpoints the generated resources do not cover."""
        return self.request_typed(Any, method, path, query, body)

    def stream_sse(
        self,
        method: str,
        path: str,
        query: Optional[Dict[str, Any]] = None,
        body: Any = None,
    ) -> Iterator[SseEvent]:
        """Consume a `text/event-stream` endpoint as a generator of frames.

        `request_typed` reads the whole body and parses it as JSON, which for an
        SSE endpoint yields one opaque string. This streams instead, so a
        caller sees each `event:`/`data:` frame as it arrives.

        Yields:
            SseEvent — one per parsed frame, in arrival order.
        """
        url = self._config.base_url + path + self._build_query(query or {})

        data = None
        if body is not None:
            data = json.dumps(body).encode("utf-8")

        req = urllib.request.Request(
            url, data=data, headers=sse_headers(self._config.api_key), method=method.upper()
        )
        try:
            # No timeout: a generation can legitimately run for minutes, and a
            # read timeout would cut the stream off mid-answer.
            resp = urllib.request.urlopen(req)
        except urllib.error.HTTPError as e:
            raw = e.read().decode("utf-8")
            payload = self._try_json(raw)
            message = payload.get("message") if isinstance(payload, dict) else str(e)
            raise ApiError(message or "Stream failed", e.code, payload)

        with resp:
            yield from iter_sse_frames(iter(lambda: resp.read(1024), b""))

    def request_typed(
        self,
        model: Any,
        method: str,
        path: str,
        query: Optional[Dict[str, Any]] = None,
        body: Any = None,
    ) -> Any:
        """Sends the request and hydrates the envelope's `data` into `model`.

        Every resource method names the model its endpoint returns, so a
        server-side field change shows up as a missing attribute here rather than
        as a KeyError at some later call site.
        """
        url = self._config.base_url + path + self._build_query(query or {})

        req_headers = {
            "Content-Type": "application/json",
            "x-api-key": self._config.api_key,
        }

        data = None
        if body is not None:
            data = json.dumps(body).encode("utf-8")

        req = urllib.request.Request(url, data=data, headers=req_headers, method=method.upper())
        try:
            timeout_sec = (self._config.timeout_ms / 1000) if self._config.timeout_ms else None
            with urllib.request.urlopen(req, timeout=timeout_sec) as resp:
                raw = resp.read().decode("utf-8")
                payload = self._try_json(raw)
                return self._hydrate(payload, model)
        except urllib.error.HTTPError as e:
            raw = e.read().decode("utf-8")
            payload = self._try_json(raw)
            message = payload.get("message") if isinstance(payload, dict) else str(e)
            raise ApiError(message or "Request failed", e.code, payload)

    @staticmethod
    def _hydrate(payload: Any, model: Any) -> Any:
        """Swap the envelope's `data` dict for the model, leaving the rest as-is."""
        if model is Any or not isinstance(payload, dict) or "data" not in payload:
            return payload
        data = payload["data"]
        if data is None or not isinstance(data, dict):
            return payload
        factory = getattr(model, "from_dict", None)
        if callable(factory):
            payload = dict(payload)
            payload["data"] = factory(data)
        return payload

    def health(self) -> Any:
        return self.request("GET", "/healthz")

    @staticmethod
    def _build_query(query: Dict[str, Any]) -> str:
        cleaned = {k: v for k, v in query.items() if v is not None}
        qs = urllib.parse.urlencode(cleaned, doseq=True)
        return f"?{qs}" if qs else ""

    @staticmethod
    def _try_json(raw: str) -> Any:
        try:
            return json.loads(raw)
        except Exception:
            return raw
