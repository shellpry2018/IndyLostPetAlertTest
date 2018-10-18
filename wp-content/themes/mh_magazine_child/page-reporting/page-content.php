<?php 
include(locate_template('page-reporting/choose-report.php'));

if(isset($_GET['report_type'])) include(locate_template('page-reporting/' . $_GET['report_type'] . '.php'));
?>