<?php
Yii::import('application.models.*');
class m151023_202051_updateSettings extends CDbMigration {

    public function up() {

        $this->dropTable('settings');


        $this->createTable('settings', array(
            'id' => 'pk',
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



        $model = new Settings();
        $model->admin_email = 'admin';
        $model->admin_pass = sha1('admin');
        $model->title = 'Евгений';
        $model->meta_description = 'Евгений';
        $model->meta_keywords = 'Евгений';
        $model->contact_number = '+380636616655';
        $model->contact_email = 'kadet-zp@mail.ru';
        $model->contact_adress = 'Запорожье';
        $model->logo = 'logo.png';
        $model->save();
    }

    public function down() {
        $this->dropTable('settings');


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
