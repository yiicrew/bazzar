<?php

namespace app\models;

use dektrium\user\models\User as BaseUser;

class User extends BaseUser
{
    public $phone;
    public $name;

    public function getName()
    {
        return $this->name;
    }
}
