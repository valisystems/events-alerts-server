<?php
header("Access-Control-Allow-Origin: *");
/*header("Access-Control-Allow-Methods: POST, PUT, GET");
header('Access-Control-Allow-Credentials: true');
header("Access-Control-Allow-Headers", "Content-Type");*/
error_reporting(E_ALL);
ini_set("display_errors", 1);
include "./includes/conf.php";
require_once "/etc/freepbx.conf";
require_once $PATH_FREE_PBX_CLASS."freepbx_conf.class.php";
require_once($PATH_FREE_PBX_CLASS . 'db_connect.php');
$ext = (isset($_POST['ext']) && !empty($_POST['ext'])) ? $_POST['ext'] : null;
if ($ext != null){
	$amp_conf = array();
	$amp_conf =& $freepbx_conf->parse_amportal_conf("/etc/amportal.conf",$amp_conf);
	
	$asm = new AGI_AsteriskManager();
	$StatusInfo = "";
	$extension = $ext[0];
	$extInfo = array(); 
	if ($asm->connect($astConf['host'], $astConf['user'], $astConf['pass'])) {
	foreach ($ext as $k) {
		$statExt = $asm->ExtensionState($k, 'default');
		if(count($statExt)) {
			$result = explode("\n",$statExt['data']);
			//print_r($result);
			foreach($result as $kl) {
			  $extInfo[$k] = $statExt;
			}
		}
	}
		if (count($extInfo)){
			header("Content-Type: text/plain");
			$result=htmlspecialchars(json_encode( $extInfo), ENT_NOQUOTES);
			echo $result;
		} else {
			header("Content-Type: text/plain");
			$result=htmlspecialchars(json_encode( array('status'=> 'noData')), ENT_NOQUOTES);
			echo $result;
		}
	} else echo "Can't connect";
} else {
	echo "Tipa nui";
}
?>