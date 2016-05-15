<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "listings".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $category_id
 * @property integer $location_id
 * @property string $title
 * @property string $slug
 * @property double $price
 * @property integer $currency_id
 * @property string $description
 * @property string $description_filtered
 * @property string $type
 * @property integer $views
 * @property integer $rank
 * @property integer $is_phone_visible
 * @property integer $is_email_visible
 * @property integer $is_published
 * @property integer $is_premium
 * @property string $expiry_date
 * @property string $created_at
 * @property string $updated_at
 */
class Listing extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'listings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'category_id', 'location_id', 'title', 'slug', 'currency_id', 'type'], 'required'],
            [['user_id', 'category_id', 'location_id', 'currency_id', 'views', 'rank', 'is_phone_visible', 'is_email_visible', 'is_published', 'is_premium'], 'integer'],
            [['price'], 'number'],
            [['description', 'description_filtered'], 'string'],
            [['expiry_date', 'created_at', 'updated_at'], 'safe'],
            [['title', 'slug'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'location_id' => Yii::t('app', 'Location ID'),
            'title' => Yii::t('app', 'Title'),
            'slug' => Yii::t('app', 'Slug'),
            'price' => Yii::t('app', 'Price'),
            'currency_id' => Yii::t('app', 'Currency ID'),
            'description' => Yii::t('app', 'Description'),
            'description_filtered' => Yii::t('app', 'Description Filtered'),
            'type' => Yii::t('app', 'Type'),
            'views' => Yii::t('app', 'Views'),
            'rank' => Yii::t('app', 'Rank'),
            'is_phone_visible' => Yii::t('app', 'Is Phone Visible'),
            'is_email_visible' => Yii::t('app', 'Is Email Visible'),
            'is_published' => Yii::t('app', 'Is Published'),
            'is_premium' => Yii::t('app', 'Is Premium'),
            'expiry_date' => Yii::t('app', 'Expiry Date'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     * @return ListingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ListingQuery(get_called_class());
    }
}
