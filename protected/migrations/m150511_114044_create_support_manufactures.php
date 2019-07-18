<?php

class m150511_114044_create_support_manufactures extends CDbMigration
{
	public function up()
	{
		$this->createTable('mia_support_manufactures', array(
			'id_support_manufactures' => 'pk',
			'description_manufacture' =>  'varchar(250) DEFAULT NULL',
			'number_manufacture' =>  'varchar(150) DEFAULT NULL',
			'status_manufacture' =>  "enum('0', '1') DEFAULT '1'",
		), 'ENGINE=InnoDB');
	}

	public function down()
	{
		echo "m150511_114044_create_support_manufactures does not support migration down.\n";
		return false;
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