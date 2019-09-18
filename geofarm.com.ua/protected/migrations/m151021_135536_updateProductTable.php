<?php

class m151021_135536_updateProductTable extends CDbMigration
{
	public function up()
	{
        $this->addColumn('products', 'block', 'INT(11) NULL DEFAULT 0');
	}

	public function down()
	{
		$this->dropColumn('products', 'block');
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