<?php
/*
* This file is part of NMS_NG
*
* Copyright (c) 2014 Bohdan Sanders <http://bohdans.com/>
*
* This program is free software: you can redistribute it and/or modify it
* under the terms of the GNU General Public License as published by the
* Free Software Foundation, either version 3 of the License, or (at your
* option) any later version. Please see LICENSE.txt at the top level of
* the source code distribution for details.
*/
?>
<?php

if ($bg == $list_colour_b) { $bg = $list_colour_a; } else { $bg = $list_colour_b; }

if ($device['status'] == '0')
{
  $class = "bg-danger";
} else {
  $class = "bg-primary";
}
if ($device['ignore'] == '1')
{
  $class = "bg-warning";
  if ($device['status'] == '1')
  {
    $class = "bg-success";
  }
}
if ($device['disabled'] == '1')
{
  $class = "bg-info";
}

$type = strtolower($device['os']);

if ($device['os'] == "ios") { formatCiscoHardware($device, true); }
$device['os_text'] = $config['os'][$device['os']]['text'];

echo('  <tr>
          <td class="'. $class .' "></td>
          <td>' . $image . '</td>
          <td><span style="font-size: 15px;">' . generate_device_link($device) . '</span></td>'
        );

echo('<td>');
if ($port_count) { echo(' <img src="images/icons/port.png" align=absmiddle /> '.$port_count); }
echo('<br />');
if ($sensor_count) { echo(' <img src="images/icons/sensors.png" align=absmiddle /> '.$sensor_count); }
echo('</td>');
echo('    <td>' . $device['hardware'] . ' ' . $device['features'] . '</td>');
echo('    <td>' . formatUptime($device['uptime'], 'short') . ' <br />');

if (get_dev_attrib($device,'override_sysLocation_bool')) {  $device['location'] = get_dev_attrib($device,'override_sysLocation_string'); }
echo('    ' . truncate($device['location'],32, '') . '</td>');

echo(' </tr>');

?>
