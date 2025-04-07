<?php
    require_once '../controlador/sesion_valida.php';
    require_once '../controlador/rol_valido.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/menus1.css">
    <title>Menú |SKIN CARE</title>
	<header class="full-reset header">
        <!-- Contenedor del logo y el título -->
        <div class="logo-container">
    <!-- Imagen del Logo -->
    <img class="logo-img" src="assets/img/logo.jpg" alt="">
</head>
<body>
    
<html>
<body>
    <header class="header" >
        <a><center><h2> Menú Gestión Administrador</h2></center></a>
        <a><center><img src="../assets/img/logo.jpg" width="400" height="400"  alt=""></center></a>
        <center><div class="container logo-nav-container"></center>
        <a><center>
            <nav class="navegacion">
                <ul>
                    <?php include '../controlador/parrafo.php'; ?>
                    <li> <a href="../index.php">Inicio</a></li>
                    <li> <a href="indexRol.php">Rol</a></li>
                    <li> <a href="indexUsuario.php">Usuario/Reporte</a></li>
                    <li> <a href="indexDomicilio.php">Domicilio</a></li>
                    <li> <a href="indexProducto.php">Producto</a></li>
                    <li> <a href="indexPedido.php">Pedido/Reporte</a></li>
                </ul>
            </nav>
        </center></a>
            </div>
    </header>
    </main>
</body>
</html>