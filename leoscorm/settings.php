<?php

/**
 * Adds the leoscorm link to the admin tree
 *
 * @package    report_leoscorm
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    $url = $CFG->wwwroot . '/report/leoscorm/index.php';
    $ADMIN->add('reports', new admin_externalpage('reportleoscorm', get_string('pluginname', 'report_leoscorm'), $url));

    // No report settings.
    $settings = null;
}
