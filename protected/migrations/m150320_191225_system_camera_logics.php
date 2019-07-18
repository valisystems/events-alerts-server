<?php

class m150320_191225_system_camera_logics extends CDbMigration
{
	public function up()
	{
//		CREATE TABLE `mia_system_sms_numbers` (
//			`id_system_sms_number` int(10) unsigned NOT NULL AUTO_INCREMENT,
//		  `description_sms` varchar(250) DEFAULT NULL,
//		  `name_sms` varchar(250) DEFAULT NULL,
//		  `number_sms` varchar(11) DEFAULT NULL,
//		  PRIMARY KEY (`id_system_sms_number`)
//		) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8
		$this->createTable('mia_system_cameras', array(
			'id_system_camera' => 'pk',
			'description_camera' =>  'varchar(250) DEFAULT NULL',
			'name_camera' =>  'varchar(250) DEFAULT NULL',
			'url_camera' =>  'varchar(250) DEFAULT NULL',
		), 'ENGINE=InnoDB');
		$this->addColumn('mia_receiver','id_system_camera', 'int(10) DEFAULT NULL');
		$this->addForeignKey('FK_rdp_id_camera', 'mia_receiver','id_system_camera', 'mia_system_cameras', 'id_system_camera', 'CASCADE', 'CASCADE');

		$this->alterColumn('mia_global_event_template', 'pick_event_type', 'enum("SMS","EMAIL","VOIP", "TRANSFER", "CAMERA") DEFAULT NULL');
		$this->alterColumn('mia_pick_events', 'pick_event_type', 'enum("SMS","EMAIL","VOIP", "TRANSFER", "CAMERA") DEFAULT NULL');
		$this->alterColumn('mia_notification_log', 'type_notification', 'enum("SMS","EMAIL","VOIP", "TRANSFER", "CAMERA") DEFAULT NULL');
	}

	public function down()
	{
		$this->dropTable('mia_system_cameras');
		$this->dropColumn('mia_receiver','id_system_camera');
		$this->dropForeignKey('FK_rdp_id_camera','mia_receiver');
		$this->alterColumn('mia_global_event_template', 'pick_event_type', 'enum("SMS","EMAIL","VOIP", "TRANSFER") DEFAULT NULL');
		$this->alterColumn('mia_pick_events', 'pick_event_type', 'enum("SMS","EMAIL","VOIP", "TRANSFER") DEFAULT NULL');
		$this->alterColumn('mia_notification_log', 'type_notification', 'enum("SMS","EMAIL","VOIP", "TRANSFER") DEFAULT NULL');
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