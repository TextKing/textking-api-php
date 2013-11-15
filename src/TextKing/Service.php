<?php
/*
 * TEXTKING API bindings for PHP
 * Copyright (C) 2013 TEXTKING Deutschland GmbH (https://www.textking.com)
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace TextKing;

use Guzzle\Http\Message\Response;

class Service {

    /** @var Service\Client */
    private $client;

    /**
     * @param string $accessToken
     * @param string $contentLanguage
     */
    public function __construct($accessToken, $contentLanguage = 'en')
    {
        $config = array(
            'access_token' => $accessToken,
            'accept_language' => $contentLanguage
        );
        $this->client = \TextKing\Service\Client::factory($config);
    }

    /**
     * @param string $contentLanguage
     */
    public function setContentLanguage($contentLanguage)
    {
        $this->client->setDefaultOption('headers/Accept-Language',
            $contentLanguage);
    }

    /**
     * @param string $state
     * @param int $page
     * @param int $perPage
     * @return Model\ProjectList
     */
    public function getProjects($state = null, $page = 1, $perPage = 100)
    {
        $parameters = array('page' => $page, 'perPage' => $perPage);

        if ($state != null) {
            $parameters['state'] = $state;
        }

        return $this->executeCommand('GetProjects', $parameters);
    }

    /**
     * @param string $projectId
     * @return Model\Project
     */
    public function getProject($projectId)
    {
        return $this->executeCommand('GetProject',
            array('projectId' => $projectId));
    }

    /**
     * @param Model\Project $project
     * @return Model\Project
     */
    public function createProject(Model\Project $project)
    {
        return $this->executeCommand('CreateProject',
            array('body' => $project));
    }

    /**
     * @param string $projectId
     * @param Model\Project $project
     * @return Model\Project
     */
    public function updateProject($projectId, Model\Project $project)
    {
        return $this->executeCommand('UpdateProject',
            array('projectId' => $projectId, 'body' => $project));
    }

    /**
     * @param string $projectId
     * @return void
     */
    public function deleteProject($projectId)
    {
        $this->executeCommand('DeleteProject',
            array('projectId' => $projectId));
    }

    /**
     * @param string $projectId
     * @return Model\Coupon
     */
    public function getProjectCoupon($projectId)
    {
        return $this->executeCommand('GetProjectCoupon',
            array('projectId' => $projectId));
    }

    /**
     * @param string $projectId
     * @param int $page
     * @param int $perPage
     * @return Model\JobList
     */
    public function getJobs($projectId, $page = 1, $perPage = 100)
    {
        return $this->executeCommand('GetJobs',
            array(
                'projectId' => $projectId,
                'page' => $page,
                'perPage' => $perPage
            ));
    }

    /**
     * @param string $projectId
     * @param string $jobId
     * @return Model\Job
     */
    public function getJob($projectId, $jobId)
    {
        return $this->executeCommand('GetJob',
            array('projectId' => $projectId, 'jobId' => $jobId));
    }

    /**
     * @param string $projectId
     * @param Model\Job $job
     * @return Model\Job
     */
    public function createJob($projectId, Model\Job $job)
    {
        return $this->executeCommand('CreateJob',
            array('projectId' => $projectId, 'body' => $job));
    }

    /**
     * @param string $projectId
     * @param string $jobId
     * @param Model\Job $job
     * @return Model\Job
     */
    public function updateJob($projectId, $jobId, Model\Job $job)
    {
        return $this->executeCommand('UpdateJob',
            array('projectId' => $projectId, 'jobId' => $jobId, 'body' => $job));
    }

    /**
     * @param string $projectId
     * @param string $jobId
     * @return void
     */
    public function deleteJob($projectId, $jobId)
    {
        $this->executeCommand('DeleteJob',
            array('projectId' => $projectId, 'jobId' => $jobId));
    }

    /**
     * @param string $projectId
     * @param string $jobId
     * @param Model\Document $document
     * @return void
     */
    public function uploadDocument($projectId, $jobId, Model\Document $document)
    {
        $this->executeCommand('UploadDocument',
            array(
                'projectId' => $projectId,
                'jobId' => $jobId,
                'documentName' => $document->getName(),
                'contentType' => $document->getContentType(),
                'stream' => $document->getStream()
            ));
    }

    /**
     * @param string $projectId
     * @param string $jobId
     * @return Model\Document
     */
    public function downloadDocument($projectId, $jobId)
    {
        $response = $this->executeCommand('DownloadDocument',
            array('projectId' => $projectId, 'jobId' => $jobId));

        return self::createDocumentFromResponse($response);
    }

    /**
     * @param string $projectId
     * @param string $jobId
     * @return Model\Document
     */
    public function downloadTranslation($projectId, $jobId)
    {
        $response = $this->executeCommand('DownloadTranslation',
            array('projectId' => $projectId, 'jobId' => $jobId));

        return self::createDocumentFromResponse($response);
    }

    /**
     * @param string $projectId
     * @param string $jobId
     * @param int $page
     * @param int $perPage
     * @return Model\CallbackList
     */
    public function getJobCallbacks($projectId, $jobId, $page = 1, $perPage = 100)
    {
        return $this->executeCommand('GetJobCallbacks',
            array(
                'projectId' => $projectId,
                'jobId' => $jobId,
                'page' => $page,
                'perPage' => $perPage
            ));
    }

    /**
     * @param string $projectId
     * @param string $jobId
     * @param string $callbackId
     * @return Model\Callback
     */
    public function getJobCallback($projectId, $jobId, $callbackId)
    {
        return $this->executeCommand('GetJobCallback',
            array(
                'projectId' => $projectId,
                'jobId' => $jobId,
                'callbackId' => $callbackId
            ));
    }

    /**
     * @param string $projectId
     * @param string $jobId
     * @param Model\Callback $callback
     * @return Model\Callback
     */
    public function registerJobCallback($projectId, $jobId, Model\Callback $callback)
    {
        return $this->executeCommand('CreateJobCallback',
            array(
                'projectId' => $projectId,
                'jobId' => $jobId,
                'body' => $callback
            ));
    }

    /**
     * @param string $projectId
     * @param string $jobId
     * @param string $callbackId
     * @param Model\Callback $callback
     * @return Model\Callback
     */
    public function updateJobCallback($projectId, $jobId, $callbackId, Model\Callback $callback)
    {
        return $this->executeCommand('UpdateJobCallback',
            array(
                'projectId' => $projectId,
                'jobId' => $jobId,
                'callbackId' => $callbackId,
                'body' => $callback
            ));
    }

    /**
     * @param string $projectId
     * @param string $jobId
     * @param string $callbackId
     * @return void
     */
    public function deleteJobCallback($projectId, $jobId, $callbackId)
    {
        $this->executeCommand('DeleteJobCallback',
            array(
                'projectId' => $projectId,
                'jobId' => $jobId,
                'callbackId' => $callbackId
            ));
    }

    /**
     * @param int $page
     * @param int $perPage
     * @return Model\TopicList
     */
    public function getTopics($page = 1, $perPage = 100)
    {
        return $this->executeCommand('GetTopics',
            array('page' => $page, 'perPage' => $perPage));
    }

    /**
     * @param string $topicId
     * @return Model\Topic
     */
    public function getTopic($topicId)
    {
        return $this->executeCommand('GetTopic', array('id' => $topicId));
    }

    /**
     * @param int $page
     * @param int $perPage
     * @return Model\LanguageList
     */
    public function getSourceLanguages($page = 1, $perPage = 100)
    {
        return $this->executeCommand('GetSourceLanguages',
            array('page' => $page, 'perPage' => $perPage));
    }

    /**
     * @param int $page
     * @param int $perPage
     * @return Model\LanguageList
     */
    public function getTargetLanguages($page = 1, $perPage = 100)
    {
        return $this->executeCommand('GetTargetLanguages',
            array('page' => $page, 'perPage' => $perPage));
    }

    /**
     * @param string $code
     * @return Model\Language
     */
    public function getLanguage($code)
    {
        return $this->executeCommand('GetLanguage', array('code' => $code));
    }

    /**
     * @param \Guzzle\Http\Message\Response $response
     * @return Model\Document
     */
    private static function createDocumentFromResponse(Response $response)
    {
        $contentDisposition = $response->getContentDisposition();
        $name = self::parseFilenameFromContentDisposition($contentDisposition);

        $stream = $response->getBody()->getStream();
        rewind($stream);

        $contentType = $response->getContentType();

        return new Model\Document($name, $stream, $contentType);
    }

    /**
     * @param string $contentDisposition
     * @return string
     */
    private static function parseFilenameFromContentDisposition($contentDisposition)
    {
        $fieldName = "filename=";
        $filenamePos = strpos($contentDisposition, $fieldName)
            + strlen($fieldName);
        $name = substr($contentDisposition, $filenamePos);
        return $name;
    }

    /**
     * @param string $command
     * @param array $params
     * @return mixed
     */
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