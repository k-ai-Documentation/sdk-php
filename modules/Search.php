<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;


class Search {
    private $headers;
    private $baseUrl;
    private $client;

    public function __construct($headers, $baseUrl)
    {
        $this->headers = $headers;
        $this->baseUrl = $baseUrl;
        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'headers' => $this->headers
        ]);
    }

    public function query(string $query, string $user) {
        try {
            $response = $this->client->request('POST', 'api/search/query', [
                'json' => [
                    'query' => $query,
                    'user' => $user
                ]
            ]);
            return json_decode($response->getBody()->getContents(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
    public function getRelatedDocuments(string $query) {
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://' . $this->credentials->getOrganizationId() . '.kai-studio.ai/' . $this->credentials->getInstanceId() . '/api/search/related-documents', [
                'headers' => [
                    'api-key' => $this->credentials->getApiKey()
                ],
                'json' => [
                    'query' => $query
                ]
            ]);
            return json_decode($response->getBody(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
    public function countAnalyzedDocuments(): int {
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://' . $this->credentials->getOrganizationId() . '.kai-studio.ai/' . $this->credentials->getInstanceId() . '/api/thematic/stats/count-documents', [
                'headers' => [
                    'api-key' => $this->credentials->getApiKey()
                ]
            ]);
            return json_decode($response->getBody(), true)['response'];
        }
    }
    public function getDocSignature(string $docId): array {
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://' . $this->credentials->getOrganizationId() . '.kai-studio.ai/' . $this->credentials->getInstanceId() . '/api/search/doc/' . $docId, [
                'headers' => [
                    'api-key' => $this->credentials->getApiKey()
                ]
            ]);
            return json_decode($response->getBody(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
    public function getDocsIds(array $docIds): array {
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://' . $this->credentials->getOrganizationId() . '.kai-studio.ai/' . $this->credentials->getInstanceId() . '/api/search/docs', [
                'headers' => [
                    'api-key' => $this->credentials->getApiKey()
                ],
                'json' => [
                    'docIds' => $docIds
                ]
            ]);
            return json_decode($response->getBody(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
    public function generateFollowingQuestion(string $previousAnswer, string $comment): array {
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://' . $this->credentials->getOrganizationId() . '.kai-studio.ai/' . $this->credentials->getInstanceId() . '/api/search/generate-following-question', [
                'headers' => [
                    'api-key' => $this->credentials->getApiKey()
                ],
                'json' => [
                    'previousAnswer' => $previousAnswer,
                    'comment' => $comment
                ]
            ]);
            return json_decode($response->getBody(), true)['response'];
        }catch (GuzzleException $e) {
            throw $e;
        }
    }
    public function countDoneRequests(): int {
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://' . $this->credentials->getOrganizationId() . '.kai-studio.ai/' . $this->credentials->getInstanceId() . '/api/search/stats/count-search', [
                'headers' => [
                    'api-key' => $this->credentials->getApiKey()
                ]
            ]);
            return json_decode($response->getBody(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function countAnsweredDoneRequests(): int {
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://' . $this->credentials->getOrganizationId() . '.kai-studio.ai/' . $this->credentials->getInstanceId() . '/api/search/stats/count-answered-search', [
                'headers' => [
                    'api-key' => $this->credentials->getApiKey()
                ]
            ]);
            return json_decode($response->getBody(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function listQuestionsAsked(int $offset = 0, int $limit = 20) {
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://' . $this->credentials->getOrganizationId() . '.kai-studio.ai/' . $this->credentials->getInstanceId() . '/api/search/stats/list-search', [
                'headers' => [
                    'api-key' => $this->credentials->getApiKey()
                ],
                'json' => [
                    'offset' => $offset,
                    'limit' => $limit
                ]
            ]);
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

}