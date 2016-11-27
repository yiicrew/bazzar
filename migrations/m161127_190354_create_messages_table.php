<?php

use yii\db\Migration;

/**
 * Handles the creation of table `messages`.
 */
class m161127_190354_create_messages_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('messages', [
            'id' => $this->primaryKey(),
            "listing_id" => $this->integer()->notNull(),
            'receiver_id' => $this->integer()->notNull(),
            'sender_id' => $this->integer()->notNull(),
            'is_read' => $this->boolean()->defaultValue(false),
            'body' => $this->text()->notNull(),
            'created_at' => $this->datetime(),
        ]);
        $this->createIndex('messages_listing_id_index', 'messages', 'listing_id');
        $this->createIndex('messages_receiver_id_index', 'messages', 'receiver_id');
        $this->createIndex('messages_sender_id_index', 'messages', 'sender_id');
        $this->createIndex('messages_is_read_index', 'messages', 'is_read');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('messages');
    }
}
