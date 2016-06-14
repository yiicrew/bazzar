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
    public $imageFiles;
    private $user;

    public function rules()
    {
        $parentRules = parent::rules();
        $rules = [
            ['imageFiles', 'file', 'skipOnEmpty' => false, 'extensions' => 'png,jpg', 'maxFiles' => 4]
        ];
        return array_merge($parentRules, $rules);
    }

    public function attachUser($user)
    {
        $this->user = $user;
    }

    public function uploadAndSave()
    {
        // @todo: populate the values from the form
        $this->user_id = 1;
        $this->location_id = 1;

        $valid = $this->user->validate() && $this->validate();
        if ($valid) {
            foreach ($this->imageFiles as $file) {
                $file->saveAs(Yii::$app->basePath . '/web/uploads/' . $file->baseName . '.' . $file->extension, false);
            }
            // attach images to the model

            // store changes to the database
            return $this->save(); // && $this->user->save();
        }

        return false;
    }
}
