<?php

declare(strict_types=1);

namespace Octavia\CmsSDK\Types;

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ObjectId
{
    // No declared properties: this component is a list wrapper, whose
    // payload is reached through the key the server sent it under.
    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class DateTime
{
    // No declared properties: this component is a list wrapper, whose
    // payload is reached through the key the server sent it under.
    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 *
 * A map keyed by a language code. Read it with array access, or as a property:
 * `$title['en']` and `$title->en` are the same value.
 */
class MultilingualString implements \ArrayAccess, \IteratorAggregate, \Countable
{
    public function offsetExists(mixed $offset): bool
    {
        return isset($this->data[$offset]);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->data[$offset] ?? null;
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        if ($offset === null) {
            $this->data[] = $value;

            return;
        }

        $this->data[$offset] = $value;
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->data[$offset]);
    }

    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->data);
    }

    public function count(): int
    {
        return count($this->data);
    }

    // A language code is not a declared property, so `$title->en` has to
    // reach the map rather than warn about an undefined property.
    public function __get(string $key): mixed
    {
        return $this->data[$key] ?? null;
    }

    public function __isset(string $key): bool
    {
        return isset($this->data[$key]);
    }

    /**
     * Every key the server sent, so an undeclared language code stays
     * reachable rather than dropped.
     *
     * @var array<array-key, string>
     */
    public array $data = [];

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        $instance->data = $data;

        return $instance;
    }

    /** @return array<array-key, mixed> */
    public function toArray(): array
    {
        return $this->data;
    }

    /**
     * The translation for one key, or null
     * when the server sent no such key.
     */
    public function get(string $key): mixed
    {
        return $this->data[$key] ?? null;
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class MultilingualStringOrNull
{
    // No declared properties: this component is a list wrapper, whose
    // payload is reached through the key the server sent it under.
    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class Pagination
{
    /** @var float */
    public $total = null;
    /** @var float */
    public $page = null;
    /** @var float */
    public $limit = null;
    /** @var float */
    public $totalPages = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('total', $data)) {
            $instance->total = $data['total'];
        }
        if (array_key_exists('page', $data)) {
            $instance->page = $data['page'];
        }
        if (array_key_exists('limit', $data)) {
            $instance->limit = $data['limit'];
        }
        if (array_key_exists('totalPages', $data)) {
            $instance->totalPages = $data['totalPages'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class Tokens
{
    /** @var float */
    public $used = null;
    /** @var float */
    public $remaining = null;
    /** @var float */
    public $limit = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('used', $data)) {
            $instance->used = $data['used'];
        }
        if (array_key_exists('remaining', $data)) {
            $instance->remaining = $data['remaining'];
        }
        if (array_key_exists('limit', $data)) {
            $instance->limit = $data['limit'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class TokensUsedOnly
{
    /** @var float */
    public $used = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('used', $data)) {
            $instance->used = $data['used'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SeoKeywordAnalysis
{
    /** @var ?string */
    public $term = null;
    /** @var ?float */
    public $count = null;
    /** @var ?float */
    public $density = null;
    /** @var ?float[] */
    public $positions = null;
    /** @var ?bool */
    public $inTitle = null;
    /** @var ?float */
    public $inHeadings = null;
    /** @var ?bool */
    public $inFirstParagraph = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('term', $data)) {
            $instance->term = $data['term'];
        }
        if (array_key_exists('count', $data)) {
            $instance->count = $data['count'];
        }
        if (array_key_exists('density', $data)) {
            $instance->density = $data['density'];
        }
        if (array_key_exists('positions', $data)) {
            $instance->positions = $data['positions'];
        }
        if (array_key_exists('inTitle', $data)) {
            $instance->inTitle = $data['inTitle'];
        }
        if (array_key_exists('inHeadings', $data)) {
            $instance->inHeadings = $data['inHeadings'];
        }
        if (array_key_exists('inFirstParagraph', $data)) {
            $instance->inFirstParagraph = $data['inFirstParagraph'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SeoLanguageMetrics
{
    /** @var ?string */
    public $languageCode = null;
    /** @var ?string */
    public $primaryKeyword = null;
    /** @var ?float */
    public $baseScore = null;
    /** @var ?float */
    public $potentialScore = null;
    /** @var ?array<string, mixed> */
    public $signals = null;
    /** @var ?float */
    public $wordCount = null;
    /** @var ?float */
    public $keywordDensity = null;
    /** @var ?string[] */
    public $suggestions = null;
    /** @var ?array<string, mixed> */
    public $termsAnalysis = null;
    /** @var ?array<string, mixed> */
    public $structureAnalysis = null;
    /** @var ?array<string, mixed> */
    public $linkAnalysis = null;
    /** @var ?array<string, mixed> */
    public $imageAnalysis = null;
    /** @var ?array<string, mixed> */
    public $readabilityMetrics = null;
    /** @var ?array<string, mixed> */
    public $technicalSEO = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('languageCode', $data)) {
            $instance->languageCode = $data['languageCode'];
        }
        if (array_key_exists('primaryKeyword', $data)) {
            $instance->primaryKeyword = $data['primaryKeyword'];
        }
        if (array_key_exists('baseScore', $data)) {
            $instance->baseScore = $data['baseScore'];
        }
        if (array_key_exists('potentialScore', $data)) {
            $instance->potentialScore = $data['potentialScore'];
        }
        if (array_key_exists('signals', $data)) {
            $instance->signals = $data['signals'];
        }
        if (array_key_exists('wordCount', $data)) {
            $instance->wordCount = $data['wordCount'];
        }
        if (array_key_exists('keywordDensity', $data)) {
            $instance->keywordDensity = $data['keywordDensity'];
        }
        if (array_key_exists('suggestions', $data)) {
            $instance->suggestions = $data['suggestions'];
        }
        if (array_key_exists('termsAnalysis', $data)) {
            $instance->termsAnalysis = $data['termsAnalysis'];
        }
        if (array_key_exists('structureAnalysis', $data)) {
            $instance->structureAnalysis = $data['structureAnalysis'];
        }
        if (array_key_exists('linkAnalysis', $data)) {
            $instance->linkAnalysis = $data['linkAnalysis'];
        }
        if (array_key_exists('imageAnalysis', $data)) {
            $instance->imageAnalysis = $data['imageAnalysis'];
        }
        if (array_key_exists('readabilityMetrics', $data)) {
            $instance->readabilityMetrics = $data['readabilityMetrics'];
        }
        if (array_key_exists('technicalSEO', $data)) {
            $instance->technicalSEO = $data['technicalSEO'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 *
 * A map keyed by whatever key the endpoint supplies. Read it with array access, or as a property:
 * `$title['en']` and `$title->en` are the same value.
 */
class SeoPerLanguage implements \ArrayAccess, \IteratorAggregate, \Countable
{
    public function offsetExists(mixed $offset): bool
    {
        return isset($this->data[$offset]);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->data[$offset] ?? null;
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        if ($offset === null) {
            $this->data[] = $value;

            return;
        }

        $this->data[$offset] = $value;
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->data[$offset]);
    }

    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->data);
    }

    public function count(): int
    {
        return count($this->data);
    }

    // A language code is not a declared property, so `$title->en` has to
    // reach the map rather than warn about an undefined property.
    public function __get(string $key): mixed
    {
        return $this->data[$key] ?? null;
    }

    public function __isset(string $key): bool
    {
        return isset($this->data[$key]);
    }

    /**
     * Every key the server sent, so an undeclared language code stays
     * reachable rather than dropped.
     *
     * @var array<array-key, SeoLanguageMetrics>
     */
    public array $data = [];

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        $instance->data = $data;

        return $instance;
    }

    /** @return array<array-key, mixed> */
    public function toArray(): array
    {
        return $this->data;
    }

    /**
     * The value for one key, or null
     * when the server sent no such key.
     */
    public function get(string $key): mixed
    {
        return $this->data[$key] ?? null;
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ArticleSeo
{
    /** @var ?SeoPerLanguage */
    public $perLanguage = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('perLanguage', $data)) {
            $instance->perLanguage = $data['perLanguage'];
        }

        $nested = [
            'perLanguage' => static fn (array $v): SeoPerLanguage => SeoPerLanguage::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ArticleEngagementOverride
{
    /** @var ?bool */
    public $commentsEnabled = null;
    /** @var ?bool */
    public $reactionsEnabled = null;
    /** @var ?bool */
    public $autoApproveComments = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('commentsEnabled', $data)) {
            $instance->commentsEnabled = $data['commentsEnabled'];
        }
        if (array_key_exists('reactionsEnabled', $data)) {
            $instance->reactionsEnabled = $data['reactionsEnabled'];
        }
        if (array_key_exists('autoApproveComments', $data)) {
            $instance->autoApproveComments = $data['autoApproveComments'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class Author
{
    /** @var ObjectId */
    public $_id = null;
    /** @var ?string */
    public $tenantId = null;
    /** @var ?string */
    public $slug = null;
    /** @var MultilingualString */
    public $name = null;
    /** @var string */
    public $email = null;
    /** @var ?string */
    public $avatar = null;
    /** @var ?MultilingualString */
    public $bio = null;
    /** @var ?bool */
    public $isPrivate = null;
    /** @var ?bool */
    public $isActive = null;
    /** @var ?bool */
    public $isDeleted = null;
    /** @var ?DateTime */
    public $createdAt = null;
    /** @var ?DateTime */
    public $updatedAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('_id', $data)) {
            $instance->_id = $data['_id'];
        }
        if (array_key_exists('tenantId', $data)) {
            $instance->tenantId = $data['tenantId'];
        }
        if (array_key_exists('slug', $data)) {
            $instance->slug = $data['slug'];
        }
        if (array_key_exists('name', $data)) {
            $instance->name = $data['name'];
        }
        if (array_key_exists('email', $data)) {
            $instance->email = $data['email'];
        }
        if (array_key_exists('avatar', $data)) {
            $instance->avatar = $data['avatar'];
        }
        if (array_key_exists('bio', $data)) {
            $instance->bio = $data['bio'];
        }
        if (array_key_exists('isPrivate', $data)) {
            $instance->isPrivate = $data['isPrivate'];
        }
        if (array_key_exists('isActive', $data)) {
            $instance->isActive = $data['isActive'];
        }
        if (array_key_exists('isDeleted', $data)) {
            $instance->isDeleted = $data['isDeleted'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }
        if (array_key_exists('updatedAt', $data)) {
            $instance->updatedAt = $data['updatedAt'];
        }

        $nested = [
            'name' => static fn (array $v): MultilingualString => MultilingualString::fromArray($v),
            'bio' => static fn (array $v): MultilingualString => MultilingualString::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class Category
{
    /** @var ObjectId */
    public $_id = null;
    /** @var ?string */
    public $tenantId = null;
    /** @var MultilingualString */
    public $name = null;
    /** @var string */
    public $slug = null;
    /** @var ?string */
    public $thumbnail = null;
    /** @var ?MultilingualString */
    public $description = null;
    /** @var ?bool */
    public $isPrivate = null;
    /** @var ?bool */
    public $isActive = null;
    /** @var ?bool */
    public $isDeleted = null;
    /** @var ?DateTime */
    public $createdAt = null;
    /** @var ?DateTime */
    public $updatedAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('_id', $data)) {
            $instance->_id = $data['_id'];
        }
        if (array_key_exists('tenantId', $data)) {
            $instance->tenantId = $data['tenantId'];
        }
        if (array_key_exists('name', $data)) {
            $instance->name = $data['name'];
        }
        if (array_key_exists('slug', $data)) {
            $instance->slug = $data['slug'];
        }
        if (array_key_exists('thumbnail', $data)) {
            $instance->thumbnail = $data['thumbnail'];
        }
        if (array_key_exists('description', $data)) {
            $instance->description = $data['description'];
        }
        if (array_key_exists('isPrivate', $data)) {
            $instance->isPrivate = $data['isPrivate'];
        }
        if (array_key_exists('isActive', $data)) {
            $instance->isActive = $data['isActive'];
        }
        if (array_key_exists('isDeleted', $data)) {
            $instance->isDeleted = $data['isDeleted'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }
        if (array_key_exists('updatedAt', $data)) {
            $instance->updatedAt = $data['updatedAt'];
        }

        $nested = [
            'name' => static fn (array $v): MultilingualString => MultilingualString::fromArray($v),
            'description' => static fn (array $v): MultilingualString => MultilingualString::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SubCategory
{
    /** @var ObjectId */
    public $_id = null;
    /** @var ?string */
    public $tenantId = null;
    /** @var MultilingualString */
    public $name = null;
    /** @var string */
    public $slug = null;
    /** @var ?string */
    public $thumbnail = null;
    /** @var ?MultilingualString */
    public $description = null;
    /** @var ObjectId */
    public $category = null;
    /** @var ?bool */
    public $isPrivate = null;
    /** @var ?bool */
    public $isActive = null;
    /** @var ?bool */
    public $isDeleted = null;
    /** @var ?DateTime */
    public $createdAt = null;
    /** @var ?DateTime */
    public $updatedAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('_id', $data)) {
            $instance->_id = $data['_id'];
        }
        if (array_key_exists('tenantId', $data)) {
            $instance->tenantId = $data['tenantId'];
        }
        if (array_key_exists('name', $data)) {
            $instance->name = $data['name'];
        }
        if (array_key_exists('slug', $data)) {
            $instance->slug = $data['slug'];
        }
        if (array_key_exists('thumbnail', $data)) {
            $instance->thumbnail = $data['thumbnail'];
        }
        if (array_key_exists('description', $data)) {
            $instance->description = $data['description'];
        }
        if (array_key_exists('category', $data)) {
            $instance->category = $data['category'];
        }
        if (array_key_exists('isPrivate', $data)) {
            $instance->isPrivate = $data['isPrivate'];
        }
        if (array_key_exists('isActive', $data)) {
            $instance->isActive = $data['isActive'];
        }
        if (array_key_exists('isDeleted', $data)) {
            $instance->isDeleted = $data['isDeleted'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }
        if (array_key_exists('updatedAt', $data)) {
            $instance->updatedAt = $data['updatedAt'];
        }

        $nested = [
            'name' => static fn (array $v): MultilingualString => MultilingualString::fromArray($v),
            'description' => static fn (array $v): MultilingualString => MultilingualString::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class Tag
{
    /** @var ObjectId */
    public $_id = null;
    /** @var ?string */
    public $tenantId = null;
    /** @var string */
    public $name = null;
    /** @var ?DateTime */
    public $createdAt = null;
    /** @var ?DateTime */
    public $updatedAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('_id', $data)) {
            $instance->_id = $data['_id'];
        }
        if (array_key_exists('tenantId', $data)) {
            $instance->tenantId = $data['tenantId'];
        }
        if (array_key_exists('name', $data)) {
            $instance->name = $data['name'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }
        if (array_key_exists('updatedAt', $data)) {
            $instance->updatedAt = $data['updatedAt'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class Language
{
    /** @var ObjectId */
    public $_id = null;
    /** @var ?string */
    public $tenantId = null;
    /** @var string */
    public $code = null;
    /** @var string */
    public $name = null;
    /** @var ?bool */
    public $isActive = null;
    /** @var ?bool */
    public $isDeleted = null;
    /** @var ?DateTime */
    public $createdAt = null;
    /** @var ?DateTime */
    public $updatedAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('_id', $data)) {
            $instance->_id = $data['_id'];
        }
        if (array_key_exists('tenantId', $data)) {
            $instance->tenantId = $data['tenantId'];
        }
        if (array_key_exists('code', $data)) {
            $instance->code = $data['code'];
        }
        if (array_key_exists('name', $data)) {
            $instance->name = $data['name'];
        }
        if (array_key_exists('isActive', $data)) {
            $instance->isActive = $data['isActive'];
        }
        if (array_key_exists('isDeleted', $data)) {
            $instance->isDeleted = $data['isDeleted'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }
        if (array_key_exists('updatedAt', $data)) {
            $instance->updatedAt = $data['updatedAt'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AIConversationMessage
{
    /** @var 'user' | 'ai' */
    public $role = null;
    /** @var string */
    public $content = null;
    /** @var DateTime */
    public $timestamp = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('role', $data)) {
            $instance->role = $data['role'];
        }
        if (array_key_exists('content', $data)) {
            $instance->content = $data['content'];
        }
        if (array_key_exists('timestamp', $data)) {
            $instance->timestamp = $data['timestamp'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AIConversationClarification
{
    /** @var ?string */
    public $question = null;
    /** @var ?string */
    public $answer = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('question', $data)) {
            $instance->question = $data['question'];
        }
        if (array_key_exists('answer', $data)) {
            $instance->answer = $data['answer'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AIConversationRequirements
{
    /** @var ?string */
    public $targetAudience = null;
    /** @var ?string */
    public $tone = null;
    /** @var ?string */
    public $length = null;
    /** @var ?string[] */
    public $keywords = null;
    /** @var ?string */
    public $language = null;
    /** @var ?string */
    public $primaryKeyword = null;
    /** @var ?float */
    public $minWordCount = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('targetAudience', $data)) {
            $instance->targetAudience = $data['targetAudience'];
        }
        if (array_key_exists('tone', $data)) {
            $instance->tone = $data['tone'];
        }
        if (array_key_exists('length', $data)) {
            $instance->length = $data['length'];
        }
        if (array_key_exists('keywords', $data)) {
            $instance->keywords = $data['keywords'];
        }
        if (array_key_exists('language', $data)) {
            $instance->language = $data['language'];
        }
        if (array_key_exists('primaryKeyword', $data)) {
            $instance->primaryKeyword = $data['primaryKeyword'];
        }
        if (array_key_exists('minWordCount', $data)) {
            $instance->minWordCount = $data['minWordCount'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AIConversation
{
    /** @var ObjectId */
    public $_id = null;
    /** @var string */
    public $conversationId = null;
    /** @var ?string */
    public $tenantId = null;
    /** @var ?string */
    public $userId = null;
    /** @var 'gathering' | 'planning' | 'generating' | 'review' */
    public $stage = null;
    /** @var ?float */
    public $tokensInput = null;
    /** @var ?float */
    public $tokensOutput = null;
    /** @var ?float */
    public $tokensTotal = null;
    /** @var AIConversationMessage[] */
    public $messages = null;
    /** @var ?array<string, mixed> */
    public $context = null;
    /** @var ?float */
    public $attempts = null;
    /** @var ?float */
    public $maxAttempts = null;
    /** @var ?array<string, mixed> */
    public $lastArticle = null;
    /** @var ?DateTime */
    public $expiresAt = null;
    /** @var ?DateTime */
    public $createdAt = null;
    /** @var ?DateTime */
    public $updatedAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('_id', $data)) {
            $instance->_id = $data['_id'];
        }
        if (array_key_exists('conversationId', $data)) {
            $instance->conversationId = $data['conversationId'];
        }
        if (array_key_exists('tenantId', $data)) {
            $instance->tenantId = $data['tenantId'];
        }
        if (array_key_exists('userId', $data)) {
            $instance->userId = $data['userId'];
        }
        if (array_key_exists('stage', $data)) {
            $instance->stage = $data['stage'];
        }
        if (array_key_exists('tokensInput', $data)) {
            $instance->tokensInput = $data['tokensInput'];
        }
        if (array_key_exists('tokensOutput', $data)) {
            $instance->tokensOutput = $data['tokensOutput'];
        }
        if (array_key_exists('tokensTotal', $data)) {
            $instance->tokensTotal = $data['tokensTotal'];
        }
        if (array_key_exists('messages', $data)) {
            $instance->messages = $data['messages'];
        }
        if (array_key_exists('context', $data)) {
            $instance->context = $data['context'];
        }
        if (array_key_exists('attempts', $data)) {
            $instance->attempts = $data['attempts'];
        }
        if (array_key_exists('maxAttempts', $data)) {
            $instance->maxAttempts = $data['maxAttempts'];
        }
        if (array_key_exists('lastArticle', $data)) {
            $instance->lastArticle = $data['lastArticle'];
        }
        if (array_key_exists('expiresAt', $data)) {
            $instance->expiresAt = $data['expiresAt'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }
        if (array_key_exists('updatedAt', $data)) {
            $instance->updatedAt = $data['updatedAt'];
        }

        $nested = [
            'messages' => static fn (array $v): array => array_map(static fn ($x) => AIConversationMessage::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AIConversationArticle
{
    /** @var ?string */
    public $title = null;
    /** @var ?string */
    public $summary = null;
    /** @var ?string */
    public $content = null;
    /** @var ?string */
    public $slug = null;
    /** @var ?string[] */
    public $tags = null;
    /** @var ?float */
    public $seoScore = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('title', $data)) {
            $instance->title = $data['title'];
        }
        if (array_key_exists('summary', $data)) {
            $instance->summary = $data['summary'];
        }
        if (array_key_exists('content', $data)) {
            $instance->content = $data['content'];
        }
        if (array_key_exists('slug', $data)) {
            $instance->slug = $data['slug'];
        }
        if (array_key_exists('tags', $data)) {
            $instance->tags = $data['tags'];
        }
        if (array_key_exists('seoScore', $data)) {
            $instance->seoScore = $data['seoScore'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class Article
{
    /** @var ObjectId */
    public $_id = null;
    /** @var ?string */
    public $tenantId = null;
    /** @var ?string */
    public $slug = null;
    /** @var MultilingualString */
    public $mainTitle = null;
    /** @var ?MultilingualString */
    public $title2 = null;
    /** @var ?MultilingualString */
    public $title3 = null;
    /** @var ?MultilingualStringOrNull */
    public $summary = null;
    /** @var MultilingualString */
    public $content = null;
    /** @var ?ObjectId[] */
    public $category = null;
    /** @var ?ObjectId[] */
    public $subCategory = null;
    /** @var ObjectId */
    public $author = null;
    /** @var ObjectId */
    public $createdBy = null;
    /** @var ?string[] */
    public $tags = null;
    /** @var ?string */
    public $thumbnail = null;
    /** @var ?string[] */
    public $gallery = null;
    /** @var ?string[] */
    public $videos = null;
    /** @var ?string[] */
    public $audios = null;
    /** @var ?string[] */
    public $documents = null;
    /** @var ?string[] */
    public $files = null;
    /** @var ?float */
    public $likes = null;
    /** @var ?float */
    public $dislikes = null;
    /** @var ?float */
    public $shares = null;
    /** @var ?float */
    public $rating = null;
    /** @var ?float */
    public $ratingCount = null;
    /** @var ?float */
    public $views = null;
    /** @var ?DateTime */
    public $publishDate = null;
    /** @var ?bool */
    public $isPublished = null;
    /** @var ?bool */
    public $isPrivate = null;
    /** @var ?bool */
    public $isDeleted = null;
    /** @var ?bool */
    public $isActive = null;
    /** @var ?bool */
    public $autoSummarize = null;
    /** @var ?'human' | 'ai' | 'mixed' */
    public $contentSource = null;
    /** @var ?ArticleContentBlocks */
    public $contentBlocks = null;
    /** @var ?ArticleDerivedContent[] */
    public $derivedContent = null;
    /** @var ?ArticleEngagementOverride */
    public $engagement = null;
    /** @var ?ArticleSeo */
    public $seo = null;
    /** @var ?DateTime */
    public $createdAt = null;
    /** @var ?DateTime */
    public $updatedAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('_id', $data)) {
            $instance->_id = $data['_id'];
        }
        if (array_key_exists('tenantId', $data)) {
            $instance->tenantId = $data['tenantId'];
        }
        if (array_key_exists('slug', $data)) {
            $instance->slug = $data['slug'];
        }
        if (array_key_exists('mainTitle', $data)) {
            $instance->mainTitle = $data['mainTitle'];
        }
        if (array_key_exists('title2', $data)) {
            $instance->title2 = $data['title2'];
        }
        if (array_key_exists('title3', $data)) {
            $instance->title3 = $data['title3'];
        }
        if (array_key_exists('summary', $data)) {
            $instance->summary = $data['summary'];
        }
        if (array_key_exists('content', $data)) {
            $instance->content = $data['content'];
        }
        if (array_key_exists('category', $data)) {
            $instance->category = $data['category'];
        }
        if (array_key_exists('subCategory', $data)) {
            $instance->subCategory = $data['subCategory'];
        }
        if (array_key_exists('author', $data)) {
            $instance->author = $data['author'];
        }
        if (array_key_exists('createdBy', $data)) {
            $instance->createdBy = $data['createdBy'];
        }
        if (array_key_exists('tags', $data)) {
            $instance->tags = $data['tags'];
        }
        if (array_key_exists('thumbnail', $data)) {
            $instance->thumbnail = $data['thumbnail'];
        }
        if (array_key_exists('gallery', $data)) {
            $instance->gallery = $data['gallery'];
        }
        if (array_key_exists('videos', $data)) {
            $instance->videos = $data['videos'];
        }
        if (array_key_exists('audios', $data)) {
            $instance->audios = $data['audios'];
        }
        if (array_key_exists('documents', $data)) {
            $instance->documents = $data['documents'];
        }
        if (array_key_exists('files', $data)) {
            $instance->files = $data['files'];
        }
        if (array_key_exists('likes', $data)) {
            $instance->likes = $data['likes'];
        }
        if (array_key_exists('dislikes', $data)) {
            $instance->dislikes = $data['dislikes'];
        }
        if (array_key_exists('shares', $data)) {
            $instance->shares = $data['shares'];
        }
        if (array_key_exists('rating', $data)) {
            $instance->rating = $data['rating'];
        }
        if (array_key_exists('ratingCount', $data)) {
            $instance->ratingCount = $data['ratingCount'];
        }
        if (array_key_exists('views', $data)) {
            $instance->views = $data['views'];
        }
        if (array_key_exists('publishDate', $data)) {
            $instance->publishDate = $data['publishDate'];
        }
        if (array_key_exists('isPublished', $data)) {
            $instance->isPublished = $data['isPublished'];
        }
        if (array_key_exists('isPrivate', $data)) {
            $instance->isPrivate = $data['isPrivate'];
        }
        if (array_key_exists('isDeleted', $data)) {
            $instance->isDeleted = $data['isDeleted'];
        }
        if (array_key_exists('isActive', $data)) {
            $instance->isActive = $data['isActive'];
        }
        if (array_key_exists('autoSummarize', $data)) {
            $instance->autoSummarize = $data['autoSummarize'];
        }
        if (array_key_exists('contentSource', $data)) {
            $instance->contentSource = $data['contentSource'];
        }
        if (array_key_exists('contentBlocks', $data)) {
            $instance->contentBlocks = $data['contentBlocks'];
        }
        if (array_key_exists('derivedContent', $data)) {
            $instance->derivedContent = $data['derivedContent'];
        }
        if (array_key_exists('engagement', $data)) {
            $instance->engagement = $data['engagement'];
        }
        if (array_key_exists('seo', $data)) {
            $instance->seo = $data['seo'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }
        if (array_key_exists('updatedAt', $data)) {
            $instance->updatedAt = $data['updatedAt'];
        }

        $nested = [
            'mainTitle' => static fn (array $v): MultilingualString => MultilingualString::fromArray($v),
            'title2' => static fn (array $v): MultilingualString => MultilingualString::fromArray($v),
            'title3' => static fn (array $v): MultilingualString => MultilingualString::fromArray($v),
            'content' => static fn (array $v): MultilingualString => MultilingualString::fromArray($v),
            'contentBlocks' => static fn (array $v): ArticleContentBlocks => ArticleContentBlocks::fromArray($v),
            'derivedContent' => static fn (array $v): array => array_map(static fn ($x) => ArticleDerivedContent::fromArray($x), $v),
            'engagement' => static fn (array $v): ArticleEngagementOverride => ArticleEngagementOverride::fromArray($v),
            'seo' => static fn (array $v): ArticleSeo => ArticleSeo::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ArticleListItem
{
    /** @var ?ObjectId */
    public $_id = null;
    /** @var ?MultilingualString */
    public $mainTitle = null;
    /** @var ?string */
    public $slug = null;
    /** @var ?string */
    public $thumbnail = null;
    /** @var ?Category[] */
    public $category = null;
    /** @var ?SubCategory[] */
    public $subCategory = null;
    /** @var ?Author */
    public $author = null;
    /** @var ?MultilingualStringOrNull */
    public $summary = null;
    /** @var ?bool */
    public $isPublished = null;
    /** @var ?bool */
    public $isPrivate = null;
    /** @var ?DateTime */
    public $publishDate = null;
    /** @var ?DateTime */
    public $createdAt = null;
    /** @var ?DateTime */
    public $updatedAt = null;
    /** @var ?ArticleSeo */
    public $seo = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('_id', $data)) {
            $instance->_id = $data['_id'];
        }
        if (array_key_exists('mainTitle', $data)) {
            $instance->mainTitle = $data['mainTitle'];
        }
        if (array_key_exists('slug', $data)) {
            $instance->slug = $data['slug'];
        }
        if (array_key_exists('thumbnail', $data)) {
            $instance->thumbnail = $data['thumbnail'];
        }
        if (array_key_exists('category', $data)) {
            $instance->category = $data['category'];
        }
        if (array_key_exists('subCategory', $data)) {
            $instance->subCategory = $data['subCategory'];
        }
        if (array_key_exists('author', $data)) {
            $instance->author = $data['author'];
        }
        if (array_key_exists('summary', $data)) {
            $instance->summary = $data['summary'];
        }
        if (array_key_exists('isPublished', $data)) {
            $instance->isPublished = $data['isPublished'];
        }
        if (array_key_exists('isPrivate', $data)) {
            $instance->isPrivate = $data['isPrivate'];
        }
        if (array_key_exists('publishDate', $data)) {
            $instance->publishDate = $data['publishDate'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }
        if (array_key_exists('updatedAt', $data)) {
            $instance->updatedAt = $data['updatedAt'];
        }
        if (array_key_exists('seo', $data)) {
            $instance->seo = $data['seo'];
        }

        $nested = [
            'mainTitle' => static fn (array $v): MultilingualString => MultilingualString::fromArray($v),
            'category' => static fn (array $v): array => array_map(static fn ($x) => Category::fromArray($x), $v),
            'subCategory' => static fn (array $v): array => array_map(static fn ($x) => SubCategory::fromArray($x), $v),
            'author' => static fn (array $v): Author => Author::fromArray($v),
            'seo' => static fn (array $v): ArticleSeo => ArticleSeo::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ArticleLocalized
{
    /** @var ?ObjectId */
    public $_id = null;
    /** @var ?MultilingualStringOrNull */
    public $mainTitle = null;
    /** @var ?MultilingualStringOrNull */
    public $title2 = null;
    /** @var ?MultilingualStringOrNull */
    public $title3 = null;
    /** @var ?MultilingualStringOrNull */
    public $summary = null;
    /** @var ?MultilingualStringOrNull */
    public $content = null;
    /** @var ?array<string, mixed>[] */
    public $category = null;
    /** @var ?array<string, mixed>[] */
    public $subCategory = null;
    /** @var ?array<string, mixed> */
    public $author = null;
    /** @var ?bool */
    public $isPublished = null;
    /** @var ?bool */
    public $isPrivate = null;
    /** @var ?DateTime */
    public $publishDate = null;
    /** @var ?DateTime */
    public $createdAt = null;
    /** @var ?DateTime */
    public $updatedAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('_id', $data)) {
            $instance->_id = $data['_id'];
        }
        if (array_key_exists('mainTitle', $data)) {
            $instance->mainTitle = $data['mainTitle'];
        }
        if (array_key_exists('title2', $data)) {
            $instance->title2 = $data['title2'];
        }
        if (array_key_exists('title3', $data)) {
            $instance->title3 = $data['title3'];
        }
        if (array_key_exists('summary', $data)) {
            $instance->summary = $data['summary'];
        }
        if (array_key_exists('content', $data)) {
            $instance->content = $data['content'];
        }
        if (array_key_exists('category', $data)) {
            $instance->category = $data['category'];
        }
        if (array_key_exists('subCategory', $data)) {
            $instance->subCategory = $data['subCategory'];
        }
        if (array_key_exists('author', $data)) {
            $instance->author = $data['author'];
        }
        if (array_key_exists('isPublished', $data)) {
            $instance->isPublished = $data['isPublished'];
        }
        if (array_key_exists('isPrivate', $data)) {
            $instance->isPrivate = $data['isPrivate'];
        }
        if (array_key_exists('publishDate', $data)) {
            $instance->publishDate = $data['publishDate'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }
        if (array_key_exists('updatedAt', $data)) {
            $instance->updatedAt = $data['updatedAt'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class FormFieldOption
{
    /** @var string */
    public $value = null;
    /** @var MultilingualString */
    public $label = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('value', $data)) {
            $instance->value = $data['value'];
        }
        if (array_key_exists('label', $data)) {
            $instance->label = $data['label'];
        }

        $nested = [
            'label' => static fn (array $v): MultilingualString => MultilingualString::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class FormRelationRef
{
    /** @var ?ObjectId */
    public $_id = null;
    /** @var ?string */
    public $slug = null;
    /** @var ?MultilingualString */
    public $title = null;
    /** @var ?'public' | 'internal' */
    public $formType = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('_id', $data)) {
            $instance->_id = $data['_id'];
        }
        if (array_key_exists('slug', $data)) {
            $instance->slug = $data['slug'];
        }
        if (array_key_exists('title', $data)) {
            $instance->title = $data['title'];
        }
        if (array_key_exists('formType', $data)) {
            $instance->formType = $data['formType'];
        }

        $nested = [
            'title' => static fn (array $v): MultilingualString => MultilingualString::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class FormField
{
    /** @var string */
    public $name = null;
    /** @var 'text' | 'email' | 'number' | 'date' | 'datetime-local' | 'tags' | 'tags-select' | 'tel' | 'select' | 'multi-select' | 'checkbox' | 'multi-checkbox' | 'radio' | 'textarea' | 'file' | 'switch' | 'markdown' */
    public $type = null;
    /** @var MultilingualString */
    public $label = null;
    /** @var bool */
    public $required = null;
    /** @var ?FormFieldOption[] */
    public $options = null;
    /** @var ?array<string, mixed> */
    public $validation = null;
    /** @var ?bool */
    public $multiple = null;
    /** @var ?string */
    public $accept = null;
    /** @var ?float */
    public $colSpan = null;
    /** @var ?string */
    public $icon = null;
    /** @var ?bool */
    public $disabled = null;
    /** @var ?bool */
    public $verified = null;
    /** @var ?mixed */
    public $defaultValue = null;
    /** @var ?MultilingualString */
    public $placeholder = null;
    /** @var ?array<string, mixed> */
    public $relation = null;
    /** @var ?array<string, mixed> */
    public $relationDetails = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('name', $data)) {
            $instance->name = $data['name'];
        }
        if (array_key_exists('type', $data)) {
            $instance->type = $data['type'];
        }
        if (array_key_exists('label', $data)) {
            $instance->label = $data['label'];
        }
        if (array_key_exists('required', $data)) {
            $instance->required = $data['required'];
        }
        if (array_key_exists('options', $data)) {
            $instance->options = $data['options'];
        }
        if (array_key_exists('validation', $data)) {
            $instance->validation = $data['validation'];
        }
        if (array_key_exists('multiple', $data)) {
            $instance->multiple = $data['multiple'];
        }
        if (array_key_exists('accept', $data)) {
            $instance->accept = $data['accept'];
        }
        if (array_key_exists('colSpan', $data)) {
            $instance->colSpan = $data['colSpan'];
        }
        if (array_key_exists('icon', $data)) {
            $instance->icon = $data['icon'];
        }
        if (array_key_exists('disabled', $data)) {
            $instance->disabled = $data['disabled'];
        }
        if (array_key_exists('verified', $data)) {
            $instance->verified = $data['verified'];
        }
        if (array_key_exists('defaultValue', $data)) {
            $instance->defaultValue = $data['defaultValue'];
        }
        if (array_key_exists('placeholder', $data)) {
            $instance->placeholder = $data['placeholder'];
        }
        if (array_key_exists('relation', $data)) {
            $instance->relation = $data['relation'];
        }
        if (array_key_exists('relationDetails', $data)) {
            $instance->relationDetails = $data['relationDetails'];
        }

        $nested = [
            'label' => static fn (array $v): MultilingualString => MultilingualString::fromArray($v),
            'options' => static fn (array $v): array => array_map(static fn ($x) => FormFieldOption::fromArray($x), $v),
            'placeholder' => static fn (array $v): MultilingualString => MultilingualString::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class FormSection
{
    /** @var MultilingualString */
    public $title = null;
    /** @var ?string */
    public $icon = null;
    /** @var ?MultilingualString */
    public $description = null;
    /** @var FormField[] */
    public $fields = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('title', $data)) {
            $instance->title = $data['title'];
        }
        if (array_key_exists('icon', $data)) {
            $instance->icon = $data['icon'];
        }
        if (array_key_exists('description', $data)) {
            $instance->description = $data['description'];
        }
        if (array_key_exists('fields', $data)) {
            $instance->fields = $data['fields'];
        }

        $nested = [
            'title' => static fn (array $v): MultilingualString => MultilingualString::fromArray($v),
            'description' => static fn (array $v): MultilingualString => MultilingualString::fromArray($v),
            'fields' => static fn (array $v): array => array_map(static fn ($x) => FormField::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class FormNotification
{
    /** @var ?bool */
    public $enabled = null;
    /** @var ?array<string, mixed> */
    public $email = null;
    /** @var ?array<string, mixed> */
    public $push = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('enabled', $data)) {
            $instance->enabled = $data['enabled'];
        }
        if (array_key_exists('email', $data)) {
            $instance->email = $data['email'];
        }
        if (array_key_exists('push', $data)) {
            $instance->push = $data['push'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class Form
{
    /** @var ObjectId */
    public $_id = null;
    /** @var ?string */
    public $tenantId = null;
    /** @var MultilingualString */
    public $title = null;
    /** @var string */
    public $slug = null;
    /** @var ?MultilingualString */
    public $description = null;
    /** @var FormSection[] */
    public $sections = null;
    /** @var ?MultilingualString */
    public $submitButtonText = null;
    /** @var ?'public' | 'internal' */
    public $formType = null;
    /** @var ?FormNotification */
    public $notification = null;
    /** @var ?array<string, mixed> */
    public $captcha = null;
    /** @var ?array<string, mixed> */
    public $relation = null;
    /** @var ?array<string, mixed> */
    public $relationDetails = null;
    /** @var ?ObjectId */
    public $createdBy = null;
    /** @var ?bool */
    public $isActive = null;
    /** @var ?bool */
    public $isDeleted = null;
    /** @var ?DateTime */
    public $createdAt = null;
    /** @var ?DateTime */
    public $updatedAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('_id', $data)) {
            $instance->_id = $data['_id'];
        }
        if (array_key_exists('tenantId', $data)) {
            $instance->tenantId = $data['tenantId'];
        }
        if (array_key_exists('title', $data)) {
            $instance->title = $data['title'];
        }
        if (array_key_exists('slug', $data)) {
            $instance->slug = $data['slug'];
        }
        if (array_key_exists('description', $data)) {
            $instance->description = $data['description'];
        }
        if (array_key_exists('sections', $data)) {
            $instance->sections = $data['sections'];
        }
        if (array_key_exists('submitButtonText', $data)) {
            $instance->submitButtonText = $data['submitButtonText'];
        }
        if (array_key_exists('formType', $data)) {
            $instance->formType = $data['formType'];
        }
        if (array_key_exists('notification', $data)) {
            $instance->notification = $data['notification'];
        }
        if (array_key_exists('captcha', $data)) {
            $instance->captcha = $data['captcha'];
        }
        if (array_key_exists('relation', $data)) {
            $instance->relation = $data['relation'];
        }
        if (array_key_exists('relationDetails', $data)) {
            $instance->relationDetails = $data['relationDetails'];
        }
        if (array_key_exists('createdBy', $data)) {
            $instance->createdBy = $data['createdBy'];
        }
        if (array_key_exists('isActive', $data)) {
            $instance->isActive = $data['isActive'];
        }
        if (array_key_exists('isDeleted', $data)) {
            $instance->isDeleted = $data['isDeleted'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }
        if (array_key_exists('updatedAt', $data)) {
            $instance->updatedAt = $data['updatedAt'];
        }

        $nested = [
            'title' => static fn (array $v): MultilingualString => MultilingualString::fromArray($v),
            'description' => static fn (array $v): MultilingualString => MultilingualString::fromArray($v),
            'sections' => static fn (array $v): array => array_map(static fn ($x) => FormSection::fromArray($x), $v),
            'submitButtonText' => static fn (array $v): MultilingualString => MultilingualString::fromArray($v),
            'notification' => static fn (array $v): FormNotification => FormNotification::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class FormListItem
{
    // No declared properties: this component is a list wrapper, whose
    // payload is reached through the key the server sent it under.
    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class FormSubmission
{
    /** @var ObjectId */
    public $_id = null;
    /** @var ?ObjectId */
    public $tenantId = null;
    /** @var ObjectId */
    public $formId = null;
    /** @var string */
    public $language = null;
    /** @var array<string, mixed> */
    public $values = null;
    /** @var ?array<string, mixed>[] */
    public $relations = null;
    /** @var float */
    public $status = null;
    /** @var ?DateTime */
    public $submittedAt = null;
    /** @var ?bool */
    public $isDeleted = null;
    /** @var ?DateTime */
    public $createdAt = null;
    /** @var ?DateTime */
    public $updatedAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('_id', $data)) {
            $instance->_id = $data['_id'];
        }
        if (array_key_exists('tenantId', $data)) {
            $instance->tenantId = $data['tenantId'];
        }
        if (array_key_exists('formId', $data)) {
            $instance->formId = $data['formId'];
        }
        if (array_key_exists('language', $data)) {
            $instance->language = $data['language'];
        }
        if (array_key_exists('values', $data)) {
            $instance->values = $data['values'];
        }
        if (array_key_exists('relations', $data)) {
            $instance->relations = $data['relations'];
        }
        if (array_key_exists('status', $data)) {
            $instance->status = $data['status'];
        }
        if (array_key_exists('submittedAt', $data)) {
            $instance->submittedAt = $data['submittedAt'];
        }
        if (array_key_exists('isDeleted', $data)) {
            $instance->isDeleted = $data['isDeleted'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }
        if (array_key_exists('updatedAt', $data)) {
            $instance->updatedAt = $data['updatedAt'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class FormSubmissionSummary
{
    /** @var ?ObjectId */
    public $_id = null;
    /** @var ?ObjectId */
    public $formId = null;
    /** @var ?string */
    public $language = null;
    /** @var ?array<string, mixed> */
    public $values = null;
    /** @var ?float */
    public $status = null;
    /** @var ?DateTime */
    public $submittedAt = null;
    /** @var ?DateTime */
    public $createdAt = null;
    /** @var ?DateTime */
    public $updatedAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('_id', $data)) {
            $instance->_id = $data['_id'];
        }
        if (array_key_exists('formId', $data)) {
            $instance->formId = $data['formId'];
        }
        if (array_key_exists('language', $data)) {
            $instance->language = $data['language'];
        }
        if (array_key_exists('values', $data)) {
            $instance->values = $data['values'];
        }
        if (array_key_exists('status', $data)) {
            $instance->status = $data['status'];
        }
        if (array_key_exists('submittedAt', $data)) {
            $instance->submittedAt = $data['submittedAt'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }
        if (array_key_exists('updatedAt', $data)) {
            $instance->updatedAt = $data['updatedAt'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class FormSubmissionEnriched
{
    // No declared properties: this component is a list wrapper, whose
    // payload is reached through the key the server sent it under.
    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class CaptchaConfig
{
    /** @var ?ObjectId */
    public $tenantId = null;
    /** @var ?'recaptcha' | 'hcaptcha' | 'turnstile' */
    public $provider = null;
    /** @var ?string */
    public $siteKey = null;
    /** @var ?bool */
    public $isActive = null;
    /** @var ?bool */
    public $hasSecretKey = null;
    /** @var ?string */
    public $secretKeyMasked = null;
    /** @var ?string */
    public $updatedBy = null;
    /** @var ?DateTime */
    public $updatedAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('tenantId', $data)) {
            $instance->tenantId = $data['tenantId'];
        }
        if (array_key_exists('provider', $data)) {
            $instance->provider = $data['provider'];
        }
        if (array_key_exists('siteKey', $data)) {
            $instance->siteKey = $data['siteKey'];
        }
        if (array_key_exists('isActive', $data)) {
            $instance->isActive = $data['isActive'];
        }
        if (array_key_exists('hasSecretKey', $data)) {
            $instance->hasSecretKey = $data['hasSecretKey'];
        }
        if (array_key_exists('secretKeyMasked', $data)) {
            $instance->secretKeyMasked = $data['secretKeyMasked'];
        }
        if (array_key_exists('updatedBy', $data)) {
            $instance->updatedBy = $data['updatedBy'];
        }
        if (array_key_exists('updatedAt', $data)) {
            $instance->updatedAt = $data['updatedAt'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class RepurposedOutput
{
    /** @var ?string */
    public $title = null;
    /** @var ?string */
    public $summary = null;
    /** @var ?string */
    public $content = null;
    /** @var ?string[] */
    public $hashtags = null;
    /** @var ?string */
    public $cta = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('title', $data)) {
            $instance->title = $data['title'];
        }
        if (array_key_exists('summary', $data)) {
            $instance->summary = $data['summary'];
        }
        if (array_key_exists('content', $data)) {
            $instance->content = $data['content'];
        }
        if (array_key_exists('hashtags', $data)) {
            $instance->hashtags = $data['hashtags'];
        }
        if (array_key_exists('cta', $data)) {
            $instance->cta = $data['cta'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class NewsletterOutput
{
    /** @var string */
    public $subject = null;
    /** @var ?string */
    public $preheader = null;
    /** @var string */
    public $body = null;
    /** @var ?string */
    public $cta = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('subject', $data)) {
            $instance->subject = $data['subject'];
        }
        if (array_key_exists('preheader', $data)) {
            $instance->preheader = $data['preheader'];
        }
        if (array_key_exists('body', $data)) {
            $instance->body = $data['body'];
        }
        if (array_key_exists('cta', $data)) {
            $instance->cta = $data['cta'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class XThreadOutput
{
    /** @var string[] */
    public $posts = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('posts', $data)) {
            $instance->posts = $data['posts'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class VideoScene
{
    /** @var string */
    public $title = null;
    /** @var float */
    public $durationSec = null;
    /** @var string */
    public $narration = null;
    /** @var ?string */
    public $bRoll = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('title', $data)) {
            $instance->title = $data['title'];
        }
        if (array_key_exists('durationSec', $data)) {
            $instance->durationSec = $data['durationSec'];
        }
        if (array_key_exists('narration', $data)) {
            $instance->narration = $data['narration'];
        }
        if (array_key_exists('bRoll', $data)) {
            $instance->bRoll = $data['bRoll'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class VideoScriptOutput
{
    /** @var ?string */
    public $hook = null;
    /** @var VideoScene[] */
    public $scenes = null;
    /** @var ?string */
    public $outro = null;
    /** @var float */
    public $totalSec = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('hook', $data)) {
            $instance->hook = $data['hook'];
        }
        if (array_key_exists('scenes', $data)) {
            $instance->scenes = $data['scenes'];
        }
        if (array_key_exists('outro', $data)) {
            $instance->outro = $data['outro'];
        }
        if (array_key_exists('totalSec', $data)) {
            $instance->totalSec = $data['totalSec'];
        }

        $nested = [
            'scenes' => static fn (array $v): array => array_map(static fn ($x) => VideoScene::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class FaqChannelOutput
{
    /** @var array<string, mixed>[] */
    public $items = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('items', $data)) {
            $instance->items = $data['items'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class PressReleaseOutput
{
    /** @var ?string */
    public $headline = null;
    /** @var ?string */
    public $dateline = null;
    /** @var ?string */
    public $lede = null;
    /** @var ?string[] */
    public $body = null;
    /** @var ?string */
    public $boilerplate = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('headline', $data)) {
            $instance->headline = $data['headline'];
        }
        if (array_key_exists('dateline', $data)) {
            $instance->dateline = $data['dateline'];
        }
        if (array_key_exists('lede', $data)) {
            $instance->lede = $data['lede'];
        }
        if (array_key_exists('body', $data)) {
            $instance->body = $data['body'];
        }
        if (array_key_exists('boilerplate', $data)) {
            $instance->boilerplate = $data['boilerplate'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ContentBlockFaqItem
{
    /** @var string */
    public $question = null;
    /** @var string */
    public $answer = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('question', $data)) {
            $instance->question = $data['question'];
        }
        if (array_key_exists('answer', $data)) {
            $instance->answer = $data['answer'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ContentBlockTakeaway
{
    /** @var ?string */
    public $label = null;
    /** @var string */
    public $text = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('label', $data)) {
            $instance->label = $data['label'];
        }
        if (array_key_exists('text', $data)) {
            $instance->text = $data['text'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ArticleContentBlocks
{
    /** @var ?array<string, ContentBlockFaqItem[]> */
    public $faq = null;
    /** @var ?array<string, string> */
    public $tldr = null;
    /** @var ?array<string, ContentBlockTakeaway[]> */
    public $keyTakeaways = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('faq', $data)) {
            $instance->faq = $data['faq'];
        }
        if (array_key_exists('tldr', $data)) {
            $instance->tldr = $data['tldr'];
        }
        if (array_key_exists('keyTakeaways', $data)) {
            $instance->keyTakeaways = $data['keyTakeaways'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ArticleDerivedContent
{
    /** @var 'newsletter' | 'xThread' | 'videoScript' | 'faq' | 'pressRelease' */
    public $channel = null;
    /** @var ?string */
    public $language = null;
    /** @var ?string */
    public $title = null;
    /** @var string */
    public $payload = null;
    /** @var ?string */
    public $aiGenerationId = null;
    /** @var ?string */
    public $scheduledItemId = null;
    /** @var ?DateTime */
    public $createdAt = null;
    /** @var ?DateTime */
    public $updatedAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('channel', $data)) {
            $instance->channel = $data['channel'];
        }
        if (array_key_exists('language', $data)) {
            $instance->language = $data['language'];
        }
        if (array_key_exists('title', $data)) {
            $instance->title = $data['title'];
        }
        if (array_key_exists('payload', $data)) {
            $instance->payload = $data['payload'];
        }
        if (array_key_exists('aiGenerationId', $data)) {
            $instance->aiGenerationId = $data['aiGenerationId'];
        }
        if (array_key_exists('scheduledItemId', $data)) {
            $instance->scheduledItemId = $data['scheduledItemId'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }
        if (array_key_exists('updatedAt', $data)) {
            $instance->updatedAt = $data['updatedAt'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class RepurposeChannels
{
    /** @var ?NewsletterOutput */
    public $newsletter = null;
    /** @var ?XThreadOutput */
    public $xThread = null;
    /** @var ?VideoScriptOutput */
    public $videoScript = null;
    /** @var ?FaqChannelOutput */
    public $faq = null;
    /** @var ?PressReleaseOutput */
    public $pressRelease = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('newsletter', $data)) {
            $instance->newsletter = $data['newsletter'];
        }
        if (array_key_exists('xThread', $data)) {
            $instance->xThread = $data['xThread'];
        }
        if (array_key_exists('videoScript', $data)) {
            $instance->videoScript = $data['videoScript'];
        }
        if (array_key_exists('faq', $data)) {
            $instance->faq = $data['faq'];
        }
        if (array_key_exists('pressRelease', $data)) {
            $instance->pressRelease = $data['pressRelease'];
        }

        $nested = [
            'newsletter' => static fn (array $v): NewsletterOutput => NewsletterOutput::fromArray($v),
            'xThread' => static fn (array $v): XThreadOutput => XThreadOutput::fromArray($v),
            'videoScript' => static fn (array $v): VideoScriptOutput => VideoScriptOutput::fromArray($v),
            'faq' => static fn (array $v): FaqChannelOutput => FaqChannelOutput::fromArray($v),
            'pressRelease' => static fn (array $v): PressReleaseOutput => PressReleaseOutput::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ChannelNote
{
    /** @var string */
    public $channel = null;
    /** @var string[] */
    public $notes = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('channel', $data)) {
            $instance->channel = $data['channel'];
        }
        if (array_key_exists('notes', $data)) {
            $instance->notes = $data['notes'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class RepurposeResult
{
    /** @var ?string */
    public $articleId = null;
    /** @var ?array<string, RepurposedOutput> */
    public $platforms = null;
    /** @var ?RepurposeChannels */
    public $channels = null;
    /** @var ?ChannelNote[] */
    public $channelNotes = null;
    /** @var ?string[] */
    public $derivedContentIds = null;
    /** @var ?string */
    public $aiGenerationId = null;
    /** @var ?Tokens */
    public $tokens = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('articleId', $data)) {
            $instance->articleId = $data['articleId'];
        }
        if (array_key_exists('platforms', $data)) {
            $instance->platforms = $data['platforms'];
        }
        if (array_key_exists('channels', $data)) {
            $instance->channels = $data['channels'];
        }
        if (array_key_exists('channelNotes', $data)) {
            $instance->channelNotes = $data['channelNotes'];
        }
        if (array_key_exists('derivedContentIds', $data)) {
            $instance->derivedContentIds = $data['derivedContentIds'];
        }
        if (array_key_exists('aiGenerationId', $data)) {
            $instance->aiGenerationId = $data['aiGenerationId'];
        }
        if (array_key_exists('tokens', $data)) {
            $instance->tokens = $data['tokens'];
        }

        $nested = [
            'channels' => static fn (array $v): RepurposeChannels => RepurposeChannels::fromArray($v),
            'channelNotes' => static fn (array $v): array => array_map(static fn ($x) => ChannelNote::fromArray($x), $v),
            'tokens' => static fn (array $v): Tokens => Tokens::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AIStreamEvent
{
    /** @var ?string */
    public $event = null;
    /** @var ?array<string, mixed> */
    public $data = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('event', $data)) {
            $instance->event = $data['event'];
        }
        if (array_key_exists('data', $data)) {
            $instance->data = $data['data'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AIConversationContinue
{
    /** @var ?string */
    public $conversationId = null;
    /** @var ?string */
    public $stage = null;
    /** @var ?AIConversationRequirements */
    public $requirements = null;
    /** @var ?string */
    public $message = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('conversationId', $data)) {
            $instance->conversationId = $data['conversationId'];
        }
        if (array_key_exists('stage', $data)) {
            $instance->stage = $data['stage'];
        }
        if (array_key_exists('requirements', $data)) {
            $instance->requirements = $data['requirements'];
        }
        if (array_key_exists('message', $data)) {
            $instance->message = $data['message'];
        }

        $nested = [
            'requirements' => static fn (array $v): AIConversationRequirements => AIConversationRequirements::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AIConversationRegenerate
{
    /** @var ?string */
    public $conversationId = null;
    /** @var ?AIConversationArticle */
    public $article = null;
    /** @var ?float */
    public $seoScore = null;
    /** @var ?'approved' | 'needs_improvement' */
    public $status = null;
    /** @var ?string[] */
    public $issues = null;
    /** @var ?float */
    public $attempts = null;
    /** @var ?float */
    public $maxAttempts = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('conversationId', $data)) {
            $instance->conversationId = $data['conversationId'];
        }
        if (array_key_exists('article', $data)) {
            $instance->article = $data['article'];
        }
        if (array_key_exists('seoScore', $data)) {
            $instance->seoScore = $data['seoScore'];
        }
        if (array_key_exists('status', $data)) {
            $instance->status = $data['status'];
        }
        if (array_key_exists('issues', $data)) {
            $instance->issues = $data['issues'];
        }
        if (array_key_exists('attempts', $data)) {
            $instance->attempts = $data['attempts'];
        }
        if (array_key_exists('maxAttempts', $data)) {
            $instance->maxAttempts = $data['maxAttempts'];
        }

        $nested = [
            'article' => static fn (array $v): AIConversationArticle => AIConversationArticle::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ArticleList
{
    /** @var ?ArticleListItem[] */
    public $articleListItem = null;
    /** @var Pagination */
    public $pagination = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('articleListItem', $data)) {
            $instance->articleListItem = $data['articleListItem'];
        }
        if (array_key_exists('pagination', $data)) {
            $instance->pagination = $data['pagination'];
        }

        $nested = [
            'articleListItem' => static fn (array $v): array => array_map(static fn ($x) => ArticleListItem::fromArray($x), $v),
            'pagination' => static fn (array $v): Pagination => Pagination::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AuthorList
{
    /** @var ?Author[] */
    public $author = null;
    /** @var Pagination */
    public $pagination = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('author', $data)) {
            $instance->author = $data['author'];
        }
        if (array_key_exists('pagination', $data)) {
            $instance->pagination = $data['pagination'];
        }

        $nested = [
            'author' => static fn (array $v): array => array_map(static fn ($x) => Author::fromArray($x), $v),
            'pagination' => static fn (array $v): Pagination => Pagination::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class CategoryList
{
    /** @var ?Category[] */
    public $category = null;
    /** @var Pagination */
    public $pagination = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('category', $data)) {
            $instance->category = $data['category'];
        }
        if (array_key_exists('pagination', $data)) {
            $instance->pagination = $data['pagination'];
        }

        $nested = [
            'category' => static fn (array $v): array => array_map(static fn ($x) => Category::fromArray($x), $v),
            'pagination' => static fn (array $v): Pagination => Pagination::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SubCategoryList
{
    /** @var ?SubCategory[] */
    public $subCategory = null;
    /** @var Pagination */
    public $pagination = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('subCategory', $data)) {
            $instance->subCategory = $data['subCategory'];
        }
        if (array_key_exists('pagination', $data)) {
            $instance->pagination = $data['pagination'];
        }

        $nested = [
            'subCategory' => static fn (array $v): array => array_map(static fn ($x) => SubCategory::fromArray($x), $v),
            'pagination' => static fn (array $v): Pagination => Pagination::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class TagList
{
    /** @var ?Tag[] */
    public $tag = null;
    /** @var Pagination */
    public $pagination = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('tag', $data)) {
            $instance->tag = $data['tag'];
        }
        if (array_key_exists('pagination', $data)) {
            $instance->pagination = $data['pagination'];
        }

        $nested = [
            'tag' => static fn (array $v): array => array_map(static fn ($x) => Tag::fromArray($x), $v),
            'pagination' => static fn (array $v): Pagination => Pagination::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class LanguageList
{
    /** @var ?Language[] */
    public $language = null;
    /** @var Pagination */
    public $pagination = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('language', $data)) {
            $instance->language = $data['language'];
        }
        if (array_key_exists('pagination', $data)) {
            $instance->pagination = $data['pagination'];
        }

        $nested = [
            'language' => static fn (array $v): array => array_map(static fn ($x) => Language::fromArray($x), $v),
            'pagination' => static fn (array $v): Pagination => Pagination::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class FormList
{
    /** @var ?FormListItem[] */
    public $formListItem = null;
    /** @var Pagination */
    public $pagination = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('formListItem', $data)) {
            $instance->formListItem = $data['formListItem'];
        }
        if (array_key_exists('pagination', $data)) {
            $instance->pagination = $data['pagination'];
        }

        $nested = [
            'formListItem' => static fn (array $v): array => array_map(static fn ($x) => FormListItem::fromArray($x), $v),
            'pagination' => static fn (array $v): Pagination => Pagination::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class FormSubmissionList
{
    /** @var ?FormSubmission[] */
    public $formSubmission = null;
    /** @var Pagination */
    public $pagination = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('formSubmission', $data)) {
            $instance->formSubmission = $data['formSubmission'];
        }
        if (array_key_exists('pagination', $data)) {
            $instance->pagination = $data['pagination'];
        }

        $nested = [
            'formSubmission' => static fn (array $v): array => array_map(static fn ($x) => FormSubmission::fromArray($x), $v),
            'pagination' => static fn (array $v): Pagination => Pagination::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ArticleWrapper
{
    /** @var Article */
    public $article = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('article', $data)) {
            $instance->article = $data['article'];
        }

        $nested = [
            'article' => static fn (array $v): Article => Article::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AuthorWrapper
{
    /** @var Author */
    public $author = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('author', $data)) {
            $instance->author = $data['author'];
        }

        $nested = [
            'author' => static fn (array $v): Author => Author::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class CategoryWrapper
{
    /** @var Category */
    public $category = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('category', $data)) {
            $instance->category = $data['category'];
        }

        $nested = [
            'category' => static fn (array $v): Category => Category::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SubCategoryWrapper
{
    /** @var SubCategory */
    public $subCategory = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('subCategory', $data)) {
            $instance->subCategory = $data['subCategory'];
        }

        $nested = [
            'subCategory' => static fn (array $v): SubCategory => SubCategory::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class TagWrapper
{
    /** @var Tag */
    public $tag = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('tag', $data)) {
            $instance->tag = $data['tag'];
        }

        $nested = [
            'tag' => static fn (array $v): Tag => Tag::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class LanguageWrapper
{
    /** @var Language */
    public $language = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('language', $data)) {
            $instance->language = $data['language'];
        }

        $nested = [
            'language' => static fn (array $v): Language => Language::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class FormWrapper
{
    /** @var Form */
    public $form = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('form', $data)) {
            $instance->form = $data['form'];
        }

        $nested = [
            'form' => static fn (array $v): Form => Form::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class FormNullableWrapper
{
    /** @var ?Form */
    public $form = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('form', $data)) {
            $instance->form = $data['form'];
        }

        $nested = [
            'form' => static fn (array $v): Form => Form::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class NextFormWrapper
{
    /** @var ?Form */
    public $nextForm = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('nextForm', $data)) {
            $instance->nextForm = $data['nextForm'];
        }

        $nested = [
            'nextForm' => static fn (array $v): Form => Form::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SubmissionWrapper
{
    /** @var FormSubmissionEnriched */
    public $submission = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('submission', $data)) {
            $instance->submission = $data['submission'];
        }

        $nested = [
            'submission' => static fn (array $v): FormSubmissionEnriched => FormSubmissionEnriched::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SubmissionRawWrapper
{
    /** @var FormSubmission */
    public $submission = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('submission', $data)) {
            $instance->submission = $data['submission'];
        }

        $nested = [
            'submission' => static fn (array $v): FormSubmission => FormSubmission::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class CaptchaConfigWrapper
{
    /** @var ?CaptchaConfig */
    public $config = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('config', $data)) {
            $instance->config = $data['config'];
        }

        $nested = [
            'config' => static fn (array $v): CaptchaConfig => CaptchaConfig::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class FormSubmissionRelations
{
    /** @var ?ObjectId */
    public $submissionId = null;
    /** @var ?array<string, mixed>[] */
    public $relatedEntries = null;
    /** @var ?array<string, mixed>[] */
    public $reverseRelations = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('submissionId', $data)) {
            $instance->submissionId = $data['submissionId'];
        }
        if (array_key_exists('relatedEntries', $data)) {
            $instance->relatedEntries = $data['relatedEntries'];
        }
        if (array_key_exists('reverseRelations', $data)) {
            $instance->reverseRelations = $data['reverseRelations'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class FormRelationsBackfill
{
    /** @var ?float */
    public $updatedCount = null;
    /** @var ?ObjectId */
    public $scopedFormId = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('updatedCount', $data)) {
            $instance->updatedCount = $data['updatedCount'];
        }
        if (array_key_exists('scopedFormId', $data)) {
            $instance->scopedFormId = $data['scopedFormId'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportRange
{
    /** @var ?DateTime */
    public $from = null;
    /** @var ?DateTime */
    public $to = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('from', $data)) {
            $instance->from = $data['from'];
        }
        if (array_key_exists('to', $data)) {
            $instance->to = $data['to'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportCategoryRow
{
    /** @var ?ObjectId */
    public $categoryId = null;
    /** @var ?string */
    public $slug = null;
    /** @var ?string */
    public $name = null;
    /** @var ?float */
    public $articleCount = null;
    /** @var ?float */
    public $views = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('categoryId', $data)) {
            $instance->categoryId = $data['categoryId'];
        }
        if (array_key_exists('slug', $data)) {
            $instance->slug = $data['slug'];
        }
        if (array_key_exists('name', $data)) {
            $instance->name = $data['name'];
        }
        if (array_key_exists('articleCount', $data)) {
            $instance->articleCount = $data['articleCount'];
        }
        if (array_key_exists('views', $data)) {
            $instance->views = $data['views'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportAuthorRow
{
    /** @var ?ObjectId */
    public $authorId = null;
    /** @var ?string */
    public $slug = null;
    /** @var ?string */
    public $name = null;
    /** @var ?float */
    public $articleCount = null;
    /** @var ?float */
    public $views = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('authorId', $data)) {
            $instance->authorId = $data['authorId'];
        }
        if (array_key_exists('slug', $data)) {
            $instance->slug = $data['slug'];
        }
        if (array_key_exists('name', $data)) {
            $instance->name = $data['name'];
        }
        if (array_key_exists('articleCount', $data)) {
            $instance->articleCount = $data['articleCount'];
        }
        if (array_key_exists('views', $data)) {
            $instance->views = $data['views'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ContentOverviewReport
{
    /** @var ?ReportRange */
    public $range = null;
    /** @var ?array<string, mixed> */
    public $totals = null;
    /** @var ?ReportSourceRow[] */
    public $bySource = null;
    /** @var ?ReportArticleDailyRow[] */
    public $dailyTrend = null;
    /** @var ?ReportCategoryRow[] */
    public $topCategories = null;
    /** @var ?ReportAuthorRow[] */
    public $topAuthors = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('range', $data)) {
            $instance->range = $data['range'];
        }
        if (array_key_exists('totals', $data)) {
            $instance->totals = $data['totals'];
        }
        if (array_key_exists('bySource', $data)) {
            $instance->bySource = $data['bySource'];
        }
        if (array_key_exists('dailyTrend', $data)) {
            $instance->dailyTrend = $data['dailyTrend'];
        }
        if (array_key_exists('topCategories', $data)) {
            $instance->topCategories = $data['topCategories'];
        }
        if (array_key_exists('topAuthors', $data)) {
            $instance->topAuthors = $data['topAuthors'];
        }

        $nested = [
            'range' => static fn (array $v): ReportRange => ReportRange::fromArray($v),
            'bySource' => static fn (array $v): array => array_map(static fn ($x) => ReportSourceRow::fromArray($x), $v),
            'dailyTrend' => static fn (array $v): array => array_map(static fn ($x) => ReportArticleDailyRow::fromArray($x), $v),
            'topCategories' => static fn (array $v): array => array_map(static fn ($x) => ReportCategoryRow::fromArray($x), $v),
            'topAuthors' => static fn (array $v): array => array_map(static fn ($x) => ReportAuthorRow::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportSourceRow
{
    /** @var ?string */
    public $source = null;
    /** @var ?float */
    public $count = null;
    /** @var ?float */
    public $views = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('source', $data)) {
            $instance->source = $data['source'];
        }
        if (array_key_exists('count', $data)) {
            $instance->count = $data['count'];
        }
        if (array_key_exists('views', $data)) {
            $instance->views = $data['views'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportArticleDailyRow
{
    /** @var ?string */
    public $date = null;
    /** @var ?float */
    public $createdArticles = null;
    /** @var ?float */
    public $publishedArticles = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('date', $data)) {
            $instance->date = $data['date'];
        }
        if (array_key_exists('createdArticles', $data)) {
            $instance->createdArticles = $data['createdArticles'];
        }
        if (array_key_exists('publishedArticles', $data)) {
            $instance->publishedArticles = $data['publishedArticles'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportArticleRow
{
    /** @var ?ObjectId */
    public $articleId = null;
    /** @var ?string */
    public $slug = null;
    /** @var ?MultilingualStringOrNull */
    public $mainTitle = null;
    /** @var ?bool */
    public $isPublished = null;
    /** @var ?DateTime */
    public $publishDate = null;
    /** @var ?DateTime */
    public $createdAt = null;
    /** @var ?float */
    public $views = null;
    /** @var ?float */
    public $likes = null;
    /** @var ?float */
    public $dislikes = null;
    /** @var ?float */
    public $shares = null;
    /** @var ?float */
    public $commentsCount = null;
    /** @var ?float */
    public $engagementScore = null;
    /** @var ?float */
    public $engagementRate = null;
    /** @var ?string */
    public $contentSource = null;
    /** @var ?string[] */
    public $categoryIds = null;
    /** @var ?ReportAuthorBrief */
    public $author = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('articleId', $data)) {
            $instance->articleId = $data['articleId'];
        }
        if (array_key_exists('slug', $data)) {
            $instance->slug = $data['slug'];
        }
        if (array_key_exists('mainTitle', $data)) {
            $instance->mainTitle = $data['mainTitle'];
        }
        if (array_key_exists('isPublished', $data)) {
            $instance->isPublished = $data['isPublished'];
        }
        if (array_key_exists('publishDate', $data)) {
            $instance->publishDate = $data['publishDate'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }
        if (array_key_exists('views', $data)) {
            $instance->views = $data['views'];
        }
        if (array_key_exists('likes', $data)) {
            $instance->likes = $data['likes'];
        }
        if (array_key_exists('dislikes', $data)) {
            $instance->dislikes = $data['dislikes'];
        }
        if (array_key_exists('shares', $data)) {
            $instance->shares = $data['shares'];
        }
        if (array_key_exists('commentsCount', $data)) {
            $instance->commentsCount = $data['commentsCount'];
        }
        if (array_key_exists('engagementScore', $data)) {
            $instance->engagementScore = $data['engagementScore'];
        }
        if (array_key_exists('engagementRate', $data)) {
            $instance->engagementRate = $data['engagementRate'];
        }
        if (array_key_exists('contentSource', $data)) {
            $instance->contentSource = $data['contentSource'];
        }
        if (array_key_exists('categoryIds', $data)) {
            $instance->categoryIds = $data['categoryIds'];
        }
        if (array_key_exists('author', $data)) {
            $instance->author = $data['author'];
        }

        $nested = [
            'author' => static fn (array $v): ReportAuthorBrief => ReportAuthorBrief::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportAuthorBrief
{
    /** @var ?ObjectId */
    public $authorId = null;
    /** @var ?string */
    public $slug = null;
    /** @var ?MultilingualStringOrNull */
    public $name = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('authorId', $data)) {
            $instance->authorId = $data['authorId'];
        }
        if (array_key_exists('slug', $data)) {
            $instance->slug = $data['slug'];
        }
        if (array_key_exists('name', $data)) {
            $instance->name = $data['name'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class TopArticlesReport
{
    /** @var ?'views' | 'publishDate' | 'engagement' */
    public $metric = null;
    /** @var ?float */
    public $limit = null;
    /** @var ?ReportArticleRow[] */
    public $items = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('metric', $data)) {
            $instance->metric = $data['metric'];
        }
        if (array_key_exists('limit', $data)) {
            $instance->limit = $data['limit'];
        }
        if (array_key_exists('items', $data)) {
            $instance->items = $data['items'];
        }

        $nested = [
            'items' => static fn (array $v): array => array_map(static fn ($x) => ReportArticleRow::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiUsageBreakdownReport
{
    /** @var ?array<string, mixed> */
    public $totals = null;
    /** @var ?ReportAiOperationRow[] */
    public $byOperation = null;
    /** @var ?ReportAiDailyRow[] */
    public $dailyTrend = null;
    /** @var ?ReportAiErrorRow[] */
    public $recentErrors = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('totals', $data)) {
            $instance->totals = $data['totals'];
        }
        if (array_key_exists('byOperation', $data)) {
            $instance->byOperation = $data['byOperation'];
        }
        if (array_key_exists('dailyTrend', $data)) {
            $instance->dailyTrend = $data['dailyTrend'];
        }
        if (array_key_exists('recentErrors', $data)) {
            $instance->recentErrors = $data['recentErrors'];
        }

        $nested = [
            'byOperation' => static fn (array $v): array => array_map(static fn ($x) => ReportAiOperationRow::fromArray($x), $v),
            'dailyTrend' => static fn (array $v): array => array_map(static fn ($x) => ReportAiDailyRow::fromArray($x), $v),
            'recentErrors' => static fn (array $v): array => array_map(static fn ($x) => ReportAiErrorRow::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportAiOperationRow
{
    /** @var ?string */
    public $operationType = null;
    /** @var ?float */
    public $requests = null;
    /** @var ?float */
    public $success = null;
    /** @var ?float */
    public $error = null;
    /** @var ?float */
    public $tokensTotal = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('operationType', $data)) {
            $instance->operationType = $data['operationType'];
        }
        if (array_key_exists('requests', $data)) {
            $instance->requests = $data['requests'];
        }
        if (array_key_exists('success', $data)) {
            $instance->success = $data['success'];
        }
        if (array_key_exists('error', $data)) {
            $instance->error = $data['error'];
        }
        if (array_key_exists('tokensTotal', $data)) {
            $instance->tokensTotal = $data['tokensTotal'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportAiDailyRow
{
    /** @var ?string */
    public $date = null;
    /** @var ?float */
    public $requests = null;
    /** @var ?float */
    public $success = null;
    /** @var ?float */
    public $error = null;
    /** @var ?float */
    public $tokensTotal = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('date', $data)) {
            $instance->date = $data['date'];
        }
        if (array_key_exists('requests', $data)) {
            $instance->requests = $data['requests'];
        }
        if (array_key_exists('success', $data)) {
            $instance->success = $data['success'];
        }
        if (array_key_exists('error', $data)) {
            $instance->error = $data['error'];
        }
        if (array_key_exists('tokensTotal', $data)) {
            $instance->tokensTotal = $data['tokensTotal'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportAiErrorRow
{
    /** @var ?string */
    public $operationType = null;
    /** @var ?string */
    public $errorMessage = null;
    /** @var ?DateTime */
    public $createdAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('operationType', $data)) {
            $instance->operationType = $data['operationType'];
        }
        if (array_key_exists('errorMessage', $data)) {
            $instance->errorMessage = $data['errorMessage'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class FormsOverviewReport
{
    /** @var ?array<string, mixed> */
    public $totals = null;
    /** @var ?ReportStatusRow[] */
    public $byStatus = null;
    /** @var ?ReportLanguageRow[] */
    public $byLanguage = null;
    /** @var ?ReportSubmissionDailyRow[] */
    public $dailyTrend = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('totals', $data)) {
            $instance->totals = $data['totals'];
        }
        if (array_key_exists('byStatus', $data)) {
            $instance->byStatus = $data['byStatus'];
        }
        if (array_key_exists('byLanguage', $data)) {
            $instance->byLanguage = $data['byLanguage'];
        }
        if (array_key_exists('dailyTrend', $data)) {
            $instance->dailyTrend = $data['dailyTrend'];
        }

        $nested = [
            'byStatus' => static fn (array $v): array => array_map(static fn ($x) => ReportStatusRow::fromArray($x), $v),
            'byLanguage' => static fn (array $v): array => array_map(static fn ($x) => ReportLanguageRow::fromArray($x), $v),
            'dailyTrend' => static fn (array $v): array => array_map(static fn ($x) => ReportSubmissionDailyRow::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportStatusRow
{
    /** @var ?float */
    public $status = null;
    /** @var ?string */
    public $statusLabel = null;
    /** @var ?float */
    public $count = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('status', $data)) {
            $instance->status = $data['status'];
        }
        if (array_key_exists('statusLabel', $data)) {
            $instance->statusLabel = $data['statusLabel'];
        }
        if (array_key_exists('count', $data)) {
            $instance->count = $data['count'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportLanguageRow
{
    /** @var ?string */
    public $language = null;
    /** @var ?float */
    public $count = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('language', $data)) {
            $instance->language = $data['language'];
        }
        if (array_key_exists('count', $data)) {
            $instance->count = $data['count'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportSubmissionDailyRow
{
    /** @var ?string */
    public $date = null;
    /** @var ?float */
    public $submissions = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('date', $data)) {
            $instance->date = $data['date'];
        }
        if (array_key_exists('submissions', $data)) {
            $instance->submissions = $data['submissions'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SubmissionsOverviewReport
{
    /** @var ?array<string, mixed> */
    public $totals = null;
    /** @var ?ReportStatusRow[] */
    public $byStatus = null;
    /** @var ?ReportLanguageRow[] */
    public $byLanguage = null;
    /** @var ?ReportSubmissionDailyRow[] */
    public $dailyTrend = null;
    /** @var ?ReportTopFormRow[] */
    public $topForms = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('totals', $data)) {
            $instance->totals = $data['totals'];
        }
        if (array_key_exists('byStatus', $data)) {
            $instance->byStatus = $data['byStatus'];
        }
        if (array_key_exists('byLanguage', $data)) {
            $instance->byLanguage = $data['byLanguage'];
        }
        if (array_key_exists('dailyTrend', $data)) {
            $instance->dailyTrend = $data['dailyTrend'];
        }
        if (array_key_exists('topForms', $data)) {
            $instance->topForms = $data['topForms'];
        }

        $nested = [
            'byStatus' => static fn (array $v): array => array_map(static fn ($x) => ReportStatusRow::fromArray($x), $v),
            'byLanguage' => static fn (array $v): array => array_map(static fn ($x) => ReportLanguageRow::fromArray($x), $v),
            'dailyTrend' => static fn (array $v): array => array_map(static fn ($x) => ReportSubmissionDailyRow::fromArray($x), $v),
            'topForms' => static fn (array $v): array => array_map(static fn ($x) => ReportTopFormRow::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportTopFormRow
{
    /** @var ?ObjectId */
    public $formId = null;
    /** @var ?string */
    public $slug = null;
    /** @var ?MultilingualString */
    public $title = null;
    /** @var ?float */
    public $submissions = null;
    /** @var ?DateTime */
    public $lastSubmissionAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('formId', $data)) {
            $instance->formId = $data['formId'];
        }
        if (array_key_exists('slug', $data)) {
            $instance->slug = $data['slug'];
        }
        if (array_key_exists('title', $data)) {
            $instance->title = $data['title'];
        }
        if (array_key_exists('submissions', $data)) {
            $instance->submissions = $data['submissions'];
        }
        if (array_key_exists('lastSubmissionAt', $data)) {
            $instance->lastSubmissionAt = $data['lastSubmissionAt'];
        }

        $nested = [
            'title' => static fn (array $v): MultilingualString => MultilingualString::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportSeries
{
    /** @var ?string */
    public $name = null;
    /** @var ?float[] */
    public $data = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('name', $data)) {
            $instance->name = $data['name'];
        }
        if (array_key_exists('data', $data)) {
            $instance->data = $data['data'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportGroupBy
{
    // No declared properties: this component is a list wrapper, whose
    // payload is reached through the key the server sent it under.
    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ContentTrendReport
{
    /** @var ?ReportGroupBy */
    public $groupBy = null;
    /** @var ?string[] */
    public $labels = null;
    /** @var ?ReportSeries[] */
    public $series = null;
    /** @var ?ReportContentTrendPoint[] */
    public $points = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('groupBy', $data)) {
            $instance->groupBy = $data['groupBy'];
        }
        if (array_key_exists('labels', $data)) {
            $instance->labels = $data['labels'];
        }
        if (array_key_exists('series', $data)) {
            $instance->series = $data['series'];
        }
        if (array_key_exists('points', $data)) {
            $instance->points = $data['points'];
        }

        $nested = [
            'series' => static fn (array $v): array => array_map(static fn ($x) => ReportSeries::fromArray($x), $v),
            'points' => static fn (array $v): array => array_map(static fn ($x) => ReportContentTrendPoint::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportContentTrendPoint
{
    /** @var ?string */
    public $label = null;
    /** @var ?float */
    public $createdArticles = null;
    /** @var ?float */
    public $publishedArticles = null;
    /** @var ?float */
    public $views = null;
    /** @var ?float */
    public $likes = null;
    /** @var ?float */
    public $shares = null;
    /** @var ?float */
    public $comments = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('label', $data)) {
            $instance->label = $data['label'];
        }
        if (array_key_exists('createdArticles', $data)) {
            $instance->createdArticles = $data['createdArticles'];
        }
        if (array_key_exists('publishedArticles', $data)) {
            $instance->publishedArticles = $data['publishedArticles'];
        }
        if (array_key_exists('views', $data)) {
            $instance->views = $data['views'];
        }
        if (array_key_exists('likes', $data)) {
            $instance->likes = $data['likes'];
        }
        if (array_key_exists('shares', $data)) {
            $instance->shares = $data['shares'];
        }
        if (array_key_exists('comments', $data)) {
            $instance->comments = $data['comments'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SubmissionFunnelReport
{
    /** @var ?string[] */
    public $labels = null;
    /** @var ?ReportSeries[] */
    public $series = null;
    /** @var ?ReportFunnelStage[] */
    public $stages = null;
    /** @var ?float */
    public $total = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('labels', $data)) {
            $instance->labels = $data['labels'];
        }
        if (array_key_exists('series', $data)) {
            $instance->series = $data['series'];
        }
        if (array_key_exists('stages', $data)) {
            $instance->stages = $data['stages'];
        }
        if (array_key_exists('total', $data)) {
            $instance->total = $data['total'];
        }

        $nested = [
            'series' => static fn (array $v): array => array_map(static fn ($x) => ReportSeries::fromArray($x), $v),
            'stages' => static fn (array $v): array => array_map(static fn ($x) => ReportFunnelStage::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportFunnelStage
{
    /** @var ?float */
    public $status = null;
    /** @var ?string */
    public $label = null;
    /** @var ?float */
    public $count = null;
    /** @var ?float */
    public $rate = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('status', $data)) {
            $instance->status = $data['status'];
        }
        if (array_key_exists('label', $data)) {
            $instance->label = $data['label'];
        }
        if (array_key_exists('count', $data)) {
            $instance->count = $data['count'];
        }
        if (array_key_exists('rate', $data)) {
            $instance->rate = $data['rate'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class EngagementTrendReport
{
    /** @var ?ReportGroupBy */
    public $groupBy = null;
    /** @var ?string[] */
    public $labels = null;
    /** @var ?ReportSeries[] */
    public $series = null;
    /** @var ?ReportEngagementPoint[] */
    public $points = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('groupBy', $data)) {
            $instance->groupBy = $data['groupBy'];
        }
        if (array_key_exists('labels', $data)) {
            $instance->labels = $data['labels'];
        }
        if (array_key_exists('series', $data)) {
            $instance->series = $data['series'];
        }
        if (array_key_exists('points', $data)) {
            $instance->points = $data['points'];
        }

        $nested = [
            'series' => static fn (array $v): array => array_map(static fn ($x) => ReportSeries::fromArray($x), $v),
            'points' => static fn (array $v): array => array_map(static fn ($x) => ReportEngagementPoint::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportEngagementPoint
{
    /** @var ?string */
    public $label = null;
    /** @var ?float */
    public $views = null;
    /** @var ?float */
    public $likes = null;
    /** @var ?float */
    public $shares = null;
    /** @var ?float */
    public $comments = null;
    /** @var ?float */
    public $engagementScore = null;
    /** @var ?float */
    public $engagementRate = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('label', $data)) {
            $instance->label = $data['label'];
        }
        if (array_key_exists('views', $data)) {
            $instance->views = $data['views'];
        }
        if (array_key_exists('likes', $data)) {
            $instance->likes = $data['likes'];
        }
        if (array_key_exists('shares', $data)) {
            $instance->shares = $data['shares'];
        }
        if (array_key_exists('comments', $data)) {
            $instance->comments = $data['comments'];
        }
        if (array_key_exists('engagementScore', $data)) {
            $instance->engagementScore = $data['engagementScore'];
        }
        if (array_key_exists('engagementRate', $data)) {
            $instance->engagementRate = $data['engagementRate'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class PublishingPerformanceReport
{
    /** @var ?ReportRange */
    public $range = null;
    /** @var ?array<string, mixed> */
    public $totals = null;
    /** @var ?ReportLagBucket[] */
    public $publishLagBuckets = null;
    /** @var ?ReportWeekdayRow[] */
    public $publishWeekday = null;
    /** @var ?ReportDraftRow[] */
    public $recentDrafts = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('range', $data)) {
            $instance->range = $data['range'];
        }
        if (array_key_exists('totals', $data)) {
            $instance->totals = $data['totals'];
        }
        if (array_key_exists('publishLagBuckets', $data)) {
            $instance->publishLagBuckets = $data['publishLagBuckets'];
        }
        if (array_key_exists('publishWeekday', $data)) {
            $instance->publishWeekday = $data['publishWeekday'];
        }
        if (array_key_exists('recentDrafts', $data)) {
            $instance->recentDrafts = $data['recentDrafts'];
        }

        $nested = [
            'range' => static fn (array $v): ReportRange => ReportRange::fromArray($v),
            'publishLagBuckets' => static fn (array $v): array => array_map(static fn ($x) => ReportLagBucket::fromArray($x), $v),
            'publishWeekday' => static fn (array $v): array => array_map(static fn ($x) => ReportWeekdayRow::fromArray($x), $v),
            'recentDrafts' => static fn (array $v): array => array_map(static fn ($x) => ReportDraftRow::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportLagBucket
{
    /** @var ?'under_24h' | '1_to_3_days' | '3_to_7_days' | 'over_7_days' */
    public $bucket = null;
    /** @var ?float */
    public $count = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('bucket', $data)) {
            $instance->bucket = $data['bucket'];
        }
        if (array_key_exists('count', $data)) {
            $instance->count = $data['count'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportWeekdayRow
{
    /** @var ?float */
    public $dayOfWeek = null;
    /** @var ?string */
    public $label = null;
    /** @var ?float */
    public $count = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('dayOfWeek', $data)) {
            $instance->dayOfWeek = $data['dayOfWeek'];
        }
        if (array_key_exists('label', $data)) {
            $instance->label = $data['label'];
        }
        if (array_key_exists('count', $data)) {
            $instance->count = $data['count'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportDraftRow
{
    /** @var ?ObjectId */
    public $articleId = null;
    /** @var ?string */
    public $slug = null;
    /** @var ?MultilingualStringOrNull */
    public $mainTitle = null;
    /** @var ?DateTime */
    public $createdAt = null;
    /** @var ?float */
    public $views = null;
    /** @var ?float */
    public $ageDays = null;
    /** @var ?ObjectId */
    public $authorId = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('articleId', $data)) {
            $instance->articleId = $data['articleId'];
        }
        if (array_key_exists('slug', $data)) {
            $instance->slug = $data['slug'];
        }
        if (array_key_exists('mainTitle', $data)) {
            $instance->mainTitle = $data['mainTitle'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }
        if (array_key_exists('views', $data)) {
            $instance->views = $data['views'];
        }
        if (array_key_exists('ageDays', $data)) {
            $instance->ageDays = $data['ageDays'];
        }
        if (array_key_exists('authorId', $data)) {
            $instance->authorId = $data['authorId'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ContentHealthReport
{
    /** @var ?ReportRange */
    public $range = null;
    /** @var ?array<string, mixed> */
    public $totals = null;
    /** @var ?ReportQualityBucket[] */
    public $qualityBuckets = null;
    /** @var ?ReportWeakArticleRow[] */
    public $weakestArticles = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('range', $data)) {
            $instance->range = $data['range'];
        }
        if (array_key_exists('totals', $data)) {
            $instance->totals = $data['totals'];
        }
        if (array_key_exists('qualityBuckets', $data)) {
            $instance->qualityBuckets = $data['qualityBuckets'];
        }
        if (array_key_exists('weakestArticles', $data)) {
            $instance->weakestArticles = $data['weakestArticles'];
        }

        $nested = [
            'range' => static fn (array $v): ReportRange => ReportRange::fromArray($v),
            'qualityBuckets' => static fn (array $v): array => array_map(static fn ($x) => ReportQualityBucket::fromArray($x), $v),
            'weakestArticles' => static fn (array $v): array => array_map(static fn ($x) => ReportWeakArticleRow::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportQualityBucket
{
    /** @var ?string */
    public $score = null;
    /** @var ?'strong' | 'needs_work' | 'weak' */
    public $label = null;
    /** @var ?float */
    public $count = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('score', $data)) {
            $instance->score = $data['score'];
        }
        if (array_key_exists('label', $data)) {
            $instance->label = $data['label'];
        }
        if (array_key_exists('count', $data)) {
            $instance->count = $data['count'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportWeakArticleRow
{
    /** @var ?ObjectId */
    public $articleId = null;
    /** @var ?string */
    public $slug = null;
    /** @var ?MultilingualStringOrNull */
    public $mainTitle = null;
    /** @var ?DateTime */
    public $createdAt = null;
    /** @var ?bool */
    public $isPublished = null;
    /** @var ?float */
    public $qualityScore = null;
    /** @var ?float */
    public $engagementScore = null;
    /** @var ?float */
    public $views = null;
    /** @var ?float */
    public $comments = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('articleId', $data)) {
            $instance->articleId = $data['articleId'];
        }
        if (array_key_exists('slug', $data)) {
            $instance->slug = $data['slug'];
        }
        if (array_key_exists('mainTitle', $data)) {
            $instance->mainTitle = $data['mainTitle'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }
        if (array_key_exists('isPublished', $data)) {
            $instance->isPublished = $data['isPublished'];
        }
        if (array_key_exists('qualityScore', $data)) {
            $instance->qualityScore = $data['qualityScore'];
        }
        if (array_key_exists('engagementScore', $data)) {
            $instance->engagementScore = $data['engagementScore'];
        }
        if (array_key_exists('views', $data)) {
            $instance->views = $data['views'];
        }
        if (array_key_exists('comments', $data)) {
            $instance->comments = $data['comments'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class CategoryPerformanceReport
{
    /** @var ?ReportRange */
    public $range = null;
    /** @var ?array<string, mixed> */
    public $totals = null;
    /** @var ?ReportCategoryPerformanceRow[] */
    public $items = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('range', $data)) {
            $instance->range = $data['range'];
        }
        if (array_key_exists('totals', $data)) {
            $instance->totals = $data['totals'];
        }
        if (array_key_exists('items', $data)) {
            $instance->items = $data['items'];
        }

        $nested = [
            'range' => static fn (array $v): ReportRange => ReportRange::fromArray($v),
            'items' => static fn (array $v): array => array_map(static fn ($x) => ReportCategoryPerformanceRow::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportCategoryPerformanceRow
{
    /** @var ?ObjectId */
    public $categoryId = null;
    /** @var ?string */
    public $slug = null;
    /** @var ?MultilingualStringOrNull */
    public $name = null;
    /** @var ?float */
    public $articleCount = null;
    /** @var ?float */
    public $publishedArticles = null;
    /** @var ?float */
    public $totalViews = null;
    /** @var ?float */
    public $totalLikes = null;
    /** @var ?float */
    public $totalShares = null;
    /** @var ?float */
    public $totalComments = null;
    /** @var ?float */
    public $engagementScore = null;
    /** @var ?float */
    public $avgViewsPerArticle = null;
    /** @var ?DateTime */
    public $latestArticleAt = null;
    /** @var ?float */
    public $shareOfContent = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('categoryId', $data)) {
            $instance->categoryId = $data['categoryId'];
        }
        if (array_key_exists('slug', $data)) {
            $instance->slug = $data['slug'];
        }
        if (array_key_exists('name', $data)) {
            $instance->name = $data['name'];
        }
        if (array_key_exists('articleCount', $data)) {
            $instance->articleCount = $data['articleCount'];
        }
        if (array_key_exists('publishedArticles', $data)) {
            $instance->publishedArticles = $data['publishedArticles'];
        }
        if (array_key_exists('totalViews', $data)) {
            $instance->totalViews = $data['totalViews'];
        }
        if (array_key_exists('totalLikes', $data)) {
            $instance->totalLikes = $data['totalLikes'];
        }
        if (array_key_exists('totalShares', $data)) {
            $instance->totalShares = $data['totalShares'];
        }
        if (array_key_exists('totalComments', $data)) {
            $instance->totalComments = $data['totalComments'];
        }
        if (array_key_exists('engagementScore', $data)) {
            $instance->engagementScore = $data['engagementScore'];
        }
        if (array_key_exists('avgViewsPerArticle', $data)) {
            $instance->avgViewsPerArticle = $data['avgViewsPerArticle'];
        }
        if (array_key_exists('latestArticleAt', $data)) {
            $instance->latestArticleAt = $data['latestArticleAt'];
        }
        if (array_key_exists('shareOfContent', $data)) {
            $instance->shareOfContent = $data['shareOfContent'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class PeriodComparisonReport
{
    /** @var ?ReportRange */
    public $currentRange = null;
    /** @var ?ReportRange */
    public $previousRange = null;
    /** @var ?ReportMetricDelta[] */
    public $metrics = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('currentRange', $data)) {
            $instance->currentRange = $data['currentRange'];
        }
        if (array_key_exists('previousRange', $data)) {
            $instance->previousRange = $data['previousRange'];
        }
        if (array_key_exists('metrics', $data)) {
            $instance->metrics = $data['metrics'];
        }

        $nested = [
            'currentRange' => static fn (array $v): ReportRange => ReportRange::fromArray($v),
            'previousRange' => static fn (array $v): ReportRange => ReportRange::fromArray($v),
            'metrics' => static fn (array $v): array => array_map(static fn ($x) => ReportMetricDelta::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportMetricDelta
{
    /** @var ?'articles' | 'publishedArticles' | 'views' | 'engagement' | 'submissions' | 'aiRequests' */
    public $label = null;
    /** @var ?float */
    public $current = null;
    /** @var ?float */
    public $previous = null;
    /** @var ?float */
    public $delta = null;
    /** @var ?float */
    public $deltaPercent = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('label', $data)) {
            $instance->label = $data['label'];
        }
        if (array_key_exists('current', $data)) {
            $instance->current = $data['current'];
        }
        if (array_key_exists('previous', $data)) {
            $instance->previous = $data['previous'];
        }
        if (array_key_exists('delta', $data)) {
            $instance->delta = $data['delta'];
        }
        if (array_key_exists('deltaPercent', $data)) {
            $instance->deltaPercent = $data['deltaPercent'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiContentImpactReport
{
    /** @var ?ReportRange */
    public $range = null;
    /** @var ?ReportAiSourceImpactRow[] */
    public $bySource = null;
    /** @var ?ReportAiContentRow[] */
    public $topAiContent = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('range', $data)) {
            $instance->range = $data['range'];
        }
        if (array_key_exists('bySource', $data)) {
            $instance->bySource = $data['bySource'];
        }
        if (array_key_exists('topAiContent', $data)) {
            $instance->topAiContent = $data['topAiContent'];
        }

        $nested = [
            'range' => static fn (array $v): ReportRange => ReportRange::fromArray($v),
            'bySource' => static fn (array $v): array => array_map(static fn ($x) => ReportAiSourceImpactRow::fromArray($x), $v),
            'topAiContent' => static fn (array $v): array => array_map(static fn ($x) => ReportAiContentRow::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportAiSourceImpactRow
{
    /** @var ?string */
    public $source = null;
    /** @var ?float */
    public $articles = null;
    /** @var ?float */
    public $publishedArticles = null;
    /** @var ?float */
    public $views = null;
    /** @var ?float */
    public $likes = null;
    /** @var ?float */
    public $shares = null;
    /** @var ?float */
    public $comments = null;
    /** @var ?float */
    public $engagementScore = null;
    /** @var ?float */
    public $publishRate = null;
    /** @var ?float */
    public $avgViewsPerArticle = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('source', $data)) {
            $instance->source = $data['source'];
        }
        if (array_key_exists('articles', $data)) {
            $instance->articles = $data['articles'];
        }
        if (array_key_exists('publishedArticles', $data)) {
            $instance->publishedArticles = $data['publishedArticles'];
        }
        if (array_key_exists('views', $data)) {
            $instance->views = $data['views'];
        }
        if (array_key_exists('likes', $data)) {
            $instance->likes = $data['likes'];
        }
        if (array_key_exists('shares', $data)) {
            $instance->shares = $data['shares'];
        }
        if (array_key_exists('comments', $data)) {
            $instance->comments = $data['comments'];
        }
        if (array_key_exists('engagementScore', $data)) {
            $instance->engagementScore = $data['engagementScore'];
        }
        if (array_key_exists('publishRate', $data)) {
            $instance->publishRate = $data['publishRate'];
        }
        if (array_key_exists('avgViewsPerArticle', $data)) {
            $instance->avgViewsPerArticle = $data['avgViewsPerArticle'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportAiContentRow
{
    /** @var ?ObjectId */
    public $articleId = null;
    /** @var ?string */
    public $slug = null;
    /** @var ?MultilingualStringOrNull */
    public $mainTitle = null;
    /** @var ?string */
    public $contentSource = null;
    /** @var ?bool */
    public $isPublished = null;
    /** @var ?float */
    public $views = null;
    /** @var ?float */
    public $likes = null;
    /** @var ?float */
    public $shares = null;
    /** @var ?float */
    public $commentsCount = null;
    /** @var ?float */
    public $engagementScore = null;
    /** @var ?DateTime */
    public $createdAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('articleId', $data)) {
            $instance->articleId = $data['articleId'];
        }
        if (array_key_exists('slug', $data)) {
            $instance->slug = $data['slug'];
        }
        if (array_key_exists('mainTitle', $data)) {
            $instance->mainTitle = $data['mainTitle'];
        }
        if (array_key_exists('contentSource', $data)) {
            $instance->contentSource = $data['contentSource'];
        }
        if (array_key_exists('isPublished', $data)) {
            $instance->isPublished = $data['isPublished'];
        }
        if (array_key_exists('views', $data)) {
            $instance->views = $data['views'];
        }
        if (array_key_exists('likes', $data)) {
            $instance->likes = $data['likes'];
        }
        if (array_key_exists('shares', $data)) {
            $instance->shares = $data['shares'];
        }
        if (array_key_exists('commentsCount', $data)) {
            $instance->commentsCount = $data['commentsCount'];
        }
        if (array_key_exists('engagementScore', $data)) {
            $instance->engagementScore = $data['engagementScore'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class CommentOverviewReport
{
    /** @var ?ReportRange */
    public $range = null;
    /** @var ?array<string, mixed> */
    public $totals = null;
    /** @var ?ReportCommentStatusRow[] */
    public $byStatus = null;
    /** @var ?ReportActorTypeRow[] */
    public $byActorType = null;
    /** @var ?ReportCommentDailyRow[] */
    public $dailyTrend = null;
    /** @var ?ReportDiscussedArticleRow[] */
    public $topDiscussedArticles = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('range', $data)) {
            $instance->range = $data['range'];
        }
        if (array_key_exists('totals', $data)) {
            $instance->totals = $data['totals'];
        }
        if (array_key_exists('byStatus', $data)) {
            $instance->byStatus = $data['byStatus'];
        }
        if (array_key_exists('byActorType', $data)) {
            $instance->byActorType = $data['byActorType'];
        }
        if (array_key_exists('dailyTrend', $data)) {
            $instance->dailyTrend = $data['dailyTrend'];
        }
        if (array_key_exists('topDiscussedArticles', $data)) {
            $instance->topDiscussedArticles = $data['topDiscussedArticles'];
        }

        $nested = [
            'range' => static fn (array $v): ReportRange => ReportRange::fromArray($v),
            'byStatus' => static fn (array $v): array => array_map(static fn ($x) => ReportCommentStatusRow::fromArray($x), $v),
            'byActorType' => static fn (array $v): array => array_map(static fn ($x) => ReportActorTypeRow::fromArray($x), $v),
            'dailyTrend' => static fn (array $v): array => array_map(static fn ($x) => ReportCommentDailyRow::fromArray($x), $v),
            'topDiscussedArticles' => static fn (array $v): array => array_map(static fn ($x) => ReportDiscussedArticleRow::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportCommentStatusRow
{
    /** @var ?float */
    public $status = null;
    /** @var ?float */
    public $count = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('status', $data)) {
            $instance->status = $data['status'];
        }
        if (array_key_exists('count', $data)) {
            $instance->count = $data['count'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportActorTypeRow
{
    /** @var ?string */
    public $actorType = null;
    /** @var ?float */
    public $count = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('actorType', $data)) {
            $instance->actorType = $data['actorType'];
        }
        if (array_key_exists('count', $data)) {
            $instance->count = $data['count'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportCommentDailyRow
{
    /** @var ?string */
    public $date = null;
    /** @var ?float */
    public $comments = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('date', $data)) {
            $instance->date = $data['date'];
        }
        if (array_key_exists('comments', $data)) {
            $instance->comments = $data['comments'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportDiscussedArticleRow
{
    /** @var ?ObjectId */
    public $articleId = null;
    /** @var ?string */
    public $slug = null;
    /** @var ?MultilingualStringOrNull */
    public $mainTitle = null;
    /** @var ?float */
    public $comments = null;
    /** @var ?float */
    public $likes = null;
    /** @var ?float */
    public $dislikes = null;
    /** @var ?DateTime */
    public $lastCommentAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('articleId', $data)) {
            $instance->articleId = $data['articleId'];
        }
        if (array_key_exists('slug', $data)) {
            $instance->slug = $data['slug'];
        }
        if (array_key_exists('mainTitle', $data)) {
            $instance->mainTitle = $data['mainTitle'];
        }
        if (array_key_exists('comments', $data)) {
            $instance->comments = $data['comments'];
        }
        if (array_key_exists('likes', $data)) {
            $instance->likes = $data['likes'];
        }
        if (array_key_exists('dislikes', $data)) {
            $instance->dislikes = $data['dislikes'];
        }
        if (array_key_exists('lastCommentAt', $data)) {
            $instance->lastCommentAt = $data['lastCommentAt'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class Comment
{
    /** @var ObjectId */
    public $_id = null;
    /** @var ?string */
    public $tenantId = null;
    /** @var ?ObjectId */
    public $articleId = null;
    /** @var ?'user' | 'guest' */
    public $actorType = null;
    /** @var ?ObjectId */
    public $userId = null;
    /** @var ?ObjectId */
    public $parentId = null;
    /** @var string */
    public $content = null;
    /** @var ?float */
    public $likes = null;
    /** @var ?float */
    public $dislikes = null;
    /** @var 'pending' | 'approved' | 'rejected' */
    public $status = null;
    /** @var ?DateTime */
    public $createdAt = null;
    /** @var ?DateTime */
    public $updatedAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('_id', $data)) {
            $instance->_id = $data['_id'];
        }
        if (array_key_exists('tenantId', $data)) {
            $instance->tenantId = $data['tenantId'];
        }
        if (array_key_exists('articleId', $data)) {
            $instance->articleId = $data['articleId'];
        }
        if (array_key_exists('actorType', $data)) {
            $instance->actorType = $data['actorType'];
        }
        if (array_key_exists('userId', $data)) {
            $instance->userId = $data['userId'];
        }
        if (array_key_exists('parentId', $data)) {
            $instance->parentId = $data['parentId'];
        }
        if (array_key_exists('content', $data)) {
            $instance->content = $data['content'];
        }
        if (array_key_exists('likes', $data)) {
            $instance->likes = $data['likes'];
        }
        if (array_key_exists('dislikes', $data)) {
            $instance->dislikes = $data['dislikes'];
        }
        if (array_key_exists('status', $data)) {
            $instance->status = $data['status'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }
        if (array_key_exists('updatedAt', $data)) {
            $instance->updatedAt = $data['updatedAt'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class CommentWrapper
{
    /** @var Comment */
    public $comment = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('comment', $data)) {
            $instance->comment = $data['comment'];
        }

        $nested = [
            'comment' => static fn (array $v): Comment => Comment::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class CommentListWrapper
{
    /** @var ?Comment[] */
    public $comments = null;
    /** @var Pagination */
    public $pagination = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('comments', $data)) {
            $instance->comments = $data['comments'];
        }
        if (array_key_exists('pagination', $data)) {
            $instance->pagination = $data['pagination'];
        }

        $nested = [
            'comments' => static fn (array $v): array => array_map(static fn ($x) => Comment::fromArray($x), $v),
            'pagination' => static fn (array $v): Pagination => Pagination::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ArticleReactionTotals
{
    /** @var ?ObjectId */
    public $articleId = null;
    /** @var ?'like' | 'dislike' */
    public $reaction = null;
    /** @var ?float */
    public $likes = null;
    /** @var ?float */
    public $dislikes = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('articleId', $data)) {
            $instance->articleId = $data['articleId'];
        }
        if (array_key_exists('reaction', $data)) {
            $instance->reaction = $data['reaction'];
        }
        if (array_key_exists('likes', $data)) {
            $instance->likes = $data['likes'];
        }
        if (array_key_exists('dislikes', $data)) {
            $instance->dislikes = $data['dislikes'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ArticleReactionSummary
{
    /** @var ?ObjectId */
    public $articleId = null;
    /** @var ?float */
    public $likes = null;
    /** @var ?float */
    public $dislikes = null;
    /** @var ?'like' | 'dislike' */
    public $userReaction = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('articleId', $data)) {
            $instance->articleId = $data['articleId'];
        }
        if (array_key_exists('likes', $data)) {
            $instance->likes = $data['likes'];
        }
        if (array_key_exists('dislikes', $data)) {
            $instance->dislikes = $data['dislikes'];
        }
        if (array_key_exists('userReaction', $data)) {
            $instance->userReaction = $data['userReaction'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class CommentReactionTotals
{
    /** @var ?ObjectId */
    public $commentId = null;
    /** @var ?'like' | 'dislike' */
    public $reaction = null;
    /** @var ?float */
    public $likes = null;
    /** @var ?float */
    public $dislikes = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('commentId', $data)) {
            $instance->commentId = $data['commentId'];
        }
        if (array_key_exists('reaction', $data)) {
            $instance->reaction = $data['reaction'];
        }
        if (array_key_exists('likes', $data)) {
            $instance->likes = $data['likes'];
        }
        if (array_key_exists('dislikes', $data)) {
            $instance->dislikes = $data['dislikes'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class CommentReactionSummary
{
    /** @var ?ObjectId */
    public $commentId = null;
    /** @var ?float */
    public $likes = null;
    /** @var ?float */
    public $dislikes = null;
    /** @var ?'like' | 'dislike' */
    public $userReaction = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('commentId', $data)) {
            $instance->commentId = $data['commentId'];
        }
        if (array_key_exists('likes', $data)) {
            $instance->likes = $data['likes'];
        }
        if (array_key_exists('dislikes', $data)) {
            $instance->dislikes = $data['dislikes'];
        }
        if (array_key_exists('userReaction', $data)) {
            $instance->userReaction = $data['userReaction'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class EngagementSettings
{
    /** @var ?string */
    public $tenantId = null;
    /** @var ?bool */
    public $commentsEnabled = null;
    /** @var ?bool */
    public $reactionsEnabled = null;
    /** @var ?bool */
    public $allowGuestComments = null;
    /** @var ?bool */
    public $allowGuestReactions = null;
    /** @var ?bool */
    public $autoApproveComments = null;
    /** @var ?bool */
    public $requireCaptchaForGuestEngagement = null;
    /** @var ?float */
    public $guestEngagementCaptchaMinScore = null;
    /** @var ?float */
    public $guestEngagementRateLimitPerMin = null;
    /** @var ?ObjectId */
    public $updatedBy = null;
    /** @var ?DateTime */
    public $updatedAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('tenantId', $data)) {
            $instance->tenantId = $data['tenantId'];
        }
        if (array_key_exists('commentsEnabled', $data)) {
            $instance->commentsEnabled = $data['commentsEnabled'];
        }
        if (array_key_exists('reactionsEnabled', $data)) {
            $instance->reactionsEnabled = $data['reactionsEnabled'];
        }
        if (array_key_exists('allowGuestComments', $data)) {
            $instance->allowGuestComments = $data['allowGuestComments'];
        }
        if (array_key_exists('allowGuestReactions', $data)) {
            $instance->allowGuestReactions = $data['allowGuestReactions'];
        }
        if (array_key_exists('autoApproveComments', $data)) {
            $instance->autoApproveComments = $data['autoApproveComments'];
        }
        if (array_key_exists('requireCaptchaForGuestEngagement', $data)) {
            $instance->requireCaptchaForGuestEngagement = $data['requireCaptchaForGuestEngagement'];
        }
        if (array_key_exists('guestEngagementCaptchaMinScore', $data)) {
            $instance->guestEngagementCaptchaMinScore = $data['guestEngagementCaptchaMinScore'];
        }
        if (array_key_exists('guestEngagementRateLimitPerMin', $data)) {
            $instance->guestEngagementRateLimitPerMin = $data['guestEngagementRateLimitPerMin'];
        }
        if (array_key_exists('updatedBy', $data)) {
            $instance->updatedBy = $data['updatedBy'];
        }
        if (array_key_exists('updatedAt', $data)) {
            $instance->updatedAt = $data['updatedAt'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class CategoryDeleteResult
{
    /** @var Category */
    public $category = null;
    /** @var ?float */
    public $subCategoriesAffected = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('category', $data)) {
            $instance->category = $data['category'];
        }
        if (array_key_exists('subCategoriesAffected', $data)) {
            $instance->subCategoriesAffected = $data['subCategoriesAffected'];
        }

        $nested = [
            'category' => static fn (array $v): Category => Category::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class TagSearchResult
{
    /** @var ?Tag[] */
    public $tags = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('tags', $data)) {
            $instance->tags = $data['tags'];
        }

        $nested = [
            'tags' => static fn (array $v): array => array_map(static fn ($x) => Tag::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SeoAnalysis
{
    /** @var ?float */
    public $score = null;
    /** @var ?float */
    public $potentialScore = null;
    /** @var ?array<string, mixed> */
    public $scores = null;
    /** @var ?array<string, mixed> */
    public $stats = null;
    /** @var ?array<string, mixed>[] */
    public $topKeywords = null;
    /** @var ?array<string, mixed>[] */
    public $allKeywords = null;
    /** @var ?array<string, mixed> */
    public $issues = null;
    /** @var ?array<string, mixed> */
    public $checks = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('score', $data)) {
            $instance->score = $data['score'];
        }
        if (array_key_exists('potentialScore', $data)) {
            $instance->potentialScore = $data['potentialScore'];
        }
        if (array_key_exists('scores', $data)) {
            $instance->scores = $data['scores'];
        }
        if (array_key_exists('stats', $data)) {
            $instance->stats = $data['stats'];
        }
        if (array_key_exists('topKeywords', $data)) {
            $instance->topKeywords = $data['topKeywords'];
        }
        if (array_key_exists('allKeywords', $data)) {
            $instance->allKeywords = $data['allKeywords'];
        }
        if (array_key_exists('issues', $data)) {
            $instance->issues = $data['issues'];
        }
        if (array_key_exists('checks', $data)) {
            $instance->checks = $data['checks'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 *
 * A map keyed by whatever key the endpoint supplies. Read it with array access, or as a property:
 * `$title['en']` and `$title->en` are the same value.
 */
class SeoAnalysisPerLanguage implements \ArrayAccess, \IteratorAggregate, \Countable
{
    public function offsetExists(mixed $offset): bool
    {
        return isset($this->data[$offset]);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->data[$offset] ?? null;
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        if ($offset === null) {
            $this->data[] = $value;

            return;
        }

        $this->data[$offset] = $value;
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->data[$offset]);
    }

    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->data);
    }

    public function count(): int
    {
        return count($this->data);
    }

    // A language code is not a declared property, so `$title->en` has to
    // reach the map rather than warn about an undefined property.
    public function __get(string $key): mixed
    {
        return $this->data[$key] ?? null;
    }

    public function __isset(string $key): bool
    {
        return isset($this->data[$key]);
    }

    /**
     * Every key the server sent, so an undeclared language code stays
     * reachable rather than dropped.
     *
     * @var array<array-key, SeoAnalysis>
     */
    public array $data = [];

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        $instance->data = $data;

        return $instance;
    }

    /** @return array<array-key, mixed> */
    public function toArray(): array
    {
        return $this->data;
    }

    /**
     * The value for one key, or null
     * when the server sent no such key.
     */
    public function get(string $key): mixed
    {
        return $this->data[$key] ?? null;
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SeoAnalysisResult
{
    /** @var ObjectId */
    public $articleId = null;
    /** @var string */
    public $slug = null;
    /** @var ?string */
    public $language = null;
    /** @var SeoAnalysis | SeoAnalysisPerLanguage */
    public $seo = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('articleId', $data)) {
            $instance->articleId = $data['articleId'];
        }
        if (array_key_exists('slug', $data)) {
            $instance->slug = $data['slug'];
        }
        if (array_key_exists('language', $data)) {
            $instance->language = $data['language'];
        }
        if (array_key_exists('seo', $data)) {
            $instance->seo = $data['seo'];
        }

        $nested = [
            'seo' => static fn (array $v) => self::convertSeoAnalysisOrPerLanguage($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }

    /**
     * This field is either one SeoAnalysis or a map of them keyed by language
     * code, so the shape is chosen from the payload. A nested object
     * means the map: a SeoAnalysis carries only scalars, lists and
     * already-flattened values, never a bare object of its own.
     */
    public static function convertSeoAnalysisOrPerLanguage(array $data)
    {
        $perLanguage = SeoAnalysisPerLanguage::fromArray([]);
        foreach ($data as $language => $entry) {
            if (!is_array($entry)) {
                return SeoAnalysis::fromArray($data);
            }

            $perLanguage->data[$language] = SeoAnalysis::fromArray($entry);
        }

        return $data === [] ? SeoAnalysis::fromArray($data) : $perLanguage;
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class TenantUsageStats
{
    /** @var ?float */
    public $admins = null;
    /** @var ?float */
    public $apiKeys = null;
    /** @var ?float */
    public $categories = null;
    /** @var ?float */
    public $subCategories = null;
    /** @var ?float */
    public $articles = null;
    /** @var ?float */
    public $forms = null;
    /** @var ?float */
    public $submissions = null;
    /** @var ?float */
    public $languages = null;
    /** @var ?float */
    public $ai_tokens = null;
    /** @var ?float */
    public $s3 = null;
    /** @var ?array<string, float> */
    public $limits = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('admins', $data)) {
            $instance->admins = $data['admins'];
        }
        if (array_key_exists('apiKeys', $data)) {
            $instance->apiKeys = $data['apiKeys'];
        }
        if (array_key_exists('categories', $data)) {
            $instance->categories = $data['categories'];
        }
        if (array_key_exists('subCategories', $data)) {
            $instance->subCategories = $data['subCategories'];
        }
        if (array_key_exists('articles', $data)) {
            $instance->articles = $data['articles'];
        }
        if (array_key_exists('forms', $data)) {
            $instance->forms = $data['forms'];
        }
        if (array_key_exists('submissions', $data)) {
            $instance->submissions = $data['submissions'];
        }
        if (array_key_exists('languages', $data)) {
            $instance->languages = $data['languages'];
        }
        if (array_key_exists('ai_tokens', $data)) {
            $instance->ai_tokens = $data['ai_tokens'];
        }
        if (array_key_exists('s3', $data)) {
            $instance->s3 = $data['s3'];
        }
        if (array_key_exists('limits', $data)) {
            $instance->limits = $data['limits'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class UserStats
{
    /** @var ?string */
    public $userId = null;
    /** @var ?string */
    public $tenantId = null;
    /** @var ?float */
    public $articles = null;
    /** @var ?float */
    public $categories = null;
    /** @var ?float */
    public $subCategories = null;
    /** @var ?float */
    public $forms = null;
    /** @var ?float */
    public $languages = null;
    /** @var ?float */
    public $publishedArticles = null;
    /** @var ?DateTime */
    public $lastArticleAt = null;
    /** @var ?float */
    public $likes = null;
    /** @var ?float */
    public $dislikes = null;
    /** @var ?float */
    public $views = null;
    /** @var ?float */
    public $shares = null;
    /** @var ?float */
    public $comments = null;
    /** @var ?float */
    public $engagementScore = null;
    /** @var ?float */
    public $engagementRate = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('userId', $data)) {
            $instance->userId = $data['userId'];
        }
        if (array_key_exists('tenantId', $data)) {
            $instance->tenantId = $data['tenantId'];
        }
        if (array_key_exists('articles', $data)) {
            $instance->articles = $data['articles'];
        }
        if (array_key_exists('categories', $data)) {
            $instance->categories = $data['categories'];
        }
        if (array_key_exists('subCategories', $data)) {
            $instance->subCategories = $data['subCategories'];
        }
        if (array_key_exists('forms', $data)) {
            $instance->forms = $data['forms'];
        }
        if (array_key_exists('languages', $data)) {
            $instance->languages = $data['languages'];
        }
        if (array_key_exists('publishedArticles', $data)) {
            $instance->publishedArticles = $data['publishedArticles'];
        }
        if (array_key_exists('lastArticleAt', $data)) {
            $instance->lastArticleAt = $data['lastArticleAt'];
        }
        if (array_key_exists('likes', $data)) {
            $instance->likes = $data['likes'];
        }
        if (array_key_exists('dislikes', $data)) {
            $instance->dislikes = $data['dislikes'];
        }
        if (array_key_exists('views', $data)) {
            $instance->views = $data['views'];
        }
        if (array_key_exists('shares', $data)) {
            $instance->shares = $data['shares'];
        }
        if (array_key_exists('comments', $data)) {
            $instance->comments = $data['comments'];
        }
        if (array_key_exists('engagementScore', $data)) {
            $instance->engagementScore = $data['engagementScore'];
        }
        if (array_key_exists('engagementRate', $data)) {
            $instance->engagementRate = $data['engagementRate'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AuthorStats
{
    /** @var ?string */
    public $authorId = null;
    /** @var ?string */
    public $tenantId = null;
    /** @var ?float */
    public $articles = null;
    /** @var ?float */
    public $publishedArticles = null;
    /** @var ?DateTime */
    public $lastArticleAt = null;
    /** @var ?float */
    public $likes = null;
    /** @var ?float */
    public $dislikes = null;
    /** @var ?float */
    public $views = null;
    /** @var ?float */
    public $shares = null;
    /** @var ?float */
    public $comments = null;
    /** @var ?float */
    public $engagementScore = null;
    /** @var ?float */
    public $engagementRate = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('authorId', $data)) {
            $instance->authorId = $data['authorId'];
        }
        if (array_key_exists('tenantId', $data)) {
            $instance->tenantId = $data['tenantId'];
        }
        if (array_key_exists('articles', $data)) {
            $instance->articles = $data['articles'];
        }
        if (array_key_exists('publishedArticles', $data)) {
            $instance->publishedArticles = $data['publishedArticles'];
        }
        if (array_key_exists('lastArticleAt', $data)) {
            $instance->lastArticleAt = $data['lastArticleAt'];
        }
        if (array_key_exists('likes', $data)) {
            $instance->likes = $data['likes'];
        }
        if (array_key_exists('dislikes', $data)) {
            $instance->dislikes = $data['dislikes'];
        }
        if (array_key_exists('views', $data)) {
            $instance->views = $data['views'];
        }
        if (array_key_exists('shares', $data)) {
            $instance->shares = $data['shares'];
        }
        if (array_key_exists('comments', $data)) {
            $instance->comments = $data['comments'];
        }
        if (array_key_exists('engagementScore', $data)) {
            $instance->engagementScore = $data['engagementScore'];
        }
        if (array_key_exists('engagementRate', $data)) {
            $instance->engagementRate = $data['engagementRate'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class UsersStatsPage
{
    /** @var ?UserStats[] */
    public $items = null;
    /** @var Pagination */
    public $pagination = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('items', $data)) {
            $instance->items = $data['items'];
        }
        if (array_key_exists('pagination', $data)) {
            $instance->pagination = $data['pagination'];
        }

        $nested = [
            'items' => static fn (array $v): array => array_map(static fn ($x) => UserStats::fromArray($x), $v),
            'pagination' => static fn (array $v): Pagination => Pagination::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AuthorsStatsPage
{
    /** @var ?AuthorStats[] */
    public $items = null;
    /** @var Pagination */
    public $pagination = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('items', $data)) {
            $instance->items = $data['items'];
        }
        if (array_key_exists('pagination', $data)) {
            $instance->pagination = $data['pagination'];
        }

        $nested = [
            'items' => static fn (array $v): array => array_map(static fn ($x) => AuthorStats::fromArray($x), $v),
            'pagination' => static fn (array $v): Pagination => Pagination::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class DashboardSlot
{
    /** @var ?string */
    public $id = null;
    /** @var ?'operationsOverview' | 'tenantCapacity' | 'contentTrend' | 'summaryOverview' | 'topArticles' | 'reportIntelligence' | 'contentSpotlight' */
    public $type = null;
    /** @var ?bool */
    public $enabled = null;
    /** @var ?'half' | 'full' */
    public $span = null;
    /** @var ?array<string, mixed> */
    public $settings = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('id', $data)) {
            $instance->id = $data['id'];
        }
        if (array_key_exists('type', $data)) {
            $instance->type = $data['type'];
        }
        if (array_key_exists('enabled', $data)) {
            $instance->enabled = $data['enabled'];
        }
        if (array_key_exists('span', $data)) {
            $instance->span = $data['span'];
        }
        if (array_key_exists('settings', $data)) {
            $instance->settings = $data['settings'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class DashboardConfig
{
    /** @var ?float */
    public $version = null;
    /** @var ?string */
    public $templateId = null;
    /** @var ?DashboardSlot[] */
    public $slots = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('version', $data)) {
            $instance->version = $data['version'];
        }
        if (array_key_exists('templateId', $data)) {
            $instance->templateId = $data['templateId'];
        }
        if (array_key_exists('slots', $data)) {
            $instance->slots = $data['slots'];
        }

        $nested = [
            'slots' => static fn (array $v): array => array_map(static fn ($x) => DashboardSlot::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class DashboardConfigWrapper
{
    /** @var DashboardConfig */
    public $dashboardConfig = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('dashboardConfig', $data)) {
            $instance->dashboardConfig = $data['dashboardConfig'];
        }

        $nested = [
            'dashboardConfig' => static fn (array $v): DashboardConfig => DashboardConfig::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiSummaryResult
{
    /** @var ?string */
    public $summary = null;
    /** @var ?Tokens */
    public $tokens = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('summary', $data)) {
            $instance->summary = $data['summary'];
        }
        if (array_key_exists('tokens', $data)) {
            $instance->tokens = $data['tokens'];
        }

        $nested = [
            'tokens' => static fn (array $v): Tokens => Tokens::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiTitleResult
{
    /** @var ?string */
    public $title = null;
    /** @var ?Tokens */
    public $tokens = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('title', $data)) {
            $instance->title = $data['title'];
        }
        if (array_key_exists('tokens', $data)) {
            $instance->tokens = $data['tokens'];
        }

        $nested = [
            'tokens' => static fn (array $v): Tokens => Tokens::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiTranslateResult
{
    /** @var ?string */
    public $content = null;
    /** @var ?Tokens */
    public $tokens = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('content', $data)) {
            $instance->content = $data['content'];
        }
        if (array_key_exists('tokens', $data)) {
            $instance->tokens = $data['tokens'];
        }

        $nested = [
            'tokens' => static fn (array $v): Tokens => Tokens::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiSeoResult
{
    /** @var ?string */
    public $contentHtml = null;
    /** @var ?string */
    public $metaDescription = null;
    /** @var ?float */
    public $aiSeoScore = null;
    /** @var ?string[] */
    public $suggestedKeywords = null;
    /** @var ?Tokens */
    public $tokens = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('contentHtml', $data)) {
            $instance->contentHtml = $data['contentHtml'];
        }
        if (array_key_exists('metaDescription', $data)) {
            $instance->metaDescription = $data['metaDescription'];
        }
        if (array_key_exists('aiSeoScore', $data)) {
            $instance->aiSeoScore = $data['aiSeoScore'];
        }
        if (array_key_exists('suggestedKeywords', $data)) {
            $instance->suggestedKeywords = $data['suggestedKeywords'];
        }
        if (array_key_exists('tokens', $data)) {
            $instance->tokens = $data['tokens'];
        }

        $nested = [
            'tokens' => static fn (array $v): Tokens => Tokens::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiContentResult
{
    /** @var ?string */
    public $title = null;
    /** @var ?string */
    public $slug = null;
    /** @var ?string */
    public $summary = null;
    /** @var ?string */
    public $body = null;
    /** @var ?string */
    public $aiGenerationId = null;
    /** @var ?Tokens */
    public $tokens = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('title', $data)) {
            $instance->title = $data['title'];
        }
        if (array_key_exists('slug', $data)) {
            $instance->slug = $data['slug'];
        }
        if (array_key_exists('summary', $data)) {
            $instance->summary = $data['summary'];
        }
        if (array_key_exists('body', $data)) {
            $instance->body = $data['body'];
        }
        if (array_key_exists('aiGenerationId', $data)) {
            $instance->aiGenerationId = $data['aiGenerationId'];
        }
        if (array_key_exists('tokens', $data)) {
            $instance->tokens = $data['tokens'];
        }

        $nested = [
            'tokens' => static fn (array $v): Tokens => Tokens::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiImageResult
{
    /** @var ?string */
    public $imageUrl = null;
    /** @var ?string */
    public $imageBase64 = null;
    /** @var ?string */
    public $imageMimeType = null;
    /** @var ?ObjectId */
    public $articleId = null;
    /** @var ?TokensUsedOnly */
    public $tokens = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('imageUrl', $data)) {
            $instance->imageUrl = $data['imageUrl'];
        }
        if (array_key_exists('imageBase64', $data)) {
            $instance->imageBase64 = $data['imageBase64'];
        }
        if (array_key_exists('imageMimeType', $data)) {
            $instance->imageMimeType = $data['imageMimeType'];
        }
        if (array_key_exists('articleId', $data)) {
            $instance->articleId = $data['articleId'];
        }
        if (array_key_exists('tokens', $data)) {
            $instance->tokens = $data['tokens'];
        }

        $nested = [
            'tokens' => static fn (array $v): TokensUsedOnly => TokensUsedOnly::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiArticlePatch
{
    /** @var ?string */
    public $title = null;
    /** @var ?string */
    public $summary = null;
    /** @var ?string */
    public $contentHtml = null;
    /** @var ?string[] */
    public $tags = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('title', $data)) {
            $instance->title = $data['title'];
        }
        if (array_key_exists('summary', $data)) {
            $instance->summary = $data['summary'];
        }
        if (array_key_exists('contentHtml', $data)) {
            $instance->contentHtml = $data['contentHtml'];
        }
        if (array_key_exists('tags', $data)) {
            $instance->tags = $data['tags'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiArticleSeoResult
{
    /** @var ?ObjectId */
    public $articleId = null;
    /** @var ?array<string, AiArticlePatch> */
    public $patched = null;
    /** @var ?array<string, SeoAnalysis> */
    public $seo = null;
    /** @var ?bool */
    public $saved = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('articleId', $data)) {
            $instance->articleId = $data['articleId'];
        }
        if (array_key_exists('patched', $data)) {
            $instance->patched = $data['patched'];
        }
        if (array_key_exists('seo', $data)) {
            $instance->seo = $data['seo'];
        }
        if (array_key_exists('saved', $data)) {
            $instance->saved = $data['saved'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiArticleTranslation
{
    /** @var ?string */
    public $mainTitle = null;
    /** @var ?string */
    public $title2 = null;
    /** @var ?string */
    public $title3 = null;
    /** @var ?string */
    public $summary = null;
    /** @var ?string */
    public $content = null;
    /** @var ?string[] */
    public $tags = null;
    /** @var ?float */
    public $blocksTotal = null;
    /** @var ?float */
    public $blocksTranslated = null;
    /** @var ?array<string, string> */
    public $blockHashes = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('mainTitle', $data)) {
            $instance->mainTitle = $data['mainTitle'];
        }
        if (array_key_exists('title2', $data)) {
            $instance->title2 = $data['title2'];
        }
        if (array_key_exists('title3', $data)) {
            $instance->title3 = $data['title3'];
        }
        if (array_key_exists('summary', $data)) {
            $instance->summary = $data['summary'];
        }
        if (array_key_exists('content', $data)) {
            $instance->content = $data['content'];
        }
        if (array_key_exists('tags', $data)) {
            $instance->tags = $data['tags'];
        }
        if (array_key_exists('blocksTotal', $data)) {
            $instance->blocksTotal = $data['blocksTotal'];
        }
        if (array_key_exists('blocksTranslated', $data)) {
            $instance->blocksTranslated = $data['blocksTranslated'];
        }
        if (array_key_exists('blockHashes', $data)) {
            $instance->blockHashes = $data['blockHashes'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiArticleTranslateResult
{
    /** @var ?ObjectId */
    public $articleId = null;
    /** @var ?string */
    public $sourceLanguage = null;
    /** @var ?string[] */
    public $targetLanguages = null;
    /** @var ?array<string, AiArticleTranslation> */
    public $translations = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('articleId', $data)) {
            $instance->articleId = $data['articleId'];
        }
        if (array_key_exists('sourceLanguage', $data)) {
            $instance->sourceLanguage = $data['sourceLanguage'];
        }
        if (array_key_exists('targetLanguages', $data)) {
            $instance->targetLanguages = $data['targetLanguages'];
        }
        if (array_key_exists('translations', $data)) {
            $instance->translations = $data['translations'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiFormFieldTranslation
{
    /** @var ?string */
    public $label = null;
    /** @var ?string */
    public $placeholder = null;
    /** @var ?array<string, mixed>[] */
    public $options = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('label', $data)) {
            $instance->label = $data['label'];
        }
        if (array_key_exists('placeholder', $data)) {
            $instance->placeholder = $data['placeholder'];
        }
        if (array_key_exists('options', $data)) {
            $instance->options = $data['options'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiFormSectionTranslation
{
    /** @var ?string */
    public $title = null;
    /** @var ?string */
    public $description = null;
    /** @var ?string */
    public $submitButtonText = null;
    /** @var ?string[] */
    public $sectionTitles = null;
    /** @var ?string[] */
    public $sectionDescriptions = null;
    /** @var ?string[] */
    public $fieldLabels = null;
    /** @var ?string[] */
    public $fieldPlaceholders = null;
    /** @var ?AiFormFieldTranslation[] */
    public $fields = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('title', $data)) {
            $instance->title = $data['title'];
        }
        if (array_key_exists('description', $data)) {
            $instance->description = $data['description'];
        }
        if (array_key_exists('submitButtonText', $data)) {
            $instance->submitButtonText = $data['submitButtonText'];
        }
        if (array_key_exists('sectionTitles', $data)) {
            $instance->sectionTitles = $data['sectionTitles'];
        }
        if (array_key_exists('sectionDescriptions', $data)) {
            $instance->sectionDescriptions = $data['sectionDescriptions'];
        }
        if (array_key_exists('fieldLabels', $data)) {
            $instance->fieldLabels = $data['fieldLabels'];
        }
        if (array_key_exists('fieldPlaceholders', $data)) {
            $instance->fieldPlaceholders = $data['fieldPlaceholders'];
        }
        if (array_key_exists('fields', $data)) {
            $instance->fields = $data['fields'];
        }

        $nested = [
            'fields' => static fn (array $v): array => array_map(static fn ($x) => AiFormFieldTranslation::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiFormTranslateResult
{
    /** @var ?ObjectId */
    public $formId = null;
    /** @var ?string */
    public $sourceLanguage = null;
    /** @var ?string[] */
    public $targetLanguages = null;
    /** @var ?array<string, AiFormSectionTranslation> */
    public $translations = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('formId', $data)) {
            $instance->formId = $data['formId'];
        }
        if (array_key_exists('sourceLanguage', $data)) {
            $instance->sourceLanguage = $data['sourceLanguage'];
        }
        if (array_key_exists('targetLanguages', $data)) {
            $instance->targetLanguages = $data['targetLanguages'];
        }
        if (array_key_exists('translations', $data)) {
            $instance->translations = $data['translations'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SocialTemplateDefaults
{
    /** @var ?string */
    public $language = null;
    /** @var ?string */
    public $tone = null;
    /** @var ?string */
    public $length = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('language', $data)) {
            $instance->language = $data['language'];
        }
        if (array_key_exists('tone', $data)) {
            $instance->tone = $data['tone'];
        }
        if (array_key_exists('length', $data)) {
            $instance->length = $data['length'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SocialPlatformTemplate
{
    /** @var ?string */
    public $tone = null;
    /** @var ?string */
    public $length = null;
    /** @var ?string */
    public $ctaTemplate = null;
    /** @var ?string */
    public $hashtagStyle = null;
    /** @var ?float */
    public $maxHashtags = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('tone', $data)) {
            $instance->tone = $data['tone'];
        }
        if (array_key_exists('length', $data)) {
            $instance->length = $data['length'];
        }
        if (array_key_exists('ctaTemplate', $data)) {
            $instance->ctaTemplate = $data['ctaTemplate'];
        }
        if (array_key_exists('hashtagStyle', $data)) {
            $instance->hashtagStyle = $data['hashtagStyle'];
        }
        if (array_key_exists('maxHashtags', $data)) {
            $instance->maxHashtags = $data['maxHashtags'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SocialTemplate
{
    /** @var ?SocialTemplateDefaults */
    public $defaults = null;
    /** @var ?array<string, mixed> */
    public $platforms = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('defaults', $data)) {
            $instance->defaults = $data['defaults'];
        }
        if (array_key_exists('platforms', $data)) {
            $instance->platforms = $data['platforms'];
        }

        $nested = [
            'defaults' => static fn (array $v): SocialTemplateDefaults => SocialTemplateDefaults::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SocialConnection
{
    /** @var ?string */
    public $tenantId = null;
    /** @var ?'linkedin' | 'twitter' | 'telegram' */
    public $provider = null;
    /** @var ?bool */
    public $isActive = null;
    /** @var ?array<string, string> */
    public $config = null;
    /** @var ?ObjectId */
    public $updatedBy = null;
    /** @var ?DateTime */
    public $updatedAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('tenantId', $data)) {
            $instance->tenantId = $data['tenantId'];
        }
        if (array_key_exists('provider', $data)) {
            $instance->provider = $data['provider'];
        }
        if (array_key_exists('isActive', $data)) {
            $instance->isActive = $data['isActive'];
        }
        if (array_key_exists('config', $data)) {
            $instance->config = $data['config'];
        }
        if (array_key_exists('updatedBy', $data)) {
            $instance->updatedBy = $data['updatedBy'];
        }
        if (array_key_exists('updatedAt', $data)) {
            $instance->updatedAt = $data['updatedAt'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SocialConnectionList
{
    /** @var ?SocialConnection[] */
    public $connections = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('connections', $data)) {
            $instance->connections = $data['connections'];
        }

        $nested = [
            'connections' => static fn (array $v): array => array_map(static fn ($x) => SocialConnection::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SocialPublishResult
{
    /** @var ?'linkedin' | 'twitter' | 'telegram' */
    public $provider = null;
    /** @var ?string */
    public $postId = null;
    /** @var ?float */
    public $messageId = null;
    /** @var ?string */
    public $tweetId = null;
    /** @var ?string */
    public $chatId = null;
    /** @var ?float */
    public $status = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('provider', $data)) {
            $instance->provider = $data['provider'];
        }
        if (array_key_exists('postId', $data)) {
            $instance->postId = $data['postId'];
        }
        if (array_key_exists('messageId', $data)) {
            $instance->messageId = $data['messageId'];
        }
        if (array_key_exists('tweetId', $data)) {
            $instance->tweetId = $data['tweetId'];
        }
        if (array_key_exists('chatId', $data)) {
            $instance->chatId = $data['chatId'];
        }
        if (array_key_exists('status', $data)) {
            $instance->status = $data['status'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ConversationStart
{
    /** @var ?string */
    public $conversationId = null;
    /** @var ?'gathering' | 'planning' | 'generating' | 'review' */
    public $stage = null;
    /** @var ?string[] */
    public $questions = null;
    /** @var ?DateTime */
    public $expiresAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('conversationId', $data)) {
            $instance->conversationId = $data['conversationId'];
        }
        if (array_key_exists('stage', $data)) {
            $instance->stage = $data['stage'];
        }
        if (array_key_exists('questions', $data)) {
            $instance->questions = $data['questions'];
        }
        if (array_key_exists('expiresAt', $data)) {
            $instance->expiresAt = $data['expiresAt'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ConversationGenerate
{
    /** @var string */
    public $conversationId = null;
    /** @var ?AIConversationArticle */
    public $article = null;
    /** @var ?float */
    public $seoScore = null;
    /** @var ?string[] */
    public $issues = null;
    /** @var ?float */
    public $attempts = null;
    /** @var ?float */
    public $maxAttempts = null;
    /** @var 'approved' | 'needs_improvement' | 'max_attempts_reached' */
    public $status = null;
    /** @var ?string */
    public $message = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('conversationId', $data)) {
            $instance->conversationId = $data['conversationId'];
        }
        if (array_key_exists('article', $data)) {
            $instance->article = $data['article'];
        }
        if (array_key_exists('seoScore', $data)) {
            $instance->seoScore = $data['seoScore'];
        }
        if (array_key_exists('issues', $data)) {
            $instance->issues = $data['issues'];
        }
        if (array_key_exists('attempts', $data)) {
            $instance->attempts = $data['attempts'];
        }
        if (array_key_exists('maxAttempts', $data)) {
            $instance->maxAttempts = $data['maxAttempts'];
        }
        if (array_key_exists('status', $data)) {
            $instance->status = $data['status'];
        }
        if (array_key_exists('message', $data)) {
            $instance->message = $data['message'];
        }

        $nested = [
            'article' => static fn (array $v): AIConversationArticle => AIConversationArticle::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class NeedsAttentionItem
{
    /** @var string */
    public $code = null;
    /** @var 'high' | 'medium' | 'low' */
    public $severity = null;
    /** @var 'article' | 'comment' | 'form' | 'submission' | 'translation' */
    public $entityType = null;
    /** @var ?string */
    public $entityId = null;
    /** @var ?ObjectId */
    public $articleId = null;
    /** @var string */
    public $message = null;
    /** @var ?float */
    public $count = null;
    /** @var ?string */
    public $locale = null;
    /** @var ?string */
    public $fixAction = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('code', $data)) {
            $instance->code = $data['code'];
        }
        if (array_key_exists('severity', $data)) {
            $instance->severity = $data['severity'];
        }
        if (array_key_exists('entityType', $data)) {
            $instance->entityType = $data['entityType'];
        }
        if (array_key_exists('entityId', $data)) {
            $instance->entityId = $data['entityId'];
        }
        if (array_key_exists('articleId', $data)) {
            $instance->articleId = $data['articleId'];
        }
        if (array_key_exists('message', $data)) {
            $instance->message = $data['message'];
        }
        if (array_key_exists('count', $data)) {
            $instance->count = $data['count'];
        }
        if (array_key_exists('locale', $data)) {
            $instance->locale = $data['locale'];
        }
        if (array_key_exists('fixAction', $data)) {
            $instance->fixAction = $data['fixAction'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class NeedsAttentionReport
{
    /** @var DateTime */
    public $generatedAt = null;
    /** @var NeedsAttentionItem[] */
    public $items = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('generatedAt', $data)) {
            $instance->generatedAt = $data['generatedAt'];
        }
        if (array_key_exists('items', $data)) {
            $instance->items = $data['items'];
        }

        $nested = [
            'items' => static fn (array $v): array => array_map(static fn ($x) => NeedsAttentionItem::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SubmissionAnalysis
{
    /** @var ?ObjectId */
    public $_id = null;
    /** @var ?ObjectId */
    public $tenantId = null;
    /** @var ?ObjectId */
    public $submissionId = null;
    /** @var ?ObjectId */
    public $formId = null;
    /** @var ?string */
    public $summary = null;
    /** @var ?'lead' | 'support' | 'feedback' | 'spam' | 'other' */
    public $category = null;
    /** @var ?'low' | 'normal' | 'high' | 'urgent' */
    public $priority = null;
    /** @var ?'positive' | 'neutral' | 'negative' | 'mixed' */
    public $sentiment = null;
    /** @var ?string */
    public $language = null;
    /** @var ?float */
    public $spamScore = null;
    /** @var ?array<string, mixed> */
    public $entities = null;
    /** @var ?string[] */
    public $topics = null;
    /** @var ?string */
    public $provider = null;
    /** @var ?string */
    public $providerModel = null;
    /** @var ?string */
    public $promptVersion = null;
    /** @var ?string */
    public $source = null;
    /** @var ?DateTime */
    public $analyzedAt = null;
    /** @var ?DateTime */
    public $createdAt = null;
    /** @var ?DateTime */
    public $updatedAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('_id', $data)) {
            $instance->_id = $data['_id'];
        }
        if (array_key_exists('tenantId', $data)) {
            $instance->tenantId = $data['tenantId'];
        }
        if (array_key_exists('submissionId', $data)) {
            $instance->submissionId = $data['submissionId'];
        }
        if (array_key_exists('formId', $data)) {
            $instance->formId = $data['formId'];
        }
        if (array_key_exists('summary', $data)) {
            $instance->summary = $data['summary'];
        }
        if (array_key_exists('category', $data)) {
            $instance->category = $data['category'];
        }
        if (array_key_exists('priority', $data)) {
            $instance->priority = $data['priority'];
        }
        if (array_key_exists('sentiment', $data)) {
            $instance->sentiment = $data['sentiment'];
        }
        if (array_key_exists('language', $data)) {
            $instance->language = $data['language'];
        }
        if (array_key_exists('spamScore', $data)) {
            $instance->spamScore = $data['spamScore'];
        }
        if (array_key_exists('entities', $data)) {
            $instance->entities = $data['entities'];
        }
        if (array_key_exists('topics', $data)) {
            $instance->topics = $data['topics'];
        }
        if (array_key_exists('provider', $data)) {
            $instance->provider = $data['provider'];
        }
        if (array_key_exists('providerModel', $data)) {
            $instance->providerModel = $data['providerModel'];
        }
        if (array_key_exists('promptVersion', $data)) {
            $instance->promptVersion = $data['promptVersion'];
        }
        if (array_key_exists('source', $data)) {
            $instance->source = $data['source'];
        }
        if (array_key_exists('analyzedAt', $data)) {
            $instance->analyzedAt = $data['analyzedAt'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }
        if (array_key_exists('updatedAt', $data)) {
            $instance->updatedAt = $data['updatedAt'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SubmissionActivity
{
    /** @var ?ObjectId */
    public $_id = null;
    /** @var ?'status' | 'assign' | 'note' | 'reply' | 'ai' | 'tag' */
    public $type = null;
    /** @var ?ObjectId */
    public $actorId = null;
    /** @var ?'user' | 'ai' | 'system' */
    public $actorType = null;
    /** @var ?array<string, mixed> */
    public $payload = null;
    /** @var ?DateTime */
    public $createdAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('_id', $data)) {
            $instance->_id = $data['_id'];
        }
        if (array_key_exists('type', $data)) {
            $instance->type = $data['type'];
        }
        if (array_key_exists('actorId', $data)) {
            $instance->actorId = $data['actorId'];
        }
        if (array_key_exists('actorType', $data)) {
            $instance->actorType = $data['actorType'];
        }
        if (array_key_exists('payload', $data)) {
            $instance->payload = $data['payload'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SubmissionReply
{
    /** @var ObjectId */
    public $_id = null;
    /** @var ObjectId */
    public $submissionId = null;
    /** @var ?string */
    public $channel = null;
    /** @var ?string */
    public $locale = null;
    /** @var string */
    public $subject = null;
    /** @var string */
    public $body = null;
    /** @var 'draft' | 'sent' | 'failed' */
    public $status = null;
    /** @var ?string */
    public $to = null;
    /** @var ?string */
    public $templateKey = null;
    /** @var ?'ai' | 'human' */
    public $draftSource = null;
    /** @var ?DateTime */
    public $sentAt = null;
    /** @var ?string */
    public $error = null;
    /** @var ?DateTime */
    public $createdAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('_id', $data)) {
            $instance->_id = $data['_id'];
        }
        if (array_key_exists('submissionId', $data)) {
            $instance->submissionId = $data['submissionId'];
        }
        if (array_key_exists('channel', $data)) {
            $instance->channel = $data['channel'];
        }
        if (array_key_exists('locale', $data)) {
            $instance->locale = $data['locale'];
        }
        if (array_key_exists('subject', $data)) {
            $instance->subject = $data['subject'];
        }
        if (array_key_exists('body', $data)) {
            $instance->body = $data['body'];
        }
        if (array_key_exists('status', $data)) {
            $instance->status = $data['status'];
        }
        if (array_key_exists('to', $data)) {
            $instance->to = $data['to'];
        }
        if (array_key_exists('templateKey', $data)) {
            $instance->templateKey = $data['templateKey'];
        }
        if (array_key_exists('draftSource', $data)) {
            $instance->draftSource = $data['draftSource'];
        }
        if (array_key_exists('sentAt', $data)) {
            $instance->sentAt = $data['sentAt'];
        }
        if (array_key_exists('error', $data)) {
            $instance->error = $data['error'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SubmissionAnalysisWrapper
{
    /** @var SubmissionAnalysis */
    public $analysis = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('analysis', $data)) {
            $instance->analysis = $data['analysis'];
        }

        $nested = [
            'analysis' => static fn (array $v): SubmissionAnalysis => SubmissionAnalysis::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SubmissionAnalysisResult
{
    /** @var SubmissionAnalysis */
    public $analysis = null;
    /** @var bool */
    public $spamApplied = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('analysis', $data)) {
            $instance->analysis = $data['analysis'];
        }
        if (array_key_exists('spamApplied', $data)) {
            $instance->spamApplied = $data['spamApplied'];
        }

        $nested = [
            'analysis' => static fn (array $v): SubmissionAnalysis => SubmissionAnalysis::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SubmissionBulkAnalysis
{
    /** @var array<string, mixed>[] */
    public $results = null;
    /** @var array<string, mixed> */
    public $summary = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('results', $data)) {
            $instance->results = $data['results'];
        }
        if (array_key_exists('summary', $data)) {
            $instance->summary = $data['summary'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SubmissionActivityList
{
    /** @var SubmissionActivity[] */
    public $activity = null;
    /** @var SubmissionReply[] */
    public $replies = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('activity', $data)) {
            $instance->activity = $data['activity'];
        }
        if (array_key_exists('replies', $data)) {
            $instance->replies = $data['replies'];
        }

        $nested = [
            'activity' => static fn (array $v): array => array_map(static fn ($x) => SubmissionActivity::fromArray($x), $v),
            'replies' => static fn (array $v): array => array_map(static fn ($x) => SubmissionReply::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SubmissionReplyWrapper
{
    /** @var SubmissionReply */
    public $reply = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('reply', $data)) {
            $instance->reply = $data['reply'];
        }

        $nested = [
            'reply' => static fn (array $v): SubmissionReply => SubmissionReply::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SubmissionActivityWrapper
{
    /** @var SubmissionActivity */
    public $activity = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('activity', $data)) {
            $instance->activity = $data['activity'];
        }

        $nested = [
            'activity' => static fn (array $v): SubmissionActivity => SubmissionActivity::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SubmissionInboxFacets
{
    /** @var ?array<string, float> */
    public $status = null;
    /** @var ?array<string, float> */
    public $category = null;
    /** @var ?array<string, float> */
    public $priority = null;
    /** @var ?array<string, mixed>[] */
    public $assignee = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('status', $data)) {
            $instance->status = $data['status'];
        }
        if (array_key_exists('category', $data)) {
            $instance->category = $data['category'];
        }
        if (array_key_exists('priority', $data)) {
            $instance->priority = $data['priority'];
        }
        if (array_key_exists('assignee', $data)) {
            $instance->assignee = $data['assignee'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SubmissionDetailWrapper
{
    /** @var FormSubmissionEnriched */
    public $submission = null;
    /** @var ?SubmissionActivity[] */
    public $activity = null;
    /** @var ?SubmissionReply[] */
    public $replies = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('submission', $data)) {
            $instance->submission = $data['submission'];
        }
        if (array_key_exists('activity', $data)) {
            $instance->activity = $data['activity'];
        }
        if (array_key_exists('replies', $data)) {
            $instance->replies = $data['replies'];
        }

        $nested = [
            'submission' => static fn (array $v): FormSubmissionEnriched => FormSubmissionEnriched::fromArray($v),
            'activity' => static fn (array $v): array => array_map(static fn ($x) => SubmissionActivity::fromArray($x), $v),
            'replies' => static fn (array $v): array => array_map(static fn ($x) => SubmissionReply::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SubmissionDigestAggregates
{
    /** @var ?DateTime */
    public $from = null;
    /** @var ?DateTime */
    public $to = null;
    /** @var ?float */
    public $total = null;
    /** @var ?float */
    public $previousTotal = null;
    /** @var ?array<string, float> */
    public $byCategory = null;
    /** @var ?array<string, float> */
    public $byPriority = null;
    /** @var ?array<string, float> */
    public $byStatus = null;
    /** @var ?array<string, float> */
    public $byLanguage = null;
    /** @var ?array<string, mixed>[] */
    public $byForm = null;
    /** @var ?float */
    public $urgentCount = null;
    /** @var ?float */
    public $spamCount = null;
    /** @var ?array<string, mixed>[] */
    public $topics = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('from', $data)) {
            $instance->from = $data['from'];
        }
        if (array_key_exists('to', $data)) {
            $instance->to = $data['to'];
        }
        if (array_key_exists('total', $data)) {
            $instance->total = $data['total'];
        }
        if (array_key_exists('previousTotal', $data)) {
            $instance->previousTotal = $data['previousTotal'];
        }
        if (array_key_exists('byCategory', $data)) {
            $instance->byCategory = $data['byCategory'];
        }
        if (array_key_exists('byPriority', $data)) {
            $instance->byPriority = $data['byPriority'];
        }
        if (array_key_exists('byStatus', $data)) {
            $instance->byStatus = $data['byStatus'];
        }
        if (array_key_exists('byLanguage', $data)) {
            $instance->byLanguage = $data['byLanguage'];
        }
        if (array_key_exists('byForm', $data)) {
            $instance->byForm = $data['byForm'];
        }
        if (array_key_exists('urgentCount', $data)) {
            $instance->urgentCount = $data['urgentCount'];
        }
        if (array_key_exists('spamCount', $data)) {
            $instance->spamCount = $data['spamCount'];
        }
        if (array_key_exists('topics', $data)) {
            $instance->topics = $data['topics'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SubmissionDigest
{
    /** @var SubmissionDigestAggregates */
    public $aggregates = null;
    /** @var ?string */
    public $headline = null;
    /** @var ?string */
    public $summary = null;
    /** @var ?array<string, mixed>[] */
    public $topics = null;
    /** @var ?array<string, mixed>[] */
    public $actions = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('aggregates', $data)) {
            $instance->aggregates = $data['aggregates'];
        }
        if (array_key_exists('headline', $data)) {
            $instance->headline = $data['headline'];
        }
        if (array_key_exists('summary', $data)) {
            $instance->summary = $data['summary'];
        }
        if (array_key_exists('topics', $data)) {
            $instance->topics = $data['topics'];
        }
        if (array_key_exists('actions', $data)) {
            $instance->actions = $data['actions'];
        }

        $nested = [
            'aggregates' => static fn (array $v): SubmissionDigestAggregates => SubmissionDigestAggregates::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SubmissionDigestWrapper
{
    /** @var SubmissionDigest */
    public $digest = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('digest', $data)) {
            $instance->digest = $data['digest'];
        }

        $nested = [
            'digest' => static fn (array $v): SubmissionDigest => SubmissionDigest::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class FormDraftField
{
    /** @var string */
    public $name = null;
    /** @var string */
    public $type = null;
    /** @var MultilingualString */
    public $label = null;
    /** @var ?MultilingualString */
    public $placeholder = null;
    /** @var bool */
    public $required = null;
    /** @var ?float */
    public $colSpan = null;
    /** @var ?array<string, mixed>[] */
    public $options = null;
    /** @var ?array<string, mixed> */
    public $validation = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('name', $data)) {
            $instance->name = $data['name'];
        }
        if (array_key_exists('type', $data)) {
            $instance->type = $data['type'];
        }
        if (array_key_exists('label', $data)) {
            $instance->label = $data['label'];
        }
        if (array_key_exists('placeholder', $data)) {
            $instance->placeholder = $data['placeholder'];
        }
        if (array_key_exists('required', $data)) {
            $instance->required = $data['required'];
        }
        if (array_key_exists('colSpan', $data)) {
            $instance->colSpan = $data['colSpan'];
        }
        if (array_key_exists('options', $data)) {
            $instance->options = $data['options'];
        }
        if (array_key_exists('validation', $data)) {
            $instance->validation = $data['validation'];
        }

        $nested = [
            'label' => static fn (array $v): MultilingualString => MultilingualString::fromArray($v),
            'placeholder' => static fn (array $v): MultilingualString => MultilingualString::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class FormDraft
{
    /** @var MultilingualString */
    public $title = null;
    /** @var string */
    public $slug = null;
    /** @var ?MultilingualString */
    public $description = null;
    /** @var ?MultilingualString */
    public $submitButtonText = null;
    /** @var ?'public' | 'internal' */
    public $formType = null;
    /** @var array<string, mixed>[] */
    public $sections = null;
    /** @var ?array<string, mixed> */
    public $captcha = null;
    /** @var ?float */
    public $fieldCount = null;
    /** @var ?bool */
    public $truncated = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('title', $data)) {
            $instance->title = $data['title'];
        }
        if (array_key_exists('slug', $data)) {
            $instance->slug = $data['slug'];
        }
        if (array_key_exists('description', $data)) {
            $instance->description = $data['description'];
        }
        if (array_key_exists('submitButtonText', $data)) {
            $instance->submitButtonText = $data['submitButtonText'];
        }
        if (array_key_exists('formType', $data)) {
            $instance->formType = $data['formType'];
        }
        if (array_key_exists('sections', $data)) {
            $instance->sections = $data['sections'];
        }
        if (array_key_exists('captcha', $data)) {
            $instance->captcha = $data['captcha'];
        }
        if (array_key_exists('fieldCount', $data)) {
            $instance->fieldCount = $data['fieldCount'];
        }
        if (array_key_exists('truncated', $data)) {
            $instance->truncated = $data['truncated'];
        }

        $nested = [
            'title' => static fn (array $v): MultilingualString => MultilingualString::fromArray($v),
            'description' => static fn (array $v): MultilingualString => MultilingualString::fromArray($v),
            'submitButtonText' => static fn (array $v): MultilingualString => MultilingualString::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class FormDraftWrapper
{
    /** @var FormDraft */
    public $draft = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('draft', $data)) {
            $instance->draft = $data['draft'];
        }

        $nested = [
            'draft' => static fn (array $v): FormDraft => FormDraft::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class FormImproveSuggestion
{
    /** @var ?string */
    public $fieldName = null;
    /** @var ?string */
    public $kind = null;
    /** @var ?string */
    public $current = null;
    /** @var ?string */
    public $proposed = null;
    /** @var ?string */
    public $reason = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('fieldName', $data)) {
            $instance->fieldName = $data['fieldName'];
        }
        if (array_key_exists('kind', $data)) {
            $instance->kind = $data['kind'];
        }
        if (array_key_exists('current', $data)) {
            $instance->current = $data['current'];
        }
        if (array_key_exists('proposed', $data)) {
            $instance->proposed = $data['proposed'];
        }
        if (array_key_exists('reason', $data)) {
            $instance->reason = $data['reason'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class FormImproveWrapper
{
    /** @var ?string */
    public $formId = null;
    /** @var ?string */
    public $summary = null;
    /** @var FormImproveSuggestion[] */
    public $suggestions = null;
    /** @var ?string[] */
    public $reorder = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('formId', $data)) {
            $instance->formId = $data['formId'];
        }
        if (array_key_exists('summary', $data)) {
            $instance->summary = $data['summary'];
        }
        if (array_key_exists('suggestions', $data)) {
            $instance->suggestions = $data['suggestions'];
        }
        if (array_key_exists('reorder', $data)) {
            $instance->reorder = $data['reorder'];
        }

        $nested = [
            'suggestions' => static fn (array $v): array => array_map(static fn ($x) => FormImproveSuggestion::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class CommentModeration
{
    /** @var ?ObjectId */
    public $_id = null;
    /** @var ?ObjectId */
    public $tenantId = null;
    /** @var ?ObjectId */
    public $commentId = null;
    /** @var ?ObjectId */
    public $articleId = null;
    /** @var ?float */
    public $toxicity = null;
    /** @var ?float */
    public $spamScore = null;
    /** @var ?'positive' | 'neutral' | 'negative' | 'mixed' */
    public $sentiment = null;
    /** @var ?string */
    public $language = null;
    /** @var ?'approve' | 'hold' | 'reject' */
    public $decision = null;
    /** @var ?string[] */
    public $reasons = null;
    /** @var ?array<string, mixed> */
    public $suggestedReply = null;
    /** @var ?bool */
    public $autoApplied = null;
    /** @var ?string */
    public $provider = null;
    /** @var ?string */
    public $providerModel = null;
    /** @var ?string */
    public $promptVersion = null;
    /** @var ?DateTime */
    public $analyzedAt = null;
    /** @var ?DateTime */
    public $createdAt = null;
    /** @var ?DateTime */
    public $updatedAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('_id', $data)) {
            $instance->_id = $data['_id'];
        }
        if (array_key_exists('tenantId', $data)) {
            $instance->tenantId = $data['tenantId'];
        }
        if (array_key_exists('commentId', $data)) {
            $instance->commentId = $data['commentId'];
        }
        if (array_key_exists('articleId', $data)) {
            $instance->articleId = $data['articleId'];
        }
        if (array_key_exists('toxicity', $data)) {
            $instance->toxicity = $data['toxicity'];
        }
        if (array_key_exists('spamScore', $data)) {
            $instance->spamScore = $data['spamScore'];
        }
        if (array_key_exists('sentiment', $data)) {
            $instance->sentiment = $data['sentiment'];
        }
        if (array_key_exists('language', $data)) {
            $instance->language = $data['language'];
        }
        if (array_key_exists('decision', $data)) {
            $instance->decision = $data['decision'];
        }
        if (array_key_exists('reasons', $data)) {
            $instance->reasons = $data['reasons'];
        }
        if (array_key_exists('suggestedReply', $data)) {
            $instance->suggestedReply = $data['suggestedReply'];
        }
        if (array_key_exists('autoApplied', $data)) {
            $instance->autoApplied = $data['autoApplied'];
        }
        if (array_key_exists('provider', $data)) {
            $instance->provider = $data['provider'];
        }
        if (array_key_exists('providerModel', $data)) {
            $instance->providerModel = $data['providerModel'];
        }
        if (array_key_exists('promptVersion', $data)) {
            $instance->promptVersion = $data['promptVersion'];
        }
        if (array_key_exists('analyzedAt', $data)) {
            $instance->analyzedAt = $data['analyzedAt'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }
        if (array_key_exists('updatedAt', $data)) {
            $instance->updatedAt = $data['updatedAt'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class CommentModerationSummary
{
    /** @var ?ObjectId */
    public $_id = null;
    /** @var ?float */
    public $toxicity = null;
    /** @var ?float */
    public $spamScore = null;
    /** @var ?string */
    public $sentiment = null;
    /** @var ?string */
    public $language = null;
    /** @var ?'approve' | 'hold' | 'reject' */
    public $decision = null;
    /** @var ?string[] */
    public $reasons = null;
    /** @var ?bool */
    public $autoApplied = null;
    /** @var ?DateTime */
    public $analyzedAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('_id', $data)) {
            $instance->_id = $data['_id'];
        }
        if (array_key_exists('toxicity', $data)) {
            $instance->toxicity = $data['toxicity'];
        }
        if (array_key_exists('spamScore', $data)) {
            $instance->spamScore = $data['spamScore'];
        }
        if (array_key_exists('sentiment', $data)) {
            $instance->sentiment = $data['sentiment'];
        }
        if (array_key_exists('language', $data)) {
            $instance->language = $data['language'];
        }
        if (array_key_exists('decision', $data)) {
            $instance->decision = $data['decision'];
        }
        if (array_key_exists('reasons', $data)) {
            $instance->reasons = $data['reasons'];
        }
        if (array_key_exists('autoApplied', $data)) {
            $instance->autoApplied = $data['autoApplied'];
        }
        if (array_key_exists('analyzedAt', $data)) {
            $instance->analyzedAt = $data['analyzedAt'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ModerationResultWrapper
{
    /** @var CommentModeration */
    public $moderation = null;
    /** @var ?'pending' | 'approved' | 'rejected' | 'null' */
    public $nextStatus = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('moderation', $data)) {
            $instance->moderation = $data['moderation'];
        }
        if (array_key_exists('nextStatus', $data)) {
            $instance->nextStatus = $data['nextStatus'];
        }

        $nested = [
            'moderation' => static fn (array $v): CommentModeration => CommentModeration::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class CommentReplyDraft
{
    /** @var string */
    public $body = null;
    /** @var ?string */
    public $locale = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('body', $data)) {
            $instance->body = $data['body'];
        }
        if (array_key_exists('locale', $data)) {
            $instance->locale = $data['locale'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class CommentReplyDraftWrapper
{
    /** @var CommentReplyDraft */
    public $reply = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('reply', $data)) {
            $instance->reply = $data['reply'];
        }

        $nested = [
            'reply' => static fn (array $v): CommentReplyDraft => CommentReplyDraft::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class MinedQuestionIdea
{
    /** @var string */
    public $topic = null;
    /** @var ?string */
    public $angle = null;
    /** @var ?float */
    public $questionCount = null;
    /** @var ?string[] */
    public $exampleQuestionIds = null;
    /** @var ?string */
    public $primaryKeyword = null;
    /** @var ?'awareness' | 'consideration' | 'conversion' */
    public $funnelStage = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('topic', $data)) {
            $instance->topic = $data['topic'];
        }
        if (array_key_exists('angle', $data)) {
            $instance->angle = $data['angle'];
        }
        if (array_key_exists('questionCount', $data)) {
            $instance->questionCount = $data['questionCount'];
        }
        if (array_key_exists('exampleQuestionIds', $data)) {
            $instance->exampleQuestionIds = $data['exampleQuestionIds'];
        }
        if (array_key_exists('primaryKeyword', $data)) {
            $instance->primaryKeyword = $data['primaryKeyword'];
        }
        if (array_key_exists('funnelStage', $data)) {
            $instance->funnelStage = $data['funnelStage'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class MinedQuestionsWrapper
{
    /** @var MinedQuestionIdea[] */
    public $ideas = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('ideas', $data)) {
            $instance->ideas = $data['ideas'];
        }

        $nested = [
            'ideas' => static fn (array $v): array => array_map(static fn ($x) => MinedQuestionIdea::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class EffectiveModerationPolicy
{
    /** @var ?'always' | 'if_safe' | 'never' */
    public $mode = null;
    /** @var ?float */
    public $maxToxicity = null;
    /** @var ?float */
    public $maxSpamScore = null;
    /** @var ?float */
    public $autoRejectSpamScore = null;
    /** @var ?float */
    public $maxLinks = null;
    /** @var ?string[] */
    public $blockedTerms = null;
    /** @var ?string[] */
    public $reasons = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('mode', $data)) {
            $instance->mode = $data['mode'];
        }
        if (array_key_exists('maxToxicity', $data)) {
            $instance->maxToxicity = $data['maxToxicity'];
        }
        if (array_key_exists('maxSpamScore', $data)) {
            $instance->maxSpamScore = $data['maxSpamScore'];
        }
        if (array_key_exists('autoRejectSpamScore', $data)) {
            $instance->autoRejectSpamScore = $data['autoRejectSpamScore'];
        }
        if (array_key_exists('maxLinks', $data)) {
            $instance->maxLinks = $data['maxLinks'];
        }
        if (array_key_exists('blockedTerms', $data)) {
            $instance->blockedTerms = $data['blockedTerms'];
        }
        if (array_key_exists('reasons', $data)) {
            $instance->reasons = $data['reasons'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class EffectivePolicyWrapper
{
    /** @var EffectiveModerationPolicy */
    public $policy = null;
    /** @var ?string */
    public $articleId = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('policy', $data)) {
            $instance->policy = $data['policy'];
        }
        if (array_key_exists('articleId', $data)) {
            $instance->articleId = $data['articleId'];
        }

        $nested = [
            'policy' => static fn (array $v): EffectiveModerationPolicy => EffectiveModerationPolicy::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiFeatureFlags
{
    /** @var ?bool */
    public $copilot = null;
    /** @var ?bool */
    public $autofill = null;
    /** @var ?bool */
    public $inline = null;
    /** @var ?bool */
    public $bulk = null;
    /** @var ?bool */
    public $forms = null;
    /** @var ?bool */
    public $submissions = null;
    /** @var ?bool */
    public $comments = null;
    /** @var ?bool */
    public $calendar = null;
    /** @var ?bool */
    public $seo = null;
    /** @var ?bool */
    public $brandVoice = null;
    /** @var ?bool */
    public $jobs = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('copilot', $data)) {
            $instance->copilot = $data['copilot'];
        }
        if (array_key_exists('autofill', $data)) {
            $instance->autofill = $data['autofill'];
        }
        if (array_key_exists('inline', $data)) {
            $instance->inline = $data['inline'];
        }
        if (array_key_exists('bulk', $data)) {
            $instance->bulk = $data['bulk'];
        }
        if (array_key_exists('forms', $data)) {
            $instance->forms = $data['forms'];
        }
        if (array_key_exists('submissions', $data)) {
            $instance->submissions = $data['submissions'];
        }
        if (array_key_exists('comments', $data)) {
            $instance->comments = $data['comments'];
        }
        if (array_key_exists('calendar', $data)) {
            $instance->calendar = $data['calendar'];
        }
        if (array_key_exists('seo', $data)) {
            $instance->seo = $data['seo'];
        }
        if (array_key_exists('brandVoice', $data)) {
            $instance->brandVoice = $data['brandVoice'];
        }
        if (array_key_exists('jobs', $data)) {
            $instance->jobs = $data['jobs'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiAutoApplyPolicy
{
    /** @var ?'never' | 'safe' | 'always' */
    public $copilot = null;
    /** @var ?'never' | 'safe' | 'always' */
    public $autofill = null;
    /** @var ?'never' | 'safe' | 'always' */
    public $inline = null;
    /** @var ?'never' | 'safe' | 'always' */
    public $bulk = null;
    /** @var ?'never' | 'safe' | 'always' */
    public $forms = null;
    /** @var ?'never' | 'safe' | 'always' */
    public $submissions = null;
    /** @var ?'never' | 'safe' | 'always' */
    public $comments = null;
    /** @var ?'never' | 'safe' | 'always' */
    public $calendar = null;
    /** @var ?'never' | 'safe' | 'always' */
    public $seo = null;
    /** @var ?'never' | 'safe' | 'always' */
    public $brandVoice = null;
    /** @var ?'never' | 'safe' | 'always' */
    public $jobs = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('copilot', $data)) {
            $instance->copilot = $data['copilot'];
        }
        if (array_key_exists('autofill', $data)) {
            $instance->autofill = $data['autofill'];
        }
        if (array_key_exists('inline', $data)) {
            $instance->inline = $data['inline'];
        }
        if (array_key_exists('bulk', $data)) {
            $instance->bulk = $data['bulk'];
        }
        if (array_key_exists('forms', $data)) {
            $instance->forms = $data['forms'];
        }
        if (array_key_exists('submissions', $data)) {
            $instance->submissions = $data['submissions'];
        }
        if (array_key_exists('comments', $data)) {
            $instance->comments = $data['comments'];
        }
        if (array_key_exists('calendar', $data)) {
            $instance->calendar = $data['calendar'];
        }
        if (array_key_exists('seo', $data)) {
            $instance->seo = $data['seo'];
        }
        if (array_key_exists('brandVoice', $data)) {
            $instance->brandVoice = $data['brandVoice'];
        }
        if (array_key_exists('jobs', $data)) {
            $instance->jobs = $data['jobs'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class BrandVoiceProfile
{
    /** @var ?string */
    public $tone = null;
    /** @var ?string */
    public $audience = null;
    /** @var ?string */
    public $readingLevel = null;
    /** @var ?string[] */
    public $do = null;
    /** @var ?string[] */
    public $dont = null;
    /** @var ?string[] */
    public $bannedTerms = null;
    /** @var ?string[] */
    public $examples = null;
    /** @var ?'formal' | 'neutral' | 'casual' | 'null' */
    public $persianRegister = null;
    /** @var ?float */
    public $version = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('tone', $data)) {
            $instance->tone = $data['tone'];
        }
        if (array_key_exists('audience', $data)) {
            $instance->audience = $data['audience'];
        }
        if (array_key_exists('readingLevel', $data)) {
            $instance->readingLevel = $data['readingLevel'];
        }
        if (array_key_exists('do', $data)) {
            $instance->do = $data['do'];
        }
        if (array_key_exists('dont', $data)) {
            $instance->dont = $data['dont'];
        }
        if (array_key_exists('bannedTerms', $data)) {
            $instance->bannedTerms = $data['bannedTerms'];
        }
        if (array_key_exists('examples', $data)) {
            $instance->examples = $data['examples'];
        }
        if (array_key_exists('persianRegister', $data)) {
            $instance->persianRegister = $data['persianRegister'];
        }
        if (array_key_exists('version', $data)) {
            $instance->version = $data['version'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class LegacyGlossaryEntry
{
    /** @var ?string */
    public $term = null;
    /** @var ?string */
    public $translation = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('term', $data)) {
            $instance->term = $data['term'];
        }
        if (array_key_exists('translation', $data)) {
            $instance->translation = $data['translation'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiSettings
{
    /** @var ?string */
    public $brandVoice = null;
    /** @var ?LegacyGlossaryEntry[] */
    public $glossary = null;
    /** @var ?string */
    public $brandVoiceVersion = null;
    /** @var ?bool */
    public $autoApply = null;
    /** @var ?'fast' | 'balanced' | 'strong' | 'null' */
    public $defaultTier = null;
    /** @var AiFeatureFlags */
    public $featureFlags = null;
    /** @var AiAutoApplyPolicy */
    public $autoApplyPolicy = null;
    /** @var ?float */
    public $dailyQuotaPerUser = null;
    /** @var ?string[] */
    public $defaultLocales = null;
    /** @var array<string, mixed> */
    public $piiMasking = null;
    /** @var float */
    public $retentionDays = null;
    /** @var ?array<string, 'fast' | 'balanced' | 'strong'> */
    public $modelTierOverrides = null;
    /** @var ?BrandVoiceProfile */
    public $brandVoiceProfile = null;
    /** @var ?DateTime */
    public $createdAt = null;
    /** @var ?DateTime */
    public $updatedAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('brandVoice', $data)) {
            $instance->brandVoice = $data['brandVoice'];
        }
        if (array_key_exists('glossary', $data)) {
            $instance->glossary = $data['glossary'];
        }
        if (array_key_exists('brandVoiceVersion', $data)) {
            $instance->brandVoiceVersion = $data['brandVoiceVersion'];
        }
        if (array_key_exists('autoApply', $data)) {
            $instance->autoApply = $data['autoApply'];
        }
        if (array_key_exists('defaultTier', $data)) {
            $instance->defaultTier = $data['defaultTier'];
        }
        if (array_key_exists('featureFlags', $data)) {
            $instance->featureFlags = $data['featureFlags'];
        }
        if (array_key_exists('autoApplyPolicy', $data)) {
            $instance->autoApplyPolicy = $data['autoApplyPolicy'];
        }
        if (array_key_exists('dailyQuotaPerUser', $data)) {
            $instance->dailyQuotaPerUser = $data['dailyQuotaPerUser'];
        }
        if (array_key_exists('defaultLocales', $data)) {
            $instance->defaultLocales = $data['defaultLocales'];
        }
        if (array_key_exists('piiMasking', $data)) {
            $instance->piiMasking = $data['piiMasking'];
        }
        if (array_key_exists('retentionDays', $data)) {
            $instance->retentionDays = $data['retentionDays'];
        }
        if (array_key_exists('modelTierOverrides', $data)) {
            $instance->modelTierOverrides = $data['modelTierOverrides'];
        }
        if (array_key_exists('brandVoiceProfile', $data)) {
            $instance->brandVoiceProfile = $data['brandVoiceProfile'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }
        if (array_key_exists('updatedAt', $data)) {
            $instance->updatedAt = $data['updatedAt'];
        }

        $nested = [
            'glossary' => static fn (array $v): array => array_map(static fn ($x) => LegacyGlossaryEntry::fromArray($x), $v),
            'featureFlags' => static fn (array $v): AiFeatureFlags => AiFeatureFlags::fromArray($v),
            'autoApplyPolicy' => static fn (array $v): AiAutoApplyPolicy => AiAutoApplyPolicy::fromArray($v),
            'brandVoiceProfile' => static fn (array $v): BrandVoiceProfile => BrandVoiceProfile::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class BrandVoiceSettings
{
    /** @var ?string */
    public $brandVoice = null;
    /** @var ?LegacyGlossaryEntry[] */
    public $glossary = null;
    /** @var ?BrandVoiceProfile */
    public $brandVoiceProfile = null;
    /** @var ?string */
    public $brandVoiceVersion = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('brandVoice', $data)) {
            $instance->brandVoice = $data['brandVoice'];
        }
        if (array_key_exists('glossary', $data)) {
            $instance->glossary = $data['glossary'];
        }
        if (array_key_exists('brandVoiceProfile', $data)) {
            $instance->brandVoiceProfile = $data['brandVoiceProfile'];
        }
        if (array_key_exists('brandVoiceVersion', $data)) {
            $instance->brandVoiceVersion = $data['brandVoiceVersion'];
        }

        $nested = [
            'glossary' => static fn (array $v): array => array_map(static fn ($x) => LegacyGlossaryEntry::fromArray($x), $v),
            'brandVoiceProfile' => static fn (array $v): BrandVoiceProfile => BrandVoiceProfile::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class CreditSnapshot
{
    /** @var string */
    public $period = null;
    /** @var float */
    public $used = null;
    /** @var float */
    public $reserved = null;
    /** @var float */
    public $limit = null;
    /** @var float */
    public $remaining = null;
    /** @var float */
    public $available = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('period', $data)) {
            $instance->period = $data['period'];
        }
        if (array_key_exists('used', $data)) {
            $instance->used = $data['used'];
        }
        if (array_key_exists('reserved', $data)) {
            $instance->reserved = $data['reserved'];
        }
        if (array_key_exists('limit', $data)) {
            $instance->limit = $data['limit'];
        }
        if (array_key_exists('remaining', $data)) {
            $instance->remaining = $data['remaining'];
        }
        if (array_key_exists('available', $data)) {
            $instance->available = $data['available'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class TokenEstimate
{
    /** @var string */
    public $actionId = null;
    /** @var float */
    public $estimatedTokens = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('actionId', $data)) {
            $instance->actionId = $data['actionId'];
        }
        if (array_key_exists('estimatedTokens', $data)) {
            $instance->estimatedTokens = $data['estimatedTokens'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiRunSubmission
{
    /** @var string */
    public $runId = null;
    /** @var string */
    public $mode = null;
    /** @var float */
    public $estimatedTokens = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('runId', $data)) {
            $instance->runId = $data['runId'];
        }
        if (array_key_exists('mode', $data)) {
            $instance->mode = $data['mode'];
        }
        if (array_key_exists('estimatedTokens', $data)) {
            $instance->estimatedTokens = $data['estimatedTokens'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiRunInsufficientCredits
{
    /** @var 'AI_INSUFFICIENT_CREDITS' */
    public $reason = null;
    /** @var float */
    public $used = null;
    /** @var float */
    public $reserved = null;
    /** @var float */
    public $limit = null;
    /** @var float */
    public $estimate = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('reason', $data)) {
            $instance->reason = $data['reason'];
        }
        if (array_key_exists('used', $data)) {
            $instance->used = $data['used'];
        }
        if (array_key_exists('reserved', $data)) {
            $instance->reserved = $data['reserved'];
        }
        if (array_key_exists('limit', $data)) {
            $instance->limit = $data['limit'];
        }
        if (array_key_exists('estimate', $data)) {
            $instance->estimate = $data['estimate'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiRunConflict
{
    /** @var string */
    public $runId = null;
    /** @var 'already_running' */
    public $status = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('runId', $data)) {
            $instance->runId = $data['runId'];
        }
        if (array_key_exists('status', $data)) {
            $instance->status = $data['status'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiRunListItem
{
    /** @var string */
    public $runId = null;
    /** @var string */
    public $actionId = null;
    /** @var 'reserved' | 'settled' | 'refunded' | 'void' | 'cancelled' */
    public $status = null;
    /** @var float */
    public $estimated = null;
    /** @var ?float */
    public $actual = null;
    /** @var ?string */
    public $reason = null;
    /** @var ?string */
    public $outcome = null;
    /** @var ?array<string, mixed> */
    public $meta = null;
    /** @var ?array<string, mixed> */
    public $result = null;
    /** @var ?string */
    public $createdAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('runId', $data)) {
            $instance->runId = $data['runId'];
        }
        if (array_key_exists('actionId', $data)) {
            $instance->actionId = $data['actionId'];
        }
        if (array_key_exists('status', $data)) {
            $instance->status = $data['status'];
        }
        if (array_key_exists('estimated', $data)) {
            $instance->estimated = $data['estimated'];
        }
        if (array_key_exists('actual', $data)) {
            $instance->actual = $data['actual'];
        }
        if (array_key_exists('reason', $data)) {
            $instance->reason = $data['reason'];
        }
        if (array_key_exists('outcome', $data)) {
            $instance->outcome = $data['outcome'];
        }
        if (array_key_exists('meta', $data)) {
            $instance->meta = $data['meta'];
        }
        if (array_key_exists('result', $data)) {
            $instance->result = $data['result'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiRunList
{
    /** @var AiRunListItem[] */
    public $runs = null;
    /** @var ?Pagination */
    public $pagination = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('runs', $data)) {
            $instance->runs = $data['runs'];
        }
        if (array_key_exists('pagination', $data)) {
            $instance->pagination = $data['pagination'];
        }

        $nested = [
            'runs' => static fn (array $v): array => array_map(static fn ($x) => AiRunListItem::fromArray($x), $v),
            'pagination' => static fn (array $v): Pagination => Pagination::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiRunAccepted
{
    /** @var string */
    public $runId = null;
    /** @var ?'inline' | 'queued' */
    public $mode = null;
    /** @var ?float */
    public $estimatedTokens = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('runId', $data)) {
            $instance->runId = $data['runId'];
        }
        if (array_key_exists('mode', $data)) {
            $instance->mode = $data['mode'];
        }
        if (array_key_exists('estimatedTokens', $data)) {
            $instance->estimatedTokens = $data['estimatedTokens'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiProposalPatch
{
    /** @var string */
    public $path = null;
    /** @var ?string */
    public $lang = null;
    /** @var ?string */
    public $key = null;
    /** @var ?mixed */
    public $before = null;
    /** @var mixed */
    public $after = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('path', $data)) {
            $instance->path = $data['path'];
        }
        if (array_key_exists('lang', $data)) {
            $instance->lang = $data['lang'];
        }
        if (array_key_exists('key', $data)) {
            $instance->key = $data['key'];
        }
        if (array_key_exists('before', $data)) {
            $instance->before = $data['before'];
        }
        if (array_key_exists('after', $data)) {
            $instance->after = $data['after'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiProposal
{
    /** @var ObjectId */
    public $_id = null;
    /** @var ?string */
    public $tenantId = null;
    /** @var string */
    public $articleId = null;
    /** @var string */
    public $actionId = null;
    /** @var 'pending' | 'accepted' | 'rejected' | 'reverted' | 'expired' */
    public $status = null;
    /** @var ?string */
    public $createdByUserId = null;
    /** @var ?string */
    public $decidedByUserId = null;
    /** @var ?string */
    public $locale = null;
    /** @var AiProposalPatch[] */
    public $patches = null;
    /** @var ?string */
    public $baseHash = null;
    /** @var ?string */
    public $decidedAt = null;
    /** @var ?DateTime */
    public $createdAt = null;
    /** @var ?DateTime */
    public $updatedAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('_id', $data)) {
            $instance->_id = $data['_id'];
        }
        if (array_key_exists('tenantId', $data)) {
            $instance->tenantId = $data['tenantId'];
        }
        if (array_key_exists('articleId', $data)) {
            $instance->articleId = $data['articleId'];
        }
        if (array_key_exists('actionId', $data)) {
            $instance->actionId = $data['actionId'];
        }
        if (array_key_exists('status', $data)) {
            $instance->status = $data['status'];
        }
        if (array_key_exists('createdByUserId', $data)) {
            $instance->createdByUserId = $data['createdByUserId'];
        }
        if (array_key_exists('decidedByUserId', $data)) {
            $instance->decidedByUserId = $data['decidedByUserId'];
        }
        if (array_key_exists('locale', $data)) {
            $instance->locale = $data['locale'];
        }
        if (array_key_exists('patches', $data)) {
            $instance->patches = $data['patches'];
        }
        if (array_key_exists('baseHash', $data)) {
            $instance->baseHash = $data['baseHash'];
        }
        if (array_key_exists('decidedAt', $data)) {
            $instance->decidedAt = $data['decidedAt'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }
        if (array_key_exists('updatedAt', $data)) {
            $instance->updatedAt = $data['updatedAt'];
        }

        $nested = [
            'patches' => static fn (array $v): array => array_map(static fn ($x) => AiProposalPatch::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiProposalCount
{
    /** @var float */
    public $count = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('count', $data)) {
            $instance->count = $data['count'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiProposalDecision
{
    /** @var AiProposal */
    public $proposal = null;
    /** @var AiProposalPatch[] */
    public $appliedPatches = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('proposal', $data)) {
            $instance->proposal = $data['proposal'];
        }
        if (array_key_exists('appliedPatches', $data)) {
            $instance->appliedPatches = $data['appliedPatches'];
        }

        $nested = [
            'proposal' => static fn (array $v): AiProposal => AiProposal::fromArray($v),
            'appliedPatches' => static fn (array $v): array => array_map(static fn ($x) => AiProposalPatch::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiProposalStale
{
    /** @var 'AI_PROPOSAL_STALE' | 'AI_PROPOSAL_INVALID_STATE' */
    public $reason = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('reason', $data)) {
            $instance->reason = $data['reason'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiProposalBulkResultItem
{
    /** @var string */
    public $id = null;
    /** @var 'accepted' | 'failed' */
    public $status = null;
    /** @var ?string */
    public $reason = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('id', $data)) {
            $instance->id = $data['id'];
        }
        if (array_key_exists('status', $data)) {
            $instance->status = $data['status'];
        }
        if (array_key_exists('reason', $data)) {
            $instance->reason = $data['reason'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiAutofillResult
{
    /** @var string */
    public $proposalId = null;
    /** @var string[] */
    public $filled = null;
    /** @var string[] */
    public $skipped = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('proposalId', $data)) {
            $instance->proposalId = $data['proposalId'];
        }
        if (array_key_exists('filled', $data)) {
            $instance->filled = $data['filled'];
        }
        if (array_key_exists('skipped', $data)) {
            $instance->skipped = $data['skipped'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ArticleRevisionSnapshot
{
    /** @var ?string */
    public $mainTitle = null;
    /** @var ?string */
    public $summary = null;
    /** @var ?string */
    public $content = null;
    /** @var ?string[] */
    public $tags = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('mainTitle', $data)) {
            $instance->mainTitle = $data['mainTitle'];
        }
        if (array_key_exists('summary', $data)) {
            $instance->summary = $data['summary'];
        }
        if (array_key_exists('content', $data)) {
            $instance->content = $data['content'];
        }
        if (array_key_exists('tags', $data)) {
            $instance->tags = $data['tags'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ArticleRevision
{
    /** @var ObjectId */
    public $_id = null;
    /** @var string */
    public $articleId = null;
    /** @var string */
    public $locale = null;
    /** @var 'manual' | 'ai' | 'restore' | 'system' | 'seed' */
    public $source = null;
    /** @var ?string */
    public $userId = null;
    /** @var ?string */
    public $aiProposalId = null;
    /** @var ?string */
    public $restoredFrom = null;
    /** @var ArticleRevisionSnapshot */
    public $snapshot = null;
    /** @var ?DateTime */
    public $createdAt = null;
    /** @var ?DateTime */
    public $updatedAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('_id', $data)) {
            $instance->_id = $data['_id'];
        }
        if (array_key_exists('articleId', $data)) {
            $instance->articleId = $data['articleId'];
        }
        if (array_key_exists('locale', $data)) {
            $instance->locale = $data['locale'];
        }
        if (array_key_exists('source', $data)) {
            $instance->source = $data['source'];
        }
        if (array_key_exists('userId', $data)) {
            $instance->userId = $data['userId'];
        }
        if (array_key_exists('aiProposalId', $data)) {
            $instance->aiProposalId = $data['aiProposalId'];
        }
        if (array_key_exists('restoredFrom', $data)) {
            $instance->restoredFrom = $data['restoredFrom'];
        }
        if (array_key_exists('snapshot', $data)) {
            $instance->snapshot = $data['snapshot'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }
        if (array_key_exists('updatedAt', $data)) {
            $instance->updatedAt = $data['updatedAt'];
        }

        $nested = [
            'snapshot' => static fn (array $v): ArticleRevisionSnapshot => ArticleRevisionSnapshot::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ArticleRevisionList
{
    /** @var ArticleRevision[] */
    public $revisions = null;
    /** @var ?float */
    public $maxRevisionsPerLocale = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('revisions', $data)) {
            $instance->revisions = $data['revisions'];
        }
        if (array_key_exists('maxRevisionsPerLocale', $data)) {
            $instance->maxRevisionsPerLocale = $data['maxRevisionsPerLocale'];
        }

        $nested = [
            'revisions' => static fn (array $v): array => array_map(static fn ($x) => ArticleRevision::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ArticleRevisionRestore
{
    /** @var Article */
    public $article = null;
    /** @var ArticleRevision */
    public $revision = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('article', $data)) {
            $instance->article = $data['article'];
        }
        if (array_key_exists('revision', $data)) {
            $instance->revision = $data['revision'];
        }

        $nested = [
            'article' => static fn (array $v): Article => Article::fromArray($v),
            'revision' => static fn (array $v): ArticleRevision => ArticleRevision::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReadinessItem
{
    /** @var string */
    public $id = null;
    /** @var string */
    public $label = null;
    /** @var 'ok' | 'warning' | 'missing' */
    public $state = null;
    /** @var string[] */
    public $locales = null;
    /** @var ?string */
    public $detail = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('id', $data)) {
            $instance->id = $data['id'];
        }
        if (array_key_exists('label', $data)) {
            $instance->label = $data['label'];
        }
        if (array_key_exists('state', $data)) {
            $instance->state = $data['state'];
        }
        if (array_key_exists('locales', $data)) {
            $instance->locales = $data['locales'];
        }
        if (array_key_exists('detail', $data)) {
            $instance->detail = $data['detail'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ArticleReadiness
{
    /** @var string */
    public $articleId = null;
    /** @var 'article' */
    public $itemType = null;
    /** @var string */
    public $contentSource = null;
    /** @var ReadinessItem[] */
    public $items = null;
    /** @var string[] */
    public $blockers = null;
    /** @var string[] */
    public $warnings = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('articleId', $data)) {
            $instance->articleId = $data['articleId'];
        }
        if (array_key_exists('itemType', $data)) {
            $instance->itemType = $data['itemType'];
        }
        if (array_key_exists('contentSource', $data)) {
            $instance->contentSource = $data['contentSource'];
        }
        if (array_key_exists('items', $data)) {
            $instance->items = $data['items'];
        }
        if (array_key_exists('blockers', $data)) {
            $instance->blockers = $data['blockers'];
        }
        if (array_key_exists('warnings', $data)) {
            $instance->warnings = $data['warnings'];
        }

        $nested = [
            'items' => static fn (array $v): array => array_map(static fn ($x) => ReadinessItem::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ArticleSeoMeta
{
    /** @var string */
    public $articleId = null;
    /** @var ?string */
    public $locale = null;
    /** @var MultilingualStringOrNull */
    public $metaTitle = null;
    /** @var MultilingualStringOrNull */
    public $metaDescription = null;
    /** @var MultilingualStringOrNull */
    public $focusKeyword = null;
    /** @var MultilingualStringOrNull */
    public $secondaryKeywords = null;
    /** @var MultilingualStringOrNull */
    public $canonicalUrl = null;
    /** @var MultilingualStringOrNull */
    public $ogTitle = null;
    /** @var MultilingualStringOrNull */
    public $ogDescription = null;
    /** @var MultilingualStringOrNull */
    public $schemaJson = null;
    /** @var ?string */
    public $ogImage = null;
    /** @var ?string */
    public $robots = null;
    /** @var ?string */
    public $slug = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('articleId', $data)) {
            $instance->articleId = $data['articleId'];
        }
        if (array_key_exists('locale', $data)) {
            $instance->locale = $data['locale'];
        }
        if (array_key_exists('metaTitle', $data)) {
            $instance->metaTitle = $data['metaTitle'];
        }
        if (array_key_exists('metaDescription', $data)) {
            $instance->metaDescription = $data['metaDescription'];
        }
        if (array_key_exists('focusKeyword', $data)) {
            $instance->focusKeyword = $data['focusKeyword'];
        }
        if (array_key_exists('secondaryKeywords', $data)) {
            $instance->secondaryKeywords = $data['secondaryKeywords'];
        }
        if (array_key_exists('canonicalUrl', $data)) {
            $instance->canonicalUrl = $data['canonicalUrl'];
        }
        if (array_key_exists('ogTitle', $data)) {
            $instance->ogTitle = $data['ogTitle'];
        }
        if (array_key_exists('ogDescription', $data)) {
            $instance->ogDescription = $data['ogDescription'];
        }
        if (array_key_exists('schemaJson', $data)) {
            $instance->schemaJson = $data['schemaJson'];
        }
        if (array_key_exists('ogImage', $data)) {
            $instance->ogImage = $data['ogImage'];
        }
        if (array_key_exists('robots', $data)) {
            $instance->robots = $data['robots'];
        }
        if (array_key_exists('slug', $data)) {
            $instance->slug = $data['slug'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class TranslationStateItem
{
    /** @var string */
    public $locale = null;
    /** @var 'missing' | 'done' | 'outdated' */
    public $state = null;
    /** @var ?'missing' | 'done' | 'outdated' */
    public $storedState = null;
    /** @var bool */
    public $sourceOutdated = null;
    /** @var ?string */
    public $updatedAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('locale', $data)) {
            $instance->locale = $data['locale'];
        }
        if (array_key_exists('state', $data)) {
            $instance->state = $data['state'];
        }
        if (array_key_exists('storedState', $data)) {
            $instance->storedState = $data['storedState'];
        }
        if (array_key_exists('sourceOutdated', $data)) {
            $instance->sourceOutdated = $data['sourceOutdated'];
        }
        if (array_key_exists('updatedAt', $data)) {
            $instance->updatedAt = $data['updatedAt'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class TranslationStateReport
{
    /** @var string */
    public $articleId = null;
    /** @var string */
    public $sourceLocale = null;
    /** @var TranslationStateItem[] */
    public $items = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('articleId', $data)) {
            $instance->articleId = $data['articleId'];
        }
        if (array_key_exists('sourceLocale', $data)) {
            $instance->sourceLocale = $data['sourceLocale'];
        }
        if (array_key_exists('items', $data)) {
            $instance->items = $data['items'];
        }

        $nested = [
            'items' => static fn (array $v): array => array_map(static fn ($x) => TranslationStateItem::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class TranslationStateDoc
{
    /** @var ?ObjectId */
    public $_id = null;
    /** @var string */
    public $articleId = null;
    /** @var string */
    public $locale = null;
    /** @var ?string */
    public $sourceLocale = null;
    /** @var string */
    public $sourceHash = null;
    /** @var string */
    public $targetHash = null;
    /** @var ?array<string, string> */
    public $blockHashes = null;
    /** @var ?string */
    public $updatedByUserId = null;
    /** @var ?DateTime */
    public $createdAt = null;
    /** @var ?DateTime */
    public $updatedAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('_id', $data)) {
            $instance->_id = $data['_id'];
        }
        if (array_key_exists('articleId', $data)) {
            $instance->articleId = $data['articleId'];
        }
        if (array_key_exists('locale', $data)) {
            $instance->locale = $data['locale'];
        }
        if (array_key_exists('sourceLocale', $data)) {
            $instance->sourceLocale = $data['sourceLocale'];
        }
        if (array_key_exists('sourceHash', $data)) {
            $instance->sourceHash = $data['sourceHash'];
        }
        if (array_key_exists('targetHash', $data)) {
            $instance->targetHash = $data['targetHash'];
        }
        if (array_key_exists('blockHashes', $data)) {
            $instance->blockHashes = $data['blockHashes'];
        }
        if (array_key_exists('updatedByUserId', $data)) {
            $instance->updatedByUserId = $data['updatedByUserId'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }
        if (array_key_exists('updatedAt', $data)) {
            $instance->updatedAt = $data['updatedAt'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiEvent
{
    /** @var string */
    public $event = null;
    /** @var DateTime */
    public $occurredAt = null;
    /** @var ?array<string, mixed> */
    public $payload = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('event', $data)) {
            $instance->event = $data['event'];
        }
        if (array_key_exists('occurredAt', $data)) {
            $instance->occurredAt = $data['occurredAt'];
        }
        if (array_key_exists('payload', $data)) {
            $instance->payload = $data['payload'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class GlossaryTerm
{
    /** @var ObjectId */
    public $_id = null;
    /** @var string */
    public $source = null;
    /** @var string */
    public $sourceLocale = null;
    /** @var string */
    public $target = null;
    /** @var string */
    public $targetLocale = null;
    /** @var bool */
    public $doNotTranslate = null;
    /** @var ?string */
    public $note = null;
    /** @var ?DateTime */
    public $createdAt = null;
    /** @var ?DateTime */
    public $updatedAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('_id', $data)) {
            $instance->_id = $data['_id'];
        }
        if (array_key_exists('source', $data)) {
            $instance->source = $data['source'];
        }
        if (array_key_exists('sourceLocale', $data)) {
            $instance->sourceLocale = $data['sourceLocale'];
        }
        if (array_key_exists('target', $data)) {
            $instance->target = $data['target'];
        }
        if (array_key_exists('targetLocale', $data)) {
            $instance->targetLocale = $data['targetLocale'];
        }
        if (array_key_exists('doNotTranslate', $data)) {
            $instance->doNotTranslate = $data['doNotTranslate'];
        }
        if (array_key_exists('note', $data)) {
            $instance->note = $data['note'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }
        if (array_key_exists('updatedAt', $data)) {
            $instance->updatedAt = $data['updatedAt'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class GlossaryTermWrapper
{
    /** @var GlossaryTerm */
    public $term = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('term', $data)) {
            $instance->term = $data['term'];
        }

        $nested = [
            'term' => static fn (array $v): GlossaryTerm => GlossaryTerm::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class KnowledgeSource
{
    /** @var ObjectId */
    public $_id = null;
    /** @var 'url' | 'text' | 'file' */
    public $type = null;
    /** @var string */
    public $title = null;
    /** @var ?string */
    public $uri = null;
    /** @var ?string */
    public $content = null;
    /** @var ?string */
    public $locale = null;
    /** @var 'pending' | 'indexed' | 'failed' */
    public $status = null;
    /** @var ?string */
    public $error = null;
    /** @var float */
    public $chunkCount = null;
    /** @var ?float */
    public $tokenCount = null;
    /** @var ?string */
    public $indexedAt = null;
    /** @var ?DateTime */
    public $createdAt = null;
    /** @var ?DateTime */
    public $updatedAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('_id', $data)) {
            $instance->_id = $data['_id'];
        }
        if (array_key_exists('type', $data)) {
            $instance->type = $data['type'];
        }
        if (array_key_exists('title', $data)) {
            $instance->title = $data['title'];
        }
        if (array_key_exists('uri', $data)) {
            $instance->uri = $data['uri'];
        }
        if (array_key_exists('content', $data)) {
            $instance->content = $data['content'];
        }
        if (array_key_exists('locale', $data)) {
            $instance->locale = $data['locale'];
        }
        if (array_key_exists('status', $data)) {
            $instance->status = $data['status'];
        }
        if (array_key_exists('error', $data)) {
            $instance->error = $data['error'];
        }
        if (array_key_exists('chunkCount', $data)) {
            $instance->chunkCount = $data['chunkCount'];
        }
        if (array_key_exists('tokenCount', $data)) {
            $instance->tokenCount = $data['tokenCount'];
        }
        if (array_key_exists('indexedAt', $data)) {
            $instance->indexedAt = $data['indexedAt'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }
        if (array_key_exists('updatedAt', $data)) {
            $instance->updatedAt = $data['updatedAt'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class KnowledgeSourceWrapper
{
    /** @var KnowledgeSource */
    public $source = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('source', $data)) {
            $instance->source = $data['source'];
        }

        $nested = [
            'source' => static fn (array $v): KnowledgeSource => KnowledgeSource::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class TaxonomyFinding
{
    /** @var 'duplicate_category' | 'duplicate_subcategory' | 'near_duplicate_category' | 'empty_category' | 'no_description' | 'no_seo' | 'unbalanced_category' | 'orphan_subcategory' */
    public $code = null;
    /** @var 'high' | 'medium' | 'low' */
    public $severity = null;
    /** @var 'category' | 'subcategory' */
    public $entityType = null;
    /** @var ?string */
    public $entityId = null;
    /** @var ?string[] */
    public $names = null;
    /** @var string */
    public $message = null;
    /** @var string */
    public $fixAction = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('code', $data)) {
            $instance->code = $data['code'];
        }
        if (array_key_exists('severity', $data)) {
            $instance->severity = $data['severity'];
        }
        if (array_key_exists('entityType', $data)) {
            $instance->entityType = $data['entityType'];
        }
        if (array_key_exists('entityId', $data)) {
            $instance->entityId = $data['entityId'];
        }
        if (array_key_exists('names', $data)) {
            $instance->names = $data['names'];
        }
        if (array_key_exists('message', $data)) {
            $instance->message = $data['message'];
        }
        if (array_key_exists('fixAction', $data)) {
            $instance->fixAction = $data['fixAction'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class TaxonomyAudit
{
    /** @var TaxonomyFinding[] */
    public $findings = null;
    /** @var array<string, mixed> */
    public $summary = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('findings', $data)) {
            $instance->findings = $data['findings'];
        }
        if (array_key_exists('summary', $data)) {
            $instance->summary = $data['summary'];
        }

        $nested = [
            'findings' => static fn (array $v): array => array_map(static fn ($x) => TaxonomyFinding::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class TaxonomySeoEntry
{
    /** @var ?string */
    public $metaTitle = null;
    /** @var ?string */
    public $metaDescription = null;
    /** @var ?string */
    public $focusKeyword = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('metaTitle', $data)) {
            $instance->metaTitle = $data['metaTitle'];
        }
        if (array_key_exists('metaDescription', $data)) {
            $instance->metaDescription = $data['metaDescription'];
        }
        if (array_key_exists('focusKeyword', $data)) {
            $instance->focusKeyword = $data['focusKeyword'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class CategorySeoSuggestion
{
    /** @var 'category' | 'subcategory' */
    public $entityType = null;
    /** @var ObjectId */
    public $entityId = null;
    /** @var array<string, TaxonomySeoEntry> */
    public $seo = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('entityType', $data)) {
            $instance->entityType = $data['entityType'];
        }
        if (array_key_exists('entityId', $data)) {
            $instance->entityId = $data['entityId'];
        }
        if (array_key_exists('seo', $data)) {
            $instance->seo = $data['seo'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class TagSuggestion
{
    /** @var string */
    public $tag = null;
    /** @var ?bool */
    public $isNew = null;
    /** @var ?float */
    public $confidence = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('tag', $data)) {
            $instance->tag = $data['tag'];
        }
        if (array_key_exists('isNew', $data)) {
            $instance->isNew = $data['isNew'];
        }
        if (array_key_exists('confidence', $data)) {
            $instance->confidence = $data['confidence'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class TagSuggestions
{
    /** @var TagSuggestion[] */
    public $tags = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('tags', $data)) {
            $instance->tags = $data['tags'];
        }

        $nested = [
            'tags' => static fn (array $v): array => array_map(static fn ($x) => TagSuggestion::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class TagMergeResult
{
    /** @var string */
    public $from = null;
    /** @var string */
    public $into = null;
    /** @var float */
    public $articlesUpdated = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('from', $data)) {
            $instance->from = $data['from'];
        }
        if (array_key_exists('into', $data)) {
            $instance->into = $data['into'];
        }
        if (array_key_exists('articlesUpdated', $data)) {
            $instance->articlesUpdated = $data['articlesUpdated'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class TagUsageRefresh
{
    /** @var float */
    public $updated = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('updated', $data)) {
            $instance->updated = $data['updated'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AuthorBioSuggestion
{
    /** @var ObjectId */
    public $authorId = null;
    /** @var ?array<string, string> */
    public $bio = null;
    /** @var ?string[] */
    public $expertise = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('authorId', $data)) {
            $instance->authorId = $data['authorId'];
        }
        if (array_key_exists('bio', $data)) {
            $instance->bio = $data['bio'];
        }
        if (array_key_exists('expertise', $data)) {
            $instance->expertise = $data['expertise'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AuthorSuggestion
{
    /** @var ObjectId */
    public $authorId = null;
    /** @var float */
    public $score = null;
    /** @var ?string[] */
    public $matched = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('authorId', $data)) {
            $instance->authorId = $data['authorId'];
        }
        if (array_key_exists('score', $data)) {
            $instance->score = $data['score'];
        }
        if (array_key_exists('matched', $data)) {
            $instance->matched = $data['matched'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AuthorSuggestions
{
    /** @var AuthorSuggestion[] */
    public $suggestions = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('suggestions', $data)) {
            $instance->suggestions = $data['suggestions'];
        }

        $nested = [
            'suggestions' => static fn (array $v): array => array_map(static fn ($x) => AuthorSuggestion::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class MediaAsset
{
    /** @var ObjectId */
    public $_id = null;
    /** @var ?ObjectId */
    public $tenantId = null;
    /** @var 'image' | 'video' | 'audio' | 'document' | 'other' */
    public $kind = null;
    /** @var string */
    public $url = null;
    /** @var ?string */
    public $storageKey = null;
    /** @var ?string */
    public $fileName = null;
    /** @var ?string */
    public $mimeType = null;
    /** @var ?float */
    public $sizeBytes = null;
    /** @var ?float */
    public $width = null;
    /** @var ?float */
    public $height = null;
    /** @var ?array<string, string> */
    public $altText = null;
    /** @var ?array<string, string> */
    public $caption = null;
    /** @var ?string[] */
    public $tags = null;
    /** @var ?array<string, mixed> */
    public $aiMetadata = null;
    /** @var ?array<string, mixed>[] */
    public $usage = null;
    /** @var ?bool */
    public $isDeleted = null;
    /** @var ?DateTime */
    public $createdAt = null;
    /** @var ?DateTime */
    public $updatedAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('_id', $data)) {
            $instance->_id = $data['_id'];
        }
        if (array_key_exists('tenantId', $data)) {
            $instance->tenantId = $data['tenantId'];
        }
        if (array_key_exists('kind', $data)) {
            $instance->kind = $data['kind'];
        }
        if (array_key_exists('url', $data)) {
            $instance->url = $data['url'];
        }
        if (array_key_exists('storageKey', $data)) {
            $instance->storageKey = $data['storageKey'];
        }
        if (array_key_exists('fileName', $data)) {
            $instance->fileName = $data['fileName'];
        }
        if (array_key_exists('mimeType', $data)) {
            $instance->mimeType = $data['mimeType'];
        }
        if (array_key_exists('sizeBytes', $data)) {
            $instance->sizeBytes = $data['sizeBytes'];
        }
        if (array_key_exists('width', $data)) {
            $instance->width = $data['width'];
        }
        if (array_key_exists('height', $data)) {
            $instance->height = $data['height'];
        }
        if (array_key_exists('altText', $data)) {
            $instance->altText = $data['altText'];
        }
        if (array_key_exists('caption', $data)) {
            $instance->caption = $data['caption'];
        }
        if (array_key_exists('tags', $data)) {
            $instance->tags = $data['tags'];
        }
        if (array_key_exists('aiMetadata', $data)) {
            $instance->aiMetadata = $data['aiMetadata'];
        }
        if (array_key_exists('usage', $data)) {
            $instance->usage = $data['usage'];
        }
        if (array_key_exists('isDeleted', $data)) {
            $instance->isDeleted = $data['isDeleted'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }
        if (array_key_exists('updatedAt', $data)) {
            $instance->updatedAt = $data['updatedAt'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class MediaAssetList
{
    /** @var MediaAsset[] */
    public $assets = null;
    /** @var Pagination */
    public $pagination = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('assets', $data)) {
            $instance->assets = $data['assets'];
        }
        if (array_key_exists('pagination', $data)) {
            $instance->pagination = $data['pagination'];
        }

        $nested = [
            'assets' => static fn (array $v): array => array_map(static fn ($x) => MediaAsset::fromArray($x), $v),
            'pagination' => static fn (array $v): Pagination => Pagination::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class MediaAssetWrapper
{
    /** @var MediaAsset */
    public $asset = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('asset', $data)) {
            $instance->asset = $data['asset'];
        }

        $nested = [
            'asset' => static fn (array $v): MediaAsset => MediaAsset::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class MediaUsageRef
{
    /** @var string */
    public $entityType = null;
    /** @var ObjectId */
    public $entityId = null;
    /** @var string */
    public $field = null;
    /** @var ?string */
    public $title = null;
    /** @var ?string */
    public $slug = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('entityType', $data)) {
            $instance->entityType = $data['entityType'];
        }
        if (array_key_exists('entityId', $data)) {
            $instance->entityId = $data['entityId'];
        }
        if (array_key_exists('field', $data)) {
            $instance->field = $data['field'];
        }
        if (array_key_exists('title', $data)) {
            $instance->title = $data['title'];
        }
        if (array_key_exists('slug', $data)) {
            $instance->slug = $data['slug'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class MediaUsage
{
    /** @var MediaUsageRef[] */
    public $usages = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('usages', $data)) {
            $instance->usages = $data['usages'];
        }

        $nested = [
            'usages' => static fn (array $v): array => array_map(static fn ($x) => MediaUsageRef::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class MediaMetadataSuggestion
{
    /** @var ?string */
    public $assetId = null;
    /** @var ?string */
    public $url = null;
    /** @var ?string */
    public $mimeType = null;
    /** @var ?string */
    public $locale = null;
    /** @var string */
    public $altText = null;
    /** @var string[] */
    public $tags = null;
    /** @var 'image' | 'video' | 'audio' | 'document' | 'other' */
    public $kind = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('assetId', $data)) {
            $instance->assetId = $data['assetId'];
        }
        if (array_key_exists('url', $data)) {
            $instance->url = $data['url'];
        }
        if (array_key_exists('mimeType', $data)) {
            $instance->mimeType = $data['mimeType'];
        }
        if (array_key_exists('locale', $data)) {
            $instance->locale = $data['locale'];
        }
        if (array_key_exists('altText', $data)) {
            $instance->altText = $data['altText'];
        }
        if (array_key_exists('tags', $data)) {
            $instance->tags = $data['tags'];
        }
        if (array_key_exists('kind', $data)) {
            $instance->kind = $data['kind'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class MediaMissingAlt
{
    /** @var MediaAsset[] */
    public $assets = null;
    /** @var float */
    public $totalMissing = null;
    /** @var ?string */
    public $locale = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('assets', $data)) {
            $instance->assets = $data['assets'];
        }
        if (array_key_exists('totalMissing', $data)) {
            $instance->totalMissing = $data['totalMissing'];
        }
        if (array_key_exists('locale', $data)) {
            $instance->locale = $data['locale'];
        }

        $nested = [
            'assets' => static fn (array $v): array => array_map(static fn ($x) => MediaAsset::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ContentPlanStatus
{
    // No declared properties: this component is a list wrapper, whose
    // payload is reached through the key the server sent it under.
    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ContentPlanLocale
{
    /** @var string */
    public $code = null;
    /** @var ?float */
    public $translationDueOffsetDays = null;
    /** @var ?'pending' | 'in_progress' | 'done' | 'outdated' */
    public $status = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('code', $data)) {
            $instance->code = $data['code'];
        }
        if (array_key_exists('translationDueOffsetDays', $data)) {
            $instance->translationDueOffsetDays = $data['translationDueOffsetDays'];
        }
        if (array_key_exists('status', $data)) {
            $instance->status = $data['status'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ContentPlanItem
{
    /** @var ObjectId */
    public $_id = null;
    /** @var ?string */
    public $tenantId = null;
    /** @var string */
    public $title = null;
    /** @var ?string */
    public $brief = null;
    /** @var ?string */
    public $primaryKeyword = null;
    /** @var ?'informational' | 'navigational' | 'commercial' | 'transactional' | 'null' */
    public $intent = null;
    /** @var ?'awareness' | 'consideration' | 'conversion' | 'retention' | 'null' */
    public $funnelStage = null;
    /** @var ?ObjectId */
    public $category = null;
    /** @var ?ObjectId */
    public $subCategory = null;
    /** @var ?ObjectId */
    public $author = null;
    /** @var ?ObjectId */
    public $assignee = null;
    /** @var ?ObjectId */
    public $campaign = null;
    /** @var ContentPlanStatus */
    public $status = null;
    /** @var ?'manual' | 'ai' | 'content_gap' | 'reader_comment' | 'form_submission' */
    public $source = null;
    /** @var ?string */
    public $originRef = null;
    /** @var ?string */
    public $dueAt = null;
    /** @var ?string */
    public $plannedPublishAt = null;
    /** @var ?string */
    public $timezone = null;
    /** @var ?ContentPlanLocale[] */
    public $locales = null;
    /** @var ?ObjectId */
    public $articleId = null;
    /** @var ?string */
    public $notes = null;
    /** @var ?string[] */
    public $tags = null;
    /** @var ?ObjectId */
    public $createdBy = null;
    /** @var ?bool */
    public $isDeleted = null;
    /** @var ?DateTime */
    public $createdAt = null;
    /** @var ?DateTime */
    public $updatedAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('_id', $data)) {
            $instance->_id = $data['_id'];
        }
        if (array_key_exists('tenantId', $data)) {
            $instance->tenantId = $data['tenantId'];
        }
        if (array_key_exists('title', $data)) {
            $instance->title = $data['title'];
        }
        if (array_key_exists('brief', $data)) {
            $instance->brief = $data['brief'];
        }
        if (array_key_exists('primaryKeyword', $data)) {
            $instance->primaryKeyword = $data['primaryKeyword'];
        }
        if (array_key_exists('intent', $data)) {
            $instance->intent = $data['intent'];
        }
        if (array_key_exists('funnelStage', $data)) {
            $instance->funnelStage = $data['funnelStage'];
        }
        if (array_key_exists('category', $data)) {
            $instance->category = $data['category'];
        }
        if (array_key_exists('subCategory', $data)) {
            $instance->subCategory = $data['subCategory'];
        }
        if (array_key_exists('author', $data)) {
            $instance->author = $data['author'];
        }
        if (array_key_exists('assignee', $data)) {
            $instance->assignee = $data['assignee'];
        }
        if (array_key_exists('campaign', $data)) {
            $instance->campaign = $data['campaign'];
        }
        if (array_key_exists('status', $data)) {
            $instance->status = $data['status'];
        }
        if (array_key_exists('source', $data)) {
            $instance->source = $data['source'];
        }
        if (array_key_exists('originRef', $data)) {
            $instance->originRef = $data['originRef'];
        }
        if (array_key_exists('dueAt', $data)) {
            $instance->dueAt = $data['dueAt'];
        }
        if (array_key_exists('plannedPublishAt', $data)) {
            $instance->plannedPublishAt = $data['plannedPublishAt'];
        }
        if (array_key_exists('timezone', $data)) {
            $instance->timezone = $data['timezone'];
        }
        if (array_key_exists('locales', $data)) {
            $instance->locales = $data['locales'];
        }
        if (array_key_exists('articleId', $data)) {
            $instance->articleId = $data['articleId'];
        }
        if (array_key_exists('notes', $data)) {
            $instance->notes = $data['notes'];
        }
        if (array_key_exists('tags', $data)) {
            $instance->tags = $data['tags'];
        }
        if (array_key_exists('createdBy', $data)) {
            $instance->createdBy = $data['createdBy'];
        }
        if (array_key_exists('isDeleted', $data)) {
            $instance->isDeleted = $data['isDeleted'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }
        if (array_key_exists('updatedAt', $data)) {
            $instance->updatedAt = $data['updatedAt'];
        }

        $nested = [
            'locales' => static fn (array $v): array => array_map(static fn ($x) => ContentPlanLocale::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ContentPlanItemWrapper
{
    /** @var ContentPlanItem */
    public $item = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('item', $data)) {
            $instance->item = $data['item'];
        }

        $nested = [
            'item' => static fn (array $v): ContentPlanItem => ContentPlanItem::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class PlanWarning
{
    /** @var 'cadence_exceeded' | 'cadence_under' | 'keyword_collision' | 'author_overload' | 'publish_before_translation' | 'past_due' | 'overdue_publish' */
    public $code = null;
    /** @var 'high' | 'medium' | 'low' */
    public $severity = null;
    /** @var string[] */
    public $itemIds = null;
    /** @var string */
    public $message = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('code', $data)) {
            $instance->code = $data['code'];
        }
        if (array_key_exists('severity', $data)) {
            $instance->severity = $data['severity'];
        }
        if (array_key_exists('itemIds', $data)) {
            $instance->itemIds = $data['itemIds'];
        }
        if (array_key_exists('message', $data)) {
            $instance->message = $data['message'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ContentCadence
{
    /** @var ?ObjectId */
    public $_id = null;
    /** @var ?'tenant' | 'category' */
    public $scope = null;
    /** @var ?ObjectId */
    public $category = null;
    /** @var ?float */
    public $postsPerWeek = null;
    /** @var ?float[] */
    public $preferredWeekdays = null;
    /** @var ?string */
    public $preferredTime = null;
    /** @var ?string */
    public $timezone = null;
    /** @var ?float[] */
    public $weekendDays = null;
    /** @var ?DateTime */
    public $createdAt = null;
    /** @var ?DateTime */
    public $updatedAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('_id', $data)) {
            $instance->_id = $data['_id'];
        }
        if (array_key_exists('scope', $data)) {
            $instance->scope = $data['scope'];
        }
        if (array_key_exists('category', $data)) {
            $instance->category = $data['category'];
        }
        if (array_key_exists('postsPerWeek', $data)) {
            $instance->postsPerWeek = $data['postsPerWeek'];
        }
        if (array_key_exists('preferredWeekdays', $data)) {
            $instance->preferredWeekdays = $data['preferredWeekdays'];
        }
        if (array_key_exists('preferredTime', $data)) {
            $instance->preferredTime = $data['preferredTime'];
        }
        if (array_key_exists('timezone', $data)) {
            $instance->timezone = $data['timezone'];
        }
        if (array_key_exists('weekendDays', $data)) {
            $instance->weekendDays = $data['weekendDays'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }
        if (array_key_exists('updatedAt', $data)) {
            $instance->updatedAt = $data['updatedAt'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class CadenceWrapper
{
    /** @var ?ContentCadence */
    public $cadence = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('cadence', $data)) {
            $instance->cadence = $data['cadence'];
        }

        $nested = [
            'cadence' => static fn (array $v): ContentCadence => ContentCadence::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ContentPlanList
{
    /** @var ContentPlanItem[] */
    public $items = null;
    /** @var PlanWarning[] */
    public $warnings = null;
    /** @var ?ContentCadence */
    public $cadence = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('items', $data)) {
            $instance->items = $data['items'];
        }
        if (array_key_exists('warnings', $data)) {
            $instance->warnings = $data['warnings'];
        }
        if (array_key_exists('cadence', $data)) {
            $instance->cadence = $data['cadence'];
        }

        $nested = [
            'items' => static fn (array $v): array => array_map(static fn ($x) => ContentPlanItem::fromArray($x), $v),
            'warnings' => static fn (array $v): array => array_map(static fn ($x) => PlanWarning::fromArray($x), $v),
            'cadence' => static fn (array $v): ContentCadence => ContentCadence::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class StartDraft
{
    /** @var ContentPlanItem */
    public $item = null;
    /** @var ObjectId */
    public $articleId = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('item', $data)) {
            $instance->item = $data['item'];
        }
        if (array_key_exists('articleId', $data)) {
            $instance->articleId = $data['articleId'];
        }

        $nested = [
            'item' => static fn (array $v): ContentPlanItem => ContentPlanItem::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class StartDraftWrapper
{
    /** @var ?StartDraft */
    public $null = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('null', $data)) {
            $instance->null = $data['null'];
        }

        $nested = [
            'null' => static fn (array $v): StartDraft => StartDraft::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ScheduleResult
{
    /** @var ContentPlanItem */
    public $item = null;
    /** @var bool */
    public $articleScheduled = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('item', $data)) {
            $instance->item = $data['item'];
        }
        if (array_key_exists('articleScheduled', $data)) {
            $instance->articleScheduled = $data['articleScheduled'];
        }

        $nested = [
            'item' => static fn (array $v): ContentPlanItem => ContentPlanItem::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ScheduleWrapper
{
    /** @var ?ScheduleResult */
    public $null = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('null', $data)) {
            $instance->null = $data['null'];
        }

        $nested = [
            'null' => static fn (array $v): ScheduleResult => ScheduleResult::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ContentGap
{
    /** @var 'thin_category' | 'missing_locale' | 'stale_content' | 'idle_keyword' */
    public $code = null;
    /** @var 'high' | 'medium' | 'low' */
    public $severity = null;
    /** @var ?string */
    public $categoryId = null;
    /** @var ?string */
    public $categoryName = null;
    /** @var ?string */
    public $locale = null;
    /** @var string[] */
    public $articleIds = null;
    /** @var ?string[] */
    public $articleTitles = null;
    /** @var string */
    public $message = null;
    /** @var ContentPlanStatus */
    public $suggestedStatus = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('code', $data)) {
            $instance->code = $data['code'];
        }
        if (array_key_exists('severity', $data)) {
            $instance->severity = $data['severity'];
        }
        if (array_key_exists('categoryId', $data)) {
            $instance->categoryId = $data['categoryId'];
        }
        if (array_key_exists('categoryName', $data)) {
            $instance->categoryName = $data['categoryName'];
        }
        if (array_key_exists('locale', $data)) {
            $instance->locale = $data['locale'];
        }
        if (array_key_exists('articleIds', $data)) {
            $instance->articleIds = $data['articleIds'];
        }
        if (array_key_exists('articleTitles', $data)) {
            $instance->articleTitles = $data['articleTitles'];
        }
        if (array_key_exists('message', $data)) {
            $instance->message = $data['message'];
        }
        if (array_key_exists('suggestedStatus', $data)) {
            $instance->suggestedStatus = $data['suggestedStatus'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ContentGapReport
{
    /** @var ContentGap[] */
    public $gaps = null;
    /** @var array<string, mixed> */
    public $summary = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('gaps', $data)) {
            $instance->gaps = $data['gaps'];
        }
        if (array_key_exists('summary', $data)) {
            $instance->summary = $data['summary'];
        }

        $nested = [
            'gaps' => static fn (array $v): array => array_map(static fn ($x) => ContentGap::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class CalendarIdea
{
    /** @var string */
    public $title = null;
    /** @var ?string */
    public $angle = null;
    /** @var ?string */
    public $brief = null;
    /** @var string */
    public $primaryKeyword = null;
    /** @var ?'informational' | 'navigational' | 'commercial' | 'transactional' */
    public $intent = null;
    /** @var ?'awareness' | 'consideration' | 'conversion' | 'retention' */
    public $funnelStage = null;
    /** @var ?string */
    public $categoryName = null;
    /** @var ?array<string, mixed>[] */
    public $localeVariants = null;
    /** @var ?string */
    public $suggestedDate = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('title', $data)) {
            $instance->title = $data['title'];
        }
        if (array_key_exists('angle', $data)) {
            $instance->angle = $data['angle'];
        }
        if (array_key_exists('brief', $data)) {
            $instance->brief = $data['brief'];
        }
        if (array_key_exists('primaryKeyword', $data)) {
            $instance->primaryKeyword = $data['primaryKeyword'];
        }
        if (array_key_exists('intent', $data)) {
            $instance->intent = $data['intent'];
        }
        if (array_key_exists('funnelStage', $data)) {
            $instance->funnelStage = $data['funnelStage'];
        }
        if (array_key_exists('categoryName', $data)) {
            $instance->categoryName = $data['categoryName'];
        }
        if (array_key_exists('localeVariants', $data)) {
            $instance->localeVariants = $data['localeVariants'];
        }
        if (array_key_exists('suggestedDate', $data)) {
            $instance->suggestedDate = $data['suggestedDate'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class CalendarIdeas
{
    /** @var CalendarIdea[] */
    public $ideas = null;
    /** @var ?float */
    public $requested = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('ideas', $data)) {
            $instance->ideas = $data['ideas'];
        }
        if (array_key_exists('requested', $data)) {
            $instance->requested = $data['requested'];
        }

        $nested = [
            'ideas' => static fn (array $v): array => array_map(static fn ($x) => CalendarIdea::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class CalendarPlanEntry
{
    /** @var string */
    public $plannedPublishAt = null;
    /** @var float */
    public $weekday = null;
    /** @var ?string */
    public $series = null;
    /** @var ?string */
    public $workingTitle = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('plannedPublishAt', $data)) {
            $instance->plannedPublishAt = $data['plannedPublishAt'];
        }
        if (array_key_exists('weekday', $data)) {
            $instance->weekday = $data['weekday'];
        }
        if (array_key_exists('series', $data)) {
            $instance->series = $data['series'];
        }
        if (array_key_exists('workingTitle', $data)) {
            $instance->workingTitle = $data['workingTitle'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class CalendarPeriodPlan
{
    /** @var CalendarPlanEntry[] */
    public $entries = null;
    /** @var array<string, mixed> */
    public $cadence = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('entries', $data)) {
            $instance->entries = $data['entries'];
        }
        if (array_key_exists('cadence', $data)) {
            $instance->cadence = $data['cadence'];
        }

        $nested = [
            'entries' => static fn (array $v): array => array_map(static fn ($x) => CalendarPlanEntry::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class CalendarBestTime
{
    /** @var array<string, mixed> */
    public $suggestion = null;
    /** @var ?float */
    public $samples = null;
    /** @var 'weekday_engagement' */
    public $basis = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('suggestion', $data)) {
            $instance->suggestion = $data['suggestion'];
        }
        if (array_key_exists('samples', $data)) {
            $instance->samples = $data['samples'];
        }
        if (array_key_exists('basis', $data)) {
            $instance->basis = $data['basis'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class CalendarReschedule
{
    /** @var ?array<string, mixed> */
    public $proposal = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('proposal', $data)) {
            $instance->proposal = $data['proposal'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class Campaign
{
    /** @var ObjectId */
    public $_id = null;
    /** @var ?string */
    public $tenantId = null;
    /** @var string */
    public $name = null;
    /** @var ?string */
    public $goal = null;
    /** @var ?string */
    public $description = null;
    /** @var ?string */
    public $startsAt = null;
    /** @var ?string */
    public $endsAt = null;
    /** @var 'planned' | 'active' | 'done' */
    public $status = null;
    /** @var ?string */
    public $color = null;
    /** @var ?ObjectId */
    public $createdBy = null;
    /** @var ?bool */
    public $isDeleted = null;
    /** @var ?DateTime */
    public $createdAt = null;
    /** @var ?DateTime */
    public $updatedAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('_id', $data)) {
            $instance->_id = $data['_id'];
        }
        if (array_key_exists('tenantId', $data)) {
            $instance->tenantId = $data['tenantId'];
        }
        if (array_key_exists('name', $data)) {
            $instance->name = $data['name'];
        }
        if (array_key_exists('goal', $data)) {
            $instance->goal = $data['goal'];
        }
        if (array_key_exists('description', $data)) {
            $instance->description = $data['description'];
        }
        if (array_key_exists('startsAt', $data)) {
            $instance->startsAt = $data['startsAt'];
        }
        if (array_key_exists('endsAt', $data)) {
            $instance->endsAt = $data['endsAt'];
        }
        if (array_key_exists('status', $data)) {
            $instance->status = $data['status'];
        }
        if (array_key_exists('color', $data)) {
            $instance->color = $data['color'];
        }
        if (array_key_exists('createdBy', $data)) {
            $instance->createdBy = $data['createdBy'];
        }
        if (array_key_exists('isDeleted', $data)) {
            $instance->isDeleted = $data['isDeleted'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }
        if (array_key_exists('updatedAt', $data)) {
            $instance->updatedAt = $data['updatedAt'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class CampaignWrapper
{
    /** @var Campaign */
    public $campaign = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('campaign', $data)) {
            $instance->campaign = $data['campaign'];
        }

        $nested = [
            'campaign' => static fn (array $v): Campaign => Campaign::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class CampaignList
{
    /** @var Campaign[] */
    public $campaigns = null;
    /** @var Pagination */
    public $pagination = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('campaigns', $data)) {
            $instance->campaigns = $data['campaigns'];
        }
        if (array_key_exists('pagination', $data)) {
            $instance->pagination = $data['pagination'];
        }

        $nested = [
            'campaigns' => static fn (array $v): array => array_map(static fn ($x) => Campaign::fromArray($x), $v),
            'pagination' => static fn (array $v): Pagination => Pagination::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class DigestNote
{
    /** @var string */
    public $code = null;
    /** @var array<string, mixed> */
    public $params = null;
    /** @var string */
    public $text = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('code', $data)) {
            $instance->code = $data['code'];
        }
        if (array_key_exists('params', $data)) {
            $instance->params = $data['params'];
        }
        if (array_key_exists('text', $data)) {
            $instance->text = $data['text'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class DigestAction
{
    /** @var 'calendar.overdue' | 'ai.lowAcceptance' | 'calendar.delivery' | 'seo.audit' */
    public $code = null;
    /** @var 'high' | 'medium' | 'low' */
    public $severity = null;
    /** @var array<string, mixed> */
    public $params = null;
    /** @var string */
    public $text = null;
    /** @var ?string */
    public $href = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('code', $data)) {
            $instance->code = $data['code'];
        }
        if (array_key_exists('severity', $data)) {
            $instance->severity = $data['severity'];
        }
        if (array_key_exists('params', $data)) {
            $instance->params = $data['params'];
        }
        if (array_key_exists('text', $data)) {
            $instance->text = $data['text'];
        }
        if (array_key_exists('href', $data)) {
            $instance->href = $data['href'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class WeeklyDigest
{
    /** @var string */
    public $weekOf = null;
    /** @var array<string, mixed> */
    public $range = null;
    /** @var array<string, mixed> */
    public $published = null;
    /** @var array<string, mixed> */
    public $ai = null;
    /** @var DigestAction[] */
    public $suggestedActions = null;
    /** @var ?DigestNote[] */
    public $wins = null;
    /** @var ?DigestNote[] */
    public $issues = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('weekOf', $data)) {
            $instance->weekOf = $data['weekOf'];
        }
        if (array_key_exists('range', $data)) {
            $instance->range = $data['range'];
        }
        if (array_key_exists('published', $data)) {
            $instance->published = $data['published'];
        }
        if (array_key_exists('ai', $data)) {
            $instance->ai = $data['ai'];
        }
        if (array_key_exists('suggestedActions', $data)) {
            $instance->suggestedActions = $data['suggestedActions'];
        }
        if (array_key_exists('wins', $data)) {
            $instance->wins = $data['wins'];
        }
        if (array_key_exists('issues', $data)) {
            $instance->issues = $data['issues'];
        }

        $nested = [
            'suggestedActions' => static fn (array $v): array => array_map(static fn ($x) => DigestAction::fromArray($x), $v),
            'wins' => static fn (array $v): array => array_map(static fn ($x) => DigestNote::fromArray($x), $v),
            'issues' => static fn (array $v): array => array_map(static fn ($x) => DigestNote::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class WeeklyDigestWrapper
{
    /** @var WeeklyDigest */
    public $digest = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('digest', $data)) {
            $instance->digest = $data['digest'];
        }

        $nested = [
            'digest' => static fn (array $v): WeeklyDigest => WeeklyDigest::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SeoHealthCategoryRow
{
    /** @var ?string */
    public $categoryId = null;
    /** @var ?string */
    public $categoryName = null;
    /** @var float */
    public $articles = null;
    /** @var float */
    public $issues = null;
    /** @var float */
    public $healthPercent = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('categoryId', $data)) {
            $instance->categoryId = $data['categoryId'];
        }
        if (array_key_exists('categoryName', $data)) {
            $instance->categoryName = $data['categoryName'];
        }
        if (array_key_exists('articles', $data)) {
            $instance->articles = $data['articles'];
        }
        if (array_key_exists('issues', $data)) {
            $instance->issues = $data['issues'];
        }
        if (array_key_exists('healthPercent', $data)) {
            $instance->healthPercent = $data['healthPercent'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SeoHealthReport
{
    /** @var ?array<string, mixed> */
    public $range = null;
    /** @var float */
    public $scanned = null;
    /** @var ?array<string, float> */
    public $issueCounts = null;
    /** @var float */
    public $totalIssues = null;
    /** @var float */
    public $healthyPercent = null;
    /** @var SeoHealthCategoryRow[] */
    public $byCategory = null;
    /** @var ?string[] */
    public $notes = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('range', $data)) {
            $instance->range = $data['range'];
        }
        if (array_key_exists('scanned', $data)) {
            $instance->scanned = $data['scanned'];
        }
        if (array_key_exists('issueCounts', $data)) {
            $instance->issueCounts = $data['issueCounts'];
        }
        if (array_key_exists('totalIssues', $data)) {
            $instance->totalIssues = $data['totalIssues'];
        }
        if (array_key_exists('healthyPercent', $data)) {
            $instance->healthyPercent = $data['healthyPercent'];
        }
        if (array_key_exists('byCategory', $data)) {
            $instance->byCategory = $data['byCategory'];
        }
        if (array_key_exists('notes', $data)) {
            $instance->notes = $data['notes'];
        }

        $nested = [
            'byCategory' => static fn (array $v): array => array_map(static fn ($x) => SeoHealthCategoryRow::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class CalendarAdherenceReport
{
    /** @var ?array<string, mixed> */
    public $range = null;
    /** @var float */
    public $planned = null;
    /** @var float */
    public $published = null;
    /** @var ?float */
    public $publishedOnTime = null;
    /** @var float */
    public $deliveryRate = null;
    /** @var float */
    public $onTimeRate = null;
    /** @var ?float */
    public $medianLeadTimeDays = null;
    /** @var float */
    public $overdue = null;
    /** @var ?array<string, mixed>[] */
    public $campaigns = null;
    /** @var ?string[] */
    public $notes = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('range', $data)) {
            $instance->range = $data['range'];
        }
        if (array_key_exists('planned', $data)) {
            $instance->planned = $data['planned'];
        }
        if (array_key_exists('published', $data)) {
            $instance->published = $data['published'];
        }
        if (array_key_exists('publishedOnTime', $data)) {
            $instance->publishedOnTime = $data['publishedOnTime'];
        }
        if (array_key_exists('deliveryRate', $data)) {
            $instance->deliveryRate = $data['deliveryRate'];
        }
        if (array_key_exists('onTimeRate', $data)) {
            $instance->onTimeRate = $data['onTimeRate'];
        }
        if (array_key_exists('medianLeadTimeDays', $data)) {
            $instance->medianLeadTimeDays = $data['medianLeadTimeDays'];
        }
        if (array_key_exists('overdue', $data)) {
            $instance->overdue = $data['overdue'];
        }
        if (array_key_exists('campaigns', $data)) {
            $instance->campaigns = $data['campaigns'];
        }
        if (array_key_exists('notes', $data)) {
            $instance->notes = $data['notes'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiAcceptanceActionRow
{
    /** @var string */
    public $actionId = null;
    /** @var float */
    public $runs = null;
    /** @var float */
    public $accepted = null;
    /** @var ?float */
    public $acceptanceRate = null;
    /** @var ?float */
    public $minutesSaved = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('actionId', $data)) {
            $instance->actionId = $data['actionId'];
        }
        if (array_key_exists('runs', $data)) {
            $instance->runs = $data['runs'];
        }
        if (array_key_exists('accepted', $data)) {
            $instance->accepted = $data['accepted'];
        }
        if (array_key_exists('acceptanceRate', $data)) {
            $instance->acceptanceRate = $data['acceptanceRate'];
        }
        if (array_key_exists('minutesSaved', $data)) {
            $instance->minutesSaved = $data['minutesSaved'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class AiAcceptanceReport
{
    /** @var ?array<string, mixed> */
    public $range = null;
    /** @var float */
    public $total = null;
    /** @var float */
    public $accepted = null;
    /** @var float */
    public $rejected = null;
    /** @var float */
    public $acceptanceRate = null;
    /** @var ?array<string, mixed> */
    public $credits = null;
    /** @var array<string, mixed> */
    public $timeSaved = null;
    /** @var ?AiAcceptanceActionRow[] */
    public $byAction = null;
    /** @var ?string[] */
    public $notes = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('range', $data)) {
            $instance->range = $data['range'];
        }
        if (array_key_exists('total', $data)) {
            $instance->total = $data['total'];
        }
        if (array_key_exists('accepted', $data)) {
            $instance->accepted = $data['accepted'];
        }
        if (array_key_exists('rejected', $data)) {
            $instance->rejected = $data['rejected'];
        }
        if (array_key_exists('acceptanceRate', $data)) {
            $instance->acceptanceRate = $data['acceptanceRate'];
        }
        if (array_key_exists('credits', $data)) {
            $instance->credits = $data['credits'];
        }
        if (array_key_exists('timeSaved', $data)) {
            $instance->timeSaved = $data['timeSaved'];
        }
        if (array_key_exists('byAction', $data)) {
            $instance->byAction = $data['byAction'];
        }
        if (array_key_exists('notes', $data)) {
            $instance->notes = $data['notes'];
        }

        $nested = [
            'byAction' => static fn (array $v): array => array_map(static fn ($x) => AiAcceptanceActionRow::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class TranslationCoverageReportV2
{
    // No declared properties: this component is a list wrapper, whose
    // payload is reached through the key the server sent it under.
    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportWrapper
{
    /** @var ?ReportPayload */
    public $null = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('null', $data)) {
            $instance->null = $data['null'];
        }

        $nested = [
            'null' => static fn (array $v): ReportPayload => ReportPayload::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ReportPayload
{
    /** @var ?SeoHealthReport | TranslationCoverageReportV2 | CalendarAdherenceReport | AiAcceptanceReport */
    public $report = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('report', $data)) {
            $instance->report = $data['report'];
        }

        $nested = [
            'report' => static fn (array $v): SeoHealthReport => SeoHealthReport::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SeoAuditIssue
{
    /** @var 'missing_meta_title' | 'missing_meta_description' | 'duplicate_title' | 'thin_content' | 'missing_alt_text' | 'broken_heading_order' | 'orphan_page' | 'missing_keyword' | 'no_traffic' */
    public $code = null;
    /** @var 'high' | 'medium' | 'low' */
    public $severity = null;
    /** @var ObjectId */
    public $articleId = null;
    /** @var ?string */
    public $title = null;
    /** @var string */
    public $message = null;
    /** @var ?string */
    public $fixAction = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('code', $data)) {
            $instance->code = $data['code'];
        }
        if (array_key_exists('severity', $data)) {
            $instance->severity = $data['severity'];
        }
        if (array_key_exists('articleId', $data)) {
            $instance->articleId = $data['articleId'];
        }
        if (array_key_exists('title', $data)) {
            $instance->title = $data['title'];
        }
        if (array_key_exists('message', $data)) {
            $instance->message = $data['message'];
        }
        if (array_key_exists('fixAction', $data)) {
            $instance->fixAction = $data['fixAction'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class SeoAuditReport
{
    /** @var SeoAuditIssue[] */
    public $issues = null;
    /** @var array<string, float> */
    public $summary = null;
    /** @var float */
    public $scanned = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('issues', $data)) {
            $instance->issues = $data['issues'];
        }
        if (array_key_exists('summary', $data)) {
            $instance->summary = $data['summary'];
        }
        if (array_key_exists('scanned', $data)) {
            $instance->scanned = $data['scanned'];
        }

        $nested = [
            'issues' => static fn (array $v): array => array_map(static fn ($x) => SeoAuditIssue::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class CannibalizationGroup
{
    /** @var string */
    public $keyword = null;
    /** @var string[] */
    public $articleIds = null;
    /** @var ?string[] */
    public $titles = null;
    /** @var ObjectId */
    public $recommendedKeep = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('keyword', $data)) {
            $instance->keyword = $data['keyword'];
        }
        if (array_key_exists('articleIds', $data)) {
            $instance->articleIds = $data['articleIds'];
        }
        if (array_key_exists('titles', $data)) {
            $instance->titles = $data['titles'];
        }
        if (array_key_exists('recommendedKeep', $data)) {
            $instance->recommendedKeep = $data['recommendedKeep'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class CannibalizationReport
{
    /** @var CannibalizationGroup[] */
    public $groups = null;
    /** @var array<string, mixed> */
    public $summary = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('groups', $data)) {
            $instance->groups = $data['groups'];
        }
        if (array_key_exists('summary', $data)) {
            $instance->summary = $data['summary'];
        }

        $nested = [
            'groups' => static fn (array $v): array => array_map(static fn ($x) => CannibalizationGroup::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class RefreshCandidate
{
    /** @var ObjectId */
    public $articleId = null;
    /** @var ?string */
    public $title = null;
    /** @var ?float */
    public $ageDays = null;
    /** @var ?float */
    public $viewsTotal = null;
    /** @var ?float */
    public $trendRatio = null;
    /** @var 'high' | 'medium' | 'low' */
    public $severity = null;
    /** @var 'age' | 'declining' | 'no_traffic'[] */
    public $reasons = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('articleId', $data)) {
            $instance->articleId = $data['articleId'];
        }
        if (array_key_exists('title', $data)) {
            $instance->title = $data['title'];
        }
        if (array_key_exists('ageDays', $data)) {
            $instance->ageDays = $data['ageDays'];
        }
        if (array_key_exists('viewsTotal', $data)) {
            $instance->viewsTotal = $data['viewsTotal'];
        }
        if (array_key_exists('trendRatio', $data)) {
            $instance->trendRatio = $data['trendRatio'];
        }
        if (array_key_exists('severity', $data)) {
            $instance->severity = $data['severity'];
        }
        if (array_key_exists('reasons', $data)) {
            $instance->reasons = $data['reasons'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class RefreshCandidateReport
{
    /** @var RefreshCandidate[] */
    public $candidates = null;
    /** @var float */
    public $scanned = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('candidates', $data)) {
            $instance->candidates = $data['candidates'];
        }
        if (array_key_exists('scanned', $data)) {
            $instance->scanned = $data['scanned'];
        }

        $nested = [
            'candidates' => static fn (array $v): array => array_map(static fn ($x) => RefreshCandidate::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class RefreshPlanItem
{
    /** @var ContentPlanItem */
    public $item = null;
    /** @var bool */
    public $linked = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('item', $data)) {
            $instance->item = $data['item'];
        }
        if (array_key_exists('linked', $data)) {
            $instance->linked = $data['linked'];
        }

        $nested = [
            'item' => static fn (array $v): ContentPlanItem => ContentPlanItem::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class RefreshPlanItemWrapper
{
    /** @var ?RefreshPlanItem */
    public $null = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('null', $data)) {
            $instance->null = $data['null'];
        }

        $nested = [
            'null' => static fn (array $v): RefreshPlanItem => RefreshPlanItem::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class HreflangEntry
{
    /** @var string */
    public $locale = null;
    /** @var string */
    public $hreflang = null;
    /** @var string */
    public $url = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('locale', $data)) {
            $instance->locale = $data['locale'];
        }
        if (array_key_exists('hreflang', $data)) {
            $instance->hreflang = $data['hreflang'];
        }
        if (array_key_exists('url', $data)) {
            $instance->url = $data['url'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class HreflangGroup
{
    /** @var ?ObjectId */
    public $articleId = null;
    /** @var string */
    public $canonical = null;
    /** @var HreflangEntry[] */
    public $alternates = null;
    /** @var ?string */
    public $xDefault = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('articleId', $data)) {
            $instance->articleId = $data['articleId'];
        }
        if (array_key_exists('canonical', $data)) {
            $instance->canonical = $data['canonical'];
        }
        if (array_key_exists('alternates', $data)) {
            $instance->alternates = $data['alternates'];
        }
        if (array_key_exists('xDefault', $data)) {
            $instance->xDefault = $data['xDefault'];
        }

        $nested = [
            'alternates' => static fn (array $v): array => array_map(static fn ($x) => HreflangEntry::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class HreflangWrapper
{
    /** @var HreflangGroup */
    public $hreflang = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('hreflang', $data)) {
            $instance->hreflang = $data['hreflang'];
        }

        $nested = [
            'hreflang' => static fn (array $v): HreflangGroup => HreflangGroup::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class Redirect
{
    /** @var ObjectId */
    public $_id = null;
    /** @var ?string */
    public $tenantId = null;
    /** @var string */
    public $fromSlug = null;
    /** @var string */
    public $toSlug = null;
    /** @var ?ObjectId */
    public $articleId = null;
    /** @var ?DateTime */
    public $createdAt = null;
    /** @var ?DateTime */
    public $updatedAt = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('_id', $data)) {
            $instance->_id = $data['_id'];
        }
        if (array_key_exists('tenantId', $data)) {
            $instance->tenantId = $data['tenantId'];
        }
        if (array_key_exists('fromSlug', $data)) {
            $instance->fromSlug = $data['fromSlug'];
        }
        if (array_key_exists('toSlug', $data)) {
            $instance->toSlug = $data['toSlug'];
        }
        if (array_key_exists('articleId', $data)) {
            $instance->articleId = $data['articleId'];
        }
        if (array_key_exists('createdAt', $data)) {
            $instance->createdAt = $data['createdAt'];
        }
        if (array_key_exists('updatedAt', $data)) {
            $instance->updatedAt = $data['updatedAt'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class RedirectList
{
    /** @var Redirect[] */
    public $redirects = null;
    /** @var Pagination */
    public $pagination = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('redirects', $data)) {
            $instance->redirects = $data['redirects'];
        }
        if (array_key_exists('pagination', $data)) {
            $instance->pagination = $data['pagination'];
        }

        $nested = [
            'redirects' => static fn (array $v): array => array_map(static fn ($x) => Redirect::fromArray($x), $v),
            'pagination' => static fn (array $v): Pagination => Pagination::fromArray($v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class TranslationCoverageRow
{
    /** @var 'article' | 'category' | 'subcategory' | 'form' */
    public $entityType = null;
    /** @var float */
    public $covered = null;
    /** @var float */
    public $total = null;
    /** @var array<string, float> */
    public $missingByLocale = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('entityType', $data)) {
            $instance->entityType = $data['entityType'];
        }
        if (array_key_exists('covered', $data)) {
            $instance->covered = $data['covered'];
        }
        if (array_key_exists('total', $data)) {
            $instance->total = $data['total'];
        }
        if (array_key_exists('missingByLocale', $data)) {
            $instance->missingByLocale = $data['missingByLocale'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class TranslationCoverageReport
{
    /** @var string[] */
    public $locales = null;
    /** @var TranslationCoverageRow[] */
    public $rows = null;
    /** @var float */
    public $completeness = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('locales', $data)) {
            $instance->locales = $data['locales'];
        }
        if (array_key_exists('rows', $data)) {
            $instance->rows = $data['rows'];
        }
        if (array_key_exists('completeness', $data)) {
            $instance->completeness = $data['completeness'];
        }

        $nested = [
            'rows' => static fn (array $v): array => array_map(static fn ($x) => TranslationCoverageRow::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ContentTypeProfile
{
    /** @var 'blog' | 'case_study' | 'landing' | 'news' */
    public $type = null;
    /** @var array<string, mixed> */
    public $length = null;
    /** @var array<string, float> */
    public $weights = null;
    /** @var ?string[] */
    public $optionalSignals = null;
    /** @var ?bool */
    public $requiresSummary = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('type', $data)) {
            $instance->type = $data['type'];
        }
        if (array_key_exists('length', $data)) {
            $instance->length = $data['length'];
        }
        if (array_key_exists('weights', $data)) {
            $instance->weights = $data['weights'];
        }
        if (array_key_exists('optionalSignals', $data)) {
            $instance->optionalSignals = $data['optionalSignals'];
        }
        if (array_key_exists('requiresSummary', $data)) {
            $instance->requiresSummary = $data['requiresSummary'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ContentTypeProfileWrapper
{
    /** @var ?ContentTypeProfile */
    public $profile = null;
    /** @var ?ContentTypeProfile[] */
    public $profiles = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('profile', $data)) {
            $instance->profile = $data['profile'];
        }
        if (array_key_exists('profiles', $data)) {
            $instance->profiles = $data['profiles'];
        }

        $nested = [
            'profile' => static fn (array $v): ContentTypeProfile => ContentTypeProfile::fromArray($v),
            'profiles' => static fn (array $v): array => array_map(static fn ($x) => ContentTypeProfile::fromArray($x), $v),
        ];
        foreach ($nested as $field => $convert) {
            if ($instance->{$field} !== null) {
                $instance->{$field} = $convert($instance->{$field});
            }
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class Envelope
{
    /** @var bool */
    public $success = null;
    /** @var float */
    public $statusCode = null;
    /** @var string */
    public $message = null;
    /** @var ?array<string, mixed> */
    public $data = null;

    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();
        if (array_key_exists('success', $data)) {
            $instance->success = $data['success'];
        }
        if (array_key_exists('statusCode', $data)) {
            $instance->statusCode = $data['statusCode'];
        }
        if (array_key_exists('message', $data)) {
            $instance->message = $data['message'];
        }
        if (array_key_exists('data', $data)) {
            $instance->data = $data['data'];
        }

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

/**
 * Generated from the OpenAPI spec — do not edit by hand.
 */
class ErrorResponse
{
    // No declared properties: this component is a list wrapper, whose
    // payload is reached through the key the server sent it under.
    /**
     * Build from a decoded JSON payload, ignoring unknown keys so a
     * server-side addition does not break an older client.
     */
    public static function fromArray(array $data): static
    {
        $instance = new static();

        return $instance;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
