<?php

namespace brofit\base;

use brofit\DBHelper;

class Model
{

    public function __construct()
    {
        DBHelper::getInstance();
    }
}