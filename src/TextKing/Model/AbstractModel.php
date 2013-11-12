<?php

namespace TextKing\Model;

use Guzzle\Service\Command\ResponseClassInterface;
use Guzzle\Service\Command\OperationCommand;

abstract class AbstractModel implements ResponseClassInterface {

    /**
     * @param OperationCommand $command
     * @return AbstractModel
     */
    public final static function fromCommand(OperationCommand $command)
    {
        $response = $command->getResponse();
        $json = $response->json();

        return static::fromJson($json);
    }

    /**
     * @param string $json
     * @return AbstractModel
     */
    abstract public static function fromJson($json);
} 