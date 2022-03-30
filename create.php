<?php 

// Afegir l'usuari a la base de dades
require 'vendor/autoload.php';
use Laminas\Ldap\Ldap;
use Laminas\Ldap\Attribute;

if ($_POST['uid'] && $_POST['ou'] && $_POST['uidnumber'] && $_POST['gidnumber'] && $_POST['homedirectory'] && $_POST['loginshell'] && $_POST['cn'] &&
$_POST['sn'] && $_POST['givenname'] && $_POST['postaladdress'] && $_POST['telephonenumber'] && $_POST['mobile'] && $_POST['title'] && $_POST['description']) {
    $uid = $_POST['uid'];
    $ou = $_POST['ou'];
    $uidnumber = $_POST['uidnumber'];
    $gidnumber = $_POST['gidnumber'];
    $homedirectory = $_POST['homedirectory'];
    $loginshell = $_POST['loginshell'];
    $cn = $_POST['cn'];
    $sn = $_POST['sn'];
    $givenname = $_POST['givenname'];
    $postaladdress = $_POST['postaladdress'];
    $telephonenumber = $_POST['telephonenumber'];
    $mobile = $_POST['mobile'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $objecl = array('inetOrgPerson', 'organizationalPerson', 'person', 'posixAccount', 'shadowAccount', 'top');

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
    $nou_usuari = [];
    Attribute::setAttribute($nou_usuari, 'objectClass', $objecl);
    Attribute::setAttribute($nou_usuari, 'uid', $uid);
    Attribute::setAttribute($nou_usuari, 'ou', $ou);
    Attribute::setAttribute($nou_usuari, 'uidNumber', $uidnumber);
    Attribute::setAttribute($nou_usuari, 'gidNumber', $gidnumber);
    Attribute::setAttribute($nou_usuari, 'homeDirectory', $homedirectory);
    Attribute::setAttribute($nou_usuari, 'loginShell', $loginshell);
    Attribute::setAttribute($nou_usuari, 'cn', $cn);
    Attribute::setAttribute($nou_usuari, 'sn', $sn);
    Attribute::setAttribute($nou_usuari, 'givenName', $givenname);
    Attribute::setAttribute($nou_usuari, 'postalAddress', $postaladdress);
    Attribute::setAttribute($nou_usuari, 'telephoneNumber', $telephonenumber);
    Attribute::setAttribute($nou_usuari, 'mobile', $mobile);
    Attribute::setAttribute($nou_usuari, 'title', $title);
    Attribute::setAttribute($nou_usuari, 'description', $description);
    $dn = 'uid=' . $uid . ',' . 'ou=' . $ou . ',' . $domini;
    if ($ldap->add($dn, $nou_usuari)) {
        echo '<p>Usuari afegit correctament</p>';
    } else {
        echo '<p>Error al afegir l\'usuari</p>';
    }

}else{
    echo '<p>Error al afegir l\'usuari no s\'ha fet el post</p>';
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
    <!-- Formulario para añadir usuarios -->

    <form action="http://zend-migihe.fjeclot.net/Projecte/create.php" method="POST">
        <input type="text" name="uid" placeholder="Usuari"><br>
        <input type="text" name="ou" placeholder="Unitat organitzativa"><br>
        <input type="text" name="uidnumber" placeholder="Número de usuari"><br>
        <input type="text" name="gidnumber" placeholder="Número de grup"><br>
        <input type="text" name="homedirectory" placeholder="Directori personal"><br>
        <input type="text" name="loginshell" placeholder="Shell"><br>
        <input type="text" name="cn" placeholder="Nom complet"><br>
        <input type="text" name="sn" placeholder="Cognoms"><br>
        <input type="text" name="givenname" placeholder="Nom"><br>
        <input type="text" name="postaladdress" placeholder="Adreça postal"><br>
        <input type="text" name="mobile" placeholder="Mòbil"><br>
        <input type="text" name="telephonenumber" placeholder="Telèfon"><br>
        <input type="text" name="title" placeholder="Títol"><br>
        <input type="text" name="description" placeholder="Descripció"><br>
        <input type="submit" value="Envia" />
        <input type="reset" value="Neteja" />
    </form>
</html>