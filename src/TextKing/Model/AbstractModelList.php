<?php

namespace TextKing\Model;

abstract class AbstractModelList extends AbstractModel {

    /** @var int */
    public $page;

    /** @var int */
    public $perPage;

    /** @var int */
    public $total;

    /** @var AbstractModel[] */
    public $items;

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
} 