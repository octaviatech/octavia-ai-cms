from __future__ import annotations

import urllib.parse
from typing import TYPE_CHECKING, Any, Dict, Iterator, List, Optional

from ..sse import SseEvent

from ..models import (
    AiRunAccepted,
    AiAutofillResult,
    SocialTemplate,
    SocialConnectionList,
    SocialConnection,
    SocialPublishResult,
    CreditSnapshot,
    TokenEstimate,
    AiRunList,
    AiRunSubmission,
    AiProposal,
    AiProposalCount,
    AiProposalDecision,
    AiProposalBulkResultItem,
    AiSettings,
    ArticleRevisionList,
    ArticleRevisionRestore,
    ArticleReadiness,
    TranslationStateReport,
    TranslationStateDoc,
)

if TYPE_CHECKING:
    from ..client import Client

class AIResource:
    def __init__(self, client: Client) -> None:
        self._client = client

    def summarize(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> AiRunAccepted:
        return self._client.request_typed(AiRunAccepted, "POST", "/ai/summarize", query=query, body=body)

    def summarizeStream(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> Dict[str, Any]:
        return self._client.request_typed(Dict[str, Any], "POST", "/ai/summarize/stream", query=query, body=body)

    def summarizeLive(selfbody: Any, *, query: Optional[Dict[str, Any]] = None) -> Iterator[SseEvent]:
        """Stream this endpoint as Server-Sent Events (D-24).

        Yields one SseEvent per frame as it arrives.
        """
        return self._client.stream_sse("POST", "/ai/summarize/stream", query=query, body=body)

    def summarizeArticleStream(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> Dict[str, Any]:
        return self._client.request_typed(Dict[str, Any], "POST", "/ai/summarizeArticle/stream", query=query, body=body)

    def summarizeArticleLive(selfbody: Any, *, query: Optional[Dict[str, Any]] = None) -> Iterator[SseEvent]:
        """Stream this endpoint as Server-Sent Events (D-24).

        Yields one SseEvent per frame as it arrives.
        """
        return self._client.stream_sse("POST", "/ai/summarizeArticle/stream", query=query, body=body)

    def seoOptimize(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> AiRunAccepted:
        return self._client.request_typed(AiRunAccepted, "POST", "/ai/seoOptimize", query=query, body=body)

    def seoOptimizeStream(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> Dict[str, Any]:
        return self._client.request_typed(Dict[str, Any], "POST", "/ai/seoOptimize/stream", query=query, body=body)

    def seoOptimizeLive(selfbody: Any, *, query: Optional[Dict[str, Any]] = None) -> Iterator[SseEvent]:
        """Stream this endpoint as Server-Sent Events (D-24).

        Yields one SseEvent per frame as it arrives.
        """
        return self._client.stream_sse("POST", "/ai/seoOptimize/stream", query=query, body=body)

    def generateTitle(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> AiRunAccepted:
        return self._client.request_typed(AiRunAccepted, "POST", "/ai/generateTitle", query=query, body=body)

    def translate(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> AiRunAccepted:
        return self._client.request_typed(AiRunAccepted, "POST", "/ai/translate", query=query, body=body)

    def translateStream(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> Dict[str, Any]:
        return self._client.request_typed(Dict[str, Any], "POST", "/ai/translate/stream", query=query, body=body)

    def translateLive(selfbody: Any, *, query: Optional[Dict[str, Any]] = None) -> Iterator[SseEvent]:
        """Stream this endpoint as Server-Sent Events (D-24).

        Yields one SseEvent per frame as it arrives.
        """
        return self._client.stream_sse("POST", "/ai/translate/stream", query=query, body=body)

    def generateContent(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> AiRunAccepted:
        return self._client.request_typed(AiRunAccepted, "POST", "/ai/generateContent", query=query, body=body)

    def generateImage(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> AiRunAccepted:
        return self._client.request_typed(AiRunAccepted, "POST", "/ai/generateImage", query=query, body=body)

    def optimizeArticle(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> AiRunAccepted:
        return self._client.request_typed(AiRunAccepted, "POST", "/ai/optimizeArticle", query=query, body=body)

    def autofillArticle(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> AiAutofillResult:
        return self._client.request_typed(AiAutofillResult, "POST", "/ai/autofillArticle", query=query, body=body)

    def optimizeArticleStream(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> AiRunAccepted:
        return self._client.request_typed(AiRunAccepted, "POST", "/ai/optimizeArticle/stream", query=query, body=body)

    def translateArticle(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> AiRunAccepted:
        return self._client.request_typed(AiRunAccepted, "POST", "/ai/translateArticle", query=query, body=body)

    def translateArticleStream(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> Dict[str, Any]:
        return self._client.request_typed(Dict[str, Any], "POST", "/ai/translateArticle/stream", query=query, body=body)

    def translateArticleLive(selfbody: Any, *, query: Optional[Dict[str, Any]] = None) -> Iterator[SseEvent]:
        """Stream this endpoint as Server-Sent Events (D-24).

        Yields one SseEvent per frame as it arrives.
        """
        return self._client.stream_sse("POST", "/ai/translateArticle/stream", query=query, body=body)

    def translateForm(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> AiRunAccepted:
        return self._client.request_typed(AiRunAccepted, "POST", "/ai/translateForm", query=query, body=body)

    def repurpose(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> AiRunAccepted:
        return self._client.request_typed(AiRunAccepted, "POST", "/ai/repurpose", query=query, body=body)

    def repurposeStream(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> Dict[str, Any]:
        return self._client.request_typed(Dict[str, Any], "POST", "/ai/repurpose/stream", query=query, body=body)

    def repurposeLive(selfbody: Any, *, query: Optional[Dict[str, Any]] = None) -> Iterator[SseEvent]:
        """Stream this endpoint as Server-Sent Events (D-24).

        Yields one SseEvent per frame as it arrives.
        """
        return self._client.stream_sse("POST", "/ai/repurpose/stream", query=query, body=body)

    def repurposeTemplateGET(self, *, query: Optional[Dict[str, Any]] = None) -> SocialTemplate:
        return self._client.request_typed(SocialTemplate, "GET", "/ai/repurpose/template", query=query, body=None)

    def repurposeTemplatePUT(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> SocialTemplate:
        return self._client.request_typed(SocialTemplate, "PUT", "/ai/repurpose/template", query=query, body=body)

    def socialConnections(self, *, query: Optional[Dict[str, Any]] = None) -> SocialConnectionList:
        return self._client.request_typed(SocialConnectionList, "GET", "/ai/social/connections", query=query, body=None)

    def socialLinkedinConnect(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> SocialConnection:
        return self._client.request_typed(SocialConnection, "PUT", "/ai/social/linkedin/connect", query=query, body=body)

    def socialTelegramConnect(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> SocialConnection:
        return self._client.request_typed(SocialConnection, "PUT", "/ai/social/telegram/connect", query=query, body=body)

    def socialTwitterConnect(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> SocialConnection:
        return self._client.request_typed(SocialConnection, "PUT", "/ai/social/twitter/connect", query=query, body=body)

    def socialLinkedinPublish(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> SocialPublishResult:
        return self._client.request_typed(SocialPublishResult, "POST", "/ai/social/linkedin/publish", query=query, body=body)

    def socialTelegramPublish(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> SocialPublishResult:
        return self._client.request_typed(SocialPublishResult, "POST", "/ai/social/telegram/publish", query=query, body=body)

    def socialTwitterPublish(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> SocialPublishResult:
        return self._client.request_typed(SocialPublishResult, "POST", "/ai/social/twitter/publish", query=query, body=body)

    def credits(self, *, query: Optional[Dict[str, Any]] = None) -> CreditSnapshot:
        return self._client.request_typed(CreditSnapshot, "GET", "/ai/credits", query=query, body=None)

    def estimate(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> TokenEstimate:
        return self._client.request_typed(TokenEstimate, "POST", "/ai/estimate", query=query, body=body)

    def run(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> Dict[str, Any]:
        return self._client.request_typed(Dict[str, Any], "POST", "/ai/run", query=query, body=body)

    def creditsRuns(self, *, query: Optional[Dict[str, Any]] = None) -> AiRunList:
        return self._client.request_typed(AiRunList, "GET", "/ai/credits/runs", query=query, body=None)

    def creditsRunsRunId(self, runId, *, query: Optional[Dict[str, Any]] = None) -> Dict[str, Any]:
        return self._client.request_typed(Dict[str, Any], "GET", "/ai/credits/runs/" + urllib.parse.quote(str(runId)), query=query, body=None)

    def creditsRunsRunIdCancel(self, runId, *, query: Optional[Dict[str, Any]] = None) -> Dict[str, Any]:
        return self._client.request_typed(Dict[str, Any], "POST", "/ai/credits/runs/" + urllib.parse.quote(str(runId)) + "/cancel", query=query, body=None)

    def creditsRunsRunIdRetry(self, runId, *, query: Optional[Dict[str, Any]] = None) -> AiRunSubmission:
        return self._client.request_typed(AiRunSubmission, "POST", "/ai/credits/runs/" + urllib.parse.quote(str(runId)) + "/retry", query=query, body=None)

    def eventsStream(self, *, query: Optional[Dict[str, Any]] = None) -> Dict[str, Any]:
        return self._client.request_typed(Dict[str, Any], "GET", "/ai/events/stream", query=query, body=None)

    def eventsLive(self, *, query: Optional[Dict[str, Any]] = None) -> Iterator[SseEvent]:
        """Stream this endpoint as Server-Sent Events (D-24).

        Yields one SseEvent per frame as it arrives.
        """
        return self._client.stream_sse("GET", "/ai/events/stream", query=query, body=None)

    def proposalsPOST(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> AiProposal:
        return self._client.request_typed(AiProposal, "POST", "/ai/proposals", query=query, body=body)

    def proposalsGET(self, *, query: Optional[Dict[str, Any]] = None) -> List[AiProposal]:
        return self._client.request_typed(List[AiProposal], "GET", "/ai/proposals", query=query, body=None)

    def proposalsCount(self, *, query: Optional[Dict[str, Any]] = None) -> AiProposalCount:
        return self._client.request_typed(AiProposalCount, "GET", "/ai/proposals/count", query=query, body=None)

    def proposalsId(self, id, *, query: Optional[Dict[str, Any]] = None) -> AiProposal:
        return self._client.request_typed(AiProposal, "GET", "/ai/proposals/" + urllib.parse.quote(str(id)), query=query, body=None)

    def proposalsIdAccept(self, id, *, query: Optional[Dict[str, Any]] = None) -> AiProposalDecision:
        return self._client.request_typed(AiProposalDecision, "POST", "/ai/proposals/" + urllib.parse.quote(str(id)) + "/accept", query=query, body=None)

    def proposalsIdReject(self, id, *, query: Optional[Dict[str, Any]] = None) -> AiProposal:
        return self._client.request_typed(AiProposal, "POST", "/ai/proposals/" + urllib.parse.quote(str(id)) + "/reject", query=query, body=None)

    def proposalsIdUndo(self, id, *, query: Optional[Dict[str, Any]] = None) -> AiProposal:
        return self._client.request_typed(AiProposal, "POST", "/ai/proposals/" + urllib.parse.quote(str(id)) + "/undo", query=query, body=None)

    def proposalsBulkAccept(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> List[AiProposalBulkResultItem]:
        return self._client.request_typed(List[AiProposalBulkResultItem], "POST", "/ai/proposals/bulk-accept", query=query, body=body)

    def settingsGET(self, *, query: Optional[Dict[str, Any]] = None) -> AiSettings:
        return self._client.request_typed(AiSettings, "GET", "/ai/settings", query=query, body=None)

    def settingsPUT(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> AiSettings:
        return self._client.request_typed(AiSettings, "PUT", "/ai/settings", query=query, body=body)

    def revisionsArticleId(self, articleId, *, query: Optional[Dict[str, Any]] = None) -> ArticleRevisionList:
        return self._client.request_typed(ArticleRevisionList, "GET", "/articles/revisions/" + urllib.parse.quote(str(articleId)), query=query, body=None)

    def revisionsArticleIdRevisionIdRestore(self, articleId, revisionId, *, query: Optional[Dict[str, Any]] = None) -> ArticleRevisionRestore:
        return self._client.request_typed(ArticleRevisionRestore, "POST", "/articles/revisions/" + urllib.parse.quote(str(articleId)) + "/" + urllib.parse.quote(str(revisionId)) + "/restore", query=query, body=None)

    def readinessArticleId(self, articleId, *, query: Optional[Dict[str, Any]] = None) -> ArticleReadiness:
        return self._client.request_typed(ArticleReadiness, "GET", "/articles/readiness/" + urllib.parse.quote(str(articleId)), query=query, body=None)

    def translationStateArticleId(self, articleId, *, query: Optional[Dict[str, Any]] = None) -> TranslationStateReport:
        return self._client.request_typed(TranslationStateReport, "GET", "/articles/translation-state/" + urllib.parse.quote(str(articleId)), query=query, body=None)

    def translationStateArticleIdLocaleComplete(self, articleId, locale, body: Any, *, query: Optional[Dict[str, Any]] = None) -> TranslationStateDoc:
        return self._client.request_typed(TranslationStateDoc, "POST", "/articles/translation-state/" + urllib.parse.quote(str(articleId)) + "/" + urllib.parse.quote(str(locale)) + "/complete", query=query, body=body)
