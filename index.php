<?php

// Proyecto: php-laminas/ldap
// Se ha de crear una aplicacion web de acceso a una base de datos LDAP usando lengaje php
// que se desplegara en un servidor de aplicaciones zend y implementara las siguientes funcionalidades:
// - Visualizar todos los datos de un usuario del cual se ha de da por medio de un formulario su identificador y la unidad organizativa a la que pertenece
// - Añadir un nuevo usuario por medio de un formulario que permita introducir los siguientes atributos:
//   - uid
//   - unidad organizativa
//   - uidNumber
//   - gidNumber
//   - Directorio Personal
//   - Shell
//   - cn
//   - sn
//   - givenName
//   - PostalAddress
//   - mobile
//   - telephoneNumber
//   - title
//   - description
// - Eliminar un uduario por medio de los siguientes atributos:
//   - uid
//   - unidad organizativa
// - Modificar un usuario por medio de los siguientes atributos:
//   - uid
//   - unidad organizativa
// y se debe elegir un atributo para modificar por medio de un radio button. La lista de atributos modificables es la siguiente:
//   - uidNumber
//   - gidNumber
//   - Directorio Personal
//   - Shell
//   - cn
//   - sn
//   - givenName
//   - PostalAddress
//   - mobile
//   - telephoneNumber
//   - title
//   - description
//
// Para acceder a la aplicacion primero el usuario se debera validar con la contraseña de la cuenta del usuario cn=admin,dc=fjeclot,dc=net

// Empezar el proyecto

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
    <h1>projecte zendldap</h1>
    <a href="http://zend-migihe.fjeclot.net/Projecte/login.php">Login</a>
</body>
</html>