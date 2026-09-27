<?php

declare(strict_types=1);

namespace Octavia\CmsSDK;

class CMS
{
    public const SITE = 'https://octaviatech.app';
    public const SIGNUP_URL = self::SITE;
    public const BASE_URL = 'https://api.octaviatech.app/cms';

    public Client $raw;
    // @generated facade:begin
    public $ai;
    public $aiConversation;
    public $article;
    public $author;
    public $category;
    public $form;
    public $formSubmission;
    public $language;
    public $report;
    public $subcategory;
    public $tag;
    // @generated facade:end

    public static function init(string $apiKey, array $options = []): self
    {
        $timeoutMs = (int)($options['timeoutMs'] ?? 0);
        $throwOnError = (bool)($options['throwOnError'] ?? false);

        $config = new ClientConfig(self::BASE_URL, $apiKey, $timeoutMs, $throwOnError);
        $client = new Client($config);

        $cms = new self();
        $cms->raw = $client;
        // @generated assign:begin
        $cms->ai = $client->ai;
        $cms->aiConversation = $client->aIConversation;
        $cms->article = $client->articles;
        $cms->author = $client->authors;
        $cms->category = $client->categories;
        $cms->form = $client->forms;
        $cms->formSubmission = $client->formSubmissions;
        $cms->language = $client->languages;
        $cms->report = $client->reports;
        $cms->subcategory = $client->subcategories;
        $cms->tag = $client->tags;
        // @generated assign:end

        return $cms;
    }
}
