from __future__ import annotations

import urllib.parse
from typing import TYPE_CHECKING, Any, Dict, List, Optional

from ..models import (
    CampaignList,
    CampaignWrapper,
)

if TYPE_CHECKING:
    from ..client import Client

class CampaignsResource:
    def __init__(self, client: Client) -> None:
        self._client = client

    def getAll(self, *, query: Optional[Dict[str, Any]] = None) -> CampaignList:
        return self._client.request_typed(CampaignList, "GET", "/campaigns/getAll", query=query, body=None)

    def create(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> CampaignWrapper:
        return self._client.request_typed(CampaignWrapper, "POST", "/campaigns/create", query=query, body=body)

    def update(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> CampaignWrapper:
        return self._client.request_typed(CampaignWrapper, "PUT", "/campaigns/update", query=query, body=body)

    def deleteId(self, id, *, query: Optional[Dict[str, Any]] = None) -> CampaignWrapper:
        return self._client.request_typed(CampaignWrapper, "DELETE", "/campaigns/delete/" + urllib.parse.quote(str(id)), query=query, body=None)
