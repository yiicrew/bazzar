<?php

use yii\db\Migration;
use yii\db\Expression;

/**
 * Handles the creation for table `listings`.
 */
class m160513_222859_create_listings_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('listings', [
            'id' => $this->primaryKey(),
            "user_id" => $this->integer()->notNull(),
            "category_id" => $this->integer()->notNull(),
            "location_id" => $this->integer()->notNull(),
            "title" => $this->string()->notNull(),
            "slug" => $this->string()->notNull(),
            "price" => $this->double(10,2)->defaultValue(0.00),
            "price_type" => $this->string()->defaultValue('FIXED'), // [FIXED, FREE, NEGOTIABLE]
            "minimum_offer_amount" => $this->double(10,2)->defaultValue(0.00),
            "description" => $this->text()->notNull(),
            "description_filtered" => $this->text(),
            "lat" => $this->decimal(10,8),
            "lon" => $this->decimal(11,8),
            "address" => $this->string()->notNull(),
            "type" => $this->string(32)->notNull()->defaultValue('OFFER'), // [OFFER, WANTED]
            "views" => $this->integer()->defaultValue(0),
            "is_phone_visible" => $this->boolean()->defaultValue(true),
            "is_email_visible" => $this->boolean()->defaultValue(true),
            "is_active" => $this->boolean()->defaultValue(false),
            "expiry_date" => $this->datetime(),
            "created_at" => $this->datetime(),
            "updated_at" => $this->datetime(),
        ]);
        // Features: [HIGHLIGHT, TOP_AD, HOMEPAGE_GALLERY, URGENT]
        $this->createIndex("listing_user", "listings", "user_id");
        $this->createIndex("listing_category", "listings", "category_id");
        $this->createIndex("listing_location", "listings", "location_id");
        $this->createIndex("listing_is_active", "listings", "is_active");
        $this->createIndex("listing_views", "listings", "views");
        $this->createIndex("listing_price", "listings", "price");
        $this->createIndex("listing_type", "listings", "type");
        $this->createIndex("listing_slug", "listings", "slug");
        $this->createIndex("listing_created_at", "listings", "created_at");
        $this->createIndex("listing_expiry_date", "listings", "expiry_date");

        // Add a dummy listing for testing
        $this->insert('listings', [
            'user_id' => 1,
            'category_id' => 1,
            'location_id' => 1,
            'title' => 'Diesel Water Pump',
            'slug' => 'diesel-water-pump',
            'price' => '890',
            'description' => 'Diesel Water Pump – Yanmar & BDM Fire Fighter/Transfer/Trash Pump',
            'address' => 'Tecom, Dubai, United Arab Emirates',
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()')
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('listings');
    }
}
