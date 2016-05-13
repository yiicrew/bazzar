<?php

use yii\db\Migration;

/**
 * Handles the creation for table `categories_table`.
 */
class m160513_231202_create_categories_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            "name" => $this->string()->notNull(),
            "slug" => $this->string()->notNull(),
            "parent_id" => $this->integer(),
            "is_active" => $this->boolean()->defaultValue(true),
            "created_at" => $this->datetime(),
            "updated_at" => $this->datetime(),
        ]);
        $this->createIndex("categories_parent", "categories", "parent_id");
        $this->createIndex("categories_slug", "categories", "slug");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('categories');
    }
}
