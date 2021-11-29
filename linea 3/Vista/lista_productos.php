<?php
      session_start();
      if(!isset($_SESSION['correo'])){
        header('location:../Vista/index.html');
      } 
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/lista_productos.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <header>
       <h1>Lista de productos</h1>
       <form action="../Controlador/Controlador_Producto.php" method="POST">
            <input type="hidden" name="action" value="IngresarAgregarProducto">
             <input type="submit" value="+" name="botonIngresar">
        </form>
  </header>
  <main>
   <div class="contenedor">
   <div>

    <?php
        include '../Modelo/Consultas.php';
        $consultas = new consultasBD();
        $resultado = $consultas->ListaProductos();
    ?>

        
   </div>
    <div class="col-sm-9">
          <table class="table-container">
             
                <thead>
                    <tr> 
                        <th>Imagen</th>
                        <th>Id Producto</th>
                        <th>Nombre del Producto</th>
                        <th>Categoria</th>      
                        <th colspan="2">Acción</th> 
                    </tr>
                </thead>
           <tbody>

           <?php
            while($row = mysqli_fetch_array($resultado)){
           ?>
            <tr>
                <td><img src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']) ?>" alt="" width="70" height="70"></td>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['categoria']; ?></td>
                <td>
                    <form action="../Controlador/Controlador_Producto.php" method="post">
                    <input type="hidden" name="action" value="verProductoLista">
                    <input type="hidden" value="<?php echo $row['id'];?>"  name="id">
                    <button type="submit" class="btn_visualizar"href="#"><i><img src="img/view.png"></i></button> 
                    </form>  
                </td> 
                <td>
                    <form action="../Controlador/Controlador_Producto.php" method="post">
                        <input type="hidden" name="action" value="editarProducto">
                    <input type="hidden" value="<?php echo $row['id'];?>"  name="id">
                    <button type="submit" class="btn_editar"href="#"><i><img src="img/edit.png"></i></button>
                    </form>
                </td>
            </tr>    
            
            <?php } ?>

           </tbody>
        </table> 
     </div>      
    </div>
    <div>   
    </div>
  </main>
  <script src="../Vista/js/not_Back.js"></script>
  </body>
  </html>