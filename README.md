TEXTKING API bindings for PHP
=============================

This library provides an object oriented interface to the
[TEXTKING translation API](https://github.com/TextKing/textking-api/wiki).
The TEXTKING translation API is a RESTful web service which allows you to automate
your translation processes using the high quality human translations offered by
the TEXTKING translation agency.


Features
--------

* Get information about your prepared, running and completed translation projects.
* Create and commission new translation projects
* Upload documents for translation in various file formats
* Perform a cost analysis for uploaded documents
* Get informed about the state of a translation in progress
* Download the translated documents


Requirements
------------

* PHP >= 5.3
* [Guzzle](http://docs.guzzlephp.org/en/latest/index.html)
* [Composer](http://getcomposer.org)


Installing via Composer
-----------------------

The recommended way to install the TEXTKING API is through
[Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php

# Add TEXTKING API as a dependency
php composer.phar require textking/api:~0.1
```

This will install the TEXTKING API and its dependencies into your project.

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

Usage
-----

The following example demonstrates how you can use the TEXTKING API to
submit a text for translation.

```php
<?php
require __DIR__ . '/../vendor/autoload.php';

use TextKing\Model\Project;
use TextKing\Model\Job;
use TextKing\Model\Document;

// This is your OAuth 2 access token
// See https://github.com/TextKing/textking-api/wiki/Authorization-and-authentication
define("API_ACCESS_TOKEN", "youraccesstoken");

// Create a new service instance
$service = new Service(API_ACCESS_TOKEN);

// Create a new translation project
$project = new Project();
$project->setName("My translation project");
$project = $service->createProject($project);

// Now add a new translation job English to German to the project.
// A project can have multiple jobs.
$job = new Job();
$job->setName("My translation job");
$job->setSourceLanguage("en");
$job->setTargetLanguage("de");
$job->setQuality(Job::QUALITY_TRANSLATION);
$job = $this->service->createJob($project->getId(), $job);

// We have to upload the text to translate to the job.
// This could be a file stream, but in this example we just
// use some plain text.
$text = "In another moment down went Alice after it, never once considering how in the world she was to get out again.";
$document = Document::createFromString($text);
$this->service->uploadDocument($project->getId(), $job->getId(), $document);

// Now get an updated version of the project to see the pricing.
$project = $service->getProject($project->getId());
echo "Net price: " . $project->getNetPrice() . " " . $project->getCurrency() . "\n"
echo "VAT: " . $project->getVat() . " " . $project->getCurrency() . "\n"
echo "Expected delivery date: " . $project->getDueDate() . "\n"

// To actually order the translation we have to start the project by
// setting it's state "running".
// PLEASE NOTE: You will be charged for the translation once you do this.
// $project->setState(Project::STATE_RUNNING);
// $project = $this->service->updateProject($project->getId(), $project);
```
