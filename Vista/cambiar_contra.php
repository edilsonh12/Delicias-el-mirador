<?php
      session_start();
      if(!isset($_SESSION['correo'])){
        header('location:../Vista/login.html');
      } 
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Cambiar Contraseña</title>   
  <link rel="stylesheet" href="../Vista/CSS/conf_contra.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
  <div class="wrapper">
    <section class="form login">
      <header>Cambiar Contraseña
      <i class='bx bx-edit-alt'></i>
      </header>
      <form action="../Controlador/Controlador_Usuario.php" method="POST" autocomplete="off">
        <div class="field input">    
            <img src="img/padlock.png" class="imagen">
            <span class="icon-eye-1"> 
          <i class="fas fa-eye"></i>
          </span> 
          <input type="password" required="required" name="contraAntigua" placeholder="Contraseña antigua">
        </div>
        <div class="field input">
          <img src="img/padlock.png" class="imagen"> 
           <span class="icon-eye-2"> 
          <i class="fas fa-eye"></i>
          </span>
          <input type="password" required="required" name="contraN" id="password" placeholder="Nueva contraseña">        
          <span id="mensaje" class="mensaje"></span>
        </div>
        <div class="field input">
          <img src="img/padlock.png" class="imagen">
          <span class="icon-eye-3"> 
          <i class="fas fa-eye"></i>
          </span>
          <input type="password" required="required" name="contraNF1" placeholder="Confirmar Contraseña">
        </div>
        <div class="field button">
          <?php
              $correo = $_SESSION['correo'];
          ?>
          <input type="hidden" name="correo" value="<?php echo $correo; ?>">
          <input type="hidden" name="action" value="actualizarContraDesdeAdentro">
        <input type="submit" name="sub" value="Actualizar">
        </div>
        <div class="link1">
          <a href="menu_principal.php" id="olvide">Regresar</a>
        </div>
      </form>
    </section>
  </div>
  <script src="../Vista/js/not_Back.js"></script>
  <script src="../Vista/js/jquery-3.6.0.min.js"></script>
  <script src="../Vista/js/password.js"></script>
  <script src="../Vista/js/pass-show-hide.js"></script>
  </body>
  
</html>

