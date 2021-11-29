<?php

        include "../Modelo/Consultas.php";
        $consultas = new consultasBD;

        if(isset($_POST['action'])  && $_POST['action']=='verProductosCliente'){

                $id = $_POST['id_producto'];
                echo "<script> window.location= '../Vista/consultar_producto.php?id=' + '".$id."' ; </script>";                    

        }       

        
        if(isset($_POST['action'])  && $_POST['action']=='SalirVerProducto'){
                echo "<script> window.location= '../Vista/productos.php' </script>";

        }      
        

        if(isset($_POST['action'])  && $_POST['action']=='IngresarAgregarProducto'){
                echo "<script> window.location= '../Vista/registro_producto.php' </script>";

        }


        if(isset($_POST['action'])  && $_POST['action']=='SalirRegistroProducto'){
                echo "<script> window.location= '../Vista/lista_productos.php' </script>";

        }


        if(isset($_POST['action'])  && $_POST['action']=='registrarProducto'){

                $nombre = $_POST['nompro'];
                $categoria = $_POST['categoria'];
                $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
                $correo = $_POST['correo'];

                $cod = rand(100000,999999);
                if($categoria== '0'){
                        echo "<script> alert('Error: Debe  seleccionar una categoría, intente nuevamente'); window.location= '../Vista/registro_producto.php' </script>";

                }else{

                        $rest = $consultas->registrarProducto($cod,$nombre,$imagen,$categoria);
                        if($rest==true){

                                $rests = $consultas->registrarProductoVendedor($correo,$cod);
                                if($rests == true){
                                        echo "<script> alert('Producto registrado con éxito'); window.location= '../Vista/registro_producto.php' </script>";

                                }else{
                                        echo "<script> alert('Error: Imposible actualizar la base de datos, intente nuevamente'); window.location= '../Vista/registro_producto.php' </script>";
 
                                }

  
                        }else{
                                echo "<script> alert('Error: Imposible actualizar la base de datos, intente nuevamente'); window.location= '../Vista/registro_producto.php' </script>";

                        }

                }


        }


        if(isset($_POST['action'])  && $_POST['action']=='verProductoLista'){

                $id = $_POST['id'];
                echo "<script> window.location= '../Vista/consultar_producto_vendedor.php?id=' + '".$id."' ; </script>";                    

        }

        if(isset($_POST['action'])  && $_POST['action']=='SalirVerProductoVendedor'){
                echo "<script> window.location= '../Vista/lista_productos.php' </script>";

        }

        if(isset($_POST['action'])  && $_POST['action']=='editarProducto'){

                $id = $_POST['id'];
                echo "<script> window.location= '../Vista/actualizar_producto.php?id=' + '".$id."' ; </script>";  
        }

        if(isset($_POST['action'])  && $_POST['action']=='salirActualizarProducto'){
                echo "<script> window.location= '../Vista/lista_productos.php' </script>";
        }

        if(isset($_POST['action'])  && $_POST['action']=='actualizarProductoV'){

                $nombre = $_POST['nompro'];
                $categoria = $_POST['categoria'];
                
                $id = $_POST['id_producto'];

                $nombreIMG = $_FILES['imagen']['tmp_name'];

                if($nombreIMG == ''){

                        if($categoria == '0'){
                                echo "<script> alert('Error: Debe  seleccionar una categoría, intente nuevamente'); window.location= '../Vista/registro_producto.php' </script>";
        
                        }else{
                                $resultado = $consultas->actualizarProducto($nombre,$categoria,$id);
                                if($resultado==true){
                                        echo "<script> alert('Producto actualizado con éxito'); window.location= '../Vista/lista_productos.php' </script>";
        
                                }else{
                                        echo "<script> alert('Error: Imposible actualizar la base de datos, intente nuevamente'); window.location= '../Vista/actualizar_producto.php' </script>";
            
                                }
                        }

                }else{
                        $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
                        if($categoria == '0'){
                                echo "<script> alert('Error: Debe  seleccionar una categoría, intente nuevamente'); window.location= '../Vista/registro_producto.php' </script>";
        
                        }else{
                                $resultado = $consultas->actualizarProductoConImagen($nombre,$imagen,$categoria,$id);
                                if($resultado==true){
                                        echo "<script> alert('Producto actualizado con éxito'); window.location= '../Vista/lista_productos.php' </script>";
        
                                }else{
                                        echo "<script> alert('Error: Imposible actualizar la base de datos, intente nuevamente'); window.location= '../Vista/actualizar_producto.php' </script>";
            
                                }
                        }

                }
                


        }




?>