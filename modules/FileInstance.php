<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class FileInstance {

    private $credentials;

    public function __construct(KaiStudioCredentials $credentials) {
        $this->credentials = $credentials;
    }

    public function listFiles(): array{
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://fma.kai-studio.ai/list-files', [
                'headers' => [
                    'organization-id' => $this->credentials->getOrganizationId(),
                    'instance-id' => $this->credentials->getInstanceId(),
                    'api-key' => $this->credentials->getApiKey(),
                ]
            ]);
            return json_decode($response->getBody(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function downloadFile($fileName): array{
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://fma.kai-studio.ai/download-file', [
                'headers' => [
                    'organization-id' => $this->credentials->getOrganizationId(),
                    'instance-id' => $this->credentials->getInstanceId(),
                    'api-key' => $this->credentials->getApiKey()
                ],
                'json' => [
                    'fileName'=> $fileName
                ]
            ]);
            return json_decode($response->getBody(), true)['response'];
        }catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function uploadFiles($files) {
        if(count($files) == 0) {
            return [];
        }
        try {
            $client = new Client();

            $result = array();
            foreach($files as $file) {
                $fileArray = array(
                    "name" => 'files',
                    "contents" => fopen($file, "rb")
                );
                $result[] = $fileArray;
            }
            $response = $client->request('POST', 'https://fma.kai-studio.ai/upload-file', [
                'headers' => [
                    'organization-id' => $this->credentials->getOrganizationId(),
                    'instance-id' => $this->credentials->getInstanceId(),
                    'api-key' => $this->credentials->getApiKey(),
                ],
                'multipart' => $result
            ]);
            
            return json_decode($response->getBody(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function removeFile($fileName):bool{
        try {
            $client = new Client();
            $response = $client->request('POST', 'https://fma.kai-studio.ai/delete-file', [
                'headers' => [
                    'organization-id' => $this->credentials->getOrganizationId(),
                    'instance-id' => $this->credentials->getInstanceId(),
                    'api-key' => $this->credentials->getApiKey()
                ],
                'json' => [
                    'file' => $fileName
                    ]
            ]);
            return json_decode($response->getBody(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }


}
