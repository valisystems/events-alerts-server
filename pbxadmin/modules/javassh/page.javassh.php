<?php 
if (!defined('FREEPBX_IS_AUTH')) { die('No direct script access allowed'); }
// Java SSH Client
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of version 3 of the GNU Affero General Public
// License as published by the Free Software Foundation, or at your choice,
// any later version.
//
// Some parts of JCTerm are released under other open source licences. Explicit
// permission is granted for use of those packages with this module.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.

echo "<h2> "._("Java SSH")." </h2>";
echo _("You can click on the 'New window' bar to open a new window.");
echo _("Select one of the pre-populated hosts to connect to, or, you can enter your own.");

// Grab all potential addresses they may want to connect to,
// and return a string of all the unique ones.
$hosts = array($_SERVER['HTTP_HOST'], $_SERVER['SERVER_ADDR'], $_SERVER['SERVER_NAME']);
$dests = array();
foreach ($hosts as $h) {
	$dests["root@$h"] = true;
	$dests["asterisk@$h"] = true;
}
$dest = join(",", array_keys($dests));
?>

<br><br>

<center>
  <applet code="com.jcraft.jcterm.JCTermApplet.class" codebase="modules/javassh/"
	archive="jcterm-0.0.11.jar,jsch-0.1.51.jar,jzlib.jar"
	width="1024" height="768">
	<param name="jcterm.font_size"  value="20">
	<param name="jcterm.destinations"  value="<?php echo $dest; ?>">
  </applet>
</center>

<br><br>
<p>JCTerm is released under the GPLv2 or higher. Source code and futher licencing information is available from
  <a href='//github.com/xrobau/javassh'>the GitHub repository</a>. This module is released under the AGPL v3+.</p>
