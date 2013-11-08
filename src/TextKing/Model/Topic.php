<?php

namespace TextKing\Model;

class Topic extends AbstractModel
{
    public $id;

    public $name;

    public $localizationLanguage;

    public static function fromJson($json)
    {
        return new self((string)$json['id'],
            (string)$json['name'],
            (string)$json['localization_language']);
    }

    public function __construct($id, $name, $localizationLanguage)
    {
        $this->id = $id;
        $this->name = $name;
        $this->localizationLanguage = $localizationLanguage;
    }
}