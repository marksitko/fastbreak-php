<?php
	require_once dirname(__DIR__) . '/vendor/autoload.php';
	$dotenv = new Symfony\Component\Dotenv\Dotenv();
	$dotenv->load(dirname(__DIR__) . '/.env');
	require_once 'core/functions/core-functions.php';
	require_once 'config/user-functions.php';
	require_once 'config/config.php';
?>