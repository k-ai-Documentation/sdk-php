<?php
require_once(realpath(dirname(__FILE__) . "/index.php"));

$credentials = new KaiStudioCredentials("your organization id", "your instance id", "your api key");

$kaistudio = new KaiStudio($credentials);

echo "Organization ID: " . $kaistudio->getCredentials()->getOrganizationId() . "\n";
echo "Instance ID: " . $kaistudio->getCredentials()->getInstanceId() . "\n";
echo "API Key: " . $kaistudio->getCredentials()->getApiKey() . "\n";

echo "search: what is our goal ? \n";
var_dump($kaistudio->search()->query("what is our goal ?", "userid"));

echo "Count done requests: \n";
var_dump($kaistudio->search()->countDoneRequests());

echo "Count validated audit questions: \n";
var_dump($kaistudio->audit()->countValidatedAuditQuestions()) ;

?>
