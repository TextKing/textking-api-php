<?php

namespace TextKing\Model;

class Project extends AbstractModel implements \Guzzle\Common\ToArrayInterface {

    public $id;

    public $number;

    public $name;

    public $dueDate;

    public $state;

    public $currency;

    public $netPrice;

    public $vat;

    public $couponName;

    public $couponValue;

    public $discountCustomer;

    public $discountProject;

    public $affiliateId;

    public $billingAddress;

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
            //'state' => $this->currency,
            'coupon_name' => $this->couponName,
            'affiliate_id' => $this->affiliateId,
            'billing_address' => $this->billingAddress,
        );
    }
}