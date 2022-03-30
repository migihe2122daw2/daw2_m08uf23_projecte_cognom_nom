<?php

require 'vendor/autoload.php';
use Laminas\Ldap\Ldap;

ini_set('display_errors', 0);
if ($_POST['cts'] && $_POST['adm']){

    $opcions = [
        'host' => 'zend-migihe.fjeclot.net',
        'username' =>'cn=admin,dc=fjeclot,dc=net',
        'password' => 'fjeclot',
        'bindRequiresDn' => true,
        'accountDomainName' => 'fjeclot.net',
        'baseDn' => 'dc=fjeclot,dc=net',
    ];

    $ldap = new Ldap($opcions);
    $dn='cn='.$_POST['adm'].',dc=fjeclot,dc=net';
    $ctsnya=$_POST['cts'];
    try{
        $ldap -> bind($dn, $ctsnya);
        header('location: http://zend-migihe.fjeclot.net/Projecte/menu.php');
    }catch(Laminas\Ldap\Exception\LdapException $e){
        echo '<h1>Error</h1>';
        echo '<p>'.$e->getMessage().'</p>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="http://zend-migihe.fjeclot.net/Projecte/index.php">Tornar al login<a>/
</body>
</html>