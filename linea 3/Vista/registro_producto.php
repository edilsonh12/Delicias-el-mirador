<?php
      session_start();
      if(!isset($_SESSION['correo'])){
        header('location:../Vista/index.html');
      } 
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/registro_producto.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>



  <div class="container">
    <form action="../Controlador/Controlador_Producto.php" method="POST">
      <input type="hidden" name="action" value="SalirRegistroProducto">
      <div class="title">Registrar Producto</div> 
    <button class="btn-exit" type="submit" name="salir">x</button>
    </form>
    <div class="content">
      <form action="../Controlador/Controlador_Producto.php" method="POST" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nombre</span>
            <input type="hidden" name="action" value="RegistrarProducto">
            <input type="text" id="NomPro" placeholder="Nombre de producto" required name="nompro">
          </div>
          <div class="select-box">
          <span class="details">Categoria</span>

      <?php
          include '../Modelo/Consultas.php';
          $consultas = new consultasBD();
          $resultado = $consultas->ListaCategorias();
      ?>

          <select class="details" id="categoria" placeholder="categoria" required name="categoria" onchange="onChange(this)">
                <option value="0">Seleccione Categoria</option>
                
                <?php
                  while($row = mysqli_fetch_array($resultado)){
                ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['categoria']; ?></option>
                <?php }?>
            </select>
          </div>
          <div class="file-box">
            <span class="details">Imagen</span>
            <input type="file" name="imagen" id="file" accept=".jpg,.png,.jpeg" >
            <div id="preview" class="styleImage"></div> 
          </div>
        </div>
        <div class="button">
        <input type="reset" value="Limpiar">
        </div>
        <div class="button">

           <?php
            $correo = $_SESSION['correo'];
           ?>
          <input type="hidden" name="correo" value="<?php echo $correo; ?>">
          <input type="hidden" name="action" value="registrarProducto">
          <input type="submit" value="Registrar">
        </div>
      </form>
      
      <script>
        function onChange (select) {
              const value = select.value;
              let option = select.querySelector(`option[value="${0}"]`);
              option.disabled = true;
            }
      </script>
    </div>
  </div>
  <script src="../Vista/js/not_Back.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
