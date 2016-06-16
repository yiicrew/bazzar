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
        $rules = parent::rules();
        $rules[] = ['name', 'required'];
        return $rules;
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
