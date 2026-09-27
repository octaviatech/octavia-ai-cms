from __future__ import annotations

import urllib.parse
from typing import TYPE_CHECKING, Any, Dict, Optional

from ..models import (
    CategoryWrapper,
    CategoryDeleteResult,
    CategoryList,
)

if TYPE_CHECKING:
    from ..client import Client

class CategoriesResource:
    def __init__(self, client: Client) -> None:
        self._client = client

    def create(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> CategoryWrapper:
        return self._client.request_typed(CategoryWrapper, "POST", "/categories/create", query=query, body=body)

    def update(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> CategoryWrapper:
        return self._client.request_typed(CategoryWrapper, "PUT", "/categories/update", query=query, body=body)

    def deleteId(self, id, *, query: Optional[Dict[str, Any]] = None) -> CategoryDeleteResult:
        return self._client.request_typed(CategoryDeleteResult, "DELETE", "/categories/delete/" + urllib.parse.quote(str(id)), query=query, body=None)

    def getAll(self, *, query: Optional[Dict[str, Any]] = None) -> CategoryList:
        return self._client.request_typed(CategoryList, "GET", "/categories/getAll", query=query, body=None)

    def getById(self, id, *, query: Optional[Dict[str, Any]] = None) -> CategoryWrapper:
        return self._client.request_typed(CategoryWrapper, "GET", "/categories/getById/" + urllib.parse.quote(str(id)), query=query, body=None)

    def getBySlug(self, slug, *, query: Optional[Dict[str, Any]] = None) -> CategoryWrapper:
        return self._client.request_typed(CategoryWrapper, "GET", "/categories/getBySlug/" + urllib.parse.quote(str(slug)), query=query, body=None)
