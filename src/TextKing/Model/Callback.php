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

class Callback extends AbstractModel implements \Guzzle\Common\ToArrayInterface
{
    /** @var string */
    protected $id;

    /** @var string */
    protected $url;

    /** @var string */
    protected $triggerState;

    /** @var string */
    protected $extraData;

    /**
     * @param string $name
     * @param resource $stream
     * @param string $contentType
     */
    public function __construct($url, $triggerState, $extraData = null)
    {
        $this->url = $url;
        $this->triggerState = $triggerState;
        $this->extraData = $extraData;
    }

    /**
     * @param string $json
     * @return Coupon
     */
    public static function fromJson($json)
    {
        $object = new self();
        $object->id = (string)$json['id'];
        $object->url = (string)$json['url'];
        $object->triggerState = (string)$json['trigger_state'];
        $object->extraData = (string)$json['extra_data'];
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
            'url' => $this->url,
            'state' => $this->state,
            'trigger_state' => $this->triggerState,
            'extra_data' => $this->extraData
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
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $triggerState
     */
    public function setTriggerState($triggerState)
    {
        $this->triggerState = $triggerState;
    }

    /**
     * @return string
     */
    public function getTriggerState()
    {
        return $this->triggerState;
    }

    /**
     * @param string $extraData
     */
    public function setExtraData($extraData)
    {
        $this->extraData = $extraData;
    }

    /**
     * @return string
     */
    public function getExtraData()
    {
        return $this->extraData;
    }
}