<?php

use yii\db\Migration;

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
            'public_url' => $this->string()->notNull(),
            'original_url' => $this->string()->notNull(),
            'created_at' => $this->datetime()
        ]);
        $this->createIndex('image_listing_id', 'images', 'listing_id');

        // add images for dummy listing
        $this->insert('images', [
            'listing_id' => 1,
            'public_url' => '/uploads/bike_1.jpg',
            'original_url' => '/uploads/bike_1.jpg',
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
