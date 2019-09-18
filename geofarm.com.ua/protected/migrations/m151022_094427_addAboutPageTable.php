<?php
Yii::import('application.models.*');

class m151022_094427_addAboutPageTable extends CDbMigration
{

    public function up()
    {

        $model = new Page();
        $model->little_description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque placerat dolor dolor, in tristique nunc eleifend eget. Pellentesque vestibulum finibus arcu sit amet suscipit.';
        $model->description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque placerat dolor dolor, in tristique nunc eleifend eget. Pellentesque vestibulum finibus arcu sit amet suscipit. Aenean placerat, nibh eu bibendum dictum, odio sem tincidunt urna, et lobortis neque odio id lectus. In eget justo id sapien sagittis placerat et at diam. Maecenas pulvinar semper nibh, in tempor massa scelerisque ut. Vestibulum auctor vel quam vitae molestie. Suspendisse potenti. ';
        $model->code = Page::CODE_ABOUT;
        $model->save();
    }

    public function down()
    {
        $model = Page::model()->find('code=:code', [':code' => Page::CODE_ABOUT]);
        if (!empty($model->id)) {

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
