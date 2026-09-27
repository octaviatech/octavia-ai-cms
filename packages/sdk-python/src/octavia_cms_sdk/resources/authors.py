from __future__ import annotations

import urllib.parse
from typing import TYPE_CHECKING, Any, Dict, Optional

from ..models import (
    AuthorWrapper,
    AuthorList,
)

if TYPE_CHECKING:
    from ..client import Client

class AuthorsResource:
    def __init__(self, client: Client) -> None:
        self._client = client

    def create(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> AuthorWrapper:
        return self._client.request_typed(AuthorWrapper, "POST", "/authors/create", query=query, body=body)

    def update(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> AuthorWrapper:
        return self._client.request_typed(AuthorWrapper, "PUT", "/authors/update", query=query, body=body)

    def deleteId(self, id, *, query: Optional[Dict[str, Any]] = None) -> Dict[str, Any]:
        return self._client.request_typed(Dict[str, Any], "DELETE", "/authors/delete/" + urllib.parse.quote(str(id)), query=query, body=None)

    def getAll(self, *, query: Optional[Dict[str, Any]] = None) -> AuthorList:
        return self._client.request_typed(AuthorList, "GET", "/authors/getAll", query=query, body=None)

    def getById(self, id, *, query: Optional[Dict[str, Any]] = None) -> AuthorWrapper:
        return self._client.request_typed(AuthorWrapper, "GET", "/authors/getById/" + urllib.parse.quote(str(id)), query=query, body=None)

    def getBySlug(self, slug, *, query: Optional[Dict[str, Any]] = None) -> AuthorWrapper:
        return self._client.request_typed(AuthorWrapper, "GET", "/authors/getBySlug/" + urllib.parse.quote(str(slug)), query=query, body=None)
