<?php 
if (!defined('FREEPBX_IS_AUTH')) { die('No direct script access allowed'); }
$get_vars = array(
				'action'	=> '',
				'dbname'	=> '',
				'dbhost'	=> '',
				'dbuser'	=> '',
				'dbpass'	=> '',
				'domain'	=> '',
				'port'		=> '',
				'submit'	=> '',
				'type'		=> ''	
				);

foreach ($get_vars as $k => $v) {
	$var[$k] = isset($_REQUEST[$k]) ? $_REQUEST[$k] : $v;
}

//set action to delete if delete was pressed instead of submit
if ($var['submit'] == _('Delete') && $var['action'] == 'save') {
	$var['action'] = 'delete';
}

//action actions
switch ($var['action']) {
	case 'save':
		foreach($var as $k => $v) {
			switch ($k) {
				case 'domain':

					if ($v) {
						xmpp_opts_put(array($k, $v)); 
					}
					break;
				default:
					break;
			}
		}
	case 'delete':
		break;
}

//view action
switch ($var['action']) {
	case 'edit':
	case 'save':
	default:
		if(isset($xmpplic) && $xmpplic) {
			$var = array_merge($var, xmpp_opts_get());
			echo load_view(dirname(__FILE__) . '/views/xmpp.php', $var);
		} else {
			echo load_view(dirname(__FILE__) . '/views/unlicensed.php');
		}
		break;
}

?>
