<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property integer $id
 * @property integer $listing_id
 * @property string $file_name
 * @property integer $file_size
 * @property string $file_type
 * @property string $created_at
 * @property string $updated_at
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
            [['listing_id', 'file_size'], 'integer'],
            [['file_name', 'file_size', 'file_type'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['file_name', 'file_type'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'listing_id' => Yii::t('app', 'Listing ID'),
            'file_name' => Yii::t('app', 'File Name'),
            'file_size' => Yii::t('app', 'File Size'),
            'file_type' => Yii::t('app', 'File Type'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     * @return ImageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ImageQuery(get_called_class());
    }
    
    public function getPublicUrl()
    {
        return $this->file_name;
    }

    public function getThumbSrc()
    {
       return $this->file_name;
    }
}
