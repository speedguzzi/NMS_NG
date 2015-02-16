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
 * TinyDNS Other Graph
 * @author Daniel Preussker <f0o@devilcode.org>
 * @copyright 2015 f0o, NMS_NG
 * @license GPL
 * @package NMS_NG
 * @subpackage Graphs
 */

include("includes/graphs/common.inc.php");

$i            = 0;
$scale_min    = 0;
$nototal      = 1;
$unit_text    = "Query/sec";
$rrd_filename = $config['rrd_dir'] . "/" . $device['hostname'] . "/app-tinydns-".$app['app_id'].".rrd";
$array        = array( "other", "hinfo", "rp", "axfr" );
$colours      = "mixed";
$rrd_list     = array();

if( is_file($rrd_filename) ) {
	foreach( $array as $ds ) {
		$rrd_list[$i]['filename'] = $rrd_filename;
		$rrd_list[$i]['descr']    = strtoupper($ds);
		$rrd_list[$i]['ds']       = $ds;
		$i++;
	}
} else {
	echo "file missing: $file";
}

include("includes/graphs/generic_multi_simplex_seperated.inc.php");
?>
