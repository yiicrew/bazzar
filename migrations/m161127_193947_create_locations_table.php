<?php

use yii\db\Migration;

/**
 * Handles the creation of table `locations`.
 */
class m161127_193947_create_locations_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable("locations", [
            "id" => $this->primaryKey(),
            "name" => $this->string()->notNull(),
            "slug" => $this->string()->notNull(),
            "type" => $this->string(32)->notNull()->defaultValue('city'),
            "parent_id" => $this->integer()->defaultValue(0),
            "is_active" => $this->boolean()->defaultValue(true),
            "created_at" => $this->datetime(),
            "updated_at" => $this->datetime()
        ]);

        // create table indexes
        $this->createIndex("locations_parent_id_index", "locations", "parent_id");
        $this->createIndex("locations_is_active_index", "locations", "is_active");
        $this->createIndex("locations_type_index", "locations", "type");
        $this->createIndex("locations_slug_index", "locations", "slug");

        // country
        $this->insert("locations", [
            "name" => "United States",
            "slug" => "united-states",
            "type" => "country"
        ]);

        // state
        $this->insert("locations", [
            "name" => "New York",
            "slug" => "new-york",
            "type" => "state",
            "parent_id" => 1
        ]);

        $this->insert("locations", [
            "name" => "Georgia",
            "slug" => "georgia",
            "type" => "state",
            "parent_id" => 1
        ]);

        $this->insert("locations", [
            "name" => "California",
            "slug" => "california",
            "type" => "state",
            "parent_id" => 1
        ]);

        // city
        $this->insert("locations", [
            "name" => "New York",
            "slug" => "new-york",
            "type" => "city",
            "parent_id" => 2
        ]);

        // city
        $this->insert("locations", [
            "name" => "Atlanta",
            "slug" => "atlanta",
            "type" => "city",
            "parent_id" => 3
        ]);

        $this->insert("locations", [
            "name" => "San Francisco",
            "slug" => "san-francisco",
            "type" => "city",
            "parent_id" => 4
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('locations');
    }
}
