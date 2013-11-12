<?php

namespace TextKing\Model;

class JobList extends AbstractModelList
{
    protected static function getItemClassName()
    {
        return "Job";
    }
}