<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Verificar Contraseña</title>   
  <link rel="stylesheet" href="../Vista/CSS/recuperar_contra.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
  <div class="wrapper">

    <?php
        $email = $_GET['correo'];
        $numero = $_GET['numero'];
    ?>

    <section class="form login">
      <header>Verificar Contraseña
      <i class="fas fa-user-lock"></i>
      </header>
      <span>Introduce el codigo de verificacion que te fue enviado a la direccion de correo electronico</span>
      <form action="../Controlador/Controlador_Usuario.php" method="POST" autocomplete="off">
        
        <div class="field input">    
        <input type="number" maxlength="6" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="Codigo de verificacion" name="codigoEntrada"/> 
        </div>
        <div class="field button">
          <input type="hidden" name="numero" value="<?php echo $numero; ?>">
          <input type="hidden" name="correo" value="<?php echo $email; ?>">
          <input type="hidden" name="action" value="enviarCodigoC">
        <input type="submit" name="sub" value="Verificar">
        </div>
        <div class="link1">
          <a href="#" id="olvide">Regresar</a>
        </div>
      </form>
    </section>
  </div>
  <script src="../Vista/js/not_Back.js"></script>
  </body> 
</html>

