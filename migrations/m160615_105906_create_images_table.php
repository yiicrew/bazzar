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
            'listing_id' => $this->integer(),
            'file_name' => $this->string()->notNull(),
            'file_size' => $this->integer()->notNull(),
            'file_type' => $this->string()->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime()
        ]);
        $this->createIndex('image_listing_id', 'images', 'listing_id');

        // add images for dummy listing
        $this->insert('images', [
            'listing_id' => 1,
            'file_name' => '/uploads/bike_1.jpg',
            'file_size' => 0,
            'file_type' => 'jpg',
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
