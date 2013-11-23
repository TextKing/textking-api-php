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

class Address extends AbstractModel
{
    /** @var string */
    protected $id;

    /** @var string */
    protected $company;

    /** @var string */
    protected $vatNumber;

    /** @var string */
    protected $street;

    /** @var string */
    protected $zip;

    /** @var string */
    protected $city;

    /** @var string */
    protected $country;

    /** @var string */
    protected $firstname;

    /** @var string */
    protected $lastname;

    /** @var string */
    protected $gender;

    /** @var bool */
    protected $isDefault;

    /**
     * @param string $json
     * @return Address
     */
    static function fromJson($json)
    {
        $object = new self();
        $object->id = (string)$json['id'];
        $object->company = (string)$json['company'];
        $object->vatNumber = (string)$json['vat_number'];
        $object->street = (string)$json['street'];
        $object->zip = (string)$json['zip'];
        $object->city = (string)$json['city'];
        $object->country = (string)$json['country'];
        $object->firstname = (string)$json['firstname'];
        $object->lastname = (string)$json['lastname'];
        $object->gender = (string)$json['gender'];
        $object->isDefault = (bool)$json['is_default'];
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
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @return string
     */
    public function getVatNumber()
    {
        return $this->vatNumber;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return boolean
     */
    public function isDefault()
    {
        return $this->isDefault;
    }
}
