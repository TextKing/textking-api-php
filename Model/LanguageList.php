<?php
namespace TextKing\Model;

use Guzzle\Service\Command\ResponseClassInterface;
use Guzzle\Service\Command\OperationCommand;

class LanguageList implements ResponseClassInterface
{
    public $page;

    public $perPage;

    public $total;

    public $items;

    public static function fromCommand(OperationCommand $command)
    {
        $response = $command->getResponse();
        $json = $response->json();

        return new self((string)$json['page'],
            (string)$json['per_page'],
            (string)$json['total']);
    }

    public function __construct($page, $per_page, $total)
    {
        $this->page = $page;
        $this->perPage = $per_page;
        $this->total = $total;
    }
}