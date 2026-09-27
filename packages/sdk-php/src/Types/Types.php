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
    /** @var ?array<string, mixed> */
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
class RepurposeResult
{
    /** @var ?string */
    public $articleId = null;
    /** @var ?array<string, RepurposedOutput> */
    public $platforms = null;
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

        return $instance;
    }

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
