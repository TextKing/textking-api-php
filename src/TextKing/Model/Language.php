<?php

namespace TextKing\Model;

class Language extends AbstractModel
{
    public $code;

    public $name;

    public $localizationLanguage;

    public static function fromJson($json)
    {
        $object = new self();
        $object->code = (string)$json['code'];
        $object->name = (string)$json['name'];
        $object->localizationLanguage = (string)$json['localization_language'];
        return $object;
    }
}