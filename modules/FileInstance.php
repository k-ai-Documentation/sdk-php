<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class FileInstance
{
    private $headers;
    private $client;

    public function __construct($headers)
    {
        $this->headers = $headers;
        $this->client = new Client([
            'base_uri' => 'https://fma.kai-studio.ai/',
            'headers' => $this->headers
        ]);
    }

    public function listFiles()
    {
        try {
            $response = $this->client->post('list-files');
            return json_decode($response->getBody()->getContents(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function downloadFile($fileName)
    {
        try {
            $response = $this->client->post('download-file', [
                'json' => ['fileName' => $fileName]
            ]);
            return json_decode($response->getBody()->getContents(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function uploadFiles(array $files)
    {
        if (empty($files)) {
            return [];
        }

        try {
            $multipart = [];
            foreach ($files as $file) {
                $multipart[] = [
                    'name' => 'files',
                    'contents' => fopen($file['tmp_name'], 'r'),
                    'filename' => $file['name']
                ];
            }
            
            $response = $this->client->post('upload-file', [
                'multipart' => $multipart
            ]);
            return json_decode($response->getBody()->getContents(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function removeFile($fileName)
    {
        try {
            $response = $this->client->post('delete-file', [
                'json' => ['file' => $fileName]
            ]);
            return json_decode($response->getBody()->getContents(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}