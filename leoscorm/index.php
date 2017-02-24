<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Leoscorm Report.
 *
 * This report displays scorm reports site wide
 *
 * @package   report_leoscorm
 * @copyright 2017 onwards Delvon Forrester <delvon@live.co.uk>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require('../../config.php');
global $PAGE, $OUTPUT;
require_once('lib.php');
$url = new moodle_url('/report/leoscorm/index.php');

$PAGE->set_url($url);
$PAGE->set_pagelayout('report');
$PAGE->set_context(context_system::instance());
$PAGE->set_title(get_string('pluginname', 'report_leoscorm'));

require_login();

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('pluginname', 'report_leoscorm'));

//Instantiate the report class
$report = new report_leoscorm();

//Get the data to poulate the table
$usrs = $report->report_leoscorm_get_table_data();
$table = new html_table();

$table->head = array(get_string('firstname', 'report_leoscorm'), get_string('lastname', 'report_leoscorm'), 
		get_string('email', 'report_leoscorm'), get_string('status', 'report_leoscorm'), 
		get_string('timespent', 'report_leoscorm'), get_string('attempts', 'report_leoscorm'));

//The table boddy is added here from the returned results
foreach ($usrs as $u) {
    $i = array();
    $i[] = $u['firstname'];
    $i[] = $u['lastname'];
    $i[] = $u['email'];
    $i[] = $u['time'];
    $i[] = $u['status'];
    $i[] = $u['attempt'];
    $table->data[] = $i;
}

echo html_writer::table($table);
echo get_string('assignment', 'report_leoscorm');
echo $OUTPUT->footer();
