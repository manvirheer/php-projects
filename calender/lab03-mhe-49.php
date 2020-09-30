<?php

require_once ('inc/html-mhe-49.inc.php');
require_once ('inc/calender-mhe-49.inc.php');

//Setting default timezone (PST - Pacific Time Zone)
date_default_timezone_set('Canada/Mountain');

//Header
html_header_mhe_49();

//Calender
htmlPrintCalendar_mhe_49(getCalenderData_mhe_49((!empty($_POST)) ? $_POST : ['yearNumber' => date('Y'), 'monthName' => date('m')]));

//Form
html_form_mhe_49();

//Footer
html_footer_mhe_49();
