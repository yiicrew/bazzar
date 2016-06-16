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
            $this->user->password = temp_password();
            $this->user->save();

            $this->user_id = $this->user->id;
            // store changes to the database
            $this->save();
            $this->saveImages();
            return true;
        }

        return false;
    }

    public function saveImages()
    {
        foreach ($this->imageFiles as $file) {
            $filename = '/uploads/' . $file->baseName . '.' . $file->extension;
            if ($file->saveAs(Yii::$app->basePath . '/web' . $filename)) {
                $image = new Image;
                $image->public_url = $filename;
                $image->original_url = $filename;
                $image->listing_id = $this->id;
                $image->save();
            }
        }
    }
}
