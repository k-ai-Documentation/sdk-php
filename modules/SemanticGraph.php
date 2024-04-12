<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class SemanticGraph {
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

    public function getNodes(int $limit, int $offset) {
        try {
            $response = $this->client->get('api/semantic-graph/nodes', [
                'json' => [
                    'limit' => $limit,
                    'offset' => $offset
                ]
            ]);
            return json_decode($response->getBody()->getContents(), true)['response'];
        }catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function getLinkedNodes(int $id) {
        try {
            $response = $this->client->get("api/semantic-graph/linked-nodes", [
                'json' => [
                    'id' => $id
                ]
            ]);
            return json_decode($response->getBody()->getContents(), true)['response'];
        }catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function getNodeByLabel(string $label) {
        try {
            $response = $this->client->get("api/semantic-graph/nodes-by-label", [
                'json' => [
                    'label' => $label
                ]
            ]);
            return json_decode($response->getBody()->getContents(), true)['response'];
        }catch (GuzzleException $e) {
            throw $e;
        }
    }
    public function detectApproximalNodes(string $query) {
        try {
            $response = $this->client->get("api/semantic-graph/identify-nodes", [
                'json' => [
                    'query' => $query
                ]
            ]);
            return json_decode($response->getBody()->getContents(), true)['response'];
        }catch (GuzzleException $e) {
            throw $e;
        }
    }

}