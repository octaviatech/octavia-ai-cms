"""Generated from the OpenAPI spec — do not edit by hand."""

from __future__ import annotations

from dataclasses import dataclass
from typing import Any, Dict, List, Optional

@dataclass
class ObjectId:
    """List wrapper or alias: the payload is reached through its key."""

    def __init__(self, raw: Any = None) -> None:
        self._raw = raw


@dataclass
class DateTime:
    """List wrapper or alias: the payload is reached through its key."""

    def __init__(self, raw: Any = None) -> None:
        self._raw = raw


@dataclass
class MultilingualString:
    """Map of str, keyed by language code."""

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> Dict[str, Any]:
        """Every key the server sent, so an undeclared language
        code stays reachable rather than dropped."""
        return dict(data)


@dataclass
class MultilingualStringOrNull:
    """List wrapper or alias: the payload is reached through its key."""

    def __init__(self, raw: Any = None) -> None:
        self._raw = raw


@dataclass
class Pagination:
    """Generated from the OpenAPI spec — do not edit by hand."""

    total: float = None
    page: float = None
    limit: float = None
    total_pages: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "Pagination":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "total": "total",
            "page": "page",
            "limit": "limit",
            "totalPages": "total_pages",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class Tokens:
    """Generated from the OpenAPI spec — do not edit by hand."""

    used: float = None
    remaining: float = None
    limit: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "Tokens":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "used": "used",
            "remaining": "remaining",
            "limit": "limit",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class TokensUsedOnly:
    """Generated from the OpenAPI spec — do not edit by hand."""

    used: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "TokensUsedOnly":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "used": "used",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class SeoKeywordAnalysis:
    """Generated from the OpenAPI spec — do not edit by hand."""

    term: str = None
    count: float = None
    density: float = None
    positions: List[float] = None
    in_title: bool = None
    in_headings: float = None
    in_first_paragraph: bool = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "SeoKeywordAnalysis":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "term": "term",
            "count": "count",
            "density": "density",
            "positions": "positions",
            "inTitle": "in_title",
            "inHeadings": "in_headings",
            "inFirstParagraph": "in_first_paragraph",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class SeoLanguageMetrics:
    """Generated from the OpenAPI spec — do not edit by hand."""

    language_code: str = None
    primary_keyword: Optional[str] = None
    base_score: float = None
    potential_score: float = None
    signals: Dict[str, Any] = None
    word_count: float = None
    keyword_density: Optional[float] = None
    suggestions: List[str] = None
    terms_analysis: Dict[str, Any] = None
    structure_analysis: Dict[str, Any] = None
    link_analysis: Dict[str, Any] = None
    image_analysis: Dict[str, Any] = None
    readability_metrics: Dict[str, Any] = None
    technical_seo: Dict[str, Any] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "SeoLanguageMetrics":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "languageCode": "language_code",
            "primaryKeyword": "primary_keyword",
            "baseScore": "base_score",
            "potentialScore": "potential_score",
            "signals": "signals",
            "wordCount": "word_count",
            "keywordDensity": "keyword_density",
            "suggestions": "suggestions",
            "termsAnalysis": "terms_analysis",
            "structureAnalysis": "structure_analysis",
            "linkAnalysis": "link_analysis",
            "imageAnalysis": "image_analysis",
            "readabilityMetrics": "readability_metrics",
            "technicalSEO": "technical_seo",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class SeoPerLanguage:
    """Map of nested models, keyed by language or similar."""

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> Dict[str, Any]:
        """Convert the values, leaving the keys as they arrived."""
        return {k: SeoLanguageMetrics.from_dict(v) for k, v in data.items()}


@dataclass
class ArticleSeo:
    """Generated from the OpenAPI spec — do not edit by hand."""

    per_language: SeoPerLanguage = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ArticleSeo":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "perLanguage": "per_language",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "per_language": lambda v: SeoPerLanguage.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class Author:
    """Generated from the OpenAPI spec — do not edit by hand."""

    _id: ObjectId = None
    tenant_id: str = None
    slug: str = None
    name: MultilingualString = None
    email: str = None
    avatar: str = None
    bio: MultilingualString = None
    is_private: bool = None
    is_active: bool = None
    is_deleted: bool = None
    created_at: DateTime = None
    updated_at: DateTime = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "Author":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "_id": "_id",
            "tenantId": "tenant_id",
            "slug": "slug",
            "name": "name",
            "email": "email",
            "avatar": "avatar",
            "bio": "bio",
            "isPrivate": "is_private",
            "isActive": "is_active",
            "isDeleted": "is_deleted",
            "createdAt": "created_at",
            "updatedAt": "updated_at",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class Category:
    """Generated from the OpenAPI spec — do not edit by hand."""

    _id: ObjectId = None
    tenant_id: str = None
    name: MultilingualString = None
    slug: str = None
    thumbnail: str = None
    description: MultilingualString = None
    is_private: bool = None
    is_active: bool = None
    is_deleted: bool = None
    created_at: DateTime = None
    updated_at: DateTime = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "Category":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "_id": "_id",
            "tenantId": "tenant_id",
            "name": "name",
            "slug": "slug",
            "thumbnail": "thumbnail",
            "description": "description",
            "isPrivate": "is_private",
            "isActive": "is_active",
            "isDeleted": "is_deleted",
            "createdAt": "created_at",
            "updatedAt": "updated_at",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class SubCategory:
    """Generated from the OpenAPI spec — do not edit by hand."""

    _id: ObjectId = None
    tenant_id: str = None
    name: MultilingualString = None
    slug: str = None
    thumbnail: str = None
    description: MultilingualString = None
    category: ObjectId = None
    is_private: bool = None
    is_active: bool = None
    is_deleted: bool = None
    created_at: DateTime = None
    updated_at: DateTime = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "SubCategory":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "_id": "_id",
            "tenantId": "tenant_id",
            "name": "name",
            "slug": "slug",
            "thumbnail": "thumbnail",
            "description": "description",
            "category": "category",
            "isPrivate": "is_private",
            "isActive": "is_active",
            "isDeleted": "is_deleted",
            "createdAt": "created_at",
            "updatedAt": "updated_at",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class Tag:
    """Generated from the OpenAPI spec — do not edit by hand."""

    _id: ObjectId = None
    tenant_id: str = None
    name: str = None
    created_at: DateTime = None
    updated_at: DateTime = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "Tag":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "_id": "_id",
            "tenantId": "tenant_id",
            "name": "name",
            "createdAt": "created_at",
            "updatedAt": "updated_at",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class Language:
    """Generated from the OpenAPI spec — do not edit by hand."""

    _id: ObjectId = None
    tenant_id: str = None
    code: str = None
    name: str = None
    is_active: bool = None
    is_deleted: bool = None
    created_at: DateTime = None
    updated_at: DateTime = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "Language":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "_id": "_id",
            "tenantId": "tenant_id",
            "code": "code",
            "name": "name",
            "isActive": "is_active",
            "isDeleted": "is_deleted",
            "createdAt": "created_at",
            "updatedAt": "updated_at",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class AIConversationMessage:
    """Generated from the OpenAPI spec — do not edit by hand."""

    role: Literal["user"] | Literal["ai"] = None
    content: str = None
    timestamp: DateTime = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "AIConversationMessage":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "role": "role",
            "content": "content",
            "timestamp": "timestamp",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class AIConversationClarification:
    """Generated from the OpenAPI spec — do not edit by hand."""

    question: str = None
    answer: str = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "AIConversationClarification":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "question": "question",
            "answer": "answer",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class AIConversationRequirements:
    """Generated from the OpenAPI spec — do not edit by hand."""

    target_audience: Optional[str] = None
    tone: Optional[str] = None
    length: Optional[str] = None
    keywords: List[str] = None
    language: Optional[str] = None
    primary_keyword: Optional[str] = None
    min_word_count: Optional[float] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "AIConversationRequirements":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "targetAudience": "target_audience",
            "tone": "tone",
            "length": "length",
            "keywords": "keywords",
            "language": "language",
            "primaryKeyword": "primary_keyword",
            "minWordCount": "min_word_count",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class AIConversation:
    """Generated from the OpenAPI spec — do not edit by hand."""

    _id: ObjectId = None
    conversation_id: str = None
    tenant_id: str = None
    user_id: Optional[str] = None
    stage: Literal["gathering"] | Literal["planning"] | Literal["generating"] | Literal["review"] = None
    tokens_input: float = None
    tokens_output: float = None
    tokens_total: float = None
    messages: List[AIConversationMessage] = None
    context: Dict[str, Any] = None
    attempts: float = None
    max_attempts: float = None
    last_article: Dict[str, Any] = None
    expires_at: DateTime = None
    created_at: DateTime = None
    updated_at: DateTime = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "AIConversation":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "_id": "_id",
            "conversationId": "conversation_id",
            "tenantId": "tenant_id",
            "userId": "user_id",
            "stage": "stage",
            "tokensInput": "tokens_input",
            "tokensOutput": "tokens_output",
            "tokensTotal": "tokens_total",
            "messages": "messages",
            "context": "context",
            "attempts": "attempts",
            "maxAttempts": "max_attempts",
            "lastArticle": "last_article",
            "expiresAt": "expires_at",
            "createdAt": "created_at",
            "updatedAt": "updated_at",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "messages": lambda v: [AIConversationMessage.from_dict(v) for v in v],
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class AIConversationArticle:
    """Generated from the OpenAPI spec — do not edit by hand."""

    title: str = None
    summary: str = None
    content: str = None
    slug: str = None
    tags: List[str] = None
    seo_score: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "AIConversationArticle":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "title": "title",
            "summary": "summary",
            "content": "content",
            "slug": "slug",
            "tags": "tags",
            "seoScore": "seo_score",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class Article:
    """Generated from the OpenAPI spec — do not edit by hand."""

    _id: ObjectId = None
    tenant_id: str = None
    slug: str = None
    main_title: MultilingualString = None
    title2: MultilingualString = None
    title3: MultilingualString = None
    summary: MultilingualStringOrNull = None
    content: MultilingualString = None
    category: List[ObjectId] = None
    sub_category: List[ObjectId] = None
    author: ObjectId = None
    created_by: ObjectId = None
    tags: List[str] = None
    thumbnail: str = None
    gallery: List[str] = None
    videos: List[str] = None
    audios: List[str] = None
    documents: List[str] = None
    files: List[str] = None
    likes: float = None
    dislikes: float = None
    shares: float = None
    rating: float = None
    rating_count: float = None
    views: float = None
    publish_date: DateTime = None
    is_published: bool = None
    is_private: bool = None
    is_deleted: bool = None
    is_active: bool = None
    auto_summarize: bool = None
    content_source: Literal["human"] | Literal["ai"] | Literal["mixed"] = None
    engagement: Dict[str, Any] = None
    seo: ArticleSeo = None
    created_at: DateTime = None
    updated_at: DateTime = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "Article":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "_id": "_id",
            "tenantId": "tenant_id",
            "slug": "slug",
            "mainTitle": "main_title",
            "title2": "title2",
            "title3": "title3",
            "summary": "summary",
            "content": "content",
            "category": "category",
            "subCategory": "sub_category",
            "author": "author",
            "createdBy": "created_by",
            "tags": "tags",
            "thumbnail": "thumbnail",
            "gallery": "gallery",
            "videos": "videos",
            "audios": "audios",
            "documents": "documents",
            "files": "files",
            "likes": "likes",
            "dislikes": "dislikes",
            "shares": "shares",
            "rating": "rating",
            "ratingCount": "rating_count",
            "views": "views",
            "publishDate": "publish_date",
            "isPublished": "is_published",
            "isPrivate": "is_private",
            "isDeleted": "is_deleted",
            "isActive": "is_active",
            "autoSummarize": "auto_summarize",
            "contentSource": "content_source",
            "engagement": "engagement",
            "seo": "seo",
            "createdAt": "created_at",
            "updatedAt": "updated_at",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "seo": lambda v: ArticleSeo.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class ArticleListItem:
    """Generated from the OpenAPI spec — do not edit by hand."""

    _id: ObjectId = None
    main_title: MultilingualString = None
    slug: str = None
    thumbnail: str = None
    category: List[Category] = None
    sub_category: List[SubCategory] = None
    author: Optional[Author] = None
    summary: MultilingualStringOrNull = None
    is_published: bool = None
    is_private: bool = None
    publish_date: DateTime = None
    created_at: DateTime = None
    updated_at: DateTime = None
    seo: ArticleSeo = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ArticleListItem":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "_id": "_id",
            "mainTitle": "main_title",
            "slug": "slug",
            "thumbnail": "thumbnail",
            "category": "category",
            "subCategory": "sub_category",
            "author": "author",
            "summary": "summary",
            "isPublished": "is_published",
            "isPrivate": "is_private",
            "publishDate": "publish_date",
            "createdAt": "created_at",
            "updatedAt": "updated_at",
            "seo": "seo",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "category": lambda v: [Category.from_dict(v) for v in v],
            "sub_category": lambda v: [SubCategory.from_dict(v) for v in v],
            "author": lambda v: Author.from_dict(v),
            "seo": lambda v: ArticleSeo.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class ArticleLocalized:
    """Generated from the OpenAPI spec — do not edit by hand."""

    _id: ObjectId = None
    main_title: MultilingualStringOrNull = None
    title2: MultilingualStringOrNull = None
    title3: MultilingualStringOrNull = None
    summary: MultilingualStringOrNull = None
    content: MultilingualStringOrNull = None
    category: List[Dict[str, Any]] = None
    sub_category: List[Dict[str, Any]] = None
    author: Optional[Dict[str, Any]] = None
    is_published: bool = None
    is_private: bool = None
    publish_date: DateTime = None
    created_at: DateTime = None
    updated_at: DateTime = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ArticleLocalized":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "_id": "_id",
            "mainTitle": "main_title",
            "title2": "title2",
            "title3": "title3",
            "summary": "summary",
            "content": "content",
            "category": "category",
            "subCategory": "sub_category",
            "author": "author",
            "isPublished": "is_published",
            "isPrivate": "is_private",
            "publishDate": "publish_date",
            "createdAt": "created_at",
            "updatedAt": "updated_at",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class FormFieldOption:
    """Generated from the OpenAPI spec — do not edit by hand."""

    value: str = None
    label: MultilingualString = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "FormFieldOption":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "value": "value",
            "label": "label",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class FormRelationRef:
    """Generated from the OpenAPI spec — do not edit by hand."""

    _id: ObjectId = None
    slug: str = None
    title: MultilingualString = None
    form_type: Literal["public"] | Literal["internal"] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "FormRelationRef":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "_id": "_id",
            "slug": "slug",
            "title": "title",
            "formType": "form_type",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class FormField:
    """Generated from the OpenAPI spec — do not edit by hand."""

    name: str = None
    type_: Literal["text"] | Literal["email"] | Literal["number"] | Literal["date"] | Literal["datetime-local"] | Literal["tags"] | Literal["tags-select"] | Literal["tel"] | Literal["select"] | Literal["multi-select"] | Literal["checkbox"] | Literal["multi-checkbox"] | Literal["radio"] | Literal["textarea"] | Literal["file"] | Literal["switch"] | Literal["markdown"] = None
    label: MultilingualString = None
    required: bool = None
    options: List[FormFieldOption] = None
    validation: Dict[str, Any] = None
    multiple: bool = None
    accept: str = None
    col_span: float = None
    icon: str = None
    disabled: bool = None
    verified: bool = None
    default_value: Any = None
    placeholder: MultilingualString = None
    relation: Dict[str, Any] = None
    relation_details: Dict[str, Any] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "FormField":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "name": "name",
            "type": "type_",
            "label": "label",
            "required": "required",
            "options": "options",
            "validation": "validation",
            "multiple": "multiple",
            "accept": "accept",
            "colSpan": "col_span",
            "icon": "icon",
            "disabled": "disabled",
            "verified": "verified",
            "defaultValue": "default_value",
            "placeholder": "placeholder",
            "relation": "relation",
            "relationDetails": "relation_details",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "options": lambda v: [FormFieldOption.from_dict(v) for v in v],
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class FormSection:
    """Generated from the OpenAPI spec — do not edit by hand."""

    title: MultilingualString = None
    icon: str = None
    description: MultilingualString = None
    fields: List[FormField] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "FormSection":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "title": "title",
            "icon": "icon",
            "description": "description",
            "fields": "fields",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "fields": lambda v: [FormField.from_dict(v) for v in v],
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class FormNotification:
    """Generated from the OpenAPI spec — do not edit by hand."""

    enabled: bool = None
    email: Dict[str, Any] = None
    push: Dict[str, Any] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "FormNotification":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "enabled": "enabled",
            "email": "email",
            "push": "push",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class Form:
    """Generated from the OpenAPI spec — do not edit by hand."""

    _id: ObjectId = None
    tenant_id: str = None
    title: MultilingualString = None
    slug: str = None
    description: MultilingualString = None
    sections: List[FormSection] = None
    submit_button_text: MultilingualString = None
    form_type: Literal["public"] | Literal["internal"] = None
    notification: FormNotification = None
    captcha: Dict[str, Any] = None
    relation: Dict[str, Any] = None
    relation_details: Dict[str, Any] = None
    created_by: ObjectId = None
    is_active: bool = None
    is_deleted: bool = None
    created_at: DateTime = None
    updated_at: DateTime = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "Form":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "_id": "_id",
            "tenantId": "tenant_id",
            "title": "title",
            "slug": "slug",
            "description": "description",
            "sections": "sections",
            "submitButtonText": "submit_button_text",
            "formType": "form_type",
            "notification": "notification",
            "captcha": "captcha",
            "relation": "relation",
            "relationDetails": "relation_details",
            "createdBy": "created_by",
            "isActive": "is_active",
            "isDeleted": "is_deleted",
            "createdAt": "created_at",
            "updatedAt": "updated_at",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "sections": lambda v: [FormSection.from_dict(v) for v in v],
            "notification": lambda v: FormNotification.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class FormListItem:
    """Generated from the OpenAPI spec — do not edit by hand."""

    submissions_count: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "FormListItem":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "submissionsCount": "submissions_count",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class FormSubmission:
    """Generated from the OpenAPI spec — do not edit by hand."""

    _id: ObjectId = None
    tenant_id: ObjectId = None
    form_id: ObjectId = None
    language: str = None
    values: Dict[str, Any] = None
    relations: List[Dict[str, Any]] = None
    status: float = None
    submitted_at: DateTime = None
    is_deleted: bool = None
    created_at: DateTime = None
    updated_at: DateTime = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "FormSubmission":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "_id": "_id",
            "tenantId": "tenant_id",
            "formId": "form_id",
            "language": "language",
            "values": "values",
            "relations": "relations",
            "status": "status",
            "submittedAt": "submitted_at",
            "isDeleted": "is_deleted",
            "createdAt": "created_at",
            "updatedAt": "updated_at",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class FormSubmissionSummary:
    """Generated from the OpenAPI spec — do not edit by hand."""

    _id: ObjectId = None
    form_id: ObjectId = None
    language: str = None
    values: Dict[str, Any] = None
    status: float = None
    submitted_at: DateTime = None
    created_at: DateTime = None
    updated_at: DateTime = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "FormSubmissionSummary":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "_id": "_id",
            "formId": "form_id",
            "language": "language",
            "values": "values",
            "status": "status",
            "submittedAt": "submitted_at",
            "createdAt": "created_at",
            "updatedAt": "updated_at",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class FormSubmissionEnriched:
    """Generated from the OpenAPI spec — do not edit by hand."""

    related_entries: List[Dict[str, Any]] = None
    reverse_relations: List[Dict[str, Any]] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "FormSubmissionEnriched":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "relatedEntries": "related_entries",
            "reverseRelations": "reverse_relations",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class CaptchaConfig:
    """Generated from the OpenAPI spec — do not edit by hand."""

    tenant_id: ObjectId = None
    provider: Literal["recaptcha"] | Literal["hcaptcha"] | Literal["turnstile"] = None
    site_key: Optional[str] = None
    is_active: bool = None
    has_secret_key: bool = None
    secret_key_masked: Optional[str] = None
    updated_by: Optional[str] = None
    updated_at: DateTime = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "CaptchaConfig":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "tenantId": "tenant_id",
            "provider": "provider",
            "siteKey": "site_key",
            "isActive": "is_active",
            "hasSecretKey": "has_secret_key",
            "secretKeyMasked": "secret_key_masked",
            "updatedBy": "updated_by",
            "updatedAt": "updated_at",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class RepurposedOutput:
    """Generated from the OpenAPI spec — do not edit by hand."""

    title: str = None
    summary: str = None
    content: str = None
    hashtags: List[str] = None
    cta: str = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "RepurposedOutput":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "title": "title",
            "summary": "summary",
            "content": "content",
            "hashtags": "hashtags",
            "cta": "cta",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class RepurposeResult:
    """Generated from the OpenAPI spec — do not edit by hand."""

    article_id: Optional[str] = None
    platforms: Dict[str, RepurposedOutput] = None
    ai_generation_id: str = None
    tokens: Tokens = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "RepurposeResult":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "articleId": "article_id",
            "platforms": "platforms",
            "aiGenerationId": "ai_generation_id",
            "tokens": "tokens",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "platforms": lambda v: {k: RepurposedOutput.from_dict(v) for k, v in v.items()},
            "tokens": lambda v: Tokens.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class AIStreamEvent:
    """Generated from the OpenAPI spec — do not edit by hand."""

    event: str = None
    data: Dict[str, Any] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "AIStreamEvent":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "event": "event",
            "data": "data",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class AIConversationContinue:
    """Generated from the OpenAPI spec — do not edit by hand."""

    conversation_id: str = None
    stage: str = None
    requirements: AIConversationRequirements = None
    message: str = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "AIConversationContinue":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "conversationId": "conversation_id",
            "stage": "stage",
            "requirements": "requirements",
            "message": "message",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "requirements": lambda v: AIConversationRequirements.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class AIConversationRegenerate:
    """Generated from the OpenAPI spec — do not edit by hand."""

    conversation_id: str = None
    article: AIConversationArticle = None
    seo_score: float = None
    status: Literal["approved"] | Literal["needs_improvement"] = None
    issues: List[str] = None
    attempts: float = None
    max_attempts: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "AIConversationRegenerate":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "conversationId": "conversation_id",
            "article": "article",
            "seoScore": "seo_score",
            "status": "status",
            "issues": "issues",
            "attempts": "attempts",
            "maxAttempts": "max_attempts",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "article": lambda v: AIConversationArticle.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class ArticleList:
    """Generated from the OpenAPI spec — do not edit by hand."""

    article_list_item: List[ArticleListItem] = None
    pagination: Pagination = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ArticleList":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "articleListItem": "article_list_item",
            "pagination": "pagination",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "article_list_item": lambda v: [ArticleListItem.from_dict(v) for v in v],
            "pagination": lambda v: Pagination.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class AuthorList:
    """Generated from the OpenAPI spec — do not edit by hand."""

    author: List[Author] = None
    pagination: Pagination = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "AuthorList":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "author": "author",
            "pagination": "pagination",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "author": lambda v: [Author.from_dict(v) for v in v],
            "pagination": lambda v: Pagination.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class CategoryList:
    """Generated from the OpenAPI spec — do not edit by hand."""

    category: List[Category] = None
    pagination: Pagination = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "CategoryList":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "category": "category",
            "pagination": "pagination",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "category": lambda v: [Category.from_dict(v) for v in v],
            "pagination": lambda v: Pagination.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class SubCategoryList:
    """Generated from the OpenAPI spec — do not edit by hand."""

    sub_category: List[SubCategory] = None
    pagination: Pagination = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "SubCategoryList":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "subCategory": "sub_category",
            "pagination": "pagination",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "sub_category": lambda v: [SubCategory.from_dict(v) for v in v],
            "pagination": lambda v: Pagination.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class TagList:
    """Generated from the OpenAPI spec — do not edit by hand."""

    tag: List[Tag] = None
    pagination: Pagination = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "TagList":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "tag": "tag",
            "pagination": "pagination",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "tag": lambda v: [Tag.from_dict(v) for v in v],
            "pagination": lambda v: Pagination.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class LanguageList:
    """Generated from the OpenAPI spec — do not edit by hand."""

    language: List[Language] = None
    pagination: Pagination = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "LanguageList":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "language": "language",
            "pagination": "pagination",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "language": lambda v: [Language.from_dict(v) for v in v],
            "pagination": lambda v: Pagination.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class FormList:
    """Generated from the OpenAPI spec — do not edit by hand."""

    form_list_item: List[FormListItem] = None
    pagination: Pagination = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "FormList":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "formListItem": "form_list_item",
            "pagination": "pagination",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "form_list_item": lambda v: [FormListItem.from_dict(v) for v in v],
            "pagination": lambda v: Pagination.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class FormSubmissionList:
    """Generated from the OpenAPI spec — do not edit by hand."""

    form_submission: List[FormSubmission] = None
    pagination: Pagination = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "FormSubmissionList":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "formSubmission": "form_submission",
            "pagination": "pagination",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "form_submission": lambda v: [FormSubmission.from_dict(v) for v in v],
            "pagination": lambda v: Pagination.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class ArticleWrapper:
    """Generated from the OpenAPI spec — do not edit by hand."""

    article: Article = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ArticleWrapper":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "article": "article",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "article": lambda v: Article.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class AuthorWrapper:
    """Generated from the OpenAPI spec — do not edit by hand."""

    author: Author = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "AuthorWrapper":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "author": "author",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "author": lambda v: Author.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class CategoryWrapper:
    """Generated from the OpenAPI spec — do not edit by hand."""

    category: Category = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "CategoryWrapper":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "category": "category",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "category": lambda v: Category.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class SubCategoryWrapper:
    """Generated from the OpenAPI spec — do not edit by hand."""

    sub_category: SubCategory = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "SubCategoryWrapper":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "subCategory": "sub_category",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "sub_category": lambda v: SubCategory.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class TagWrapper:
    """Generated from the OpenAPI spec — do not edit by hand."""

    tag: Tag = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "TagWrapper":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "tag": "tag",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "tag": lambda v: Tag.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class LanguageWrapper:
    """Generated from the OpenAPI spec — do not edit by hand."""

    language: Language = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "LanguageWrapper":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "language": "language",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "language": lambda v: Language.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class FormWrapper:
    """Generated from the OpenAPI spec — do not edit by hand."""

    form: Form = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "FormWrapper":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "form": "form",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "form": lambda v: Form.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class FormNullableWrapper:
    """Generated from the OpenAPI spec — do not edit by hand."""

    form: Optional[Form] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "FormNullableWrapper":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "form": "form",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "form": lambda v: Form.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class NextFormWrapper:
    """Generated from the OpenAPI spec — do not edit by hand."""

    next_form: Optional[Form] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "NextFormWrapper":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "nextForm": "next_form",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "next_form": lambda v: Form.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class SubmissionWrapper:
    """Generated from the OpenAPI spec — do not edit by hand."""

    submission: FormSubmissionEnriched = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "SubmissionWrapper":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "submission": "submission",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "submission": lambda v: FormSubmissionEnriched.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class SubmissionRawWrapper:
    """Generated from the OpenAPI spec — do not edit by hand."""

    submission: FormSubmission = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "SubmissionRawWrapper":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "submission": "submission",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "submission": lambda v: FormSubmission.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class CaptchaConfigWrapper:
    """Generated from the OpenAPI spec — do not edit by hand."""

    config: Optional[CaptchaConfig] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "CaptchaConfigWrapper":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "config": "config",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "config": lambda v: CaptchaConfig.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class FormSubmissionRelations:
    """Generated from the OpenAPI spec — do not edit by hand."""

    submission_id: ObjectId = None
    related_entries: List[Dict[str, Any]] = None
    reverse_relations: List[Dict[str, Any]] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "FormSubmissionRelations":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "submissionId": "submission_id",
            "relatedEntries": "related_entries",
            "reverseRelations": "reverse_relations",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class FormRelationsBackfill:
    """Generated from the OpenAPI spec — do not edit by hand."""

    updated_count: float = None
    scoped_form_id: Optional[ObjectId] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "FormRelationsBackfill":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "updatedCount": "updated_count",
            "scopedFormId": "scoped_form_id",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class ReportRange:
    """Generated from the OpenAPI spec — do not edit by hand."""

    from_: Optional[DateTime] = None
    to: Optional[DateTime] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ReportRange":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "from": "from_",
            "to": "to",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class ReportCategoryRow:
    """Generated from the OpenAPI spec — do not edit by hand."""

    category_id: Optional[ObjectId] = None
    slug: str = None
    name: str = None
    article_count: float = None
    views: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ReportCategoryRow":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "categoryId": "category_id",
            "slug": "slug",
            "name": "name",
            "articleCount": "article_count",
            "views": "views",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class ReportAuthorRow:
    """Generated from the OpenAPI spec — do not edit by hand."""

    author_id: Optional[ObjectId] = None
    slug: str = None
    name: str = None
    article_count: float = None
    views: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ReportAuthorRow":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "authorId": "author_id",
            "slug": "slug",
            "name": "name",
            "articleCount": "article_count",
            "views": "views",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class ContentOverviewReport:
    """Generated from the OpenAPI spec — do not edit by hand."""

    range: ReportRange = None
    totals: Dict[str, Any] = None
    by_source: List[ReportSourceRow] = None
    daily_trend: List[ReportArticleDailyRow] = None
    top_categories: List[ReportCategoryRow] = None
    top_authors: List[ReportAuthorRow] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ContentOverviewReport":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "range": "range",
            "totals": "totals",
            "bySource": "by_source",
            "dailyTrend": "daily_trend",
            "topCategories": "top_categories",
            "topAuthors": "top_authors",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "range": lambda v: ReportRange.from_dict(v),
            "by_source": lambda v: [ReportSourceRow.from_dict(v) for v in v],
            "daily_trend": lambda v: [ReportArticleDailyRow.from_dict(v) for v in v],
            "top_categories": lambda v: [ReportCategoryRow.from_dict(v) for v in v],
            "top_authors": lambda v: [ReportAuthorRow.from_dict(v) for v in v],
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class ReportSourceRow:
    """Generated from the OpenAPI spec — do not edit by hand."""

    source: str = None
    count: float = None
    views: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ReportSourceRow":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "source": "source",
            "count": "count",
            "views": "views",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class ReportArticleDailyRow:
    """Generated from the OpenAPI spec — do not edit by hand."""

    date: str = None
    created_articles: float = None
    published_articles: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ReportArticleDailyRow":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "date": "date",
            "createdArticles": "created_articles",
            "publishedArticles": "published_articles",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class ReportArticleRow:
    """Generated from the OpenAPI spec — do not edit by hand."""

    article_id: ObjectId = None
    slug: str = None
    main_title: MultilingualStringOrNull = None
    is_published: bool = None
    publish_date: Optional[DateTime] = None
    created_at: DateTime = None
    views: float = None
    likes: float = None
    dislikes: float = None
    shares: float = None
    comments_count: float = None
    engagement_score: float = None
    engagement_rate: float = None
    content_source: str = None
    category_ids: List[str] = None
    author: Optional[ReportAuthorBrief] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ReportArticleRow":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "articleId": "article_id",
            "slug": "slug",
            "mainTitle": "main_title",
            "isPublished": "is_published",
            "publishDate": "publish_date",
            "createdAt": "created_at",
            "views": "views",
            "likes": "likes",
            "dislikes": "dislikes",
            "shares": "shares",
            "commentsCount": "comments_count",
            "engagementScore": "engagement_score",
            "engagementRate": "engagement_rate",
            "contentSource": "content_source",
            "categoryIds": "category_ids",
            "author": "author",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "author": lambda v: ReportAuthorBrief.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class ReportAuthorBrief:
    """Generated from the OpenAPI spec — do not edit by hand."""

    author_id: ObjectId = None
    slug: str = None
    name: MultilingualStringOrNull = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ReportAuthorBrief":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "authorId": "author_id",
            "slug": "slug",
            "name": "name",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class TopArticlesReport:
    """Generated from the OpenAPI spec — do not edit by hand."""

    metric: Literal["views"] | Literal["publishDate"] | Literal["engagement"] = None
    limit: float = None
    items: List[ReportArticleRow] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "TopArticlesReport":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "metric": "metric",
            "limit": "limit",
            "items": "items",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "items": lambda v: [ReportArticleRow.from_dict(v) for v in v],
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class AiUsageBreakdownReport:
    """Generated from the OpenAPI spec — do not edit by hand."""

    totals: Dict[str, Any] = None
    by_operation: List[ReportAiOperationRow] = None
    daily_trend: List[ReportAiDailyRow] = None
    recent_errors: List[ReportAiErrorRow] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "AiUsageBreakdownReport":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "totals": "totals",
            "byOperation": "by_operation",
            "dailyTrend": "daily_trend",
            "recentErrors": "recent_errors",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "by_operation": lambda v: [ReportAiOperationRow.from_dict(v) for v in v],
            "daily_trend": lambda v: [ReportAiDailyRow.from_dict(v) for v in v],
            "recent_errors": lambda v: [ReportAiErrorRow.from_dict(v) for v in v],
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class ReportAiOperationRow:
    """Generated from the OpenAPI spec — do not edit by hand."""

    operation_type: str = None
    requests: float = None
    success: float = None
    error: float = None
    tokens_total: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ReportAiOperationRow":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "operationType": "operation_type",
            "requests": "requests",
            "success": "success",
            "error": "error",
            "tokensTotal": "tokens_total",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class ReportAiDailyRow:
    """Generated from the OpenAPI spec — do not edit by hand."""

    date: str = None
    requests: float = None
    success: float = None
    error: float = None
    tokens_total: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ReportAiDailyRow":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "date": "date",
            "requests": "requests",
            "success": "success",
            "error": "error",
            "tokensTotal": "tokens_total",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class ReportAiErrorRow:
    """Generated from the OpenAPI spec — do not edit by hand."""

    operation_type: str = None
    error_message: str = None
    created_at: DateTime = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ReportAiErrorRow":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "operationType": "operation_type",
            "errorMessage": "error_message",
            "createdAt": "created_at",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class FormsOverviewReport:
    """Generated from the OpenAPI spec — do not edit by hand."""

    totals: Dict[str, Any] = None
    by_status: List[ReportStatusRow] = None
    by_language: List[ReportLanguageRow] = None
    daily_trend: List[ReportSubmissionDailyRow] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "FormsOverviewReport":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "totals": "totals",
            "byStatus": "by_status",
            "byLanguage": "by_language",
            "dailyTrend": "daily_trend",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "by_status": lambda v: [ReportStatusRow.from_dict(v) for v in v],
            "by_language": lambda v: [ReportLanguageRow.from_dict(v) for v in v],
            "daily_trend": lambda v: [ReportSubmissionDailyRow.from_dict(v) for v in v],
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class ReportStatusRow:
    """Generated from the OpenAPI spec — do not edit by hand."""

    status: float = None
    status_label: str = None
    count: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ReportStatusRow":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "status": "status",
            "statusLabel": "status_label",
            "count": "count",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class ReportLanguageRow:
    """Generated from the OpenAPI spec — do not edit by hand."""

    language: str = None
    count: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ReportLanguageRow":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "language": "language",
            "count": "count",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class ReportSubmissionDailyRow:
    """Generated from the OpenAPI spec — do not edit by hand."""

    date: str = None
    submissions: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ReportSubmissionDailyRow":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "date": "date",
            "submissions": "submissions",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class SubmissionsOverviewReport:
    """Generated from the OpenAPI spec — do not edit by hand."""

    totals: Dict[str, Any] = None
    by_status: List[ReportStatusRow] = None
    by_language: List[ReportLanguageRow] = None
    daily_trend: List[ReportSubmissionDailyRow] = None
    top_forms: List[ReportTopFormRow] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "SubmissionsOverviewReport":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "totals": "totals",
            "byStatus": "by_status",
            "byLanguage": "by_language",
            "dailyTrend": "daily_trend",
            "topForms": "top_forms",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "by_status": lambda v: [ReportStatusRow.from_dict(v) for v in v],
            "by_language": lambda v: [ReportLanguageRow.from_dict(v) for v in v],
            "daily_trend": lambda v: [ReportSubmissionDailyRow.from_dict(v) for v in v],
            "top_forms": lambda v: [ReportTopFormRow.from_dict(v) for v in v],
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class ReportTopFormRow:
    """Generated from the OpenAPI spec — do not edit by hand."""

    form_id: ObjectId = None
    slug: str = None
    title: MultilingualString = None
    submissions: float = None
    last_submission_at: Optional[DateTime] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ReportTopFormRow":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "formId": "form_id",
            "slug": "slug",
            "title": "title",
            "submissions": "submissions",
            "lastSubmissionAt": "last_submission_at",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class ReportSeries:
    """Generated from the OpenAPI spec — do not edit by hand."""

    name: str = None
    data: List[float] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ReportSeries":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "name": "name",
            "data": "data",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class ReportGroupBy:
    """List wrapper or alias: the payload is reached through its key."""

    def __init__(self, raw: Any = None) -> None:
        self._raw = raw


@dataclass
class ContentTrendReport:
    """Generated from the OpenAPI spec — do not edit by hand."""

    group_by: ReportGroupBy = None
    labels: List[str] = None
    series: List[ReportSeries] = None
    points: List[ReportContentTrendPoint] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ContentTrendReport":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "groupBy": "group_by",
            "labels": "labels",
            "series": "series",
            "points": "points",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "series": lambda v: [ReportSeries.from_dict(v) for v in v],
            "points": lambda v: [ReportContentTrendPoint.from_dict(v) for v in v],
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class ReportContentTrendPoint:
    """Generated from the OpenAPI spec — do not edit by hand."""

    label: str = None
    created_articles: float = None
    published_articles: float = None
    views: float = None
    likes: float = None
    shares: float = None
    comments: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ReportContentTrendPoint":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "label": "label",
            "createdArticles": "created_articles",
            "publishedArticles": "published_articles",
            "views": "views",
            "likes": "likes",
            "shares": "shares",
            "comments": "comments",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class SubmissionFunnelReport:
    """Generated from the OpenAPI spec — do not edit by hand."""

    labels: List[str] = None
    series: List[ReportSeries] = None
    stages: List[ReportFunnelStage] = None
    total: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "SubmissionFunnelReport":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "labels": "labels",
            "series": "series",
            "stages": "stages",
            "total": "total",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "series": lambda v: [ReportSeries.from_dict(v) for v in v],
            "stages": lambda v: [ReportFunnelStage.from_dict(v) for v in v],
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class ReportFunnelStage:
    """Generated from the OpenAPI spec — do not edit by hand."""

    status: float = None
    label: str = None
    count: float = None
    rate: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ReportFunnelStage":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "status": "status",
            "label": "label",
            "count": "count",
            "rate": "rate",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class EngagementTrendReport:
    """Generated from the OpenAPI spec — do not edit by hand."""

    group_by: ReportGroupBy = None
    labels: List[str] = None
    series: List[ReportSeries] = None
    points: List[ReportEngagementPoint] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "EngagementTrendReport":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "groupBy": "group_by",
            "labels": "labels",
            "series": "series",
            "points": "points",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "series": lambda v: [ReportSeries.from_dict(v) for v in v],
            "points": lambda v: [ReportEngagementPoint.from_dict(v) for v in v],
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class ReportEngagementPoint:
    """Generated from the OpenAPI spec — do not edit by hand."""

    label: str = None
    views: float = None
    likes: float = None
    shares: float = None
    comments: float = None
    engagement_score: float = None
    engagement_rate: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ReportEngagementPoint":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "label": "label",
            "views": "views",
            "likes": "likes",
            "shares": "shares",
            "comments": "comments",
            "engagementScore": "engagement_score",
            "engagementRate": "engagement_rate",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class PublishingPerformanceReport:
    """Generated from the OpenAPI spec — do not edit by hand."""

    range: ReportRange = None
    totals: Dict[str, Any] = None
    publish_lag_buckets: List[ReportLagBucket] = None
    publish_weekday: List[ReportWeekdayRow] = None
    recent_drafts: List[ReportDraftRow] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "PublishingPerformanceReport":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "range": "range",
            "totals": "totals",
            "publishLagBuckets": "publish_lag_buckets",
            "publishWeekday": "publish_weekday",
            "recentDrafts": "recent_drafts",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "range": lambda v: ReportRange.from_dict(v),
            "publish_lag_buckets": lambda v: [ReportLagBucket.from_dict(v) for v in v],
            "publish_weekday": lambda v: [ReportWeekdayRow.from_dict(v) for v in v],
            "recent_drafts": lambda v: [ReportDraftRow.from_dict(v) for v in v],
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class ReportLagBucket:
    """Generated from the OpenAPI spec — do not edit by hand."""

    bucket: Literal["under_24h"] | Literal["1_to_3_days"] | Literal["3_to_7_days"] | Literal["over_7_days"] = None
    count: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ReportLagBucket":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "bucket": "bucket",
            "count": "count",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class ReportWeekdayRow:
    """Generated from the OpenAPI spec — do not edit by hand."""

    day_of_week: float = None
    label: str = None
    count: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ReportWeekdayRow":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "dayOfWeek": "day_of_week",
            "label": "label",
            "count": "count",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class ReportDraftRow:
    """Generated from the OpenAPI spec — do not edit by hand."""

    article_id: ObjectId = None
    slug: str = None
    main_title: MultilingualStringOrNull = None
    created_at: DateTime = None
    views: float = None
    age_days: float = None
    author_id: Optional[ObjectId] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ReportDraftRow":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "articleId": "article_id",
            "slug": "slug",
            "mainTitle": "main_title",
            "createdAt": "created_at",
            "views": "views",
            "ageDays": "age_days",
            "authorId": "author_id",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class ContentHealthReport:
    """Generated from the OpenAPI spec — do not edit by hand."""

    range: ReportRange = None
    totals: Dict[str, Any] = None
    quality_buckets: List[ReportQualityBucket] = None
    weakest_articles: List[ReportWeakArticleRow] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ContentHealthReport":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "range": "range",
            "totals": "totals",
            "qualityBuckets": "quality_buckets",
            "weakestArticles": "weakest_articles",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "range": lambda v: ReportRange.from_dict(v),
            "quality_buckets": lambda v: [ReportQualityBucket.from_dict(v) for v in v],
            "weakest_articles": lambda v: [ReportWeakArticleRow.from_dict(v) for v in v],
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class ReportQualityBucket:
    """Generated from the OpenAPI spec — do not edit by hand."""

    score: str = None
    label: Literal["strong"] | Literal["needs_work"] | Literal["weak"] = None
    count: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ReportQualityBucket":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "score": "score",
            "label": "label",
            "count": "count",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class ReportWeakArticleRow:
    """Generated from the OpenAPI spec — do not edit by hand."""

    article_id: ObjectId = None
    slug: str = None
    main_title: MultilingualStringOrNull = None
    created_at: DateTime = None
    is_published: bool = None
    quality_score: float = None
    engagement_score: float = None
    views: float = None
    comments: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ReportWeakArticleRow":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "articleId": "article_id",
            "slug": "slug",
            "mainTitle": "main_title",
            "createdAt": "created_at",
            "isPublished": "is_published",
            "qualityScore": "quality_score",
            "engagementScore": "engagement_score",
            "views": "views",
            "comments": "comments",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class CategoryPerformanceReport:
    """Generated from the OpenAPI spec — do not edit by hand."""

    range: ReportRange = None
    totals: Dict[str, Any] = None
    items: List[ReportCategoryPerformanceRow] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "CategoryPerformanceReport":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "range": "range",
            "totals": "totals",
            "items": "items",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "range": lambda v: ReportRange.from_dict(v),
            "items": lambda v: [ReportCategoryPerformanceRow.from_dict(v) for v in v],
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class ReportCategoryPerformanceRow:
    """Generated from the OpenAPI spec — do not edit by hand."""

    category_id: Optional[ObjectId] = None
    slug: str = None
    name: MultilingualStringOrNull = None
    article_count: float = None
    published_articles: float = None
    total_views: float = None
    total_likes: float = None
    total_shares: float = None
    total_comments: float = None
    engagement_score: float = None
    avg_views_per_article: float = None
    latest_article_at: Optional[DateTime] = None
    share_of_content: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ReportCategoryPerformanceRow":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "categoryId": "category_id",
            "slug": "slug",
            "name": "name",
            "articleCount": "article_count",
            "publishedArticles": "published_articles",
            "totalViews": "total_views",
            "totalLikes": "total_likes",
            "totalShares": "total_shares",
            "totalComments": "total_comments",
            "engagementScore": "engagement_score",
            "avgViewsPerArticle": "avg_views_per_article",
            "latestArticleAt": "latest_article_at",
            "shareOfContent": "share_of_content",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class PeriodComparisonReport:
    """Generated from the OpenAPI spec — do not edit by hand."""

    current_range: ReportRange = None
    previous_range: ReportRange = None
    metrics: List[ReportMetricDelta] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "PeriodComparisonReport":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "currentRange": "current_range",
            "previousRange": "previous_range",
            "metrics": "metrics",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "current_range": lambda v: ReportRange.from_dict(v),
            "previous_range": lambda v: ReportRange.from_dict(v),
            "metrics": lambda v: [ReportMetricDelta.from_dict(v) for v in v],
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class ReportMetricDelta:
    """Generated from the OpenAPI spec — do not edit by hand."""

    label: Literal["articles"] | Literal["publishedArticles"] | Literal["views"] | Literal["engagement"] | Literal["submissions"] | Literal["aiRequests"] = None
    current: float = None
    previous: float = None
    delta: float = None
    delta_percent: Optional[float] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ReportMetricDelta":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "label": "label",
            "current": "current",
            "previous": "previous",
            "delta": "delta",
            "deltaPercent": "delta_percent",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class AiContentImpactReport:
    """Generated from the OpenAPI spec — do not edit by hand."""

    range: ReportRange = None
    by_source: List[ReportAiSourceImpactRow] = None
    top_ai_content: List[ReportAiContentRow] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "AiContentImpactReport":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "range": "range",
            "bySource": "by_source",
            "topAiContent": "top_ai_content",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "range": lambda v: ReportRange.from_dict(v),
            "by_source": lambda v: [ReportAiSourceImpactRow.from_dict(v) for v in v],
            "top_ai_content": lambda v: [ReportAiContentRow.from_dict(v) for v in v],
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class ReportAiSourceImpactRow:
    """Generated from the OpenAPI spec — do not edit by hand."""

    source: str = None
    articles: float = None
    published_articles: float = None
    views: float = None
    likes: float = None
    shares: float = None
    comments: float = None
    engagement_score: float = None
    publish_rate: float = None
    avg_views_per_article: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ReportAiSourceImpactRow":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "source": "source",
            "articles": "articles",
            "publishedArticles": "published_articles",
            "views": "views",
            "likes": "likes",
            "shares": "shares",
            "comments": "comments",
            "engagementScore": "engagement_score",
            "publishRate": "publish_rate",
            "avgViewsPerArticle": "avg_views_per_article",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class ReportAiContentRow:
    """Generated from the OpenAPI spec — do not edit by hand."""

    article_id: ObjectId = None
    slug: str = None
    main_title: MultilingualStringOrNull = None
    content_source: str = None
    is_published: bool = None
    views: float = None
    likes: float = None
    shares: float = None
    comments_count: float = None
    engagement_score: float = None
    created_at: DateTime = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ReportAiContentRow":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "articleId": "article_id",
            "slug": "slug",
            "mainTitle": "main_title",
            "contentSource": "content_source",
            "isPublished": "is_published",
            "views": "views",
            "likes": "likes",
            "shares": "shares",
            "commentsCount": "comments_count",
            "engagementScore": "engagement_score",
            "createdAt": "created_at",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class CommentOverviewReport:
    """Generated from the OpenAPI spec — do not edit by hand."""

    range: ReportRange = None
    totals: Dict[str, Any] = None
    by_status: List[ReportCommentStatusRow] = None
    by_actor_type: List[ReportActorTypeRow] = None
    daily_trend: List[ReportCommentDailyRow] = None
    top_discussed_articles: List[ReportDiscussedArticleRow] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "CommentOverviewReport":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "range": "range",
            "totals": "totals",
            "byStatus": "by_status",
            "byActorType": "by_actor_type",
            "dailyTrend": "daily_trend",
            "topDiscussedArticles": "top_discussed_articles",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "range": lambda v: ReportRange.from_dict(v),
            "by_status": lambda v: [ReportCommentStatusRow.from_dict(v) for v in v],
            "by_actor_type": lambda v: [ReportActorTypeRow.from_dict(v) for v in v],
            "daily_trend": lambda v: [ReportCommentDailyRow.from_dict(v) for v in v],
            "top_discussed_articles": lambda v: [ReportDiscussedArticleRow.from_dict(v) for v in v],
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class ReportCommentStatusRow:
    """Generated from the OpenAPI spec — do not edit by hand."""

    status: float = None
    count: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ReportCommentStatusRow":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "status": "status",
            "count": "count",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class ReportActorTypeRow:
    """Generated from the OpenAPI spec — do not edit by hand."""

    actor_type: str = None
    count: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ReportActorTypeRow":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "actorType": "actor_type",
            "count": "count",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class ReportCommentDailyRow:
    """Generated from the OpenAPI spec — do not edit by hand."""

    date: str = None
    comments: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ReportCommentDailyRow":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "date": "date",
            "comments": "comments",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class ReportDiscussedArticleRow:
    """Generated from the OpenAPI spec — do not edit by hand."""

    article_id: ObjectId = None
    slug: str = None
    main_title: MultilingualStringOrNull = None
    comments: float = None
    likes: float = None
    dislikes: float = None
    last_comment_at: Optional[DateTime] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ReportDiscussedArticleRow":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "articleId": "article_id",
            "slug": "slug",
            "mainTitle": "main_title",
            "comments": "comments",
            "likes": "likes",
            "dislikes": "dislikes",
            "lastCommentAt": "last_comment_at",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class Comment:
    """Generated from the OpenAPI spec — do not edit by hand."""

    _id: ObjectId = None
    tenant_id: str = None
    article_id: ObjectId = None
    actor_type: Literal["user"] | Literal["guest"] = None
    user_id: Optional[ObjectId] = None
    parent_id: Optional[ObjectId] = None
    content: str = None
    likes: float = None
    dislikes: float = None
    status: Literal["pending"] | Literal["approved"] | Literal["rejected"] = None
    created_at: DateTime = None
    updated_at: DateTime = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "Comment":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "_id": "_id",
            "tenantId": "tenant_id",
            "articleId": "article_id",
            "actorType": "actor_type",
            "userId": "user_id",
            "parentId": "parent_id",
            "content": "content",
            "likes": "likes",
            "dislikes": "dislikes",
            "status": "status",
            "createdAt": "created_at",
            "updatedAt": "updated_at",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class CommentWrapper:
    """Generated from the OpenAPI spec — do not edit by hand."""

    comment: Comment = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "CommentWrapper":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "comment": "comment",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "comment": lambda v: Comment.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class CommentListWrapper:
    """Generated from the OpenAPI spec — do not edit by hand."""

    comments: List[Comment] = None
    pagination: Pagination = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "CommentListWrapper":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "comments": "comments",
            "pagination": "pagination",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "comments": lambda v: [Comment.from_dict(v) for v in v],
            "pagination": lambda v: Pagination.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class ArticleReactionTotals:
    """Generated from the OpenAPI spec — do not edit by hand."""

    article_id: ObjectId = None
    reaction: Literal["like"] | Literal["dislike"] = None
    likes: float = None
    dislikes: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ArticleReactionTotals":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "articleId": "article_id",
            "reaction": "reaction",
            "likes": "likes",
            "dislikes": "dislikes",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class ArticleReactionSummary:
    """Generated from the OpenAPI spec — do not edit by hand."""

    article_id: ObjectId = None
    likes: float = None
    dislikes: float = None
    user_reaction: Optional[Literal["like"] | Literal["dislike"]] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ArticleReactionSummary":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "articleId": "article_id",
            "likes": "likes",
            "dislikes": "dislikes",
            "userReaction": "user_reaction",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class CommentReactionTotals:
    """Generated from the OpenAPI spec — do not edit by hand."""

    comment_id: ObjectId = None
    reaction: Literal["like"] | Literal["dislike"] = None
    likes: float = None
    dislikes: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "CommentReactionTotals":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "commentId": "comment_id",
            "reaction": "reaction",
            "likes": "likes",
            "dislikes": "dislikes",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class CommentReactionSummary:
    """Generated from the OpenAPI spec — do not edit by hand."""

    comment_id: ObjectId = None
    likes: float = None
    dislikes: float = None
    user_reaction: Optional[Literal["like"] | Literal["dislike"]] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "CommentReactionSummary":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "commentId": "comment_id",
            "likes": "likes",
            "dislikes": "dislikes",
            "userReaction": "user_reaction",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class EngagementSettings:
    """Generated from the OpenAPI spec — do not edit by hand."""

    tenant_id: str = None
    comments_enabled: bool = None
    reactions_enabled: bool = None
    allow_guest_comments: bool = None
    allow_guest_reactions: bool = None
    auto_approve_comments: bool = None
    require_captcha_for_guest_engagement: bool = None
    guest_engagement_captcha_min_score: float = None
    guest_engagement_rate_limit_per_min: float = None
    updated_by: Optional[ObjectId] = None
    updated_at: DateTime = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "EngagementSettings":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "tenantId": "tenant_id",
            "commentsEnabled": "comments_enabled",
            "reactionsEnabled": "reactions_enabled",
            "allowGuestComments": "allow_guest_comments",
            "allowGuestReactions": "allow_guest_reactions",
            "autoApproveComments": "auto_approve_comments",
            "requireCaptchaForGuestEngagement": "require_captcha_for_guest_engagement",
            "guestEngagementCaptchaMinScore": "guest_engagement_captcha_min_score",
            "guestEngagementRateLimitPerMin": "guest_engagement_rate_limit_per_min",
            "updatedBy": "updated_by",
            "updatedAt": "updated_at",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class CategoryDeleteResult:
    """Generated from the OpenAPI spec — do not edit by hand."""

    category: Category = None
    sub_categories_affected: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "CategoryDeleteResult":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "category": "category",
            "subCategoriesAffected": "sub_categories_affected",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "category": lambda v: Category.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class TagSearchResult:
    """Generated from the OpenAPI spec — do not edit by hand."""

    tags: List[Tag] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "TagSearchResult":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "tags": "tags",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "tags": lambda v: [Tag.from_dict(v) for v in v],
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class SeoAnalysis:
    """Generated from the OpenAPI spec — do not edit by hand."""

    score: float = None
    potential_score: float = None
    scores: Dict[str, Any] = None
    stats: Dict[str, Any] = None
    top_keywords: List[Dict[str, Any]] = None
    all_keywords: List[Dict[str, Any]] = None
    issues: Dict[str, Any] = None
    checks: Dict[str, Any] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "SeoAnalysis":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "score": "score",
            "potentialScore": "potential_score",
            "scores": "scores",
            "stats": "stats",
            "topKeywords": "top_keywords",
            "allKeywords": "all_keywords",
            "issues": "issues",
            "checks": "checks",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class SeoAnalysisPerLanguage:
    """Map of nested models, keyed by language or similar."""

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> Dict[str, Any]:
        """Convert the values, leaving the keys as they arrived."""
        return {k: SeoAnalysis.from_dict(v) for k, v in data.items()}


@dataclass
class SeoAnalysisResult:
    """Generated from the OpenAPI spec — do not edit by hand."""

    article_id: ObjectId = None
    slug: str = None
    language: str = None
    seo: SeoAnalysis | SeoAnalysisPerLanguage = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "SeoAnalysisResult":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "articleId": "article_id",
            "slug": "slug",
            "language": "language",
            "seo": "seo",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "seo": lambda v: SeoAnalysis.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class TenantUsageStats:
    """Generated from the OpenAPI spec — do not edit by hand."""

    admins: float = None
    api_keys: float = None
    categories: float = None
    sub_categories: float = None
    articles: float = None
    forms: float = None
    submissions: float = None
    languages: float = None
    ai_tokens: float = None
    s3: float = None
    limits: Dict[str, float] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "TenantUsageStats":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "admins": "admins",
            "apiKeys": "api_keys",
            "categories": "categories",
            "subCategories": "sub_categories",
            "articles": "articles",
            "forms": "forms",
            "submissions": "submissions",
            "languages": "languages",
            "ai_tokens": "ai_tokens",
            "s3": "s3",
            "limits": "limits",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class UserStats:
    """Generated from the OpenAPI spec — do not edit by hand."""

    user_id: str = None
    tenant_id: str = None
    articles: float = None
    categories: float = None
    sub_categories: float = None
    forms: float = None
    languages: float = None
    published_articles: float = None
    last_article_at: Optional[DateTime] = None
    likes: float = None
    dislikes: float = None
    views: float = None
    shares: float = None
    comments: float = None
    engagement_score: float = None
    engagement_rate: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "UserStats":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "userId": "user_id",
            "tenantId": "tenant_id",
            "articles": "articles",
            "categories": "categories",
            "subCategories": "sub_categories",
            "forms": "forms",
            "languages": "languages",
            "publishedArticles": "published_articles",
            "lastArticleAt": "last_article_at",
            "likes": "likes",
            "dislikes": "dislikes",
            "views": "views",
            "shares": "shares",
            "comments": "comments",
            "engagementScore": "engagement_score",
            "engagementRate": "engagement_rate",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class AuthorStats:
    """Generated from the OpenAPI spec — do not edit by hand."""

    author_id: str = None
    tenant_id: str = None
    articles: float = None
    published_articles: float = None
    last_article_at: Optional[DateTime] = None
    likes: float = None
    dislikes: float = None
    views: float = None
    shares: float = None
    comments: float = None
    engagement_score: float = None
    engagement_rate: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "AuthorStats":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "authorId": "author_id",
            "tenantId": "tenant_id",
            "articles": "articles",
            "publishedArticles": "published_articles",
            "lastArticleAt": "last_article_at",
            "likes": "likes",
            "dislikes": "dislikes",
            "views": "views",
            "shares": "shares",
            "comments": "comments",
            "engagementScore": "engagement_score",
            "engagementRate": "engagement_rate",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class UsersStatsPage:
    """Generated from the OpenAPI spec — do not edit by hand."""

    items: List[UserStats] = None
    pagination: Pagination = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "UsersStatsPage":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "items": "items",
            "pagination": "pagination",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "items": lambda v: [UserStats.from_dict(v) for v in v],
            "pagination": lambda v: Pagination.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class AuthorsStatsPage:
    """Generated from the OpenAPI spec — do not edit by hand."""

    items: List[AuthorStats] = None
    pagination: Pagination = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "AuthorsStatsPage":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "items": "items",
            "pagination": "pagination",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "items": lambda v: [AuthorStats.from_dict(v) for v in v],
            "pagination": lambda v: Pagination.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class DashboardSlot:
    """Generated from the OpenAPI spec — do not edit by hand."""

    id_: str = None
    type_: Literal["operationsOverview"] | Literal["tenantCapacity"] | Literal["contentTrend"] | Literal["summaryOverview"] | Literal["topArticles"] | Literal["reportIntelligence"] | Literal["contentSpotlight"] = None
    enabled: bool = None
    span: Literal["half"] | Literal["full"] = None
    settings: Dict[str, Any] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "DashboardSlot":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "id": "id_",
            "type": "type_",
            "enabled": "enabled",
            "span": "span",
            "settings": "settings",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class DashboardConfig:
    """Generated from the OpenAPI spec — do not edit by hand."""

    version: float = None
    template_id: str = None
    slots: List[DashboardSlot] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "DashboardConfig":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "version": "version",
            "templateId": "template_id",
            "slots": "slots",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "slots": lambda v: [DashboardSlot.from_dict(v) for v in v],
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class DashboardConfigWrapper:
    """Generated from the OpenAPI spec — do not edit by hand."""

    dashboard_config: DashboardConfig = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "DashboardConfigWrapper":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "dashboardConfig": "dashboard_config",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "dashboard_config": lambda v: DashboardConfig.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class AiSummaryResult:
    """Generated from the OpenAPI spec — do not edit by hand."""

    summary: str = None
    tokens: Tokens = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "AiSummaryResult":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "summary": "summary",
            "tokens": "tokens",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "tokens": lambda v: Tokens.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class AiTitleResult:
    """Generated from the OpenAPI spec — do not edit by hand."""

    title: str = None
    tokens: Tokens = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "AiTitleResult":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "title": "title",
            "tokens": "tokens",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "tokens": lambda v: Tokens.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class AiTranslateResult:
    """Generated from the OpenAPI spec — do not edit by hand."""

    content: str = None
    tokens: Tokens = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "AiTranslateResult":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "content": "content",
            "tokens": "tokens",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "tokens": lambda v: Tokens.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class AiSeoResult:
    """Generated from the OpenAPI spec — do not edit by hand."""

    content_html: str = None
    meta_description: str = None
    ai_seo_score: float = None
    suggested_keywords: List[str] = None
    tokens: Tokens = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "AiSeoResult":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "contentHtml": "content_html",
            "metaDescription": "meta_description",
            "aiSeoScore": "ai_seo_score",
            "suggestedKeywords": "suggested_keywords",
            "tokens": "tokens",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "tokens": lambda v: Tokens.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class AiContentResult:
    """Generated from the OpenAPI spec — do not edit by hand."""

    title: str = None
    slug: str = None
    summary: str = None
    body: str = None
    ai_generation_id: str = None
    tokens: Tokens = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "AiContentResult":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "title": "title",
            "slug": "slug",
            "summary": "summary",
            "body": "body",
            "aiGenerationId": "ai_generation_id",
            "tokens": "tokens",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "tokens": lambda v: Tokens.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class AiImageResult:
    """Generated from the OpenAPI spec — do not edit by hand."""

    image_url: str = None
    image_base64: str = None
    image_mime_type: str = None
    article_id: Optional[ObjectId] = None
    tokens: TokensUsedOnly = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "AiImageResult":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "imageUrl": "image_url",
            "imageBase64": "image_base64",
            "imageMimeType": "image_mime_type",
            "articleId": "article_id",
            "tokens": "tokens",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "tokens": lambda v: TokensUsedOnly.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class AiArticlePatch:
    """Generated from the OpenAPI spec — do not edit by hand."""

    title: str = None
    summary: str = None
    content_html: str = None
    tags: List[str] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "AiArticlePatch":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "title": "title",
            "summary": "summary",
            "contentHtml": "content_html",
            "tags": "tags",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class AiArticleSeoResult:
    """Generated from the OpenAPI spec — do not edit by hand."""

    article_id: ObjectId = None
    patched: Dict[str, AiArticlePatch] = None
    seo: Dict[str, SeoAnalysis] = None
    saved: bool = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "AiArticleSeoResult":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "articleId": "article_id",
            "patched": "patched",
            "seo": "seo",
            "saved": "saved",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "patched": lambda v: {k: AiArticlePatch.from_dict(v) for k, v in v.items()},
            "seo": lambda v: {k: SeoAnalysis.from_dict(v) for k, v in v.items()},
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class AiArticleTranslation:
    """Generated from the OpenAPI spec — do not edit by hand."""

    main_title: str = None
    title2: str = None
    title3: str = None
    summary: str = None
    content: str = None
    tags: List[str] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "AiArticleTranslation":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "mainTitle": "main_title",
            "title2": "title2",
            "title3": "title3",
            "summary": "summary",
            "content": "content",
            "tags": "tags",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class AiArticleTranslateResult:
    """Generated from the OpenAPI spec — do not edit by hand."""

    article_id: ObjectId = None
    source_language: str = None
    target_languages: List[str] = None
    translations: Dict[str, AiArticleTranslation] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "AiArticleTranslateResult":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "articleId": "article_id",
            "sourceLanguage": "source_language",
            "targetLanguages": "target_languages",
            "translations": "translations",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "translations": lambda v: {k: AiArticleTranslation.from_dict(v) for k, v in v.items()},
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class AiFormFieldTranslation:
    """Generated from the OpenAPI spec — do not edit by hand."""

    label: str = None
    placeholder: str = None
    options: List[Dict[str, Any]] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "AiFormFieldTranslation":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "label": "label",
            "placeholder": "placeholder",
            "options": "options",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class AiFormSectionTranslation:
    """Generated from the OpenAPI spec — do not edit by hand."""

    title: str = None
    description: str = None
    submit_button_text: str = None
    section_titles: List[str] = None
    section_descriptions: List[str] = None
    field_labels: List[str] = None
    field_placeholders: List[str] = None
    fields: List[AiFormFieldTranslation] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "AiFormSectionTranslation":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "title": "title",
            "description": "description",
            "submitButtonText": "submit_button_text",
            "sectionTitles": "section_titles",
            "sectionDescriptions": "section_descriptions",
            "fieldLabels": "field_labels",
            "fieldPlaceholders": "field_placeholders",
            "fields": "fields",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "fields": lambda v: [AiFormFieldTranslation.from_dict(v) for v in v],
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class AiFormTranslateResult:
    """Generated from the OpenAPI spec — do not edit by hand."""

    form_id: ObjectId = None
    source_language: str = None
    target_languages: List[str] = None
    translations: Dict[str, AiFormSectionTranslation] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "AiFormTranslateResult":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "formId": "form_id",
            "sourceLanguage": "source_language",
            "targetLanguages": "target_languages",
            "translations": "translations",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "translations": lambda v: {k: AiFormSectionTranslation.from_dict(v) for k, v in v.items()},
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class SocialTemplateDefaults:
    """Generated from the OpenAPI spec — do not edit by hand."""

    language: str = None
    tone: str = None
    length: str = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "SocialTemplateDefaults":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "language": "language",
            "tone": "tone",
            "length": "length",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class SocialPlatformTemplate:
    """Generated from the OpenAPI spec — do not edit by hand."""

    tone: str = None
    length: str = None
    cta_template: str = None
    hashtag_style: str = None
    max_hashtags: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "SocialPlatformTemplate":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "tone": "tone",
            "length": "length",
            "ctaTemplate": "cta_template",
            "hashtagStyle": "hashtag_style",
            "maxHashtags": "max_hashtags",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class SocialTemplate:
    """Generated from the OpenAPI spec — do not edit by hand."""

    defaults: SocialTemplateDefaults = None
    platforms: Dict[str, Any] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "SocialTemplate":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "defaults": "defaults",
            "platforms": "platforms",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "defaults": lambda v: SocialTemplateDefaults.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class SocialConnection:
    """Generated from the OpenAPI spec — do not edit by hand."""

    tenant_id: str = None
    provider: Literal["linkedin"] | Literal["twitter"] | Literal["telegram"] = None
    is_active: bool = None
    config: Dict[str, str] = None
    updated_by: Optional[ObjectId] = None
    updated_at: DateTime = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "SocialConnection":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "tenantId": "tenant_id",
            "provider": "provider",
            "isActive": "is_active",
            "config": "config",
            "updatedBy": "updated_by",
            "updatedAt": "updated_at",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class SocialConnectionList:
    """Generated from the OpenAPI spec — do not edit by hand."""

    connections: List[SocialConnection] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "SocialConnectionList":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "connections": "connections",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "connections": lambda v: [SocialConnection.from_dict(v) for v in v],
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class SocialPublishResult:
    """Generated from the OpenAPI spec — do not edit by hand."""

    provider: Literal["linkedin"] | Literal["twitter"] | Literal["telegram"] = None
    post_id: Optional[str] = None
    message_id: Optional[float] = None
    tweet_id: Optional[str] = None
    chat_id: Optional[str] = None
    status: float = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "SocialPublishResult":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "provider": "provider",
            "postId": "post_id",
            "messageId": "message_id",
            "tweetId": "tweet_id",
            "chatId": "chat_id",
            "status": "status",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class ConversationStart:
    """Generated from the OpenAPI spec — do not edit by hand."""

    conversation_id: str = None
    stage: Literal["gathering"] | Literal["planning"] | Literal["generating"] | Literal["review"] = None
    questions: List[str] = None
    expires_at: DateTime = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ConversationStart":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "conversationId": "conversation_id",
            "stage": "stage",
            "questions": "questions",
            "expiresAt": "expires_at",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class ConversationGenerate:
    """Generated from the OpenAPI spec — do not edit by hand."""

    conversation_id: str = None
    article: AIConversationArticle = None
    seo_score: float = None
    issues: List[str] = None
    attempts: float = None
    max_attempts: float = None
    status: Literal["approved"] | Literal["needs_improvement"] | Literal["max_attempts_reached"] = None
    message: str = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "ConversationGenerate":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "conversationId": "conversation_id",
            "article": "article",
            "seoScore": "seo_score",
            "issues": "issues",
            "attempts": "attempts",
            "maxAttempts": "max_attempts",
            "status": "status",
            "message": "message",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        nested = {
            "article": lambda v: AIConversationArticle.from_dict(v),
        }
        for f, fn in nested.items():
            if getattr(out, f, None) is not None:
                setattr(out, f, fn(getattr(out, f)))
        return out


@dataclass
class Envelope:
    """Generated from the OpenAPI spec — do not edit by hand."""

    success: bool = None
    status_code: float = None
    message: str = None
    data: Optional[Dict[str, Any]] = None

    @classmethod
    def from_dict(cls, data: Dict[str, Any]) -> "Envelope":
        """Build from a decoded payload, ignoring unknown keys so a
        server-side addition does not break an older client."""
        wire = {
            "success": "success",
            "statusCode": "status_code",
            "message": "message",
            "data": "data",
        }
        out = cls()
        for k, v in data.items():
            f = wire.get(k)
            if f is None or v is None:
                continue
            setattr(out, f, v)
        return out


@dataclass
class ErrorResponse:
    """List wrapper or alias: the payload is reached through its key."""

    def __init__(self, raw: Any = None) -> None:
        self._raw = raw
