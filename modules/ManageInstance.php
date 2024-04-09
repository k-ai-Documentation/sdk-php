<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;


class ManageInstance {

    private $credentials;

    public function __construct(KaiStudioCredentials $credentials) {
        $this->credentials = $credentials;
    }

    public function getGlobalHealth(): bool {
        try {
            $client = new Client();
            $response = $client->request('GET', 'https://' . $this->credentials->getOrganizationId() . '.kai-studio.ai/' . $this->credentials->getInstanceId() . '/global/health', [
                'headers' => [
                    'api-key' => $this->credentials->getApiKey()
                ],
                'allow_redirects' => true,
            ]);
            return $response->getBody()->getContents() == 'OK' ? true : false;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function isApiAlive(): bool {
        try {
            $client = new Client();
            $response = $client->request('GET', 'https://' . $this->credentials->getOrganizationId() . '.kai-studio.ai/' . $this->credentials->getInstanceId() . '/health', [
                'headers' => [
                    'api-key' => $this->credentials->getApiKey()
                ]
            ]);
            return $response->getBody()->getContents() == 'OK' ? true : false;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function generateNewApiKey(): bool {
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://ima.kai-studio.ai/generate-new-apikey', [
                'headers' => [
                    'organization-id' => $this->credentials->getOrganizationId(),
                    'instance-id' => $this->credentials->getInstanceId(),
                    'api-key' => $this->credentials->getApiKey()
                ]
            ]); 
            return json_decode($response->getBody(), true)['response']; 
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function updateName($name): bool {
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://ima.kai-studio.ai/update-name', [
                'headers' => [
                    'organization-id' => $this->credentials->getOrganizationId(),
                    'instance-id' => $this->credentials->getInstanceId(),
                    'api-key' => $this->credentials->getApiKey()
                ],
                'json' => [
                    'name' => $name
                ]
            ]); 
            return json_decode($response->getBody(), true)['response']; 
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function deploy(): bool {
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://ima.kai-studio.ai/deploy', [
                'headers' => [
                    'organization-id' => $this->credentials->getOrganizationId(),
                    'instance-id' => $this->credentials->getInstanceId(),
                    'api-key' => $this->credentials->getApiKey()
                ]
            ]); 
            return json_decode($response->getBody(), true)['response']; 
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function delete(): bool {
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://ima.kai-studio.ai/delete', [
                'headers' => [
                    'organization-id' => $this->credentials->getOrganizationId(),
                    'instance-id' => $this->credentials->getInstanceId(),
                    'api-key' => $this->credentials->getApiKey()
                ]
            ]);
            return json_decode($response->getBody(), true)['response']; 
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function addKb(string $type, $options): array{
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://ima.kai-studio.ai/add-kb', [
                'headers' => [
                    'organization-id' => $this->credentials->getOrganizationId(),
                    'instance-id' => $this->credentials->getInstanceId(),
                    'api-key' => $this->credentials->getApiKey()
                ],
                'json' => [
                    'type' => $type,
                    'options' => $options
                ]
            ]);
            return json_decode($response->getBody(), true)['response']; 
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    
}
