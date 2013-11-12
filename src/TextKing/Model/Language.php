<?php

namespace TextKing\Model;

class Language extends AbstractModel
{
    /** @var string */
    public $code;

    /** @var string */
    public $name;

    /** @var string */
    public $localizationLanguage;

    /**
     * @param string $json
     * @return Language
     */
    public static function fromJson($json)
    {
        $object = new self();
        $object->code = (string)$json['code'];
        $object->name = (string)$json['name'];
        $object->localizationLanguage = (string)$json['localization_language'];
        return $object;
    }
}