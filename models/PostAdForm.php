<?php

namespace app\models;

use Yii;
use app\models\Listing;
use dektrium\user\models\Profile;


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
        return array_merge(parent::rules(), [
            ['imageFiles', 'file', 'skipOnEmpty' => false, 'extensions' => 'png,jpg', 'maxFiles' => 4]
        ];
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
            $this->saveUser();
            $this->user_id = $this->user->id;
            $this->save();
            $this->saveImages();
            return true;
        }

        return false;
    }

    public function saveUser()
    {
        $this->user->password = temp_password();
        $this->user->username = preg_replace("/[^a-zA-Z0-9]/", "", $this->user->name);
        $profile = new Profile;
        $profile->name = $this->user->name;

        $this->user->setProfile($profile);
        return $this->user->save();
    }

    public function saveImages()
    {
        foreach ($this->imageFiles as $file) {
            $path = '/uploads/' . $file->baseName . '.' . $file->extension;
            if ($file->saveAs(Yii::$app->basePath . '/web' . $path)) {
                $image = new Image;
                $image->path = $path;
                $image->name = $file->baseName . '.' . $file->extension;
                $image->type = $file->extension;
                $image->size = $file->size;
                $image->listing_id = $this->id;
                $image->save();
            }
        }
    }
}
