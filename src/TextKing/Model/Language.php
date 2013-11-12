<?php

namespace TextKing\Model;

class Language extends AbstractModel
{
    /** @var string */
    protected $code;

    /** @var string */
    protected $name;

    /** @var string */
    protected $localizationLanguage;

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

    /**
     * @return string
     */
    public function getCode() {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getLocalizationLanguage() {
        return $this->localizationLanguage;
    }
}