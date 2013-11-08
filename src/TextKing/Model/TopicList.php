<?php

namespace TextKing\Model;

class TopicList extends AbstractModelList
{
    protected static function getItemClassName()
    {
        return "Topic";
    }
}