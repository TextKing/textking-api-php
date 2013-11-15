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

class Project extends AbstractModel implements \Guzzle\Common\ToArrayInterface
{

    const STATE_PREPARED = 'prepared';
    const STATE_RUNNING = 'running';
    const STATE_FINISHED = 'finished';
    const STATE_CANCELED = 'canceled';

    /** @var string */
    private $id;

    /** @var string */
    private $number;

    /** @var string */
    private $name;

    /** @var \DateTime */
    private $dueDate;

    /** @var string */
    private $state;

    /** @var string */
    private $currency;

    /** @var float */
    private $netPrice;

    /** @var float */
    private $vat;

    /** @var string */
    private $couponName;

    /** @var float */
    private $couponValue;

    /** @var float */
    private $discountCustomer;

    /** @var float */
    private $discountProject;

    /** @var string */
    private $affiliateId;

    /** @var string */
    private $billingAddress;

    /**
     * @param string $json
     * @return Project
     */
    public static function fromJson($json)
    {
        $object = new self();
        $object->id = (string)$json['id'];
        $object->number = (string)$json['number'];
        $object->name = (string)$json['name'];

        if (isset($json['due_date']) && $json['due_date'] != null) {
            $object->dueDate = new \DateTime($json['due_date']);
        }

        $object->state = (string)$json['state'];
        $object->currency = (string)$json['currency'];
        $object->netPrice = (float)$json['net_price'];
        $object->vat = (float)$json['vat'];
        $object->couponName = (string)$json['coupon_name'];
        $object->couponValue = (float)$json['coupon_value'];
        $object->discountCustomer = (float)$json['discount_customer'];
        $object->discountProject = (float)$json['discount_project'];
        $object->affiliateId = (string)$json['affiliate_id'];
        $object->billingAddress = (string)$json['billing_address'];
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
            'due_date' => $this->dueDate,
            'state' => $this->state,
            'coupon_name' => $this->couponName,
            'affiliate_id' => $this->affiliateId,
            'billing_address' => $this->billingAddress,
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
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param \DateTime $dueDate
     */
    public function setDueDate(\DateTime $dueDate)
    {
        $this->dueDate = $dueDate;
    }

    /**
     * @return \DateTime
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @param string $dueDate
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
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
     * @return float
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * @param string $couponName
     */
    public function setCouponName($couponName)
    {
        $this->couponName = $couponName;
    }

    /**
     * @return string
     */
    public function getCouponName()
    {
        return $this->couponName;
    }

    /**
     * @return float
     */
    public function getCouponValue()
    {
        return $this->couponValue;
    }

    /**
     * @return float
     */
    public function getDiscountCustomer()
    {
        return $this->discountCustomer;
    }

    /**
     * @return float
     */
    public function getDiscountProject()
    {
        return $this->discountProject;
    }

    /**
     * @param string $affiliateId
     */
    public function setAffiliateId($affiliateId)
    {
        $this->affiliateId = $affiliateId;
    }

    /**
     * @return string
     */
    public function getAffiliateId()
    {
        return $this->affiliateId;
    }

    /**
     * @param string $billingAddress
     */
    public function setBillingAddress($billingAddress)
    {
        $this->billingAddress = $billingAddress;
    }

    /**
     * @return string
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

}