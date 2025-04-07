<?php
session_start();
if(isset($_SESSION['usuario'])){
	header('Location: menuprincipal.php');
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../assets/css/formulario.css">
  <link rel="stylesheet" href="../assets/css/estilos1.css">
  <link rel="stylesheet" href="../assets/css/master1.css">
  <title>Form Login | SKIN CARE </title>
  
</head>
  <div>
      <p>
      <!-- <li><i><a href="menuprincipal.php">Menu Sistema de informaciòn </a><br> </p> -->
  </div>

  <form method="POST" action="../controlador/controllogin.php">
  <script>
  document.addEventListener('DOMContentLoaded', function(){
    let formulario = document.getElementById('formul');
    formulario.addEventListener('submit', function() {
      formulario.reset();
    });
  });
</script>

  <div class="login-box">
    <img class="avatar" src="../assets/img/logo.jpg" alt="Logo ">
    <h1>Inicio Sesión <nav></nav></h1>
  
    <!--USERNAME-->
    <label for="username">Usuario</label>
    <input type="email" name="txtcorreo" class="form-control" autofocus require>

    <!--Password-->
    <label for="password">Password</label>
    <input type="password" name="txtclave" class="form-control" require >
     <!--rol-->
     
     

    <br> <br>

    

   <input type="submit" value="Inicio">

    <a href="#">Olvido la contraseña?</a><br>
    <a href="#">No tengo cuenta?</a>
      
    <?php
					//SIRVE PARA BAJAR EL ERROR DEL ENLACE Y MOSTRARLO AL USUARIO
						if($_GET){
							$fallo=$_GET['fallo'];
							if ($fallo=='error') {
								echo "<h4>Error en los datos, verifique y reintente</h4>";
							}else if($fallo=='errorEstado'){
                echo "<h4>Usuario desactivado</h4>";
              }
						}
?>
    </form>
  </div>
    <!--Limpiar el formulario-->
</body>
</html>