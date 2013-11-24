<?php
/*
 * TEXTKING API bindings for PHP
 * Copyright (C) 2013 TEXTKING Deutschland GmbH (https://www.textking.com)
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace TextKing\Model;

class PriceInfo extends AbstractModel
{
    /** @var string */
    private $sourceLanguage;

    /** @var string */
    private $targetLanguage;

    /** @var string */
    private $topicId;

    /** @var int */
    private $words;

    /** @var Price[] */
    private $prices;

    /**
     * @param string $json
     * @return AbstractModel
     */
    static function fromJson($json)
    {
        $object = new self();
        $object->sourceLanguage = (string)$json['source_language'];
        $object->targetLanguage = (string)$json['target_language'];
        $object->$topicId = (string)$json['topic'];
        $object->words = (int)$json['words'];
        $object->prices = array();

        foreach ($json["prices"] as $priceJson) {
            $object->prices[] = Price::fromJson($priceJson);
        }

        return $object;
    }

    /**
     * @return string
     */
    public function getSourceLanguage()
    {
        return $this->sourceLanguage;
    }

    /**
     * @return string
     */
    public function getTargetLanguage()
    {
        return $this->targetLanguage;
    }

    /**
     * @return string
     */
    public function getTopicId()
    {
        return $this->topicId;
    }

    /**
     * @return int
     */
    public function getWords()
    {
        return $this->words;
    }

    /**
     * @return \TextKing\Model\Price[]
     */
    public function getPrices()
    {
        return $this->prices;
    }
}