<?php
ini_set("display_errors", true);
error_reporting(E_ALL);
require_once("../config.php");

$params = [
    'user_ip' => base64_encode('101.81.5.98'),
    'login' => 'admin',
];

$request = new \pmill\Plesk\Session\CreateSession($config, $params);
$info = $request->process();

echo json_encode($info);