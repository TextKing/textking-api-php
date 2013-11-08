<?php

namespace TextKing\Model;

abstract class AbstractModelList extends AbstractModel {

    public $page;

    public $perPage;

    public $total;

    public $items;

    public static function fromJson($json)
    {
        $list = new static();
        $list->page = (string)$json['page'];
        $list->perPage = (string)$json['per_page'];
        $list->total = (string)$json['total'];
        $list->items = array();

        $itemClass = "\\TextKing\\Model\\" . static::getItemClassName();
        foreach ($json["items"] as $itemJson)
        {
            $list->items[] = $itemClass::fromJson($itemJson);
        }

        return $list;
    }

    abstract protected static function getItemClassName();
} 