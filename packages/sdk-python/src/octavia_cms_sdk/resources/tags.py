from __future__ import annotations

import urllib.parse
from typing import TYPE_CHECKING, Any, Dict, Optional

from ..models import (
    TagWrapper,
    TagList,
    TagSearchResult,
)

if TYPE_CHECKING:
    from ..client import Client

class TagsResource:
    def __init__(self, client: Client) -> None:
        self._client = client

    def create(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> TagWrapper:
        return self._client.request_typed(TagWrapper, "POST", "/tags/create", query=query, body=body)

    def getAll(self, *, query: Optional[Dict[str, Any]] = None) -> TagList:
        return self._client.request_typed(TagList, "GET", "/tags/getAll", query=query, body=None)

    def search(self, *, query: Optional[Dict[str, Any]] = None) -> TagSearchResult:
        return self._client.request_typed(TagSearchResult, "GET", "/tags/search", query=query, body=None)
