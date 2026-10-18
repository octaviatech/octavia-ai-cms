from __future__ import annotations

import urllib.parse
from typing import TYPE_CHECKING, Any, Dict, List, Optional

from ..models import (
    MediaAssetList,
    MediaAssetWrapper,
    MediaUsage,
    MediaMetadataSuggestion,
    MediaMissingAlt,
)

if TYPE_CHECKING:
    from ..client import Client

class MediaResource:
    def __init__(self, client: Client) -> None:
        self._client = client

    def getAll(self, *, query: Optional[Dict[str, Any]] = None) -> MediaAssetList:
        return self._client.request_typed(MediaAssetList, "GET", "/media/getAll", query=query, body=None)

    def create(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> MediaAssetWrapper:
        return self._client.request_typed(MediaAssetWrapper, "POST", "/media/create", query=query, body=body)

    def update(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> MediaAssetWrapper:
        return self._client.request_typed(MediaAssetWrapper, "PUT", "/media/update", query=query, body=body)

    def deleteId(self, id, *, query: Optional[Dict[str, Any]] = None) -> MediaAssetWrapper:
        return self._client.request_typed(MediaAssetWrapper, "DELETE", "/media/delete/" + urllib.parse.quote(str(id)), query=query, body=None)

    def usage(self, *, query: Optional[Dict[str, Any]] = None) -> MediaUsage:
        return self._client.request_typed(MediaUsage, "GET", "/media/usage", query=query, body=None)

    def aiMetadata(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> MediaMetadataSuggestion:
        return self._client.request_typed(MediaMetadataSuggestion, "POST", "/media/ai/metadata", query=query, body=body)

    def aiMissingAlt(self, *, query: Optional[Dict[str, Any]] = None) -> MediaMissingAlt:
        return self._client.request_typed(MediaMissingAlt, "GET", "/media/ai/missingAlt", query=query, body=None)
