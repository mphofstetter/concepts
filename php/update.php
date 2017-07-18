<?php

require_once('config/config.php');
require_once('model/log.php');

$sim = $_POST['sim'];

$allowed = array(
	'test'
	);

if(!in_array($sim, $allowed)){
	echo 'error';
	exit;
}

require_once('pages/' . $sim . '.php');