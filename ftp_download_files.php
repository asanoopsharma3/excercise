<?php 
include './libraries/ftp_connect.php';
$ftpconnet = new ftp();
$hostName = '';
$userName = '';
$password = '';
$downloadFTPPath = '';
$downHereLocal = '';
$ftpconnet->conn($hostName,$userName, $password);
$ftpconnet->get($downloadFTPPath, $downHereLocal); // download live "/demo" folder to local "download/demo"

//$ftpconnet->put('', ''); // upload local "upload/vjtest" to live "/demo/test"

//$arr = $ftpconnet->getLogData();
///print_r($arr);
exit();
?>