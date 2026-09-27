from __future__ import annotations

import urllib.parse
from typing import TYPE_CHECKING, Any, Dict, Optional

from ..models import (
    FormWrapper,
    FormNullableWrapper,
    FormList,
    NextFormWrapper,
    CaptchaConfigWrapper,
)

if TYPE_CHECKING:
    from ..client import Client

class FormsResource:
    def __init__(self, client: Client) -> None:
        self._client = client

    def create(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> FormWrapper:
        return self._client.request_typed(FormWrapper, "POST", "/forms/create", query=query, body=body)

    def update(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> FormNullableWrapper:
        return self._client.request_typed(FormNullableWrapper, "PUT", "/forms/update", query=query, body=body)

    def delete(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> Dict[str, Any]:
        return self._client.request_typed(Dict[str, Any], "DELETE", "/forms/delete", query=query, body=body)

    def getAll(self, *, query: Optional[Dict[str, Any]] = None) -> FormList:
        return self._client.request_typed(FormList, "GET", "/forms/getAll", query=query, body=None)

    def getBySlug(self, slug, *, query: Optional[Dict[str, Any]] = None) -> FormWrapper:
        return self._client.request_typed(FormWrapper, "GET", "/forms/getBySlug/" + urllib.parse.quote(str(slug)), query=query, body=None)

    def getById(self, id, *, query: Optional[Dict[str, Any]] = None) -> FormWrapper:
        return self._client.request_typed(FormWrapper, "GET", "/forms/getById/" + urllib.parse.quote(str(id)), query=query, body=None)

    def getNextById(self, id, *, query: Optional[Dict[str, Any]] = None) -> NextFormWrapper:
        return self._client.request_typed(NextFormWrapper, "GET", "/forms/getNextById/" + urllib.parse.quote(str(id)), query=query, body=None)

    def captchaConfigPUT(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> CaptchaConfigWrapper:
        return self._client.request_typed(CaptchaConfigWrapper, "PUT", "/forms/captcha/config", query=query, body=body)

    def captchaConfigGET(self, *, query: Optional[Dict[str, Any]] = None) -> CaptchaConfigWrapper:
        return self._client.request_typed(CaptchaConfigWrapper, "GET", "/forms/captcha/config", query=query, body=None)

    def captchaConfigSecret(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> CaptchaConfigWrapper:
        return self._client.request_typed(CaptchaConfigWrapper, "PATCH", "/forms/captcha/config/secret", query=query, body=body)
