<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;
use app\models\User;
use app\models\Image;

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
 * @property string $price_type
 * @property double $minimum_offer_amount
 * @property string $description
 * @property string $description_filtered
 * @property string $lat
 * @property string $lon
 * @property string $address
 * @property string $type
 * @property integer $views
 * @property integer $is_phone_visible
 * @property integer $is_email_visible
 * @property integer $is_active
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

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()')
            ],
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'slugAttribute' => 'slug',
            ],
            /*
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'user_id',
                'updatedByAttribute' => false,
            ],
             */
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'location_id', 'title', 'slug', 'description', 'address'], 'required'],
            [['user_id', 'category_id', 'location_id', 'views', 'is_phone_visible', 'is_email_visible', 'is_active'], 'integer'],
            [['price', 'minimum_offer_amount', 'lat', 'lon'], 'number'],
            [['description', 'description_filtered'], 'string'],
            [['expiry_date', 'created_at', 'updated_at'], 'safe'],
            [['title', 'slug', 'price_type', 'address'], 'string', 'max' => 255],
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
            'user_id' => Yii::t('app', 'User'),
            'category_id' => Yii::t('app', 'Category'),
            'location_id' => Yii::t('app', 'Location'),
            'title' => Yii::t('app', 'Title'),
            'slug' => Yii::t('app', 'Slug'),
            'price' => Yii::t('app', 'Price'),
            'price_type' => Yii::t('app', 'Price Type'),
            'minimum_offer_amount' => Yii::t('app', 'Minimum Offer Amount'),
            'description' => Yii::t('app', 'Description'),
            'description_filtered' => Yii::t('app', 'Description Filtered'),
            'lat' => Yii::t('app', 'Lat'),
            'lon' => Yii::t('app', 'Lon'),
            'address' => Yii::t('app', 'Address'),
            'type' => Yii::t('app', 'Type'),
            'views' => Yii::t('app', 'Views'),
            'is_phone_visible' => Yii::t('app', 'Is Phone Visible'),
            'is_email_visible' => Yii::t('app', 'Is Email Visible'),
            'is_active' => Yii::t('app', 'Is Active'),
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

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getImages()
    {
        return $this->hasMany(Image::className(), ['listing_id' => 'id']);
    }

    public function getLocation()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getViewUrl($absoluteUrl = false)
    {
        return url(['listing/view', 'id' => $this->id, 'slug' => $this->slug], $absoluteUrl);
    }

    public function getHasImages()
    {
        return !empty($this->images);
    }

    // @todo: work out the url from images table
    public function getThumbSrc()
    {
        if ($this->hasImages) {
            $image = $this->images[0];
            return $image->publicUrl;
        }
        return base_url('img/no_image.jpg');
    }

    public function getTags()
    {
        return 'Motor, Engine, Water Pump';
    }

    public function getCoordinates()
    {
        return $this->lat . $this->lon;
    }
}
