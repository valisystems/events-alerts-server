<?php

class m150127_192517_adjuste_transfer_call extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('mia_global_event_template', 'pick_event_type', 'enum("SMS","EMAIL","VOIP", "TRANSFER") DEFAULT NULL');
		$this->alterColumn('mia_pick_events', 'pick_event_type', 'enum("SMS","EMAIL","VOIP", "TRANSFER") DEFAULT NULL');
		$this->alterColumn('mia_notification_log', 'type_notification', 'enum("SMS","EMAIL","VOIP", "TRANSFER") DEFAULT NULL');
		$this->alterColumn('mia_events_manage', "position_popup", "enum('left','top','right','bottom','topleft','topright','bottomleft','bottomright') DEFAULT 'top'");

		//ALTER TABLE mia_events_manage ADD position_popup enum('left','top','right','bottom','topleft','topright','bottomleft','bottomright') DEFAULT 'top';
	}

	public function down()
	{
		echo "m150127_192517_adjuste_transfer_call does not support migration down.\n";
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