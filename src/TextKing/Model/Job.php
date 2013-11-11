<?php

namespace TextKing\Model;

class Job extends AbstractModel implements \Guzzle\Common\ToArrayInterface {

    public $id;

    public $number;

    public $name;

    public $sourceLanguage;

    public $targetLanguage;

    public $quality;

    public $topic;

    public $briefing;

    public $state;

    public $words;

    public $currency;

    public $netPrice;

    public $isActive;

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
        $object->isActive = (string)$json['is_active'];
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