<?php

class m150514_084108_alter_column_to_devices extends CDbMigration
{
	public function up()
	{
		$this->addColumn('mia_devices', 'device_classification', "enum('mialert','mipositioning') NOT NULL DEFAULT 'mialert' ");
		$this->dropForeignKey('FK_devices_id_room','mia_devices');
		$this->dropIndex('FK_devices_id_room','mia_devices');
		$this->alterColumn('mia_devices', 'id_room', 'int(10) unsigned DEFAULT NULL');
	}

	public function down()
	{
		echo "m150514_084108_alter_column_to_devices does not support migration down.\n";
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