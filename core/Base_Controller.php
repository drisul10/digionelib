<?php

namespace core;

use core\BaseModel;

class Base_Controller
{
    public function __construct()
    {
        
    }

    protected function get($param_name)
    {
        if (isset($_GET[$param_name])) {
            return $_GET[$param_name];
        }

        return null;
    }

    public function not_found() {}
}