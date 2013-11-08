<?php

namespace TextKing\Model;

class ProjectList extends AbstractModelList
{
    protected static function getItemClassName()
    {
        return "Project";
    }
}