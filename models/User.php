<?php

namespace app\models;

use dektrium\user\models\User as BaseUser;

class User extends BaseUser
{
    public $phone;
    public $skype;

    public function getName()
    {
        return !empty($this->profile) && !empty($this->profile->name) ? $this->profile->name : $this->username;
    }

    public function __toString()
    {
    	return $this->getName();
    }
}
