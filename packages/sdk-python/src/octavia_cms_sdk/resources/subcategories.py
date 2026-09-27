from __future__ import annotations

import urllib.parse
from typing import TYPE_CHECKING, Any, Dict, Optional

from ..models import (
    SubCategoryWrapper,
    SubCategoryList,
)

if TYPE_CHECKING:
    from ..client import Client

class SubcategoriesResource:
    def __init__(self, client: Client) -> None:
        self._client = client

    def create(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> SubCategoryWrapper:
        return self._client.request_typed(SubCategoryWrapper, "POST", "/subcategories/create", query=query, body=body)

    def update(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> SubCategoryWrapper:
        return self._client.request_typed(SubCategoryWrapper, "PUT", "/subcategories/update", query=query, body=body)

    def deleteId(self, id, *, query: Optional[Dict[str, Any]] = None) -> Dict[str, Any]:
        return self._client.request_typed(Dict[str, Any], "DELETE", "/subcategories/delete/" + urllib.parse.quote(str(id)), query=query, body=None)

    def getAll(self, *, query: Optional[Dict[str, Any]] = None) -> SubCategoryList:
        return self._client.request_typed(SubCategoryList, "GET", "/subcategories/getAll", query=query, body=None)

    def getById(self, id, *, query: Optional[Dict[str, Any]] = None) -> SubCategoryWrapper:
        return self._client.request_typed(SubCategoryWrapper, "GET", "/subcategories/getById/" + urllib.parse.quote(str(id)), query=query, body=None)

    def getBySlug(self, slug, *, query: Optional[Dict[str, Any]] = None) -> SubCategoryWrapper:
        return self._client.request_typed(SubCategoryWrapper, "GET", "/subcategories/getBySlug/" + urllib.parse.quote(str(slug)), query=query, body=None)

    def getByCategoryId(self, categoryId, *, query: Optional[Dict[str, Any]] = None) -> SubCategoryList:
        return self._client.request_typed(SubCategoryList, "GET", "/subcategories/getByCategoryId/" + urllib.parse.quote(str(categoryId)), query=query, body=None)
