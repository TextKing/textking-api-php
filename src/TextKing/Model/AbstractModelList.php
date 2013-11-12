<?php

namespace TextKing\Model;

abstract class AbstractModelList extends AbstractModel {

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