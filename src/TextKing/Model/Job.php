<?php

namespace TextKing\Model;

class Job extends AbstractModel implements \Guzzle\Common\ToArrayInterface {

    /** @var string */
    public $id;

    /** @var string */
    public $number;

    /** @var string */
    public $name;

    /** @var string */
    public $sourceLanguage;

    /** @var string */
    public $targetLanguage;

    /** @var string */
    public $quality;

    /** @var string */
    public $topic;

    /** @var string */
    public $briefing;

    /** @var string */
    public $state;

    /** @var int */
    public $words;

    /** @var string */
    public $currency;

    /** @var float */
    public $netPrice;

    /** @var bool */
    public $isActive;

    /**
     * @param string $json
     * @return Job
     */
    public static function fromJson($json)
    {
        $object = new self();
        $object->id = (string)$json['id'];
        $object->number = (string)$json['number'];
        $object->name = (string)$json['name'];
        $object->sourceLanguage = (string)$json['source_language'];
        $object->targetLanguage = (string)$json['target_language'];
        $object->quality = (string)$json['quality'];
        $object->topic = (string)$json['topic'];
        $object->briefing = (string)$json['briefing'];
        $object->state = (string)$json['state'];
        $object->words = (string)$json['words'];
        $object->currency = (string)$json['currency'];
        $object->netPrice = (float)$json['net_price'];
        $object->isActive = (bool)$json['is_active'];
        return $object;
    }

    /**
     * Get the array representation of an object
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            'name' => $this->name,
            'source_language' => $this->sourceLanguage,
            'target_language' => $this->targetLanguage,
            'quality' => $this->quality,
            'topic' => $this->topic,
            //'state' => $this->state,
            'briefing' => $this->briefing,
            'is_active' => $this->isActive,
        );
    }
}