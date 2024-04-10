<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Thematic {
    private $credentials;

    public function __construct(KaiStudioCredentials $credentials) {
        $this->credentials = $credentials;
    }

    public function getTopic(string $topic) {
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://' . $this->credentials->getOrganizationId() . '.kai-studio.ai/' . $this->credentials->getInstanceId() . '/api/audit/topic', [
                'headers' => [
                    'api-key' => $this->credentials->getApiKey()
                ],
                'json' => [
                    'topic' => $topic
                ]
            ]);
            return json_decode($response->getBody(), true)['response'];
        }catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function getKbs() :array{
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://' . $this->credentials->getOrganizationId() . '.kai-studio.ai/' . $this->credentials->getInstanceId() . '/api/audit/kbs', [
                'headers' => [
                    'api-key' => $this->credentials->getApiKey()
                ]
            ]);
            return json_decode($response->getBody(), true)['response'];
        }catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function getDocuments():array {
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://' . $this->credentials->getOrganizationId() . '.kai-studio.ai/' . $this->credentials->getInstanceId() . '/api/audit/documents', [
                'headers' => [
                    'api-key' => $this->credentials->getApiKey()
                ]
            ]);
            return json_decode($response->getBody(), true)['response'];
        }catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function addAuditQuestion(string $question, string $answer):bool {
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://' . $this->credentials->getOrganizationId() . '.kai-studio.ai/' . $this->credentials->getInstanceId() . '/api/audit/add-audit-question', [
                'headers' => [
                    'api-key' => $this->credentials->getApiKey()
                ],
                'json'=> [
                    'question' => $question,
                    'answer' => $answer
                ]
            ]);
            return json_decode($response->getBody(), true)['response'];
        }catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function updateAuditQuestion(string $id, string $question, string $answer):bool {
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://' . $this->credentials->getOrganizationId() . '.kai-studio.ai/' . $this->credentials->getInstanceId() . '/api/audit/update-audit-question', [
                'headers' => [
                    'api-key' => $this->credentials->getApiKey()
                ],
                'json'=> [
                    'id' => $id,
                    'question' => $question,
                    'answer' => $answer
                ]
            ]);
            return json_decode($response->getBody(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        } 
    }

    public function listAuditQuestions():array {
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://' . $this->credentials->getOrganizationId() . '.kai-studio.ai/' . $this->credentials->getInstanceId() . '/api/audit/list-audit-questions', [
                'headers' => [
                    'api-key' => $this->credentials->getApiKey()
                ]
            ]);
            return json_decode($response->getBody(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        } 
    }

    public function getTestRunningState():array {
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://' . $this->credentials->getOrganizationId() . '.kai-studio.ai/' . $this->credentials->getInstanceId() . '/api/audit/test-running-state', [
                'headers' => [
                    'api-key' => $this->credentials->getApiKey()
                ]
            ]);
            return json_decode($response->getBody(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function runTest():string {
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://' . $this->credentials->getOrganizationId() . '.kai-studio.ai/' . $this->credentials->getInstanceId() . '/api/audit/run-test', [
                'headers' => [
                    'api-key' => $this->credentials->getApiKey()
                ]
            ]);
            return json_decode($response->getBody(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function listTopics(int $limit, int $offset): array {
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://' . $this->credentials->getOrganizationId() . '.kai-studio.ai/' . $this->credentials->getInstanceId() . '/api/audit/list/topics', [
                'headers' => [
                    'api-key' => $this->credentials->getApiKey()
                ],
                'json' => [
                    'limit' => $limit,
                    'offset' => $offset
                ]
            ]);
            return json_decode($response->getBody(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function listSubtopics(string $topicName):array {
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://' . $this->credentials->getOrganizationId() . '.kai-studio.ai/' . $this->credentials->getInstanceId() . '/api/audit/list/subtopics', [
                'headers' => [
                    'api-key' => $this->credentials->getApiKey()
                ],
                'json' => [
                    'topicName' => $topicName
                ]
            ]);
            return json_decode($response->getBody(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function getSubtopic(string $subtopic):array {
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://' . $this->credentials->getOrganizationId() . '.kai-studio.ai/' . $this->credentials->getInstanceId() . '/api/audit/subtopic', [
                'headers' => [
                    'api-key' => $this->credentials->getApiKey()
                ],
                'json' => [
                    'subtopic' => $subtopic
                ]
            ]);
            return json_decode($response->getBody(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function countTopics():int {
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://' . $this->credentials->getOrganizationId() . '.kai-studio.ai/' . $this->credentials->getInstanceId() . '/api/audit/stats/count-topics', [
                'headers' => [
                    'api-key' => $this->credentials->getApiKey()
                ]
            ]);
            return json_decode($response->getBody(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
    

    public function countSubtopics():int {
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://' . $this->credentials->getOrganizationId() . '.kai-studio.ai/' . $this->credentials->getInstanceId() . '/api/audit/stats/count-subtopics', [
                'headers' => [
                    'api-key' => $this->credentials->getApiKey()
                ]
            ]);
            return json_decode($response->getBody(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function countDocuments():int {
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://' . $this->credentials->getOrganizationId() . '.kai-studio.ai/' . $this->credentials->getInstanceId() . '/api/audit/stats/count-documents', [
                'headers' => [
                    'api-key' => $this->credentials->getApiKey()
                ]
            ]);
            return json_decode($response->getBody(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function countAuditQuestions():int {
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://' . $this->credentials->getOrganizationId() . '.kai-studio.ai/' . $this->credentials->getInstanceId() . '/api/audit/stats/count-audit-questions', [
                'headers' => [
                    'api-key' => $this->credentials->getApiKey()
                ]
            ]);
            return json_decode($response->getBody(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function countValidatedAuditQuestions():int {
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://' . $this->credentials->getOrganizationId() . '.kai-studio.ai/' . $this->credentials->getInstanceId() . '/api/audit/stats/count-validated-audit-questions', [
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
