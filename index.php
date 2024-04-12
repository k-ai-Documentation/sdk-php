<?php
require_once(realpath(dirname(__FILE__) . "/modules/FileInstance.php"));
require_once(realpath(dirname(__FILE__) . "/modules/ManageInstance.php"));
require_once(realpath(dirname(__FILE__) . "/modules/Search.php"));
require_once(realpath(dirname(__FILE__) . "/modules/Thematic.php"));
require_once(realpath(dirname(__FILE__) . "/modules/KMAudit.php"));
require_once(realpath(dirname(__FILE__) . "/modules/SemanticGraph.php"));
require_once(realpath(dirname(__FILE__) . "/KaiStudioCredentials.php"));
require_once 'vendor/autoload.php';

class KaiStudio {

    private $credentials; 
    private $headers;
    private $baseUrl;

    private $_search; 
    private $_fileInstance; 
    private $_manageInstance; 
    private $_thematic;
    private $_auditInstance;
    private $_semanticGraph;

    public function __construct(KaiStudioCredentials $credentials) {
        $this->credentials = $credentials;
        $this->headers = [];
        $this->baseUrl = '';

        if (!empty($this->credentials->getOrganizationId()) && !empty($this->credentials->getInstanceId()) && !empty($this->credentials->getApiKey())) {
            $this->headers = [
                'organization-id' => $this->credentials->getOrganizationId(),
                'instance-id' => $this->credentials->getInstanceId(),
                'api-key' => $this->credentials->getApiKey()
            ];

            $this->baseUrl = "https://{$this->credentials->getOrganizationId()}.kai-studio.ai/{$this->credentials->getInstanceId()}/";
        }

        if (!empty($this->credentials->getHost())) {
            $this->baseUrl = $this->credentials->getHost();
            if (!empty($this->credentials->getApiKey())) {
                $this->headers = [
                    'api-key' => $this->credentials->getApiKey()
                ];
            }
        }

        $this->_search = new Search($this->headers, $this->baseUrl);
        $this->_auditInstance = new KMAudit($this->headers, $this->baseUrl);
        $this->_thematic = new Thematic($this->headers, $this->baseUrl);
        $this->_semanticGraph = new SemanticGraph($this->headers, $this->baseUrl);
        $this->_manageInstance = new ManageInstance($this->headers, $this->baseUrl);
        $this->_fileInstance = new FileInstance($this->headers);
    }

    public function getCredentials() {
        return $this->credentials;
    }

    public function search() {
        return $this->_search;
    }

    public function fileInstance() {
        return $this->_fileInstance;
    }

    public function manageInstance() {
        return $this->_manageInstance;
    }

    public function thematic() {
        return $this->_thematic;
    }

    public function auditInstance() {
        return $this->_auditInstance;
    }

    public function semanticGraph() {
        return $this->_semanticGraph;
    }
}
