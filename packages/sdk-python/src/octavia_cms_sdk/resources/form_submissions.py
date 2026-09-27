from __future__ import annotations

import urllib.parse
from typing import TYPE_CHECKING, Any, Dict, Optional

from ..models import (
    SubmissionWrapper,
    FormSubmissionList,
    FormSubmissionRelations,
    FormRelationsBackfill,
    SubmissionRawWrapper,
)

if TYPE_CHECKING:
    from ..client import Client

class FormSubmissionsResource:
    def __init__(self, client: Client) -> None:
        self._client = client

    def idSubmit(self, id, body: Any, *, query: Optional[Dict[str, Any]] = None) -> SubmissionWrapper:
        return self._client.request_typed(SubmissionWrapper, "POST", "/forms/" + urllib.parse.quote(str(id)) + "/submit", query=query, body=body)

    def idInternalSubmit(self, id, body: Any, *, query: Optional[Dict[str, Any]] = None) -> SubmissionWrapper:
        return self._client.request_typed(SubmissionWrapper, "POST", "/forms/" + urllib.parse.quote(str(id)) + "/internal-submit", query=query, body=body)

    def submissionsGetAll(self, *, query: Optional[Dict[str, Any]] = None) -> FormSubmissionList:
        return self._client.request_typed(FormSubmissionList, "GET", "/forms/submissions/getAll", query=query, body=None)

    def idGetAllSubmissions(self, id, *, query: Optional[Dict[str, Any]] = None) -> FormSubmissionList:
        return self._client.request_typed(FormSubmissionList, "GET", "/forms/" + urllib.parse.quote(str(id)) + "/getAllSubmissions", query=query, body=None)

    def getSubmissionById(self, id, *, query: Optional[Dict[str, Any]] = None) -> SubmissionWrapper:
        return self._client.request_typed(SubmissionWrapper, "GET", "/forms/getSubmissionById/" + urllib.parse.quote(str(id)), query=query, body=None)

    def submissionIdRelations(self, id, *, query: Optional[Dict[str, Any]] = None) -> FormSubmissionRelations:
        return self._client.request_typed(FormSubmissionRelations, "GET", "/forms/submission/" + urllib.parse.quote(str(id)) + "/relations", query=query, body=None)

    def submissionIdRelationsFieldNameConnect(self, id, fieldName, body: Any, *, query: Optional[Dict[str, Any]] = None) -> SubmissionWrapper:
        return self._client.request_typed(SubmissionWrapper, "POST", "/forms/submission/" + urllib.parse.quote(str(id)) + "/relations/" + urllib.parse.quote(str(fieldName)) + "/connect", query=query, body=body)

    def submissionIdRelationsFieldNameDisconnect(self, id, fieldName, body: Any, *, query: Optional[Dict[str, Any]] = None) -> SubmissionWrapper:
        return self._client.request_typed(SubmissionWrapper, "POST", "/forms/submission/" + urllib.parse.quote(str(id)) + "/relations/" + urllib.parse.quote(str(fieldName)) + "/disconnect", query=query, body=body)

    def submissionIdRelationsFieldNameReorder(self, id, fieldName, body: Any, *, query: Optional[Dict[str, Any]] = None) -> SubmissionWrapper:
        return self._client.request_typed(SubmissionWrapper, "POST", "/forms/submission/" + urllib.parse.quote(str(id)) + "/relations/" + urllib.parse.quote(str(fieldName)) + "/reorder", query=query, body=body)

    def submissionsRelationsBackfill(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> FormRelationsBackfill:
        return self._client.request_typed(FormRelationsBackfill, "POST", "/forms/submissions/relations/backfill", query=query, body=body)

    def submissionUpdateId(self, id, body: Any, *, query: Optional[Dict[str, Any]] = None) -> SubmissionRawWrapper:
        return self._client.request_typed(SubmissionRawWrapper, "PUT", "/forms/submission/update/" + urllib.parse.quote(str(id)), query=query, body=body)

    def submissionDeleteId(self, id, *, query: Optional[Dict[str, Any]] = None) -> SubmissionRawWrapper:
        return self._client.request_typed(SubmissionRawWrapper, "DELETE", "/forms/submission/delete/" + urllib.parse.quote(str(id)), query=query, body=None)
