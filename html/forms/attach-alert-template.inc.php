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

if(!is_numeric($_POST['template_id'])) {
    echo('ERROR: No template selected');
    exit;
} else {
      if(dbUpdate(array('rule_id' => mres($_POST['rule_id'])), 'alert_templates', '`id`=?', array($_POST['template_id'])) >= 0) {
      echo('Alert rules have been attached to this template.');
      exit;
    } else {
      echo('ERROR: Alert rules have not been attached to this template.');
      exit;
    }
}

