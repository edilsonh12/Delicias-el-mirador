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
  <title>Verificar Cuenta</title>   
  <link rel="stylesheet" href="../Vista/CSS/confirmacion.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
  <div class="wrapper">
    <section class="form login">
      <header>Verificar Cuenta
      <i class="fas fa-user-check"></i>
      </header>
      <form action="../Controlador/Controlador_Usuario.php" method="POST" autocomplete="off">
        <div class="field input">
        <span>Al siguiente correo electronico enviaremos un codigo para poder terminar el proceso de registro</span>
        </div>
        <div class="field input">
        <label>Correo electronico</label>
        <?php
            $correo = $_GET['correo'];
            $enmascarado = substr($correo, 0, 3) . str_repeat('*', strlen($correo) - 3);
        ?>
        <span class="email"> <?php echo $enmascarado; ?> </span>
        </div>
        <div class="field button">
                <input type="hidden" name="action" value="validarCuenta">
                <input type="hidden" name="correo1" value="<?php echo $correo; ?>">
        <input type="submit" name="sub" value="Enviar">
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

