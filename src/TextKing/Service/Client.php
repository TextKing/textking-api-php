<?php

namespace TextKing\Service;

use Guzzle\Common\Collection;
use Guzzle\Service\Description\ServiceDescription;

final class Client extends \Guzzle\Service\Client {

    /**
     * @param array $config
     * @return Client
     */
    public static function factory($config = array())
    {
        $default = array(
            'base_url' => 'https://api.textking.com/v1',
            'accept_language' => 'en'
        );
        $required = array('base_url', 'access_token');
        $config = Collection::fromConfig($config, $default, $required);

        $requestVisitorFactory = \Guzzle\Service\Command\LocationVisitor\VisitorFlyweight::getInstance();
        $jsonBodyVisitor = new JsonBodyVisitor();
        $requestVisitorFactory->addRequestVisitor('jsonBody', $jsonBodyVisitor);

        $client = new self(
            $config->get('base_url')
        );
        $client->setConfig($config);
        $client->setDescription(ServiceDescription::factory(__DIR__ . DIRECTORY_SEPARATOR . 'api.json'));
        $client->setDefaultOption('headers/Accept', 'application/json');
        $client->setDefaultOption('headers/Accept-Language', $config->get('accept_language'));
        $client->setDefaultOption('headers/Authorization', 'Bearer ' . $config->get('access_token'));

        return $client;
    }
}