<?php
// used for aastra to create the "define" field
global $db, $amp_conf;

$brands = array('aastra', 'algo', 'and', 'audiocodes', 'cisco', 'cortelco', 'mocet', 'cyberdata', 'digium', 'grandstream', 'mitel', 'obihai', 'panasonic', 'phoenix', 'polycom', 'sangoma', 'snom', 'uniden', 'vtech', 'yealink', 'xorcom');

foreach($brands as $brand){
	$sql = "SELECT * FROM endpoint_basefiles WHERE `template` = 'default' and `brand` = '$brand'"; 
	$res = $db->getAll($sql, DB_FETCHMODE_ASSOC); 
	if($db->IsError($res)){ 
			die_freepbx($res->getDebugInfo()); 
	}
	unset($sql); 
	foreach($res as $key=>$value){
		$sql[] = "UPDATE endpoint_basefiles SET `define` = '" . $value['param'] . "' WHERE `id` = '" . $value['id'] . "'";
	}
		
	foreach ($sql as $q) {
		$result = $db->query($q);
		if($db->IsError($result)){
			die_freepbx($result->getDebugInfo());
		}
	}
}