<?php
namespace TextKing\Model;

use Guzzle\Service\Command\ResponseClassInterface;
use Guzzle\Service\Command\OperationCommand;

class Language implements ResponseClassInterface
{
    public $code;

    public $name;

    public $localizationLanguage;

    public static function fromCommand(OperationCommand $command)
    {
        $response = $command->getResponse();
        $json = $response->json();

        return new self((string)$json['code'],
            (string)$json['name'],
            (string)$json['localization_language']);
    }

    public function __construct($code, $name, $localizationLanguage)
    {
        $this->code = $code;
        $this->name = $name;
        $this->localizationLanguage = $localizationLanguage;
    }
}