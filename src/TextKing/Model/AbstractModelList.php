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

abstract class AbstractModelList extends AbstractModel
{
    /** @var AbstractModel[] */
    private $items;

    /** @var int */
    private $page;

    /** @var int */
    private $perPage;

    /** @var int */
    private $total;

    /**
     * @param string $json
     * @return AbstractModelList
     */
    public static function fromJson($json)
    {
        $list = new static();
        $list->page = (string)$json['page'];
        $list->perPage = (string)$json['per_page'];
        $list->total = (string)$json['total'];
        $list->items = array();

        $itemClass = "\\TextKing\\Model\\" . static::getItemClassName();
        foreach ($json["items"] as $itemJson) {
            $list->items[] = $itemClass::fromJson($itemJson);
        }

        return $list;
    }

    /**
     * @return string
     */
    abstract protected static function getItemClassName();

    /**
     * @return \TextKing\Model\AbstractModel[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @return int
     */
    public function getPerPage()
    {
        return $this->perPage;
    }

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }
}