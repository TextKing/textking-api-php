<?php

namespace TextKing;

use Guzzle\Common\Collection;
use Guzzle\Service\Description\ServiceDescription;

class Client extends \Guzzle\Service\Client
{
    public static function factory($config = array())
    {
        $default = array('base_url' => 'https://api.textking.com/v1');
        $required = array('base_url');
        $config = Collection::fromConfig($config, $default, $required);

        $client = new self(
            $config->get('base_url'),
            $config->get('username'),
            $config->get('api_key')
        );
        $client->setConfig($config);
        $client->setDescription(ServiceDescription::factory(__DIR__ . DIRECTORY_SEPARATOR . 'api.json'));
        $client->setDefaultOption("headers/Accept", "application/json");
        $client->setDefaultOption("headers/Accept-Language", "en");

        return $client;
    }
}