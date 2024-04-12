<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ManageInstance
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

    public function getGlobalHealth()
    {
        try {
            $response = $this->client->get('global/health');
            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function isApiAlive()
    {
        try {
            $response = $this->client->get('health');
            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function generateNewApiKey()
    {
        try {
            $response = $this->client->post('https://ima.kai-studio.ai/generate-new-apikey');
            return json_decode($response->getBody()->getContents(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function updateName($name)
    {
        try {
            $response = $this->client->post('https://ima.kai-studio.ai/update-name', [
                'json' => ['name' => $name]
            ]);
            return json_decode($response->getBody()->getContents(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function deploy()
    {
        try {
            $response = $this->client->post('https://ima.kai-studio.ai/deploy');
            return json_decode($response->getBody()->getContents(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function delete()
    {
        try {
            $response = $this->client->post('https://ima.kai-studio.ai/delete');
            return json_decode($response->getBody()->getContents(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function addKb($type, $options)
    {
        try {
            $response = $this->client->post('https://ima.kai-studio.ai/add-kb', [
                'json' => ['type' => $type, 'options' => $options]
            ]);
            return json_decode($response->getBody()->getContents(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function setPlayground($typeList)
    {
        try {
            $response = $this->client->post('https://ima.kai-studio.ai/set-playground', [
                'json' => ['typeList' => $typeList]
            ]);
            return json_decode($response->getBody()->getContents(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function updateKb($id, $options)
    {
        try {
            $response = $this->client->post('https://ima.kai-studio.ai/update-kb', [
                'json' => ['id' => $id, 'options' => $options]
            ]);
            return json_decode($response->getBody()->getContents(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function removeKb($id)
    {
        try {
            $response = $this->client->post('https://ima.kai-studio.ai/remove-kb', [
                'json' => ['id' => $id]
            ]);
            return json_decode($response->getBody()->getContents(), true)['response'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
