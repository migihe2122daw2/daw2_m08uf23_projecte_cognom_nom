<?php

require 'vendor/autoload.php';
use Laminas\Ldap\Ldap;
use Laminas\Ldap\Attribute;

ini_set('display_errors', 0);
if ($_POST['id'] && $_POST['ou']){
    
    $uid = $_POST['id'];
    $ou = $_POST['ou'];
    $dn = 'uid='.$uid.',ou='.$ou.',dc=fjeclot,dc=net';

    $opcions = [
        'host' => 'zend-migihe.fjeclot.net',
        'username' =>'cn=admin,dc=fjeclot,dc=net',
        'password' => 'fjeclot',
        'bindRequiresDn' => true,
        'accountDomainName' => 'fjeclot.net',
        'baseDn' => 'dc=fjeclot,dc=net',
    ];

    $ldap = new Ldap($opcions);
    $ldap -> bind();

    try{
        $ldap -> delete($dn);
        echo '<h1>Usuari eliminat</h1>';
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
<!-- Formulario para eliminar el usuario -->
<form action="http://zend-migihe.fjeclot.net/Projecte/delete.php" method="POST">
    <input type="text" name="id" placeholder="Identificador" required><br>
    <input type="text" name="ou" placeholder="Unidad organitzativa" required><br>
    <input type="submit" value="Eliminar">
</form>

<a href="http://zend-migihe.fjeclot.net/Projecte/index.php">Tornar al login<a>
    <a href="http://zend-migihe.fjeclot.net/Projecte/menu.php">Tornar al menú<a>
</body>
</html>