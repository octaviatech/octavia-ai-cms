from __future__ import annotations

from typing import Any, Callable, Dict, Optional

from .client import Client, ClientConfig

CMS_SITE = "https://octaviatech.app"
CMS_SIGNUP_URL = CMS_SITE


def _wrap_response(payload: Any) -> Dict[str, Any]:
    if isinstance(payload, dict) and "success" in payload and "data" in payload:
        data = payload.get("data")
        # The client has already turned `data` into its model, so pagination is
        # an attribute now rather than a key. Reading only a dict would report
        # no metadata for every list endpoint.
        pagination = getattr(data, "pagination", None)
        if pagination is None and isinstance(data, dict):
            pagination = data.get("pagination")
        meta = {"pagination": pagination} if pagination is not None else None
        return {"ok": bool(payload.get("success")), "data": data, "meta": meta}
    return {"ok": True, "data": payload}


def _wrap_resource(resource: Any, throw_on_error: bool):
    class Wrapper:
        def __getattr__(self, name: str):
            fn = getattr(resource, name)
            if not callable(fn):
                return fn

            def call(*args, **kwargs):
                try:
                    if (name.startswith("get") or "search" in name) and len(args) == 1 and isinstance(args[0], dict):
                        # treat first arg as query
                        kwargs = {"query": args[0], **kwargs}
                        args = ()
                    out = fn(*args, **kwargs)
                    return _wrap_response(out)
                except Exception as e:  # noqa: BLE001
                    if throw_on_error:
                        raise
                    return {"ok": False, "data": None, "error": {"message": str(e)}}

            return call

    return Wrapper()


class CMS:
    def __init__(self, client: Client, *, throw_on_error: bool = False) -> None:
        self.raw = client
        self.article = _wrap_resource(client.articles, throw_on_error)
        self.author = _wrap_resource(client.authors, throw_on_error)
        self.category = _wrap_resource(client.categories, throw_on_error)
        self.subcategory = _wrap_resource(client.subcategories, throw_on_error)
        self.form = _wrap_resource(client.forms, throw_on_error)
        self.formSubmission = _wrap_resource(client.form_submissions, throw_on_error)
        self.language = _wrap_resource(client.languages, throw_on_error)
        self.report = _wrap_resource(client.reports, throw_on_error)
        self.ai = _wrap_resource(client.ai, throw_on_error)
        self.aiConversation = _wrap_resource(client.ai_conversation, throw_on_error)
        self.tag = _wrap_resource(client.tags, throw_on_error)

    @staticmethod
    def init(
        api_key: str,
        *,
        timeout_ms: Optional[int] = None,
        timeoutMs: Optional[int] = None,
        throw_on_error: bool = False,
        throwOnError: Optional[bool] = None,
    ) -> "CMS":
        if timeout_ms is None:
            timeout_ms = timeoutMs
        if throwOnError is not None:
            throw_on_error = throwOnError
        config = ClientConfig(
            base_url="https://api.octaviatech.app/cms",
            api_key=api_key,
            timeout_ms=timeout_ms,
        )
        client = Client(config)
        return CMS(client, throw_on_error=throw_on_error)
