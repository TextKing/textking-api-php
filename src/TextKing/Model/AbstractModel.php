<?php

namespace TextKing\Model;

use Guzzle\Service\Command\ResponseClassInterface;
use Guzzle\Service\Command\OperationCommand;

abstract class AbstractModel implements ResponseClassInterface {

    public final static function fromCommand(OperationCommand $command)
    {
        $response = $command->getResponse();
        $json = $response->json();

        return static::fromJson($json);
    }

    abstract public static function fromJson($json);
} 