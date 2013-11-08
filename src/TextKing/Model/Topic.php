<?php

namespace TextKing\Model;

class Topic extends AbstractModel
{
    public $id;

    public $name;

    public $localizationLanguage;

    public static function fromJson($json)
    {
        $object = new self();
        $object->id = (string)$json['id'];
        $object->name = (string)$json['name'];
        $object->localizationLanguage = (string)$json['localization_language'];
        return $object;
    }
}