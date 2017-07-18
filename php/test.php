<?php

require_once('model/object_abstract.php');
require_once('model/polygon.php');

$polygon = new Polygon();
$polygon->px = 10;
$polygon->py = 10;
$polygon->color = "#000000";
$polygon->addPoint(100, 100);

print_r($polygon->toArray());
