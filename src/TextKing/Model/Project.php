<?php

namespace TextKing\Model;

class Project extends AbstractModel implements \Guzzle\Common\ToArrayInterface {

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

    /** @var string */
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
        $object->dueDate = (string)$json['due_date'];
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
     * @param string $dueDate
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;
    }

    /**
     * @return string
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