from __future__ import annotations

import urllib.parse
from typing import TYPE_CHECKING, Any, Dict, Optional

from ..models import (
    LanguageWrapper,
    LanguageList,
    Language,
)

if TYPE_CHECKING:
    from ..client import Client

class LanguagesResource:
    def __init__(self, client: Client) -> None:
        self._client = client

    def create(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> LanguageWrapper:
        return self._client.request_typed(LanguageWrapper, "POST", "/languages/create", query=query, body=body)

    def getAll(self, *, query: Optional[Dict[str, Any]] = None) -> LanguageList:
        return self._client.request_typed(LanguageList, "GET", "/languages/getAll", query=query, body=None)

    def getById(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> Language:
        return self._client.request_typed(Language, "GET", "/languages/getById", query=query, body=body)

    def update(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> LanguageWrapper:
        return self._client.request_typed(LanguageWrapper, "PUT", "/languages/update", query=query, body=body)

    def deleteId(self, id, *, query: Optional[Dict[str, Any]] = None) -> Dict[str, Any]:
        return self._client.request_typed(Dict[str, Any], "DELETE", "/languages/delete/" + urllib.parse.quote(str(id)), query=query, body=None)
