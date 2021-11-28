<<?php
      session_start();
      if(!isset($_SESSION['correo'])){
        header('location:../Vista/login.html');
      } 
?>?php
      session_start();
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Recuperar Contraseña</title>   
  <link rel="stylesheet" href="../Vista/CSS/recuperar_contra.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
  <div class="wrapper">
    <section class="form login">
      <header>Recuperar Contraseña
      <i class="fas fa-unlock-alt"></i>
      </header>
      <span>Introduce tu dirección de correo electrónico de recuperación</span>
      <form action="../Controlador/Controlador_Usuario.php" method="POST" autocomplete="off">
        
        <div class="field input">    
          <i class="fas fa-at"></i>
          <input type="email" required="required" name="correo" placeholder="Direccion de correo">
        </div>
        <div class="field button">
          <input type="hidden" name="action" value="recuperarContraCorreo">
        <input type="submit" name="sub" value="Continuar">
        </div>
        <div class="link1">
          <a href="login.html" id="olvide">Regresar</a>
        </div>
      </form>
    </section>
  </div>
  <script src="../Vista/js/not_Back.js"></script>
  </body> 
</html>

