<?php

class m151022_083043_updateCategory extends CDbMigration
{
		public function up()
	{
        $this->addColumn('categories', 'image', 'VARCHAR(255) NOT NULL');
        $this->addColumn('categories', 'slider_title', 'VARCHAR(255) NOT NULL');
        $this->addColumn('categories', 'description', 'TEXT NULL');
	}

	public function down()
	{
		$this->dropColumn('categories', 'image');
		$this->dropColumn('categories', 'slider_title');
		$this->dropColumn('categories', 'description');
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