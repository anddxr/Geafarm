<?php

class m151021_130721_initial extends CDbMigration
{

    public function up()
    {
        $this->createTable('categories', array(
            'id' => 'pk',
            'title' => 'varchar(255) NOT NULL',
            ), '');

        $this->createTable('products', array(
            'id' => 'pk',
            'category_id' => 'int(11) DEFAULT NULL',
            'image' => 'varchar(255) DEFAULT NULL',
            'title' => 'varchar(255) DEFAULT NULL',
            'description' => 'text DEFAULT NULL',
            'little_description' => 'varchar(255) DEFAULT NULL',
            ), '');

        $this->createIndex('idx_category_id', 'products', 'category_id', FALSE);

        $this->createTable('settings', array(
            'admin_email' => 'varchar(255) DEFAULT NULL',
            'admin_pass' => 'varchar(255) DEFAULT NULL',
            'logo' => 'varchar(255) DEFAULT NULL',
            'title' => 'varchar(255) DEFAULT NULL',
            'meta_description' => 'text DEFAULT NULL',
            'meta_keywords' => 'text DEFAULT NULL',
            'contact_number' => 'varchar(255) DEFAULT NULL',
            'contact_email' => 'varchar(255) DEFAULT NULL',
            'contact_adress' => 'text DEFAULT NULL',
            ), '');

        $this->addForeignKey('fk_products_categories_category_id', 'products', 'category_id', 'categories', 'id', 'NO ACTION', 'NO ACTION');
    }

    public function down()
    {
        $this->dropForeignKey('fk_products_categories_category_id', 'products');

        $this->dropTable('categories');
        $this->dropTable('products');
        $this->dropTable('settings');
    }
    /*
      // Use safeUp/safeDown to do migration with transaction
      public function safeUp()
      {
      }

      public function safeDown()
      {
      }
     */
}
