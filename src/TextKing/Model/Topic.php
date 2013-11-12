<?php

namespace TextKing\Model;

class Topic extends AbstractModel
{
    /** @var string */
    public $id;

    /** @var string */
    public $name;

    /** @var string */
    public $localizationLanguage;

    /**
     * @param string $json
     * @return Topic
     */
    public static function fromJson($json)
    {
        $object = new self();
        $object->id = (string)$json['id'];
        $object->name = (string)$json['name'];
        $object->localizationLanguage = (string)$json['localization_language'];
        return $object;
    }
}