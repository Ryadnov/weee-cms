<?php
error_reporting(E_ALL ^ E_NOTICE);
header("Content-type: text/html; charset=UTF-8");

define('YII_DEBUG', ($_SERVER['REMOTE_ADDR'] == '127.0.0.1') ? true : false);

$dev = require(dirname(__FILE__).'/protected/config/main-dev.php');
$base = require(dirname(__FILE__).'/protected/config/main.php');

$yii = dirname(__FILE__) . '/framework/yii.php';
require_once($yii);

Yii::createWebApplication(CMap::mergeArray($base, $dev))->run();