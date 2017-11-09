<?php

namespace app\models;

use dektrium\user\models\User as BaseUser;

class User extends BaseUser
{
    public $name;
    public $phone;
    public $skype;

    public function rules()
    {
        return array_merge(parent::rules(), [
            ['name', 'required']
        ]);
    }

    public function getName()
    {
        return !empty($this->profile) && !empty($this->profile->name) ? $this->profile->name : $this->username;
    }

    public function __toString()
    {
    	return $this->getName();
    }
}
