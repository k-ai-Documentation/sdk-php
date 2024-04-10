<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class KMAudit {
    private $credentials;
    
    public function __construct($credentials) {
        $this->credentials = $credentials;
    }
    public function getConflictInformation(int $limit, int $offset): SearchResult{
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://' . $this->credentials->getOrganizationId() . '.kai-studio.ai/' . $this->credentials->getInstanceId() . '/api/audit/conflict-information', [
                'headers' => [
                    'api-key' => $this->credentials->getApiKey()
                ],
                'json' => [
                    'offset'=> $offset,
                    'limit'=> $limit
                ]
            ]);
            $response = json_decode($response->getBody(), true)['response'];
            return new SearchResult($response['query'], $response['answer'], $response['confidentRate'], $response['gotAnswer'], $response['reason'], $response['documents'], $response['followingQuestions']);
        }catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function getDuplicatedInformation(int $limit, int $offset): SearchResult {
        try{
            $client = new Client();
            $response = $client->request('POST', 'https://' . $this->credentials->getOrganizationId() . '.kai-studio.ai/' . $this->credentials->getInstanceId() . '/api/audit/duplicated-information', [
                'headers' => [
                    'api-key' => $this->credentials->getApiKey()
                ],
                'json' => [
                    'offset'=> $offset,
                    'limit'=> $limit
                ]
            ]);
            $response = json_decode($response->getBody(), true)['response'];
            return new SearchResult($response['query'], $response['answer'], $response['confidentRate'], $response['gotAnswer'], $response['reason'], $response['documents'], $response['followingQuestions']);
        }catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function setConflictManaged(int $id): SearchResult {
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://' . $this->credentials->getOrganizationId() . '.kai-studio.ai/' . $this->credentials->getInstanceId() . '/api/audit/conflict-information/set-managed', [
                'header' => [
                    'api-key' => $this->credentials->getApiKey()
                ],
                'json' => [
                    'id' => $id
                ]
            ]);
            $response = json_decode($response->getBody(), true)['response'];
            return new SearchResult($response['query'], $response['answer'], $response['confidentRate'], $response['gotAnswer'], $response['reason'], $response['documents'], $response['followingQuestions']);
        }catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function setDuplicatedInformationManaged(int $id): SearchResult {
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://' . $this->credentials->getOrganizationId() . '.kai-studio.ai/' . $this->credentials->getInstanceId() . '/api/audit/conflict-information/set-managed', [
                'header' => [
                    'api-key' => $this->credentials->getApiKey()
                ],
                'json' => [
                    'id' => $id
                ]
            ]);
            $response = json_decode($response->getBody(), true)['response'];
            return new SearchResult($response['query'], $response['answer'], $response['confidentRate'], $response['gotAnswer'], $response['reason'], $response['documents'], $response['followingQuestions']);
        }catch (GuzzleException $e) {
            throw $e;
        }
    }
}