<?php
/* Copyright (C) 2015 Daniel Preussker <f0o@devilcode.org>
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>. */

/**
 * Bind9 Application
 * @author Daniel Preussker <f0o@devilcode.org>
 * @copyright 2015 f0o, NMS_NG
 * @license GPL
 * @package NMS_NG
 * @subpackage Apps
 */

global $config;
$graphs = array('bind_queries' => 'Queries');
foreach( $graphs as $key => $text ) {
	$graph_type            = $key;
	$graph_array['height'] = "100";
	$graph_array['width']  = "215";
	$graph_array['to']     = $config['time']['now'];
	$graph_array['id']     = $app['app_id'];
	$graph_array['type']   = "application_".$key;
	echo "<h3>$text</h3><tr bgcolor='$row_colour'><td colspan=5>";
	include("includes/print-graphrow.inc.php");
	echo "</td></tr>";
}
?>
