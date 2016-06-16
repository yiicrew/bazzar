<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property integer $id
 * @property integer $listing_id
 * @property string $public_url
 * @property string $original_url
 * @property string $created_at
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['listing_id'], 'integer'],
            [['public_url', 'original_url'], 'required'],
            [['created_at'], 'safe'],
            [['public_url', 'original_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'listing_id' => 'Listing ID',
            'public_url' => 'Public Url',
            'original_url' => 'Original Url',
            'created_at' => 'Created At',
        ];
    }

    public function getThumbSrc()
    {
        return $this->public_url;
    }
}
