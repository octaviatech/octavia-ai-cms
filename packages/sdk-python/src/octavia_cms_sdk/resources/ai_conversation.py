from __future__ import annotations

import urllib.parse
from typing import TYPE_CHECKING, Any, Dict, Optional

from ..models import (
    ConversationStart,
    AIConversationContinue,
    AIConversation,
    ConversationGenerate,
    AIConversationRegenerate,
)

if TYPE_CHECKING:
    from ..client import Client

class AIConversationResource:
    def __init__(self, client: Client) -> None:
        self._client = client

    def conversationStart(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> ConversationStart:
        return self._client.request_typed(ConversationStart, "POST", "/ai/conversation/start", query=query, body=body)

    def conversationContinue(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> AIConversationContinue:
        return self._client.request_typed(AIConversationContinue, "POST", "/ai/conversation/continue", query=query, body=body)

    def conversationConversationId(self, conversationId, *, query: Optional[Dict[str, Any]] = None) -> AIConversation:
        return self._client.request_typed(AIConversation, "GET", "/ai/conversation/" + urllib.parse.quote(str(conversationId)), query=query, body=None)

    def conversationGenerateStream(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> Dict[str, Any]:
        return self._client.request_typed(Dict[str, Any], "POST", "/ai/conversation/generate/stream", query=query, body=body)

    def conversationGenerate(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> ConversationGenerate:
        return self._client.request_typed(ConversationGenerate, "POST", "/ai/conversation/generate", query=query, body=body)

    def conversationRegenerate(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> AIConversationRegenerate:
        return self._client.request_typed(AIConversationRegenerate, "POST", "/ai/conversation/regenerate", query=query, body=body)
