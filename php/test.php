<?php

$objects = array();

$px = rand(1,800);
$py = rand(1, 500);

$polygon = array(
	'type' => 'polygon',
	'fill' => '#f00',
	'points' => array(
		array(25,5),
		array(100, 50),
		array(50, 100),
		array(0, 90)
		)
	);

$circle = array(
	'type' => 'circle',
	'fill' => '#cccccc',
	'radius' => 50,
	'px' => $px,
	'py' => $py
	);

$text = array(
	'type' => 'text',
	'color' => '#000000',
	'font' => '20px times',
	'px' => Config::$SCREEN_WIDTH,
	'py' => 20,
	'align' => 'right',
	'text' => 'This is sample text'
	);

Log::write("This is a sample log 1");
Log::write("This is a sample log 2");
Log::write("This is a sample log 3");
Log::write("This is a sample log 4");
Log::write("This is a sample log 5");

$objects[] = $polygon;
//$objects[] = $circle;
$objects[] = $text;

$results = array();
$results['objects'] = $objects;
$results['log'] = Log::toHTML();

echo json_encode($results);