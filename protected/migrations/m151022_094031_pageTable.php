<?php

class m151022_094031_pageTable extends CDbMigration
{

    public function up()
    {

        $this->createTable('page', array(
            'id' => 'pk',
            'code' => 'varchar(255) DEFAULT NULL',
            'image' => 'varchar(255) DEFAULT NULL',
            'description' => 'text DEFAULT NULL',
            'little_description' => 'text DEFAULT NULL',
            ), '');
    }

    public function down()
    {
        $this->dropTable('page');
        return true;
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
