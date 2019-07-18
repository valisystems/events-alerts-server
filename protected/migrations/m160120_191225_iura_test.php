<?php

class m160120_191225_iura_test extends CDbMigration
{
	public function up()
	{
		$this->createTable('{{iura_test}}', array(
			'id_system_camera' => 'pk',
			'description_camera' =>  'varchar(250) DEFAULT NULL',
			'name_camera' =>  'varchar(250) DEFAULT NULL',
			'url_camera' =>  'varchar(250) DEFAULT NULL',
		), 'ENGINE=InnoDB');
	}

	public function down()
	{
		$this->dropTable('{{iura_test}}');
	}
}