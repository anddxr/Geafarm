<?php
Yii::import('application.models.*');

class m151021_133204_addSettings extends CDbMigration
{

    public function up()
    {

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

    public function down()
    {
        $model = Settings::model()->find();
        if (!empty($model->admin_email)) {

            $model->delete();
        }
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
