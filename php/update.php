<?php

require_once('config.php');
require_once('log.php');

$sim = $_POST['sim'];

$allowed = array(
	'test'
	);

if(!in_array($sim, $allowed)){
	echo 'error';
	exit;
}

require_once($sim . '.php');