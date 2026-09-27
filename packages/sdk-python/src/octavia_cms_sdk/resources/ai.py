from __future__ import annotations

import urllib.parse
from typing import TYPE_CHECKING, Any, Dict, Optional

from ..models import (
    AiSummaryResult,
    AiSeoResult,
    AiTitleResult,
    AiTranslateResult,
    AiContentResult,
    AiImageResult,
    AiArticleSeoResult,
    AiArticleTranslateResult,
    AiFormTranslateResult,
    RepurposeResult,
    SocialTemplate,
    SocialConnectionList,
    SocialConnection,
    SocialPublishResult,
)

if TYPE_CHECKING:
    from ..client import Client

class AIResource:
    def __init__(self, client: Client) -> None:
        self._client = client

    def summarize(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> AiSummaryResult:
        return self._client.request_typed(AiSummaryResult, "POST", "/ai/summarize", query=query, body=body)

    def summarizeStream(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> Dict[str, Any]:
        return self._client.request_typed(Dict[str, Any], "POST", "/ai/summarize/stream", query=query, body=body)

    def summarizeArticleStream(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> Dict[str, Any]:
        return self._client.request_typed(Dict[str, Any], "POST", "/ai/summarizeArticle/stream", query=query, body=body)

    def seoOptimize(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> AiSeoResult:
        return self._client.request_typed(AiSeoResult, "POST", "/ai/seoOptimize", query=query, body=body)

    def seoOptimizeStream(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> Dict[str, Any]:
        return self._client.request_typed(Dict[str, Any], "POST", "/ai/seoOptimize/stream", query=query, body=body)

    def generateTitle(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> AiTitleResult:
        return self._client.request_typed(AiTitleResult, "POST", "/ai/generateTitle", query=query, body=body)

    def translate(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> AiTranslateResult:
        return self._client.request_typed(AiTranslateResult, "POST", "/ai/translate", query=query, body=body)

    def translateStream(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> Dict[str, Any]:
        return self._client.request_typed(Dict[str, Any], "POST", "/ai/translate/stream", query=query, body=body)

    def generateContent(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> AiContentResult:
        return self._client.request_typed(AiContentResult, "POST", "/ai/generateContent", query=query, body=body)

    def generateImage(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> AiImageResult:
        return self._client.request_typed(AiImageResult, "POST", "/ai/generateImage", query=query, body=body)

    def optimizeArticle(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> AiArticleSeoResult:
        return self._client.request_typed(AiArticleSeoResult, "POST", "/ai/optimizeArticle", query=query, body=body)

    def optimizeArticleStream(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> Dict[str, Any]:
        return self._client.request_typed(Dict[str, Any], "POST", "/ai/optimizeArticle/stream", query=query, body=body)

    def translateArticle(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> AiArticleTranslateResult:
        return self._client.request_typed(AiArticleTranslateResult, "POST", "/ai/translateArticle", query=query, body=body)

    def translateArticleStream(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> Dict[str, Any]:
        return self._client.request_typed(Dict[str, Any], "POST", "/ai/translateArticle/stream", query=query, body=body)

    def translateForm(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> AiFormTranslateResult:
        return self._client.request_typed(AiFormTranslateResult, "POST", "/ai/translateForm", query=query, body=body)

    def repurpose(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> RepurposeResult:
        return self._client.request_typed(RepurposeResult, "POST", "/ai/repurpose", query=query, body=body)

    def repurposeStream(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> Dict[str, Any]:
        return self._client.request_typed(Dict[str, Any], "POST", "/ai/repurpose/stream", query=query, body=body)

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
