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

namespace TextKing\Service;

use Guzzle\Common\Collection;
use Guzzle\Service\Command\LocationVisitor\VisitorFlyweight;
use Guzzle\Service\Description\ServiceDescription;

final class Client extends \Guzzle\Service\Client
{

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

        $requestVisitorFactory = VisitorFlyweight::getInstance();
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