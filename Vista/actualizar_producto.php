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
    include '../Modelo/Consultas.php';
    $consultas = new consultasBD();

    $id = $_GET['id'];
    $resultado = $consultas->consultarProducto($id);
    $row = mysqli_fetch_array($resultado);
  ?>

  <div class="container">
    <form action="../Controlador/Controlador_Producto.php" method="POST">
      <input type="hidden" name="action" value="salirActualizarProducto">
      <div class="title">Actualizar Producto</div> 
    <button class="btn-exit" type="submit" name="salir">x</button>
    </form>
    <div class="content">
      <form action="../Controlador/Controlador_Producto.php" method="POST" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nombre</span>


            <input type="text" id="NomPro" placeholder="Nombre de producto" required name="nompro" value="<?php echo $row['nombre']; ?>">
          </div>
          <div class="select-box">
          <span class="details">Categoria</span>
          <script
                src="https://code.jquery.com/jquery-3.2.0.min.js"
                integrity="sha256-JAW99MJVpJBGcbzEuXk4Az05s/XyDdBomFqNlM3ic+I="
                crossorigin="anonymous">
              </script>
              <script>
                //Esta es la función que una vez se cargue el documento será gatillada.
                $(function(){
                    $("#categoria").val('<?php echo $row['tipo']; ?>')
                });
            </script>

          <?php 
            $rest = $consultas->ListaCategorias();

          ?>      

          <select class="details" id="categoria" placeholder="categoria" required name="categoria" onchange="onChange(this)">
                <option value="0">Seleccione Categoria</option>
                <?php
                  while($riw = mysqli_fetch_array($rest)){
                ?>
                <option value="<?php echo $riw['id']; ?>"><?php echo $riw['categoria']; ?></option>
                    <?php }?>
            </select>
          </div>
          <div class="file-box">
            <span class="details">Imagen</span>
            <input type="file" name="imagen" id="file" accept=".jpg,.png,.jpeg" >
            <div id="preview" class="styleImage"><img src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']) ?>" alt="" width="150" height="150"></div>
          </div>
        </div>
        <div class="button">
        <input type="reset" value="Limpiar">
        </div>
        <div class="button">
          <input type="hidden" name="id_producto" value="<?php echo $id; ?>">
          <input type="hidden" name="action" value="actualizarProductoV">
          <input type="submit" value="Actualizar">
        </div>
      </form>
      <script src="js/main.js"></script>

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
</body>
</html>
