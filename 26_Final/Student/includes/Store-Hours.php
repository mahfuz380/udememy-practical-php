<?php

// REQUIRED
// Set your default time zone (listed here: http://php.net/manual/en/timezones.php)
date_default_timezone_set('Asia/Dhaka');
// Include the store hours class
require __DIR__ . '/StoreHours.class.php';

// REQUIRED
// Define daily open hours
// Must be in 24-hour format, separated by dash
// If closed for the day, leave blank (ex. sunday)
// If open multiple times in one day, enter time ranges separated by a comma
$hours = array(
    'mon' => array('00:00-00:00'),
    'tue' => array('13:00-21:00'),
    'wed' => array('13:00-21:00'),
    'thu' => array('11:00-1:30'), // Open late
    'fri' => array('16:00-23:30'),
    'sat' => array('16:00-23:30'),
    'sun' => array('00:00-00:00')
);

// OPTIONAL
// Add exceptions (great for holidays etc.)
// MUST be in a format month/day[/year] or [year-]month-day
// Do not include the year if the exception repeats annually
$exceptions = array(
    '2/24'  => array('11:00-18:00'),
    '10/18' => array('11:00-16:00', '18:00-20:30')
);

$config = array(
    'separator'      => ' - ',
    'join'           => ' and ',
    'format'         => 'g:ia',
    'overview_weekdays'  => array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun')
);

// Instantiate class
$store_hours = new StoreHours($hours, $exceptions, $config);

// Display open / closed message
if($store_hours->is_open()) {
    echo "Yes, we're open! Today's hours are " . $store_hours->hours_today() . ".";
} else {
    echo "Sorry, we're closed. Today's hours are " . $store_hours->hours_today() . ".";
}



?>