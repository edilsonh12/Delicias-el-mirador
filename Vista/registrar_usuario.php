<?php
    include "../Modelo/Consultas.php";
    $consultas = new consultasBD();
?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="../Vista/CSS/reg_usuario.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <form action="../Controlador/Controlador.php" method="POST">
      <input type="hidden" name="action" value="SalirRegistroUsuario">
      <div class="title">Registro de Usuario</div> 
    <button class="btn-exit" type="submit" name="salir">x</button>
    </form>
    <div class="content">

      <form action="../Controlador/Controlador_Usuario.php" method="POST">
      
        <div class="user-details">
          <div class="input-box">
            <span class="details">Primer Nombre</span>
            <input type="hidden" name="action" value="RegistrarUsuario">
            <input type="text" id="Nombres" placeholder="Nombres" required name="nombres">
          </div>
          <div class="input-box">
            <span class="details">Primer Apellido</span>
            <input type="text" id="Apellido1" placeholder="Primer Apellido" required name="priape">
          </div>
          <div class="input-box">
            <span class="details">Segundo Apellido</span>
            <input type="text" id="Apellido2" placeholder="Segundo Apellido"  name="segape">
          </div>
          <div class="input-box">
            <span class="details">Telefono</span>
            <input type="number" id="Telefono" placeholder="Telefono" required name="telefono">
          </div>
          <div class="input-box">
            <span class="details">Direccion</span>
            <input type="text" id="Direccion" placeholder="Direccion" required name="direccion">
          </div>
          <div class="select-box">
          <span class="details">Ciudad</span>

          <?php
              $res = $consultas->ListaCiudadades();
            ?>

            <select class="details" id="ciudad"  required name="ciudad"  onchange="onChange(this)">
                  <option value="0">Selecione una ciudad</option>

                  <?php
                    while($row = mysqli_fetch_array($res)){
                  ?>

                  <option value="<?php echo $row['id']; ?>"> <?php echo $row['ciudad']; ?> </option>
                  
                  <?php
                    }  
                  ?>    

              </select>
          </div>
          <div class="select-box">
          <span class="details">Tipo de Documento</span>
            <select class="details" id="tipo_documento"  required name="tipo_documento" onchange="onChange(this)">
                  <option value="0">Selecione tipo de documento</option>
                  <option value="1">Cedula de Ciudadania</option>
                  <option value="2">Tarjeta de Identidad</option>
                  <option value="3">Cedula de Extranjeria</option>
              </select>
          </div>
          <div class="input-box">
            <span class="details">N° de Documento</span>
            <input type="number" id="Documento" placeholder="Documento" required name="documento">
          </div>
          <div class="select-box">
          <span class="details">Tipo de Usuario</span>
            <select class="details" id="tipo_us"  required name="tipo_usuario" onchange="onChange(this)">
                  <option value="0">Selecione tipo de usuario</option>
                  <option value="1">Cliente</option>
              </select>
          </div>
          <div class="input-box">
            <span class="details">Contraseña</span>
            <span class="icon-eye-1"> 
            <i class="fas fa-eye" style="position:absolute; display:block;"></i>
            <input type="password" id="password" placeholder="Contraseña" required name="contra">
            </span>
            <span id="mensaje"></span>
          </div>
          <div class="input-box">
            <span class="details">Correo</span>
            <input type="email" id="correo" placeholder="Correo" required name="correo">
          </div>
          <script>
            function onChange (select) {
                  const value = select.value;
                  let option = select.querySelector(`option[value="${0}"]`);
                  option.disabled = true;
                }
          </script>
        </div>
        <div class="button">
        <input type="reset" value="Limpiar">
        </div>
        <div class="button">
          <input type="hidden" name="action" value="registrarUsuario">
          <input type="submit" value="Registrar">
        </div>
      </form>
    </div>
  </div>
      <script src="../Vista/js/not_Back.js"></script>
      <script src="../Vista/js/jquery-3.6.0.min.js"></script>
      <script src="../Vista/js/password.js"></script>
      <script src="../Vista/js/pass-show-hide.js"></script>
</body>
</html>
