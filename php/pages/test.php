<?php

require_once('model/object_abstract.php');
require_once('model/polygon.php');
require_once('model/circle.php');
require_once('model/text.php');

session_start();

if(isset($_POST['reset'])){
	session_unset();
}

if(!empty($clickEvent)){
	Log::writeLine($clickEvent['x'] . " " . $clickEvent['y']);
}

$speed = 5;

$polygon = null;
if(isset($_SESSION['polygon'])){
	$polygon = $_SESSION['polygon'];
}else{
	$polygon = new Polygon();
	$polygon->color = "#f00";
	$polygon->px = 25;
	$polygon->py = 5;
	$polygon->addPoint(0, 0);
	$polygon->addPoint(100, 50);
	$polygon->addPoint(50, 100);
	$polygon->addPoint(0, 90);
	$_SESSION['polygon'] = $polygon;
}

$circle = null;
if(isset($_SESSION['circle'])){
	$circle = $_SESSION['circle'];
}else{
	$circle = new Circle();
	$circle->color = "#cccccc";
	$circle->px = 200;
	$circle->py = 200;
	$circle->radius = 50;
	$_SESSION['circle'] = $circle;
}

$circle->px += $speed;
$circle->py += $speed;

$_SESSION['polygon'] = $polygon;
$_SESSION['circle'] = $circle;


$text = new Text();
$text->color = "#000000";
$text->align = "right";
$text->font = '20px times';
$text->px = Config::$SCREEN_WIDTH;
$text->py = 20;
$text->setText("Sample Text!");

//Log::writeLine("This is a sample log 1");
//Log::write(".");

$objects = array();

$objects[] = $polygon->toArray();
$objects[] = $circle->toArray();
$objects[] = $text->toArray();

$results = array();
$results['objects'] = $objects;
$results['log'] = Log::toHTML();

echo json_encode($results);