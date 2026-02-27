<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DemoContentController extends Controller
{
    private function headers(): array
    {
        return [
            'Authorization' => 'Bearer ' . config('services.octavia.api_key'),
            'x-octavia-project-id' => config('services.octavia.project_id'),
        ];
    }

    public function index()
    {
        $response = Http::withHeaders($this->headers())->get(rtrim(config('services.octavia.base_url'), '/') . '/v1/cms/content');
        return response()->json($response->json(), $response->status());
    }

    public function store(Request $request)
    {
        $response = Http::withHeaders($this->headers())->post(rtrim(config('services.octavia.base_url'), '/') . '/v1/cms/content', $request->only(['title', 'body', 'locale']));
        return response()->json($response->json(), $response->status());
    }

    public function publish(string $id)
    {
        $response = Http::withHeaders($this->headers())->post(rtrim(config('services.octavia.base_url'), '/') . "/v1/cms/content/{$id}/publish");
        return response()->json($response->json(), $response->status());
    }
}
