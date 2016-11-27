<?php

use yii\db\Migration;
use yii\db\Expression;

/**
 * Handles the creation for table `images_table`.
 */
class m160615_105906_create_images_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('images', [
            'id' => $this->primaryKey(),
            'listing_id' => $this->integer()->notNull(),
            'path' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'size' => $this->integer()->notNull(),
            'type' => $this->string()->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime()
        ]);
        $this->createIndex('image_listing_id', 'images', 'listing_id');

        // add images for dummy listing
        $this->insert('images', [
            'listing_id' => 1,
            'path' => '/uploads/bike_1.jpg',
            'name' => 'bike_1.jpg',
            'size' => 0,
            'type' => 'jpg',
            'created_at' => new Expression('NOW()')
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('images');
    }
}
