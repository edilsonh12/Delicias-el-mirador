<?php


    include "../Modelo/Conexion.php";
    

    class consultasBD{


        function vcorreo($usuario){

            $conexion = new conection();
            $con = $conexion->conexion();

            $consulta = "SELECT * FROM isesion where correo ='$usuario' ";
            $resultado = mysqli_query($con,$consulta);

            $res = "";
            if($row = mysqli_fetch_array($resultado)){
                $res = true;
            }else{
                $res = false;
            }

            return $res;

        }

        function v2Correo($correo){

            $conexion = new conection();
            $con = $conexion->conexion();

            $consulta = "SELECT tipo FROM isesion where correo ='$correo' ";
            $resultado = mysqli_query($con,$consulta);
            
            return mysqli_fetch_array($resultado);

        }
        
        function vcontra($usuario, $contra){

            $conexion = new conection();
            $con = $conexion->conexion();

            $consulta = "SELECT clave, tipo FROM isesion where correo ='$usuario' ";
            $resultado = mysqli_query($con,$consulta);

            /*$res = "";
            if($row = mysqli_fetch_array($resultado)){
                $res = $row['clave'];
            }*/

            return mysqli_fetch_array($resultado);
        }

        function Ttipo($id){

            $conexion = new conection();
            $con = $conexion->conexion();

            $consulta = "SELECT * FROM tipo where id ='$id' ";
            $resultado = mysqli_query($con,$consulta);
            
            return mysqli_fetch_array($resultado);

        }

        function Tusuario($correo){

            $conexion = new conection();
            $con = $conexion->conexion();

            $consulta = "SELECT * FROM usuario where correo ='$correo' ";
            $resultado = mysqli_query($con,$consulta);
            
            return mysqli_fetch_array($resultado);

        }

        function ComprobarCorreo($correo){

            $conexion = new conection();
            $con = $conexion->conexion();

            $consulta = "SELECT * FROM usuario where correo ='$correo' ";
            $resultado = mysqli_query($con,$consulta);

            $res = "";
            if($row = mysqli_fetch_array($resultado)){
                $res =  $row['correo'];
            }

            return $res;

        }



        function ListaCiudadades(){
            
            $conexion = new conection();
            $con = $conexion->conexion();

            $consulta = "SELECT id, ciudad FROM ciudad";
            $resultado = mysqli_query($con,$consulta);

            return $resultado;
        }


        function registrarLogin($correo, $contra, $tipo_usuario){

            $conexion = new conection();
            $con = $conexion->conexion();

            $consulta = "INSERT INTO isesion (correo, clave, tipo) VALUES ('$correo','$contra','$tipo_usuario')";
            $res = false;

            if(mysqli_query($con,$consulta)){
                $res = true;
            }else{
                $res = false;
            }
            return $res;
        }

        function registrarUsuario($id, $nombres, $primer_apellido, $segundo_apellido, $telefono, $direccion, $ciudad, $tipo_de_documento, $correo){

            $conexion = new conection();
            $con = $conexion->conexion();

            $estado = 1;

            $consulta = "INSERT INTO usuario (id, nombres, primer_apellido, segundo_apellido, telefono, direccion, ciudad, tipo_de_documento, correo, estado) 
            VALUE ('$id', '$nombres', '$primer_apellido', '$segundo_apellido', '$telefono', '$direccion', '$ciudad', '$tipo_de_documento', '$correo', '$estado')";

            $res = false;

            if(mysqli_query($con,$consulta)){
                $res = true;
            }else{
                $res = false;
            }
            return $res;
        }

        function actualizarEstadoUsuario($correo){

            $conexion = new conection();
            $con = $conexion->conexion();

            $estado = '2';

            $consulta = "UPDATE usuario SET estado='$estado' WHERE correo='$correo' ";

            $res = false;
            if(mysqli_query($con,$consulta)){
                $res = true;
            }else{
                $res = false;
            }

            return $res;

        }

        function verificarContraAntigua($correo){

            $conexion = new conection();
            $con = $conexion->conexion();

            $consulta = "SELECT * FROM isesion where correo = '$correo'";
            $resultado = mysqli_query($con,$consulta);
            $row = '';
            $rest = '';
            if($row = mysqli_fetch_array($resultado)){
                $rest = $row['clave'];
            }

            return $rest;

        }


        function actualizarContraseñaDesdeAfuera($correo,$clave){

            $conexion = new conection();
            $con = $conexion->conexion();

            $consulta = "UPDATE isesion SET clave = '$clave' WHERE correo = '$correo'";
            $res = false;
            if(mysqli_query($con,$consulta)){
                $res = true;
            }else{
                $res = false;
            }

            return $res;
        }

        function ListaProductos(){
            
            $conexion = new conection();
            $con = $conexion->conexion();

            $consulta = "SELECT productos.id, productos.nombre, productos.imagen,tipo_de_producto.categoria FROM productos,tipo_de_producto WHERE productos.tipo=tipo_de_producto.id;";
            $resultado = mysqli_query($con,$consulta);

            return $resultado;
        }

        function consultarProducto($id){

            $conexion = new conection();
            $con = $conexion->conexion();

            $consulta = "SELECT productos.id, productos.nombre, productos.imagen, productos.tipo, tipo_de_producto.categoria FROM productos,tipo_de_producto WHERE productos.tipo=tipo_de_producto.id  and productos.id='$id'  ";
            $resultado = mysqli_query($con,$consulta);

            return $resultado;

        }

        function ListaCategorias(){

            $conexion = new conection();
            $con = $conexion->conexion();

            $consulta = "SELECT * FROM tipo_de_producto";
            $resultado = mysqli_query($con,$consulta);

            return $resultado;

        }

        function registrarProducto($id, $nombre, $imagen, $tipo){

            $conexion = new conection();
            $con = $conexion->conexion();

            $consulta = "INSERT INTO productos (id, nombre, imagen, tipo) value ('$id', '$nombre', '$imagen', '$tipo') ";
            $res = false;

            if(mysqli_query($con,$consulta)){
                $res = true;
            }else{
                $res = false;
            }
            return $res;
        }

        function registrarProductoVendedor($correo,$id){

            $conexion = new conection();
            $con = $conexion->conexion();

            $consulta = "INSERT INTO producto_vendedor (correo, id_producto) value ('$correo', '$id') ";
            $res = false;

            if(mysqli_query($con,$consulta)){
                $res = true;
            }else{
                $res = false;
            }
            return $res;
        }

        function actualizarProducto($nombre,$tipo,$id){

            $conexion = new conection();
            $con = $conexion->conexion();

            $consulta = "UPDATE productos SET nombre = '$nombre', tipo='$tipo' WHERE id = '$id'";
            $res = false;
            if(mysqli_query($con,$consulta)){
                $res = true;
            }else{
                $res = false;
            }

            return $res;

        }

        function actualizarProductoConImagen($nombre,$imagen,$tipo,$id){

            $conexion = new conection();
            $con = $conexion->conexion();

            $consulta = "UPDATE productos SET nombre = '$nombre', imagen='$imagen', tipo='$tipo' WHERE id = '$id'";
            $res = false;
            if(mysqli_query($con,$consulta)){
                $res = true;
            }else{
                $res = false;
            }

            return $res;

        }
    }

?>