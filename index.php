<?php
require_once(realpath(dirname(__FILE__) . "/modules/FileInstance.php"));
require_once(realpath(dirname(__FILE__) . "/modules/ManageInstance.php"));
require_once(realpath(dirname(__FILE__) . "/modules/Search.php"));
require_once(realpath(dirname(__FILE__) . "/modules/Thematic.php"));
require_once(realpath(dirname(__FILE__) . "/modules/KMAudit.php"));
require_once(realpath(dirname(__FILE__) . "/KaiStudioCredentials.php"));
require_once(realpath(dirname(__FILE__) . "/searchResult.php"));
require_once 'vendor/autoload.php';

class KaiStudio {

    private $credentials; 
    private $_search; 
    private $_fileInstance; 
    private $_manageInstance; 
    private $_thematic;
    private $_auditInstance;

    public function __construct(KaiStudioCredentials $credentials) {
        $this->credentials = $credentials;
        $this->_search = new Search($this->credentials);
        $this->_fileInstance = new FileInstance($this->credentials);
        $this->_manageInstance = new ManageInstance($this->credentials);
        $this->_thematic = new Thematic($this->credentials);
        $this->_auditInstance = new KMAudit($this->credentials);
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

}
