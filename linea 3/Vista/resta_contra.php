<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Restablecer Contraseña</title>   
  <link rel="stylesheet" href="../Vista/CSS/resta_contra.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

  <?php
    $correo = $_GET['correo'];
  ?>

  <div class="wrapper">
    <section class="form login">
      <header>Restablecer Contraseña
      <i class="fas fa-user-shield"></i>
      </header>
      <form action="../Controlador/Controlador_Usuario.php" method="POST" autocomplete="off">

        <div class="field input">
          <img src="img/padlock.png" class="imagen"> 
          <span class="icon-eye-1"> 
            <i class="fas fa-eye"></i>
          </span>
          <input type="password" required="required" name="contra" placeholder="Nueva contraseña" id="password">
          <span id="mensaje" class="mensaje"></span>
        </div>
        <div class="field input">
          <img src="img/padlock.png" class="imagen"> 
          <span class="icon-eye-2"> 
            <i class="fas fa-eye"></i>
          </span>
          <input type="password" required="required" name="contraF1" placeholder="Confirmar contraseña">
          
        </div>
        <div class="field button">
        <input type="hidden" name="correo" value="<?php echo $correo; ?>">
        <input type="hidden" name="action" value="CambiarContraseñaFueraDelLogin">
        <input type="submit" name="sub" value="Continuar">
        </div>
      </form>
    </section>
  </div>
  </body>
  <script src="../Vista/js/not_Back.js"></script>
  <script src="../Vista/js/jquery-3.6.0.min.js"></script>
  <script src="../Vista/js/password.js"></script>
  <script src="../Vista/js/pass-show-hide.js"></script>
</html>

