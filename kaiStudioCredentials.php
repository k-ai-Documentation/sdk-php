<?php

class KaiStudioCredentials {

    private $organizationId;
    private $instanceId;
    private $apiKey;

    public function __construct($organizationId, $instanceId, $apiKey) {
        $this->organizationId = $organizationId;
        $this->instanceId = $instanceId;
        $this->apiKey = $apiKey;
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

}
?>
