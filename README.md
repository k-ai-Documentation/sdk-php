# sdk-php

## Introduction
SDK php enables developers to efficiently manage files, instance, perform searches, handle thematic content, and conduct audits. This toolkit is designed to streamline the integration of complex functionalities into PHP-based projects.

## Installation
To integrate the SDK into your PHP project, include the SDK files in your project directory. Then, use the following require statements in your PHP 


run composer in terminal

```bash
composer install
```

## Quick start
Here's a simple example to get you started with the SDK. This example demonstrates how to instantiate a new search and perform basic operations:
```php
<?php
require_once(realpath(dirname(__FILE__) . "/index.php"));

// for SaaS user
$credentials = new KaiStudioCredentials("your organization id",
    "your instance id",
    "your api key");
// for premise user
//$credentials = new KaiStudioCredentials("your host", "your api key");

$kaistudio = new KaiStudio($credentials);
$search = $kaistudio->search();

echo "SEARCH QUERY: what is the history of France TV? \n";
var_dump($search->query("what is the history of France TV?", "userid"));
```

## Usage Guide
There are two type of versions: SaaS version and Premise version.

SaaS version means you are using the service provided by Kai with cloud service. In this case, you will need 3 keys (organizationId, instanceId, apiKey) to initialize kaiStudio. Please refer to the following code in [index.php](index.php):
```php
if (this.credentials.organizationId && this.credentials.instanceId && this.credentials.apiKey) {
    headers = {
        'organization-id': this.credentials.organizationId,
        'instance-id': this.credentials.instanceId,
        'api-key': this.credentials.apiKey
    }

    baseUrl = `https://${this.credentials.organizationId}.kai-studio.ai/${this.credentials.instanceId}/`
}
```

Premise version means you are using the service in your local server in your enterprise. In this case, you will need host and api key (optional) to initialize kaiStudio. Please refer to the following code in [index.php](index.php):
```php
if (!empty($this->credentials->getHost())) {
    $this->baseUrl = $this->credentials->getHost();
    if (!empty($this->credentials->getApiKey())) {
        $this->headers = [
            'api-key' => $this->credentials->getApiKey()
        ];
    }
}
```
---

There are 6 modules in the SDK:

| [File Management](#file-management) | [Audit](#audit) | [ManageInstance](#manageinstance) | [Thematic](#thematic) | [SemanticGraph](#semanticgraph) | [Search](#search) |


### File Management
[FileInstance.php](modules/FileInstance.php) provides methods for file management.
- listFiles
- downloadFile
- uploadFiles
- removeFile

For example:
```php
$fileInstance = $kaistudio->fileInstance();
$fileInstance->uploadFiles($fileArray);
```

### Audit
[KMAudit.php](modules/KMAudit.php) provides methods for auditing.
- getConflictInformation
- getDuplicatedInformation
- setConflictManaged
- setDuplicatedInformationManaged

For example:
```php
$auditInstance = $kaistudio->auditInstance();
$auditInstance->getConflictInformation($fileId);
```
### ManageInstance
[ManageInstance.php](modules/ManageInstance.php) provides methods for managing instance.
- getGlobalHealth
- isApiAlive
- generateNewApiKey
- updateName
- deploy
- delete
- addKb
- setPlayground
- updateKb
- removeKb

For example:
```php
$manageInstance = $kaistudio->manageInstance();
$manageInstance->getGlobalHealth();
```

### Thematic
[Thematic.php](modules/Thematic.php) provides methods for managing thematic content.
- getTopic
- getKbs
- getDocuments
- addAuditQuestion
- updateAuditQuestion
- listAuditQuestions
- getTestRunningState
- runTest
- listTopics
- getSubtopic
- countTopics
- countSubtopics
- countDocuments
- countAuditQuestions
- countValidatedAuditQuestions

For example:
```php
$thematicInstance = $kaistudio->thematicInstance();
$thematicInstance->getKbs();
```

### SemanticGraph
[SemanticGraph.php](modules/SemanticGraph.php) provides methods for managing semantic graph.
- getNodes
- getLinkedNodes
- getNodeByLabel
- detectApproximalNodes

For example:
```php
$thematicInstance = $kaistudio->thematicInstance();
$thematicInstance->getKbs();
```

### Search
[Search.php](modules/Search.php) provides methods for searching.
- search
- getRelatedDocuments
- countAnalyzedDocuments
- getDocSignature
- getDocsIds
- countDoneRequests
- countAnsweredDoneRequests
- generateFollowingQuestion
- listQuestionsAsked
```php
$searchInstance = $kaistudio->searchInstance();
$searchInstance->query("what is the history of France TV?", "userid");
```

<u>**For more examples, you can check the [example.php](example.php) file.**</u>

## Contributing
bxu@k-ai.ai

rmei@k-ai.ai

sngo@k-ai.ai


