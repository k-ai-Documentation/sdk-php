<?php

class KaiStudioCredentials {

    private $organizationId;
    private $instanceId;
    private $apiKey;
    private $host;

    public function __construct($organizationId=null, $instanceId=null, $apiKey=null,$host=null) {
        $this->organizationId = $organizationId;
        $this->instanceId = $instanceId;
        $this->apiKey = $apiKey;
        $this->host = $host;
    }

    public function getOrganizationId() {
        return $this->organizationId;
    }

    public function getInstanceId() {
        return $this->instanceId;
    }

    public function getApiKey() {
        return $this->apiKey;
    }

    public function getHost() {
        return $this->host;
    }

    public function setOrganizationId($organizationId) {
        $this->organizationId = $organizationId;
    }

    public function setInstanceId($instanceId) {
        $this->instanceId = $instanceId;
    }

    public function setApiKey($apiKey) {
        $this->apiKey = $apiKey;
    }

    public function setHost($host) {
        $this->host = $host;

}

