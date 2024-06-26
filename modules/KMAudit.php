<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class KMAudit
{
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

    public function getConflictInformation($limit, $offset)
    {
        try {
            $response = $this->client->post('api/audit/conflict-information', [
                'json' => [
                    'offset' => $offset,
                    'limit' => $limit
                ]
            ]);
            return json_decode($response->getBody()->getContents(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function getDuplicatedInformation($limit, $offset)
    {
        try {
            $response = $this->client->post('api/audit/duplicated-information', [
                'json' => [
                    'offset' => $offset,
                    'limit' => $limit
                ]
            ]);
            return json_decode($response->getBody()->getContents(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function setConflictManaged($id)
    {
        try {
            $response = $this->client->post('api/audit/conflict-information/set-managed', [
                'json' => ['id' => $id]
            ]);
            return json_decode($response->getBody()->getContents(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function setDuplicatedInformationManaged($id)
    {
        try {
            $response = $this->client->post('api/audit/duplicated-information/set-managed', [
                'json' => ['id' => $id]
            ]);
            return json_decode($response->getBody()->getContents(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
