<?php

namespace TextKing\Model;

class Language extends AbstractModel
{
    public $code;

    public $name;

    public $localizationLanguage;

    public static function fromJson($json)
    {
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