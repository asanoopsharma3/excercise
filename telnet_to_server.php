<?php
include './libraries/Telnet.class.php';

//connection established class
$telnet = new Telnet($host, $port, $timeout, $prompt, $stream_timeout);

//connet telnet 

$telnet->connect();

//execute telnet

$command = 'text';
$telnet->exec($command,true);




 


