<?php

namespace tests\_pages;

class SearchPage
{
    public static $URL = '';

    public static function route($param)
    {
        return static::$URL.$param;
    }
}