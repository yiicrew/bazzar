<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "messages".
 *
 * @property integer $id
 * @property integer $listing_id
 * @property integer $receiver_id
 * @property integer $sender_id
 * @property integer $is_read
 * @property string $body
 * @property string $created_at
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'messages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['listing_id', 'receiver_id', 'sender_id', 'body'], 'required'],
            [['listing_id', 'receiver_id', 'sender_id', 'is_read'], 'integer'],
            [['body'], 'string'],
            [['created_at'], 'safe'],
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
            'receiver_id' => 'Receiver ID',
            'sender_id' => 'Sender ID',
            'is_read' => 'Is Read',
            'body' => 'Body',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @inheritdoc
     * @return MessageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MessageQuery(get_called_class());
    }

    public function getListing()
    {
        return $this->hasOne(Listing::className(), ['id' => 'listing_id']);
    }

    public function getSender()
    {
        return $this->hasOne(User::className(), ['id' => 'sender_id']);
    }
}
