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
 * Lang strings.
 *
 * Language strings used by report_leoscorm
 *
 * @package    report_leoscorm
 * @copyright  2017 onwards Delvon Forrester
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['pluginname'] = 'Leo learning SCORM report';
$string['firstname'] = 'First name';
$string['lastname'] = 'Last name';
$string['email'] = 'Email address';
$string['status'] = 'Status';
$string['timespent'] = 'Time spent';
$string['attempts'] = 'Attempts';
$string['assignment'] = '<hr><p>This is how I would have approached the rest of the assignment:
<ul>
<li>For filtering I would add an additional file to the root directory of the plugin and create a class 
that would extend the moodleform. I would then include() that file in the index file which would have an
action to the index.php. I would then use optional_params to check for when the filters are selected and 
use a conditional statement (if filters selected) to pass a an array with the courses and scorm modules to the 
funtion in the lib file which would then only return results for those. The function would have to be 
modified to select certain courses and SCORM modules.</li>

<li>For displaying the report in a paginated list, or downloaded as a CSV I have looked at the outputcomponents 
lib file and would use the html_table and paging_bar classes. For the download using the tablelib and the 
table_dataformat_export classes to export the data.</li>

<li>For scheduling task, using the Task API and creating a subclass of core\task\scheduled_task in 
<pluginroot>/classes/task/ with the get_name() and execute() functions. Also adding the tasks array in 
db/tasks.php with the appropriate elements.</li>
</ul></p>';
