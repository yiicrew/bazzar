<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "categories".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property string $meta_description
 * @property string $meta_keywords
 * @property integer $parent_id
 * @property integer $is_active
 * @property string $created_at
 * @property string $updated_at
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'slugAttribute' => 'slug',
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'slug'], 'required'],
            [['description', 'meta_description', 'meta_keywords'], 'string'],
            [['parent_id', 'is_active'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'slug'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'slug' => Yii::t('app', 'Slug'),
            'description' => Yii::t('app', 'Description'),
            'meta_description' => Yii::t('app', 'Meta Description'),
            'meta_keywords' => Yii::t('app', 'Meta Keywords'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'is_active' => Yii::t('app', 'Is Active'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     * @return CategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoryQuery(get_called_class());
    }

    public function __toString()
    {
        return $this->name;
    }

    public function getChildren()
    {
        return $this->hasMany(Category::className(), ['parent_id' => 'id']);
    }

    public function getParent()
    {
        return $this->hasOne(Category::className(), ['id' => 'parent_id']);
    }

    public function getUrl()
    {
        return url(['listing/index', 'category' => $this->slug, 'id' => $this->id]);
    }
}
