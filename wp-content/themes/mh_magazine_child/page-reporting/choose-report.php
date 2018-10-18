<?php 
	$report_types = [
		'monthly' => 'Monthly and Bi-Monthly Report',
		'weekly' => 'Weekly Report',
		'county' => 'County Report',
		'zip-code' => 'Zip Code Report',
		'report-type' => 'Separated by Report Type',
		'how-pet-got-home' => 'How Pet Got Home',
		'microchipped' => 'Microchipped Report',
	];
?>

<h2>Which report do you need?</h2>
<ul>
	<?php foreach($report_types as $report_type => $report_name) : ?>
		<?php if(!isset($_GET['report_type']) || $_GET['report_type'] != $report_type) : ?>
		<li><a href="/reporting?report_type=<?php echo $report_type ?>"><?php echo $report_name ?></a></li>
		<?php endif ?>
	<?php endforeach ?>
</ul>
<div style="height:50px"></div>
