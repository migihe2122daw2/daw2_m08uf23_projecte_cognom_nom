<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Aplicar estilo a la pagina del menu*/

        a{
            text-decoration: none;
            color: white;
        }

        a:hover{
            text-decoration: none;
            color: white;
        }

        body{
            background-color: #2c3e50;
        }

        .menu{
            background-color: #34495e;
            width: 100%;
            height: 100px;
            margin: 0;
            padding: 0;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1;
        }

        .menu ul{
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .menu ul li{
            display: inline-block;
            margin: 0;
            padding: 0;
            font-size: 20px;
            font-family: 'Open Sans', sans-serif;
            font-weight: bold;
            color: white;
        }

        .menu ul li a{
            text-decoration: none;
            color: white;
        }

        .menu ul li a:hover{
            text-decoration: none;
            color: white;
        }

        .menu ul li a:active{
            text-decoration: none;
            color: white;
        }

        .menu ul li a:visited{
            text-decoration: none;
            color: white;
        }

        .menu ul li a:focus{
            text-decoration: none;
            color: white;
        }

        .menu ul li a:hover{
            text-decoration: none;
            color: white;
        }

        .menu ul li a:hover{
            text-decoration: none;
            color: white;
        }

        .menu ul li a:hover{
            text-decoration: none;
            color: white;
        }


    </style>
</head>
<body>
    <h2>Menu d'opcions</h2>
    <div class="menu">
        <ul>
            <li><a href="http://zend-migihe.fjeclot.net/Projecte/index.php">Tornar al login</a></li>
            <li><a href="http://zend-migihe.fjeclot.net/Projecte/see.php">Visualitzar usuaris</a></li>
            <li><a href="http://zend-migihe.fjeclot.net/Projecte/create.php">Crear usuari</a></li>
            <li><a href="http://zend-migihe.fjeclot.net/Projecte/update.php">Modificar usuari</a></li>
            <li><a href="http://zend-migihe.fjeclot.net/Projecte/delete.php">Eliminar usuari</a></li>
            <li><a href="http://zend-migihe.fjeclot.net/Projecte/webdev.php">Modificar gidnumbe de webdev</a></li>
        </ul>
    </div>
</body>
</html>