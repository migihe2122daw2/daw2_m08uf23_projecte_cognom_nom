<?php

require 'vendor/autoload.php';
use Laminas\Ldap\Ldap;
use Laminas\Ldap\Attribute;

ini_set('display_errors', 0);
if ($_POST['gidnumber']){

    $gidnumber = $_POST['gidnumber'];
    
    // Camviar el gidnumber de l'usuari webdev de la unitat organitzativa desenvolupadors

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
    $ldap->bind();
    $entry = $ldap->getEntry('uid=webdev,ou=desenvolupadors,dc=fjeclot,dc=net');
    if ($entry) {
        $entry['gidNumber'][0] = $gidnumber;
        $ldap->update('uid=webdev,ou=desenvolupadors,dc=fjeclot,dc=net', $entry);
        echo '<p>Usuari webdev actualitzat correctament</p>';
    }else{
        echo '<p>Error al modificar l\'usuari</p>';
    }


}else{
    echo '<p>Error al modificar l\'usuari</p>';
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
    <h1>Modifica el gidNumber de webdev</h1>
    <form action="http://zend-migihe.fjeclot.net/Projecte/webdev.php" method="POST">
        <label for="gidnumber">Nou gidNumber: </label>
        <input type="text" name="gidnumber" placeholder="gidNumber"><br>
        <input type="submit" value="Envia">
        <input type="reset" value="Neteja">
    </form>

    <a href="http://zend-migihe.fjeclot.net/Projecte/index.php">Tornar al login<a>
    <a href="http://zend-migihe.fjeclot.net/Projecte/menu.php">Tornar al menú<a>
</body>
</html>