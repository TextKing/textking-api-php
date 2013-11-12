<?php

namespace TextKing\Model;

class Job extends AbstractModel implements \Guzzle\Common\ToArrayInterface {

    /** @var string */
    private $id;

    /** @var string */
    private $number;

    /** @var string */
    private $name;

    /** @var string */
    private $sourceLanguage;

    /** @var string */
    private $targetLanguage;

    /** @var string */
    private $quality;

    /** @var string */
    private $topic;

    /** @var string */
    private $briefing;

    /** @var string */
    private $state;

    /** @var int */
    private $words;

    /** @var string */
    private $currency;

    /** @var float */
    private $netPrice;

    /** @var bool */
    private $isActive;

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

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $sourceLanguage
     */
    public function setSourceLanguage($sourceLanguage)
    {
        $this->sourceLanguage = $sourceLanguage;
    }

    /**
     * @return string
     */
    public function getSourceLanguage()
    {
        return $this->sourceLanguage;
    }

    /**
     * @param string $targetLanguage
     */
    public function setTargetLanguage($targetLanguage)
    {
        $this->targetLanguage = $targetLanguage;
    }

    /**
     * @return string
     */
    public function getTargetLanguage()
    {
        return $this->targetLanguage;
    }

    /**
     * @param string $quality
     */
    public function setQuality($quality)
    {
        $this->quality = $quality;
    }

    /**
     * @return string
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * @param string $topic
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;
    }

    /**
     * @return string
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * @param string $briefing
     */
    public function setBriefing($briefing)
    {
        $this->briefing = $briefing;
    }

    /**
     * @return string
     */
    public function getBriefing()
    {
        return $this->briefing;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return int
     */
    public function getWords()
    {
        return $this->words;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return float
     */
    public function getNetPrice()
    {
        return $this->netPrice;
    }

    /**
     * @param boolean $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
}