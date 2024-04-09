<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;


class Search {
    private $credentials;

    public function __construct(KaiStudioCredentials $credentials) {
        $this->credentials = $credentials;
    }

    public function query(string $query, string $user): SearchResult {
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://' . $this->credentials->getOrganizationId() . '.kai-studio.ai/' . $this->credentials->getInstanceId() . '/api/search/query', [
                'headers' => [
                    'api-key' => $this->credentials->getApiKey()
                ],
                'json' => [
                    'query' => $query,
                    'user' => $user
                ]
            ]);
            $response = json_decode($response->getBody(), true)['response'];
            return new SearchResult($response['query'], $response['answer'], $response['confidentRate'], $response['gotAnswer'], $response['reason'], $response['documents'], $response['followingQuestions']);
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
    public function getRelatedDocuments(string $query): array {
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


}