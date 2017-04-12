<?php

require_once("SplClassLoader.php");
$classLoader = new SplClassLoader('pmill\Plesk', '../../src');
$classLoader->register();

$config = array(
    'host'=>'bwh1701.bisend.cn',
    'username'=>'root',
    'password'=>'Ud*7221s',
);