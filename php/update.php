<?php

require_once('config/config.php');
require_once('model/log.php');

$sim = isset($_POST['sim']) ? $_POST['sim'] : null;
$sim = isset($_GET['sim']) ? $_GET['sim'] : $sim;

if(empty($sim)){
	echo 'error';
	exit;
}

$allowed = array(
	'test'
	);

if(!in_array($sim, $allowed)){
	echo 'error';
	exit;
}

$clickEvent = isset($_POST['clickEvent']) ? $_POST['clickEvent'] : null;

require_once('pages/' . $sim . '.php');