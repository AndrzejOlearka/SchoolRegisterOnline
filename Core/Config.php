<?php

namespace Core;

/**
 * Database configuration
 *
 */

class Config
{
    const PATH = "../config.ini";

    /**
     * get config parsed data
     * @var string
     * 
     * return parsed config from .ini file
     */

    public static function get()
    {
        return parse_ini_file(self::PATH);
    }
}