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

defined('MOODLE_INTERNAL') || die;

/**
 * Report leo SCORM class.
 *
 * @package    report_leoscorm
 * @copyright  2017 onwards Delvon Forrester <delvon@live.co.uk>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class report_leoscorm {

    /**
     * Get a list of SCORM users progress report 
     *
     * @return array n rray with the list of results
     */
    function report_leoscorm_get_table_data() {
	global $DB;
	$sql = "SELECT s.id, u.id as uid, firstname, lastname, email, attempt, value from {user} u 
	JOIN {scorm_scoes_track} s on u.id=s.userid
	AND (element='cmi.core.total_time' or element='cmi.core.lesson_status') 
	GROUP BY attempt,u.id,value";
	$results=$DB->get_records_sql($sql,array());
	if (empty($results)) {
	    return array();
	} else {
	    $us = array();
	    
	    //Build the array here from the results
	    foreach ($results as $r) {
	        $us[$r->uid]['firstname']=$r->firstname;
	        $us[$r->uid]['lastname']=$r->lastname;
	        $us[$r->uid]['email']=$r->email;
                $us[$r->uid]['attempt']=$r->attempt;	    
	        if (strpos($r->value, ':') !== false) {
	            $us[$r->uid]['status']=$r->value;
	    	} else {
		    $us[$r->uid]['time']=$r->value;
	    	}
	    }
	    return $us;
	}

    }

}