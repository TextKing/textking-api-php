<?php

namespace TextKing\Model;

class Topic extends AbstractModel
{
    /** @var string */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $localizationLanguage;

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

    /**
     * @return string
     */
    public function getId() {
        return $this->id;
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