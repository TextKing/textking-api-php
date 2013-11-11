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

    public function getProjects($page = 1, $perPage = 100)
    {
        return $this->ExecuteCommand('GetProjects',
            array('page' => $page, 'per_page' => $perPage));
    }

    public function getProject($projectId)
    {
        return $this->ExecuteCommand('GetProject', array('projectId' => $projectId));
    }

    public function createProject(Model\Project $project)
    {
        return $this->ExecuteCommand('CreateProject', array('body' => $project));
    }

    public function updateProject($projectId, Model\Project $project)
    {
        return $this->ExecuteCommand('UpdateProject', array('projectId' => $projectId, 'body' => $project));
    }

    public function deleteProject($projectId)
    {
        return $this->ExecuteCommand('DeleteProject', array('projectId' => $projectId));
    }

    public function getJobs($projectId, $page = 1, $perPage = 100)
    {
        return $this->ExecuteCommand('GetJobs',
            array('projectId' => $projectId, 'page' => $page, 'per_page' => $perPage));
    }

    public function getJob($projectId, $jobId)
    {
        return $this->ExecuteCommand('GetJob',
            array('projectId' => $projectId, 'jobId' => $jobId));
    }

    public function createJob($projectId, Model\Job $job)
    {
        return $this->ExecuteCommand('CreateJob',
            array('projectId' => $projectId, 'body' => $job));
    }

    public function updateJob($projectId, $jobId, Model\Job $job)
    {
        return $this->ExecuteCommand('UpdateJob',
            array('projectId' => $projectId, 'jobId' => $jobId, 'body' => $job));
    }

    public function deleteJob($projectId, $jobId)
    {
        return $this->ExecuteCommand('DeleteJob',
            array('projectId' => $projectId, 'jobId' => $jobId));
    }

    public function getTopics($page = 1, $perPage = 100)
    {
        return $this->ExecuteCommand('GetTopics',
            array('page' => $page, 'per_page' => $perPage));
    }

    public function getTopic($topicId)
    {
        return $this->ExecuteCommand('GetTopic', array('id' => $topicId));
    }

    public function getSourceLanguages($page = 1, $perPage = 100)
    {
        return $this->ExecuteCommand('GetSourceLanguages',
            array('page' => $page, 'per_page' => $perPage));
    }

    public function getTargetLanguages($page = 1, $perPage = 100)
    {
        return $this->ExecuteCommand('GetTargetLanguages',
            array('page' => $page, 'per_page' => $perPage));
    }

    public function getLanguage($code)
    {
        return $this->ExecuteCommand('GetLanguage', array('code' => $code));
    }

    private function executeCommand($command, $params = array())
    {
        $command = $this->client->getCommand($command, $params);
        //$request = $command->prepare();
        //$request->getCurlOptions()->set(CURLOPT_VERBOSE, true);
        //$project = $command->execute();;
        return $this->client->execute($command);
    }
} 