<?php

/* 
 * first you need to download phpseclib
 * https://sourceforge.net/projects/phpseclib/
 *
 * 
 * open ssl script here
 */
include './libraries/phpseclib/Net/SSH2.php';

$domainName = 'www.domain.tld';
$userName = 'username';
$password = 'password';

$sshConnect = new Net_SSH2('www.domain.tld');
if (!$sshConnect->login('username', 'password')) {
    exit('Login Failed');
}

echo $sshConnect->exec('pwd');
echo $sshConnect->exec('ls -la');
?>

