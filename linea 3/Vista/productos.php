<?php
      session_start();
      if(!isset($_SESSION['correo'])){
        header('location:../Vista/index.html');
      } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Habitaciones</title>
    <link rel="stylesheet" href="../Vista/CSS/productos.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
    
    <h1 class="title">Lista de Productos</h1>
    
    <div class="container">
    <?php
        include '../Modelo/Consultas.php';
        $consultas = new consultasBD();
        
        $resultado = $consultas->ListaProductos();
       while ($row = mysqli_fetch_array($resultado)) {
   ?>
        <form action="../Controlador/Controlador_Producto.php" method="POST">
        <input type="hidden" name="action" value="verProductosCliente">
        <input type="hidden" name="id_producto" value="<?php echo $row['id']; ?>">   
        <div class="card">
        <img src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']) ?>" alt="" width="70" height="70">
        <h4><?php echo $row['nombre'];?></h4>
		<h4>Categoria: <?php echo $row['categoria']?></h4>
        <div class="button">
        <input type="submit" value="Consultar">
        </div>
        </div>
        </form>
        <?php } ?>
    </div>
    <script src="../Vista/js/not_Back.js"></script>  
</body>
</html>
