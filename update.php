<?php

require 'vendor/autoload.php';
use Laminas\Ldap\Ldap;
use Laminas\Ldap\Attribute;

ini_set('display_errors', 0);
if ($_POST['id'] && $_POST['ou'] && $_POST['radio'] && $_POST['canvis']){
    
    $atribute = $_POST['radio'];
    $canvis = $_POST['canvis'];

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
    $entry = $ldap -> getEntry($dn);
    if ($entry){
        $entry[$atribute][0] = $canvis;
        $ldap -> update($dn, $entry);
        echo '<h1>Canvis realitzats</h1>';
    }else{
        echo '<h1>Error</h1>';
        echo '<p>No s\'ha trobat l\'usuari</p>';
    }
}else{
    echo '<h1>Error</h1>';
    echo '<p>No s\'han rebut els paràmetres necessaris</p>';
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
    <!-- Formulario para modificar usuarios -->
    <form action="http://zend-migihe.fjeclot.net/Projecte/update.php" method="POST">
        <input type="text" name="id" placeholder="Identificador" required><br>
        <input type="text" name="ou" placeholder="Unidad organitzativa" required><br>
        <input type="radio" name="radio" value="uidnumber" checked>uidnumber<br>
        <input type="radio" name="radio" value="gidnumber">gidnumber<br>
        <input type="radio" name="radio" value="homedirectory">homedirectory<br>
        <input type="radio" name="radio" value="loginshell">loginshell<br>
        <input type="radio" name="radio" value="cn">cn<br>
        <input type="radio" name="radio" value="sn">sn<br>  
        <input type="radio" name="radio" value="givenname">givenname<br>
        <input type="radio" name="radio" value="postaladdress">postaladdress<br>
        <input type="radio" name="radio" value="telephonenumber">telephonenumber<br>
        <input type="radio" name="radio" value="mobile">mobile<br>
        <input type="radio" name="radio" value="title">title<br>
        <input type="radio" name="radio" value="description">description<br>

        <input type="text" name="canvis" placeholder="Dades noves" required>
        <input type="submit" value="Modificar usuari" />
    </form>

    <a href="http://zend-migihe.fjeclot.net/Projecte/index.php">Tornar al login<a>
    <a href="http://zend-migihe.fjeclot.net/Projecte/menu.php">Tornar al menú<a>
</body>
</html>