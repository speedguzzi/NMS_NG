<?php

/*
 * NMS_NG
 *
 * Copyright (c) 2014 Neil Lathwood <https://github.com/laf/ http://www.lathwood.co.uk/fa>
 *
 * This program is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.  Please see LICENSE.txt at the top level of
 * the source code distribution for details.
 */

if(is_admin() === false) {
    die('ERROR: You need to be admin');
}

$rule = implode(" ", $_POST['rules']);
$rule = rtrim($rule,'&&');
$rule = rtrim($rule,'||');
$alert_id = $_POST['alert_id'];
$count = mres($_POST['count']);
$delay = mres($_POST['delay']);
$mute = mres($_POST['mute']);
$invert = mres($_POST['invert']);
$name = mres($_POST['name']);

if(empty($rule)) {
    $update_message = "ERROR: No rule was generated";
} elseif(validate_device_id($_POST['device_id']) || $_POST['device_id'] == '-1') {
    $device_id = $_POST['device_id'];
    if(!is_numeric($count)) {
        $count='-1';
    }
    $delay_sec = convert_delay($delay);
    if($mute == 'on') {
        $mute = true;
    } else {
        $mute = false;
    }
    if($invert == 'on') {
        $invert = true;
    } else {
        $invert = false;
    }
    $extra = array('mute'=>$mute,'count'=>$count,'delay'=>$delay_sec,'invert'=>$invert);
    $extra_json = json_encode($extra);
    if(is_numeric($alert_id) && $alert_id > 0) {
        if(dbUpdate(array('rule' => $rule,'severity'=>mres($_POST['severity']),'extra'=>$extra_json,'name'=>$name), 'alert_rules', 'id=?',array($alert_id)) >= 0) {
            $update_message = "Edited Rule: <i>$name: $rule</i>";
        } else {
            $update_message = "ERROR: Failed to edit Rule: <i>".$rule."</i>";
        }
    } else {
        if( dbInsert(array('device_id'=>$device_id,'rule'=>$rule,'severity'=>mres($_POST['severity']),'extra'=>$extra_json,'name'=>$name),'alert_rules') ) {
            $update_message = "Added Rule: <i>$name: $rule</i>";
        } else {
            $update_message = "ERROR: Failed to add Rule: <i>".$rule."</i>";
        }
    }
} else {
    $update_message = "ERROR: invalid device ID or not a global alert";
}
echo $update_message;
