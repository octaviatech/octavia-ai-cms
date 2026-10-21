from __future__ import annotations

import urllib.parse
from typing import TYPE_CHECKING, Any, Dict, Iterator, List, Optional

from ..models import (
    ContentPlanList,
    ContentPlanItemWrapper,
    StartDraftWrapper,
    ScheduleWrapper,
    ContentGapReport,
    AiRunAccepted,
    CadenceWrapper,
)

if TYPE_CHECKING:
    from ..client import Client

class ContentPlanResource:
    def __init__(self, client: Client) -> None:
        self._client = client

    def getAll(self, *, query: Optional[Dict[str, Any]] = None) -> ContentPlanList:
        return self._client.request_typed(ContentPlanList, "GET", "/content-plan/getAll", query=query, body=None)

    def create(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> ContentPlanItemWrapper:
        return self._client.request_typed(ContentPlanItemWrapper, "POST", "/content-plan/create", query=query, body=body)

    def update(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> ContentPlanItemWrapper:
        return self._client.request_typed(ContentPlanItemWrapper, "PUT", "/content-plan/update", query=query, body=body)

    def deleteId(self, id, *, query: Optional[Dict[str, Any]] = None) -> ContentPlanItemWrapper:
        return self._client.request_typed(ContentPlanItemWrapper, "DELETE", "/content-plan/delete/" + urllib.parse.quote(str(id)), query=query, body=None)

    def idStartDraft(self, id, body: Any, *, query: Optional[Dict[str, Any]] = None) -> StartDraftWrapper:
        return self._client.request_typed(StartDraftWrapper, "POST", "/content-plan/" + urllib.parse.quote(str(id)) + "/start-draft", query=query, body=body)

    def idSchedule(self, id, body: Any, *, query: Optional[Dict[str, Any]] = None) -> ScheduleWrapper:
        return self._client.request_typed(ScheduleWrapper, "POST", "/content-plan/" + urllib.parse.quote(str(id)) + "/schedule", query=query, body=body)

    def gaps(self, *, query: Optional[Dict[str, Any]] = None) -> ContentGapReport:
        return self._client.request_typed(ContentGapReport, "GET", "/content-plan/gaps", query=query, body=None)

    def ideasFromAi(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> ContentPlanItemWrapper:
        return self._client.request_typed(ContentPlanItemWrapper, "POST", "/content-plan/ideas/from-ai", query=query, body=body)

    def aiGenerateIdeas(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> AiRunAccepted:
        return self._client.request_typed(AiRunAccepted, "POST", "/content-plan/ai/generate-ideas", query=query, body=body)

    def aiPlanPeriod(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> AiRunAccepted:
        return self._client.request_typed(AiRunAccepted, "POST", "/content-plan/ai/plan-period", query=query, body=body)

    def aiBestTime(self, *, query: Optional[Dict[str, Any]] = None) -> AiRunAccepted:
        return self._client.request_typed(AiRunAccepted, "POST", "/content-plan/ai/best-time", query=query, body=None)

    def aiReschedule(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> AiRunAccepted:
        return self._client.request_typed(AiRunAccepted, "POST", "/content-plan/ai/reschedule", query=query, body=body)

    def cadenceGET(self, *, query: Optional[Dict[str, Any]] = None) -> CadenceWrapper:
        return self._client.request_typed(CadenceWrapper, "GET", "/content-plan/cadence", query=query, body=None)

    def cadencePUT(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> CadenceWrapper:
        return self._client.request_typed(CadenceWrapper, "PUT", "/content-plan/cadence", query=query, body=body)
