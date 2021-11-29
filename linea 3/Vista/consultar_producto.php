<?php
      session_start();
      if(!isset($_SESSION['correo'])){
        header('location:../Vista/login.html');
      } 
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/registro_producto.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <?php
      $id = $_GET['id'];
      include '../Modelo/Consultas.php';
      $consultas = new consultasBD();
      $resultado = $consultas->consultarProducto($id);
      
      $row = mysqli_fetch_array($resultado);
  ?>
  <div class="container">
    <form action="../Controlador/Controlador_Producto.php" method="POST">
      <input type="hidden" name="action" value="SalirVerProducto">
      <div class="title">Consultar Producto</div> 
    <button class="btn-exit" type="submit" name="salir">x</button>
    </form>
    <div class="content">
      <form action="../Controlador/Controlador_Producto.php" method="POST" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nombre</span>



            <input type="text" id="NomPro" placeholder="Nombre de producto" readonly name="NomPro" value="<?php echo $row['nombre']; ?>">
          </div>
          <div class="input-box">
            <span class="details">Categoria</span>
            <input type="text" id="Categoria" readonly name="categoria" value="<?php echo $row['categoria']; ?>">
          </div>
          <div class="file-box">
            <span class="details-img">Imagen</span>
            <div>
            <img src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']) ?>" alt="" width="180" height="180">
            <div id="preview" class="styleImage"></div> 
          </div>
          </div>
        </div>
      </form>
      <script src="js/main.js"></script>
    </div>
  </div>
</body>
</html>
