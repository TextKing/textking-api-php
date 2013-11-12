<?php

namespace TextKing;

class Service {
    private $client;

    public function __construct($accessToken, $displayLanguage = 'en')
    {
        $config = array(
            'access_token' => $accessToken,
            'accept_language' => $displayLanguage
        );
        $this->client = \TextKing\Service\Client::factory($config);
    }

    public function getProjects($state = null, $page = 1, $perPage = 100)
    {
        $parameters = array('page' => $page, 'perPage' => $perPage);

        if ($state != null)
        {
            $parameters['state'] = $state;
        }

        return $this->executeCommand('GetProjects', $parameters);
    }

    public function getProject($projectId)
    {
        return $this->executeCommand('GetProject', array('projectId' => $projectId));
    }

    public function createProject(Model\Project $project)
    {
        return $this->executeCommand('CreateProject', array('body' => $project));
    }

    public function updateProject($projectId, Model\Project $project)
    {
        return $this->executeCommand('UpdateProject', array('projectId' => $projectId, 'body' => $project));
    }

    public function deleteProject($projectId)
    {
        return $this->executeCommand('DeleteProject', array('projectId' => $projectId));
    }

    public function getJobs($projectId, $page = 1, $perPage = 100)
    {
        return $this->executeCommand('GetJobs',
            array('projectId' => $projectId, 'page' => $page, 'perPage' => $perPage));
    }

    public function getJob($projectId, $jobId)
    {
        return $this->executeCommand('GetJob',
            array('projectId' => $projectId, 'jobId' => $jobId));
    }

    public function createJob($projectId, Model\Job $job)
    {
        return $this->executeCommand('CreateJob',
            array('projectId' => $projectId, 'body' => $job));
    }

    public function updateJob($projectId, $jobId, Model\Job $job)
    {
        return $this->executeCommand('UpdateJob',
            array('projectId' => $projectId, 'jobId' => $jobId, 'body' => $job));
    }

    public function deleteJob($projectId, $jobId)
    {
        return $this->executeCommand('DeleteJob',
            array('projectId' => $projectId, 'jobId' => $jobId));
    }

    public function uploadDocument($projectId, $jobId, Model\Document $document)
    {
        return $this->executeCommand('UploadDocument',
            array(
                'projectId' => $projectId,
                'jobId' => $jobId,
                'documentName' => $document->getName(),
                'contentType' => $document->getContentType(),
                'stream' => $document->getStream()
            ));
    }

    public function downloadDocument($projectId, $jobId)
    {
        $response = $this->executeCommand('DownloadDocument',
            array('projectId' => $projectId, 'jobId' => $jobId));

        return self::createDocumentFromResponse($response);
    }

    public function downloadTranslation($projectId, $jobId)
    {
        $response = $this->executeCommand('DownloadTranslation',
            array('projectId' => $projectId, 'jobId' => $jobId));

        return self::createDocumentFromResponse($response);
    }

    public function getTopics($page = 1, $perPage = 100)
    {
        return $this->executeCommand('GetTopics',
            array('page' => $page, 'perPage' => $perPage));
    }

    public function getTopic($topicId)
    {
        return $this->executeCommand('GetTopic', array('id' => $topicId));
    }

    public function getSourceLanguages($page = 1, $perPage = 100)
    {
        return $this->executeCommand('GetSourceLanguages',
            array('page' => $page, 'perPage' => $perPage));
    }

    public function getTargetLanguages($page = 1, $perPage = 100)
    {
        return $this->executeCommand('GetTargetLanguages',
            array('page' => $page, 'perPage' => $perPage));
    }

    public function getLanguage($code)
    {
        return $this->executeCommand('GetLanguage', array('code' => $code));
    }

    private static function createDocumentFromResponse($response)
    {
        $contentDisposition = $response->getContentDisposition();
        $name = self::parseFilenameFromContentDisposition($contentDisposition);

        $stream = $response->getBody()->getStream();
        rewind($stream);

        $contentType = $response->getContentType();

        return new Model\Document($name, $stream, $contentType);
    }

    private static function parseFilenameFromContentDisposition($contentDisposition)
    {
        $fieldName = "filename=";
        $name = substr($contentDisposition, strpos($contentDisposition, $fieldName) + strlen($fieldName));
        return $name;
    }

    private function executeCommand($command, $params = array())
    {
        $command = $this->client->getCommand($command, $params);
        //return $this->client->execute($command);
        $request = $command->prepare();
        $request->getCurlOptions()->set(CURLOPT_VERBOSE, true);
        $request->getCurlOptions()->set(CURLOPT_DNS_USE_GLOBAL_CACHE, false);
        $request->getCurlOptions()->set(CURLOPT_FORBID_REUSE, true);
        $request->getCurlOptions()->set(CURLOPT_FRESH_CONNECT, true);

        return $command->execute();
    }
} 