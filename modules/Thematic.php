<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Thematic {
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
    public function getTopic($topic)
    {
        try {
            $response = $this->client->post('api/audit/topic', [
                'json' => ['topic' => $topic]
            ]);
            return json_decode($response->getBody()->getContents(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function getKbs()
    {
        try {
            $response = $this->client->post('api/audit/kbs');
            return json_decode($response->getBody()->getContents(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function getDocuments()
    {
        try {
            $response = $this->client->post('api/audit/documents');
            return json_decode($response->getBody()->getContents(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function addAuditQuestion($question, $answer)
    {
        try {
            $response = $this->client->post('api/audit/add-audit-question', [
                'json' => [
                    'question' => $question,
                    'answer' => $answer
                ]
            ]);
            return json_decode($response->getBody()->getContents(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function updateAuditQuestion($id, $question, $answer)
    {
        try {
            $response = $this->client->post('api/audit/update-audit-question', [
                'json' => [
                    'id' => $id,
                    'question' => $question,
                    'answer' => $answer
                ]
            ]);
            return json_decode($response->getBody()->getContents(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function listAuditQuestions()
    {
        try {
            $response = $this->client->post('api/audit/list-audit-questions');
            return json_decode($response->getBody()->getContents(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function getTestRunningState()
    {
        try {
            $response = $this->client->post('api/audit/test-running-state');
            return json_decode($response->getBody()->getContents(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function runTest()
    {
        try {
            $response = $this->client->post('api/audit/run-test');
            return json_decode($response->getBody()->getContents(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function listTopics($limit, $offset)
    {
        try {
            $response = $this->client->post('api/thematic/list/topics', [
                'json' => [
                    'limit' => $limit,
                    'offset' => $offset
                ]
            ]);
            return json_decode($response->getBody()->getContents(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function getSubtopic($subtopic)
    {
        try {
            $response = $this->client->post('api/audit/subtopic', [
                'json' => ['subtopic' => $subtopic]
            ]);
            return json_decode($response->getBody()->getContents(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function countTopics()
    {
        try {
            $response = $this->client->post('api/audit/stats/count-topics');
            return json_decode($response->getBody()->getContents(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
    

    public function countSubtopics():int {
        try {
            $response = $this->client->post('api/audit/stats/count-subtopics');
            return json_decode($response->getBody()->getContents(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function countDocuments():int {
        try {
            $response = $this->client->post('api/audit/stats/count-documents');
            return json_decode($response->getBody()->getContents(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function countAuditQuestions():int {
        try {
            $response = $this->client->post('api/audit/stats/count-audit-questions');
            return json_decode($response->getBody()->getContents(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function countValidatedAuditQuestions():int {
        try {
            $response = $this->client->post('api/audit/stats/count-validated-audit-questions');
            return json_decode($response->getBody()->getContents(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
