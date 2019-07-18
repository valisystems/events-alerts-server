#!/usr/bin/php -q

<?php
error_reporting(1);
if (!@include_once(getenv('FREEPBX_CONF') ? getenv('FREEPBX_CONF') : '/etc/freepbx.conf')) {
      include_once('/etc/asterisk/freepbx.conf');
}
global $db;

        $q = "SELECT * FROM endpoint_buttons where `brand` = 'aastra' and `key` like '%_xml'";
        $r = $db->getAll($q, DB_FETCHMODE_ASSOC);

        foreach($r as $key){
                unset($value);
                unset($button);
                $brand = $key['brand'];
                $template_name = $key['template_name'];
                $xml = $key['value'];
                $button = explode('_', $key['key']);
//              dbug("UPDATE endpoint_buttons set `value` = 'XML-API' where `key` = '" . $button[0] . "_type'");
                switch($xml){
                        case 'DND':
                                $value = "REST-DND";
                                $sql[] = "DELETE FROM endpoint_buttons WHERE `brand` = '$brand' AND `template_name` = '$template_name' AND `key` = '" . $button[0] . "_xml'";
                                $sql[] = "UPDATE endpoint_buttons set `value` = 'XML-API' where `key` = '" . $button[0] . "_type'";
                                $sql[] = "DELETE from endpoint_buttons WHERE `brand` = '$brand' AND `template_name` = '$template_name' AND `key` = '" . $button[0] . "_value'";
                                $sql[] = "INSERT INTO endpoint_buttons (`brand`, `template_name`, `key`, `value`) VALUES ('$brand', '$template_name', '" . $button[0] . "_value', '$value')";
                                break;
                        case 'ConferenceRooms':
                                $value = "REST-Conference";
                                $sql[] = "DELETE FROM endpoint_buttons WHERE `brand` = '$brand' AND `template_name` = '$template_name' AND `key` = '" . $button[0] . "_xml'";
                                $sql[] = "UPDATE endpoint_buttons set `value` = 'XML-API' where `key` = '" . $button[0] . "_type'";
                                $sql[] = "DELETE from endpoint_buttons WHERE `brand` = '$brand' AND `template_name` = '$template_name' AND `key` = '" . $button[0] . "_value'";
                                $sql[] = "INSERT INTO endpoint_buttons (`brand`, `template_name`, `key`, `value`) VALUES ('$brand', '$template_name', '" . $button[0] . "_value', '$value')";
                                break;
                        case 'CallFwd':
                                $value = "REST-Call Forward";
                                $sql[] = "DELETE FROM endpoint_buttons WHERE `brand` = '$brand' AND `template_name` = '$template_name' AND `key` = '" . $button[0] . "_xml'";
                                $sql[] = "UPDATE endpoint_buttons set `value` = 'XML-API' where `key` = '" . $button[0] . "_type'";
                                $sql[] = "DELETE from endpoint_buttons WHERE `brand` = '$brand' AND `template_name` = '$template_name' AND `key` = '" . $button[0] . "_value'";
                                $sql[] = "INSERT INTO endpoint_buttons (`brand`, `template_name`, `key`, `value`) VALUES ('$brand', '$template_name', '" . $button[0] . "_value', '$value')";
                                break;
                        case 'Day-Night':
                                $value = "REST-Call Flow";
                                $sql[] = "DELETE FROM endpoint_buttons WHERE `brand` = '$brand' AND `template_name` = '$template_name' AND `key` = '" . $button[0] . "_xml'";
                                $sql[] = "UPDATE endpoint_buttons set `value` = 'XML-API' where `key` = '" . $button[0] . "_type'";
                                $sql[] = "DELETE from endpoint_buttons WHERE `brand` = '$brand' AND `template_name` = '$template_name' AND `key` = '" . $button[0] . "_value'";
                                $sql[] = "INSERT INTO endpoint_buttons (`brand`, `template_name`, `key`, `value`) VALUES ('$brand', '$template_name', '" . $button[0] . "_value', '$value')";
                                break;
                        case 'Parking':
                                $value = "REST-Parking";
                                $sql[] = "DELETE FROM endpoint_buttons WHERE `brand` = '$brand' AND `template_name` = '$template_name' AND `key` = '" . $button[0] . "_xml'";
                                $sql[] = "UPDATE endpoint_buttons set `value` = 'XML-API' where `key` = '" . $button[0] . "_type'";
                                $sql[] = "DELETE from endpoint_buttons WHERE `brand` = '$brand' AND `template_name` = '$template_name' AND `key` = '" . $button[0] . "_value'";
                                $sql[] = "INSERT INTO endpoint_buttons (`brand`, `template_name`, `key`, `value`) VALUES ('$brand', '$template_name', '" . $button[0] . "_value', '$value')";
                                break;
                        case 'ACDAgent':
                                $value = "REST-Queue Agent";
                                $sql[] = "DELETE FROM endpoint_buttons WHERE `brand` = '$brand' AND `template_name` = '$template_name' AND `key` = '" . $button[0] . "_xml'";
                                $sql[] = "UPDATE endpoint_buttons set `value` = 'XML-API' where `key` = '" . $button[0] . "_type'";
                                $sql[] = "DELETE from endpoint_buttons WHERE `brand` = '$brand' AND `template_name` = '$template_name' AND `key` = '" . $button[0] . "_value'";
                                $sql[] = "INSERT INTO endpoint_buttons (`brand`, `template_name`, `key`, `value`) VALUES ('$brand', '$template_name', '" . $button[0] . "_value', '$value')";
                                break;
                        case 'ConferenceRooms':
                                $value = "REST-Conference";
                                $sql[] = "DELETE FROM endpoint_buttons WHERE `brand` = '$brand' AND `template_name` = '$template_name' AND `key` = '" . $button[0] . "_xml'";
                                $sql[] = "UPDATE endpoint_buttons set `value` = 'XML-API' where `key` = '" . $button[0] . "_type'";
                                $sql[] = "DELETE from endpoint_buttons WHERE `brand` = '$brand' AND `template_name` = '$template_name' AND `key` = '" . $button[0] . "_value'";
                                $sql[] = "INSERT INTO endpoint_buttons (`brand`, `template_name`, `key`, `value`) VALUES ('$brand', '$template_name', '" . $button[0] . "_value', '$value')";
                                break;
						case 'Follow-me':
                                $value = "REST-Follow Me";
                                $sql[] = "DELETE FROM endpoint_buttons WHERE `brand` = '$brand' AND `template_name` = '$template_name' AND `key` = '" . $button[0] . "_xml'";
                                $sql[] = "UPDATE endpoint_buttons set `value` = 'XML-API' where `key` = '" . $button[0] . "_type'";
                                $sql[] = "DELETE from endpoint_buttons WHERE `brand` = '$brand' AND `template_name` = '$template_name' AND `key` = '" . $button[0] . "_value'";
                                $sql[] = "INSERT INTO endpoint_buttons (`brand`, `template_name`, `key`, `value`) VALUES ('$brand', '$template_name', '" . $button[0] . "_value', '$value')";
                                break;
                        case 'Logout':
                                $value = "REST-Login";
                                $sql[] = "DELETE FROM endpoint_buttons WHERE `brand` = '$brand' AND `template_name` = '$template_name' AND `key` = '" . $button[0] . "_xml'";
                                $sql[] = "UPDATE endpoint_buttons set `value` = 'XML-API' where `key` = '" . $button[0] . "_type'";
                                $sql[] = "DELETE from endpoint_buttons WHERE `brand` = '$brand' AND `template_name` = '$template_name' AND `key` = '" . $button[0] . "_value'";
                                $sql[] = "INSERT INTO endpoint_buttons (`brand`, `template_name`, `key`, `value`) VALUES ('$brand', '$template_name', '" . $button[0] . "_value', '$value')";
                                break;
                        case 'Presence':
                                $value = "REST-Presence";
                                $sql[] = "DELETE FROM endpoint_buttons WHERE `brand` = '$brand' AND `template_name` = '$template_name' AND `key` = '" . $button[0] . "_xml'";
                                $sql[] = "UPDATE endpoint_buttons set `value` = 'XML-API' where `key` = '" . $button[0] . "_type'";
                                $sql[] = "DELETE from endpoint_buttons WHERE `brand` = '$brand' AND `template_name` = '$template_name' AND `key` = '" . $button[0] . "_value'";
                                $sql[] = "INSERT INTO endpoint_buttons (`brand`, `template_name`, `key`, `value`) VALUES ('$brand', '$template_name', '" . $button[0] . "_value', '$value')";
                                break;
                        case 'Queues':
                                $value = "REST-Queues";
                                $sql[] = "DELETE FROM endpoint_buttons WHERE `brand` = '$brand' AND `template_name` = '$template_name' AND `key` = '" . $button[0] . "_xml'";
                                $sql[] = "UPDATE endpoint_buttons set `value` = 'XML-API' where `key` = '" . $button[0] . "_type'";
                                $sql[] = "DELETE from endpoint_buttons WHERE `brand` = '$brand' AND `template_name` = '$template_name' AND `key` = '" . $button[0] . "_value'";
                                $sql[] = "INSERT INTO endpoint_buttons (`brand`, `template_name`, `key`, `value`) VALUES ('$brand', '$template_name', '" . $button[0] . "_value', '$value')";
                                break;
                        case 'VoiceMail':
                                $value = "REST-Voicemail";
                                $sql[] = "DELETE FROM endpoint_buttons WHERE `brand` = '$brand' AND `template_name` = '$template_name' AND `key` = '" . $button[0] . "_xml'";
                                $sql[] = "UPDATE endpoint_buttons set `value` = 'XML-API' where `key` = '" . $button[0] . "_type'";
                                $sql[] = "DELETE from endpoint_buttons WHERE `brand` = '$brand' AND `template_name` = '$template_name' AND `key` = '" . $button[0] . "_value'";
                                $sql[] = "INSERT INTO endpoint_buttons (`brand`, `template_name`, `key`, `value`) VALUES ('$brand', '$template_name', '" . $button[0] . "_value', '$value')";
                                break;
                        case 'Tr-Vmail':
                                $value = "REST-Transfer VM";
                                $sql[] = "DELETE FROM endpoint_buttons WHERE `brand` = '$brand' AND `template_name` = '$template_name' AND `key` = '" . $button[0] . "_xml'";
                                $sql[] = "UPDATE endpoint_buttons set `value` = 'XML-API' where `key` = '" . $button[0] . "_type'";
                                $sql[] = "DELETE from endpoint_buttons WHERE `brand` = '$brand' AND `template_name` = '$template_name' AND `key` = '" . $button[0] . "_value'";
                                $sql[] = "INSERT INTO endpoint_buttons (`brand`, `template_name`, `key`, `value`) VALUES ('$brand', '$template_name', '" . $button[0] . "_value', '$value')";
                                break;
                        case 'SpeedDial':
                        case 'Contacts':
                                $sql[] = "DELETE FROM endpoint_buttons WHERE `brand` = '$brand' AND `template_name` = '$template_name' AND `key` = '" . $button[0] . "_xml'";
                                $sql[] = "DELETE from endpoint_buttons WHERE `brand` = 'aastra' AND `template_name` = '" . $key['template_name'] . "' AND `key` like '" . $button[0] . "%'";                   
                                break;
                        default:
                                $value = "****$xml****";
                                break;
                }
        }
		$sql[] = "INSERT INTO endpoint_global (`key`, `values`) VALUES ('legacyXML', 'Y')";
        $sql[] = "UPDATE endpoint_global SET `values` = 'Y' WHERE `key` = 'legacyXML'";
        foreach($sql as $query){
			$result[] = $db->query($query);
        }
		system('/var/lib/asterisk/bin/module_admin -f install endpoint', $result);
