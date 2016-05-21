<?php

namespace app\models;

use Yii;
use app\modules\admin\models\Listing;

/**
 * ContactForm is the model behind the contact form.
 */
class PostAdForm extends Listing
{
    public $verifyCode;
    public $images;
    public $typeOptions = ['Sale', 'Rent', 'Gift'];
    public $valid_until;
}
