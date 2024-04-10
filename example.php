<?php
require_once(realpath(dirname(__FILE__) . "/index.php"));

$credentials = new KaiStudioCredentials("your organization id",
    "your instance id",
    "your api key");

$kaistudio = new KaiStudio($credentials);
$fileInstance = $kaistudio->fileInstance();
$manageInstance = $kaistudio->manageInstance();
$search = $kaistudio->search();
$auditInstance = $kaistudio->auditInstance();
$thematic = $kaistudio->thematic();

echo "Organization ID: " . $kaistudio->getCredentials()->getOrganizationId() . "\n";
echo "Instance ID: " . $kaistudio->getCredentials()->getInstanceId() . "\n";
echo "API Key: " . $kaistudio->getCredentials()->getApiKey() . "\n";


$filePath = __DIR__ . '/your file path';
$fileContent = fopen($filePath, 'r');
$fileArray = array($fileContent);
echo "UPLOAD FILE: \n";
var_dump($fileInstance->uploadFiles($fileArray));

echo "LIST FILES: \n";
var_dump($fileInstance->listFiles());

echo "GET GLOBAL HEALTH: \n";
var_dump($manageInstance->getGlobalHealth());

echo "IS API ALIVE: \n";
var_dump($manageInstance->isApiAlive());

echo "SEARCH QUERY: what is the history of France TV? \n";
var_dump($search->query("what is the history of France TV?", "userid"));

echo "GET RELATED DOCUMENTS: \n";
var_dump($search->getRelatedDocuments("TV?"));

echo "GET DOC SIGNATURE: \n";
var_dump($search->getDocSignature("Azure Blob Storage::{{blob storage id}}::Contacter FranceTV.docx"));

echo "GET DOCS BY IDS: \n";
var_dump($search->getDocsIds(["Azure Blob Storage::{{blob storage id}}::Contacter FranceTV.docx",
"Azure Blob Storage::b6b33cc0-8fe4-4829-bf27-2df41d3f74a9::Histoire FTV.docx"]));

echo "COUNT DONE REQUESTS: \n";
var_dump($search->countDoneRequests());

echo "COUNT ANSWERED + DONE REQUESTS: \n";
var_dump($search->countAnsweredDoneRequests());

echo "GET TOPIC: \n";
var_dump($thematic->getTopic("TV?"));

echo "GET KBS: \n";
var_dump($thematic->getKbs());

echo "GET DOCUMENTS: \n";
var_dump($thematic->getDocuments());

echo "LIST AUDIT QUESTIONS: \n";
var_dump($thematic->listAuditQuestions());

echo "GET TEST RUNNING STATE: \n";
var_dump($thematic->getTestRunningState());

echo "LIST TOPICS: \n";
var_dump($thematic->listTopics(20, 0));

echo "GET SUBTOPIC: \n";
var_dump($thematic->getSubtopic("visio-chat"));

echo "COUNT TOPICS: \n";
var_dump($thematic->countTopics());

echo "COUNT SUBTOPICS:";
var_dump($thematic->countSubtopics());

echo "COUNT DOCUMENTS: \n";
var_dump($thematic->countDocuments());

echo "COUNT AUDIT QUESTIONS: \n";
var_dump($thematic->countAuditQuestions());

echo "COUNT VALIDATED AUDIT QUESTIONS: \n";
var_dump($thematic->countValidatedAuditQuestions());


