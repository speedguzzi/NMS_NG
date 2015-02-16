/* Copyright (C) 2014 Daniel Preussker <f0o@devilcode.org>
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
 * IRC Transport
 * @author f0o <f0o@devilcode.org>
 * @copyright 2014 f0o, NMS_NG
 * @license GPL
 * @package NMS_NG
 * @subpackage Alerts
 */

return file_put_contents($config['install_dir']."/.ircbot.alert", json_encode($obj)."\n", FILE_APPEND);
