<?php

use yii\db\Migration;

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
            "currency_id" => $this->smallInteger()->notNull(),
            "description" => $this->text(),
            "description_filtered" => $this->text(),
            "type" => $this->string(32)->notNull(),
            "views" => $this->integer()->defaultValue(0),
            "rank" => $this->integer()->defaultValue(0),
            "is_phone_visible" => $this->boolean()->defaultValue(true),
            "is_email_visible" => $this->boolean()->defaultValue(true),
            "is_published" => $this->boolean()->defaultValue(false),
            "expiry_date" => $this->datetime(),
            "created_at" => $this->datetime(),
            "updated_at" => $this->datetime(),
        ]);
        $this->createIndex("listing_user", "listings", "user_id");
        $this->createIndex("listing_category", "listings", "category_id");
        $this->createIndex("listing_location", "listings", "location_id");
        $this->createIndex("listing_status", "listings", "is_published");
        $this->createIndex("listing_highlight", "listings", "rank");
        $this->createIndex("listing_type", "listings", "type");
        $this->createIndex("listing_created_at", "listings", "created_at");
        $this->createIndex("listing_expiry_date", "listings", "expiry_date");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('listings');
    }
}
