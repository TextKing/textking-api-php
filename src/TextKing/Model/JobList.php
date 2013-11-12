<?php

namespace TextKing\Model;

class JobList extends AbstractModelList
{
    /**
     * @return string
     */
    protected static function getItemClassName()
    {
        return "Job";
    }
}