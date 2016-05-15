<?php

use yii\db\Migration;
use yii\db\Expression;
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
            "description" => $this->text(),
            "meta_description" => $this->text(),
            "meta_keywords" => $this->text(),
            "parent_id" => $this->integer(),
            "is_active" => $this->boolean()->defaultValue(true),
            "created_at" => $this->datetime(),
            "updated_at" => $this->datetime(),
        ]);
        $this->createIndex("categories_parent", "categories", "parent_id");
        $this->createIndex("categories_is_active", "categories", "is_active");
        $this->createIndex("categories_slug", "categories", "slug");

        // seed database for initial setup
        $this->insert('categories', [
            'name' => 'Vehicles',
            'slug' => 'vehicles',
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'Real Estate',
            'slug' => 'real-estate',
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'Services',
            'slug' => 'services',
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'Jobs',
            'slug' => 'jobs',
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'Pets',
            'slug' => 'pets',
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'Computers',
            'slug' => 'computers',
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'Audio Visual',
            'slug' => 'audio-visual',
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'Travel',
            'slug' => 'travel',
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'Personals',
            'slug' => 'personals',
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);

        // ID: 1
        $this->insert('categories', [
            'name' => 'Cars',
            'slug' => 'cars',
            'parent_id' => 1,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'Car Parts',
            'slug' => 'cars-parts',
            'parent_id' => 1,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'Motorcycles - Scooters',
            'slug' => 'motorcycles-scooters',
            'parent_id' => 1,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'Trucks - Commercial Vehicles',
            'slug' => 'trucks-commercial-vehicles',
            'parent_id' => 1,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        // ID: 2
        $this->insert('categories', [
            'name' => 'Houses - Flats for Sale',
            'slug' => 'houses-flats-for-sale',
            'parent_id' => 2,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'Houses - Flats for Rent',
            'slug' => 'houses-flats-for-rent',
            'parent_id' => 2,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'Rooms for Rent - Shared',
            'slug' => 'rooms-for-rent-shared',
            'parent_id' => 2,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'Vacation Rentals',
            'slug' => 'vacation-rentals',
            'parent_id' => 2,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        // ID: 3
        $this->insert('categories', [
            'name' => 'Babysitter - Nanny',
            'slug' => 'babysitter-nanny',
            'parent_id' => 3,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'Computer',
            'slug' => 'computer',
            'parent_id' => 3,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'Event Services',
            'slug' => 'event-services',
            'parent_id' => 3,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'Health - Beauty - Fitness',
            'slug' => 'health-beauty-fitness',
            'parent_id' => 3,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        // ID: 4
        $this->insert('categories', [
            'name' => 'Accounting Jobs - Finance Jobs',
            'slug' => 'accounting-jobs-finance-jobs',
            'parent_id' => 4,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'Customer Service Jobs',
            'slug' => 'customer-service-jobs',
            'parent_id' => 4,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'Computer Jobs',
            'slug' => 'computer-jobs',
            'parent_id' => 4,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'Legal Jobs',
            'slug' => 'legal-jobs',
            'parent_id' => 4,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        // ID: 5
        $this->insert('categories', [
            'name' => 'Pet Homes and Accessories',
            'slug' => 'pet-homes-and-accessories',
            'parent_id' => 5,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'Birds',
            'slug' => 'birds',
            'parent_id' => 5,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'Dogs & Puppies',
            'slug' => 'dogs-and-puppies',
            'parent_id' => 5,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'Cats & Kittens',
            'slug' => 'cats-and-kittens',
            'parent_id' => 5,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        // ID: 6
        $this->insert('categories', [
            'name' => 'Computer Games & Consoles',
            'slug' => 'computer-games-and-consoles',
            'parent_id' => 6,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'Hardware',
            'slug' => 'hardware',
            'parent_id' => 6,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'Services',
            'slug' => 'services',
            'parent_id' => 6,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'Software',
            'slug' => 'software',
            'parent_id' => 6,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        // ID: 7
        $this->insert('categories', [
            'name' => 'Audio',
            'slug' => 'audio',
            'parent_id' => 7,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'Communications',
            'slug' => 'communications',
            'parent_id' => 7,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'Music',
            'slug' => 'music',
            'parent_id' => 7,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'TV & Satellite',
            'slug' => 'tv-and-satellite',
            'parent_id' => 7,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        // ID: 8
        $this->insert('categories', [
            'name' => 'Accommodation',
            'slug' => 'accommodation',
            'parent_id' => 8,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'Holiday Services & Equipment',
            'slug' => 'holiday-services-and-equipment',
            'parent_id' => 8,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'Holidays',
            'slug' => 'holidays',
            'parent_id' => 8,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        // ID: 9
        $this->insert('categories', [
            'name' => 'Men Looking for Women',
            'slug' => 'men-looking-for-women',
            'parent_id' => 9,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'Women Looking for men',
            'slug' => 'women-looking-for-men',
            'parent_id' => 9,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'name' => 'Women Looking for Women',
            'slug' => 'women-looking-for-women',
            'parent_id' => 9,
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
        ]);

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('categories');
    }
}
