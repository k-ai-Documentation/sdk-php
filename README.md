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

$credentials = new KaiStudioCredentials("your organization id",
    "your instance id",
    "your api key");

$kaistudio = new KaiStudio($credentials);
$search = $kaistudio->search();

echo "SEARCH QUERY: what is the history of France TV? \n";
var_dump($search->query("what is the history of France TV?", "userid"));
````

## Usage Guide
### File Management
[FileInstance.php](modules/FileInstance.php) provides methods for file management.
- uploadFilescreation, deletion, and modification.
- listFiles
- downloadFile
- uploadFiles
- removeFile

For example:
```php
$fileInstance = $kaistudio->fileInstance();
$fileInstance->uploadFiles($fileArray);
```

### Auditing
[KMAudit.php](modules/KMAudit.php) provides methods for auditing.
- getConflictInformationlows for tracking and auditing file changes.
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
- listSubtopics
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

<u>**For more examples, you can check the [example.php](example.php) file.**</u>

## Contributing
bxu@k-ai.ai

rmei@k-ai.ai

sngo@k-ai.ai


