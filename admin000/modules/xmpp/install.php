<?php

$first_install = db_e($db->getAll('SELECT * FROM xmpp_options'), '');

$sql[] = "CREATE TABLE IF NOT EXISTS `xmpp_users` (
  `user` varchar(50) NOT NULL default '',
  `username` varchar(50) default NULL,
  `password` varchar(50) default NULL,
  PRIMARY KEY  (`user`)
)";

$sql[] = "CREATE TABLE IF NOT EXISTS `xmpp_options` (
  `keyword` varchar(75) NOT NULL default '',
  `value` text,
  PRIMARY KEY  (`keyword`)
)";

if ($first_install) {
	$sql[] = 'INSERT INTO xmpp_options (keyword, value) VALUES
			("dirty", "true"),
			("domain", "localhost")
	';

	//migrate users from xactview
	$q = 'SELECT user_id, jabber_user_name, jabber_password, display_name'
		. ' FROM xactview_users WHERE user_id != ""';
	$curusers = $db->getAll($q, DB_FETCHMODE_ASSOC);
	if (!db_e($curusers, '') && $curusers) {
		foreach ($curusers as $u) {
			$u['jabber_user_name'] = $u['jabber_user_name']
				? $u['jabber_user_name']
				: $u['user_id'];

			$u['jabber_password'] = $u['jabber_password']
				? $u['jabber_password']
				: md5(uniqid());

			$sql[] = 'INSERT INTO xmpp_users (user, username, password)
						VALUES ("'
							. $u['user_id'] . '", "'
							. $u['jabber_user_name'] . '", "'
							. $u['jabber_password'] . '")';
		}
	}
}

$sql[] = 'REPLACE INTO xmpp_options (keyword, value) VALUES ("dirty", "true")';

foreach($sql as $q) {
	db_e($e = $db->query($q), 'die_freepbx', 4, _("Cannot create xmpp tables"));
}

if(!function_exists('setup_userman')) {
    out(_('Missing User Manager Module!'));
    return false;
}

$mod_info = module_getinfo('xmpp');
dbug($mod_info);
if(!empty($mod_info['xmpp']['dbversion']) && version_compare($mod_info['xmpp']['dbversion'],'2.11.1.3','<')) {
    out(_('Migrating Token Users to User Manager'));
    $sql = "SELECT * FROM xmpp_users";
    $users = sql($sql,'getAll',DB_FETCHMODE_ASSOC);
    if(!empty($users)) {
        $usermapping = array();
        $userman = setup_userman();
        $umusers = array();
        $umusersn = array();
        foreach($userman->getAllUsers() as $user) {
            $umusersn[] = $user['username'];
            if($user['default_extension'] == 'none') {
                continue;
            }
            $umusers[$user['default_extension']] = $user['id'];
        }
        foreach($users as $user) {
            if(empty($user['username'])) {
                out(_('Detected Blank username, removing'));
                $sql = "DELETE FROM xmpp_users WHERE user = ".$user['user'];
                sql($sql);
                continue;
            }
            if(isset($umusers[$user['user']])) {
                $uInfo = $userman->getUserByID($umusers[$user['user']]);
                out(sprintf(_('Changing user %s to %s'),$uInfo['username'],$user['username']));
                if(in_array($user['username'],$umusersn) && ($uInfo['username'] != $user['username'])) {
                    out(sprintf(_('Username Conflict %s changing to %s deleting %s'),$uInfo['username'],$user['username'],$user['username']));
                    $userman->deleteUserByID($uInfo['id']);
                }
                $ret = $userman->updateUser($uInfo['username'], $user['username'], $uInfo['default_extension'], $uInfo['description'], array(), $user['password']);
            } else {
                out(sprintf(_('Adding %s to User Manager'),$user['username']));
                $ret = $userman->addUser($user['username'], $user['password'], $user['user']);
                if(!$ret['status']) {
                    out(sprintf(_('User %s already exists, updating instead'),$user['username']));
                    $uInfo = $userman->getUserByID($umusers[$user['user']]);
                    $ret = $userman->updateUser($user['username'], $user['username'], $user['user'], $uInfo['description'], array(), $user['password']);
                }
            }
            if($ret['status']) {
                $sql = "UPDATE xmpp_users SET user = ".$ret['id']." WHERE user = ".$user['user'];
                sql($sql);
            } else {
                out(sprintf(_('Unable to add %s to User Manager'),$user['username']));
            }
        }
    }
}
