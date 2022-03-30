<?php

require 'vendor/autoload.php';
use Laminas\Ldap\Ldap;

ini_set('display_errors', 0);
if ($_GET['id'] && $_GET['ou']){

    $domini = 'dc=fjeclot,dc=net';
    $opcions = [
        'host' => 'zend-migihe.fjeclot.net',
        'username' =>'cn=admin,dc=fjeclot,dc=net',
        'password' => 'fjeclot',
        'bindRequiresDn' => true,
        'accountDomainName' => 'fjeclot.net',
        'baseDn' => $domini,
    ];

    $ldap = new Ldap($opcions);
    $ldap -> bind();
    $usuaris = $ldap -> getEntry('uid='.$_GET['id'].',ou='.$_GET['ou'].',dc=fjeclot,dc=net');
    echo "<b><u>".$usuaris['dn']."</u></b><br>";
    foreach ($usuaris as $key => $value) {
        if ($key != 'dn'){
            echo $key.": ".$value[0]."<br>";
        }
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
    <!-- Formulario para visualizar usuarios -->
    <form action="http://zend-migihe.fjeclot.net/Projecte/see.php" method="GET">
        <input type="text" name="id" placeholder="Identificador"><br>
        <input type="text" name="ou" placeholder="Unidad organitzativa"><br>
        <input type="submit" value="Visualitzar usuaris" />
    </form>

    <a href="http://zend-migihe.fjeclot.net/Projecte/index.php">Tornar al login<a>
    <a href="http://zend-migihe.fjeclot.net/Projecte/menu.php">Tornar al menú<a>
</body>
</html>