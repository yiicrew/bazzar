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
    public $typeOptions = ['sale' => 'Sale', 'rent' => 'Rent', 'gift' => 'Gift'];
    public $valid_until;
    public $imageFiles;
    private $user;

    public function rules()
    {
        $rules = parent::rules();
        $rules[] = ['imageFiles', 'file', 'skipOnEmpty' => false, 'extensions' => 'png,jpg', 'maxFiles' => 4];
        return $rules;
    }

    public function attachUser($user)
    {
        $this->user = $user;
    }

    public function uploadAndSave()
    {
        // @todo: populate the values from the form
        $this->location_id = 1;

        $valid = $this->user->validate() && $this->validate();
        if ($valid) {
            $path = Yii::$app->basePath . '/web/uploads/';
            foreach ($this->imageFiles as $file) {
                $file->saveAs($path . $file->baseName . '.' . $file->extension);
            }
            // @todo:
            // attach images to the model
            // attach location to the model

            $this->user->password_hash = temp_password();
            $userSaved = $this->user->save();
            $this->user_id = $this->user->id;
            // store changes to the database
            return $this->save(false);
        }

        return false;
    }
}
