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

class Coupon extends AbstractModel
{
    const UNIT_EURO = 'euro';
    const UNIT_PERCENT = 'percent';
    const UNIT_WORDS = 'words';

    /** @var string */
    protected $name;

    /** @var string */
    protected $unit;

    /** @var float */
    protected $totalValue;

    /** @var float */
    protected $redeemedValue;

    /** @var string */
    protected $remainderCoupon;

    /**
     * @param string $json
     * @return Coupon
     */
    public static function fromJson($json)
    {
        $object = new self();
        $object->name = (string)$json['name'];
        $object->unit = (string)$json['unit'];
        $object->totalValue = (string)$json['total_value'];
        $object->redeemedValue = (string)$json['redeemed_value'];
        $object->remainderCoupon = (string)$json['remainder_coupon'];
        return $object;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @return float
     */
    public function getTotalValue()
    {
        return $this->totalValue;
    }

    /**
     * @return float
     */
    public function getRedeemedValue()
    {
        return $this->redeemedValue;
    }

    /**
     * @return string
     */
    public function getRemainderCoupon()
    {
        return $this->remainderCoupon;
    }
}