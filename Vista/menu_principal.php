<?php
      session_start();
      if(!isset($_SESSION['correo'])){
        header('location:../Vista/login.html');
      } 
?>

<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Sistema principal| Delicias el Mirador</title>
    <link rel="stylesheet" href= "../Vista/CSS/menu_principal_f.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>

    <?php
        $tipo = $_SESSION['tipo'];
    ?>


  <div class="sidebar">
    <div class="logo-details">
    <i class='bx bx-basket'></i>
        <div class="logo_name">Delicias el Mirador</div>
        <i class='bx bx-menu' id="btn" ></i> 
    </div>
    <ul class="nav-list">  
    <li>
       <a href="cambiar_contra.php">
       <i class="fas fa-user-circle"></i>
        <span class="links_name">
          
        <?php echo $_SESSION['nombre']; ?> </span>
  
       </a>
     </li> 
      <li
      <?php
            if($tipo=='cliente' || $tipo=='vendedor'){
              echo 'style="display:none"';
            }
        ?>
      
      >
        <a href="#">
        <i class='bx bxs-user'
        
        ></i>
          <span class="links_name">Usuarios</span>
        </a>
         <span class="tooltip">Usuarios</span>
      </li>
      <li
      <?php
        if($tipo=='vendedor'){
          echo 'style="display:none"';
        }
      ?>     
      >
       <a href="productos.php" target="ventana">
       <i class='bx bxs-box'></i>
         <span class="links_name">Productos</span>
       </a>
       <span class="tooltip">Productos</span>
     </li>
     <li
     
     <?php
        if($tipo=='cliente'){
          echo 'style="display:none"';
        }
      ?>
     
     >
       <a href="lista_productos.php" target="ventana">
       <i class='bx bxs-shopping-bags'></i>
         <span class="links_name">Mis Productos</span>
       </a>
       <span class="tooltip">Mis Productos</span>
     </li>
     <li
     
     <?php
        if($tipo=='vendedor'){
          echo 'style="display:none"';
        }
      ?>
     
     >
       <a href="#" >
       <i class='bx bx-money'></i>
         <span class="links_name">Mis Compras</span>
       </a>
       <span class="tooltip">Mis Compras</span>
     </li>
     <li
     
     <?php
        if($tipo=='cliente'){
          echo 'style="display:none"';
        }
      ?>
     >
       <a href="#">
       <i class='bx bxs-chart'></i>
         <span class="links_name">Mis Ventas</span>
       </a>
       <span class="tooltip">Mis Ventas</span>
     </li> 
     <li class="profile">
        <form action="../Controlador/Controlador_Usuario.php" method="POST">
         <div class="profile-details">
          <input type="hidden" name="action" value="cerrarSesion">
            <input type="submit" name="Cerrar Sesion"value="Cerrar Sesión" onclick="return Cancelar()">
        </div> 
	</form> 
     </li>

     
    </ul>
  </div>
  <section class="home-section">
  <div class="content">
        <iframe src="" name="ventana" style="width: 100%; height: 640px; border: none;"></iframe>
  </div>
  </section>
  <script src="../Vista/js/not_Back.js"></script>
  <script src="../Vista/js/script.js"></script>
  <script src="../Vista/js/Cancelar.js"></script>
    
</body>
</html>
