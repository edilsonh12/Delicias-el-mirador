<?php

    session_start();

    include "../Modelo/Consultas.php";
    $consultas = new consultasBD;

    if(isset($_POST['action'])  && $_POST['action']=='iniciarSesion'){
        

        $usuario = $_POST['usuario'];
        $contra = $_POST['contra'];

        $res = $consultas->vcorreo($usuario);
        $estado = false;
        $control = "";

        if($res==true){

                    $row = $consultas->vcontra($usuario,$contra);
                $pass = $row['clave'];
                $tipo12 = $row['tipo'];
                if(password_verify($contra,$pass)){

                    $rowUsuario = $consultas->Tusuario($usuario);
                    $estado_cuenta = $rowUsuario['estado'];
                    if($estado_cuenta==1){
                        echo "<script> alert('No puede ingresar, la cuenta está sin activar, a continuación podrá activarla.'); window.location= '../Vista/mensaje_conf_cuenta.php?correo=' + '".$usuario."' ; </script>";  

                    }else{
                    

                    $fila = $consultas->Ttipo($tipo12);
                    $tipop = $fila['tipo_de_usuario'];

                    
                    $nombres = $rowUsuario['nombres'] . ' ' . $rowUsuario['primer_apellido'] . ' ' . $rowUsuario['segundo_apellido'];

                    $_SESSION['correo'] = $usuario;
                    $_SESSION['nombre'] = $nombres;
                    $_SESSION['tipo'] = $tipop;


                    echo "<script> alert('Bienvenid@'); window.location= '../Vista/menu_principal.php' </script>";
                        }

                   
                }else{
                    $control = "Ingreso de una contraseña erronea";
                    $estado = true;
                    echo "<script> alert('Error: Ingreso de una contraseña erronea, intente nuevamente'); window.location= '../Vista/index.html' </script>";

                }

        }else{
            $control = "Ingreso de un correo erroneo.";
            $estado = true;
            echo "<script> alert('Error: Ingreso de un correo erroneo, intente nuevamente'); window.location= '../Vista/index.html' </script>";


        }


        if($estado==true){
            
            $logFile = fopen("../log.txt", 'a') or die("Error creando archivo");
            fwrite($logFile, "\n".date("d/m/Y H:i:s")."   ".$control) or die("Error escribiendo en el archivo");
            fclose($logFile);

            $estado = false;
        }
        

    }




    if(isset($_POST['action'])  && $_POST['action']=='registrarUsuario'){

        $nombres = $_POST['nombres'];
        $priape = $_POST['priape'];
        $segape = $_POST['segape'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $ciudad = $_POST['ciudad'];
        $tipo_documento = $_POST['tipo_documento'];
        $tipo_usuario = $_POST['tipo_usuario'];
        $correo = $_POST['correo'];
        $contra = $_POST['contra'];
        $cedula = $_POST['documento'];

        

        if($ciudad=='0' || $tipo_documento=='0' || $tipo_usuario=='0' ){
            echo "<script> alert('Error: Los campos de selección no se deben dejar sin seleccionar, intente nuevamente'); window.location= '../Vista/registrar_usuario.php' </script>";

        }else{

            $pass = password_hash($contra,PASSWORD_BCRYPT);

            $regLogin = $consultas->registrarLogin($correo,$pass,$tipo_usuario);

            if($regLogin==true){
                
                $regUsuario = $consultas->registrarUsuario($cedula,$nombres,$priape,$segape,$telefono,$direccion,$ciudad,$tipo_documento,$correo);

                if($regUsuario==true){

                    echo "<script> alert('Registrado con éxito, a continuación realice la activación de su cuenta.'); window.location= '../Vista/mensaje_conf_cuenta.php?correo=' + '".$correo."' ; </script>";                    


                }else{
                    echo "<script> alert('Ocurrió un error en el registro, intente nuevamente'); window.location= '../Vista/registrar_usuario.php' </script>";

                }

            }else{
                echo "<script> alert('Error: Ingreso de un correo erroneo o duplicado, intente nuevamente'); window.location= '../Vista/registrar_usuario.php' </script>";

            }
            

        }

    }


    if(isset($_POST['action'])  && $_POST['action']=='validarCuenta'){
        
        $correo = $_POST['correo1'];
        $numero = rand(100000, 999999);
      

        include "../Modelo/Mail.php";
        $mail = new mensajes();
        $rest =  $mail->correo($correo,$numero);

        echo "<script> alert('Revisa tu correo, acaba de ser enviado el código.'); window.location= '../Vista/verificar_cuenta.php?numero=' + '".$numero."' + '&correo=' + '".$correo."'; </script>";    
        
    }


    if(isset($_POST['action'])  && $_POST['action']=='verificarCuentaT'){
        
        $correo = $_POST['email'];
        $numero = $_POST['numero'];
        $cod = $_POST['codigo'];

        if($cod==$numero){

            $actEstado = $consultas->actualizarEstadoUsuario($correo);

            if($actEstado==true){
                    $row = $consultas->v2Correo($correo);
                    $tipo12 = $row['tipo'];

                    $fila = $consultas->Ttipo($tipo12);
                    $tipop = $fila['tipo_de_usuario'];

                    $rowUsuario = $consultas->Tusuario($correo);
                    $nombres = $rowUsuario['nombres'] . ' ' . $rowUsuario['primer_apellido'] . ' ' . $rowUsuario['segundo_apellido'];

                    $_SESSION['correo'] = $correo;
                    $_SESSION['nombre'] = $nombres;
                    $_SESSION['tipo'] = $tipop;
                echo "<script> alert('Cuenta activada con éxito, por favor, inicie sesión.'); window.location= '../Vista/index.html' </script>";

            }else{
                echo "<script> alert('Error: No se pudo actualizar la base de datos, intentelo nuevamente.'); window.location= '../Vista/verificar_cuenta.php?numero=' + '".$numero."' + '&correo=' + '".$correo."'; </script>";    

            }


        }else{
            echo "<script> alert('Error: El código que ingreso es incorrecto, intentelo nuevamente.'); window.location= '../Vista/verificar_cuenta.php?numero=' + '".$numero."' + '&correo=' + '".$correo."'; </script>";    

        }

    }



    if(isset($_POST['action'])  && $_POST['action']=='recuperarContraCorreo'){

        $correo = $_POST['correo'];

        $rest = $consultas->ComprobarCorreo($correo);
        if($rest==$correo){
            $numero = rand(100000, 999999);

            include "../Modelo/Mail.php";
            $mail = new mensajes();
            $rest = $mail->codigoCambiarContra($correo,$numero);
    
    
            echo "<script> alert('Revisa tu correo, acaba de ser enviado el código.'); window.location= '../Vista/verificar_codigo.php?numero=' + '".$numero."' + '&correo=' + '".$correo."'; </script>";    
        
        }else{
            echo "<script> alert('Error: El correo que ingreso no esta registrado, intentelo nuevamente.'); window.location= '../Vista/recuperar_contra.php' </script>";

        }



      }


    if(isset($_POST['action'])  && $_POST['action']=='enviarCodigoC'){

        $codigo = $_POST['numero'];
        $correo = $_POST['correo'];
        $cod = $_POST['codigoEntrada'];

        if($codigo == $cod){
            echo "<script> alert('A continuación, ingrese una nueva contraseña.'); window.location= '../Vista/resta_contra.php?correo=' + '".$correo."'; </script>";  

        }else{
            echo "<script> alert('Error: El código que ingreso es incorrecto, intentelo nuevamente.'); window.location= '../Vista/verificar_codigo.php?numero=' + '".$numero."' + '&correo=' + '".$correo."'; </script>";  
        }

    }

    
    if(isset($_POST['action'])  && $_POST['action']=='CambiarContraseñaFueraDelLogin'){
        
        $contra = $_POST['contra'];
        $contraF1 = $_POST['contraF1'];
        $correo = $_POST['correo'];
        
        $pass = password_hash($contra,PASSWORD_BCRYPT);
        $contraAnterior = $consultas->verificarContraAntigua($correo);
        
        if(password_verify($contra,$contraAnterior)){

            echo "<script> alert('Error: La contraseña que acaba de ingresar es igual a la anterior, intente nuevamente.'); window.location= '../Vista/resta_contra.php?correo=' + '".$correo."'; </script>";  

        }else{
            
            if($contra==$contraF1){
                
                $actualizacion = $consultas->actualizarContraseñaDesdeAfuera($correo,$pass);
                if($actualizacion==true){
                    echo "<script> alert('Contraseña actualizada con éxito, por favor, inicie sesión.'); window.location= '../Vista/index.html' </script>";
                }else{
                    echo "<script> alert('Error: No se pudo actualizar la base de datos, intentelo nuevamente.'); window.location= '../Vista/resta_contra.php?correo=' + '".$correo."'; </script>";  

                }


            }else{
                echo "<script> alert('Error: Las contraseñas ingresadas no son iguales, intentelo nuevamente.'); window.location= '../Vista/resta_contra.php?correo=' + '".$correo."'; </script>";  
    
            }


        }
        
    }

    if(isset($_POST['action'])  && $_POST['action']=='actualizarContraDesdeAdentro'){
         
        $correo = $_POST['correo'];
        $contraAN = $_POST['contraAntigua'];
        $contraN = $_POST['contraN'];
        $contraNF1 = $_POST['contraNF1'];

        $contraAntigua = $consultas->verificarContraAntigua($correo);


        if(password_verify($contraAN,$contraAntigua)){

            if($contraN == $contraNF1){

                if($contraN == $contraAN){
                    echo "<script> alert('Error: La contraseña nueva no puede ser igual a la antigua, intente nuevamente.'); window.location= '../Vista/cambiar_contra.php' </script>";

                }else{
                    $pass = password_hash($contraN,PASSWORD_BCRYPT);
                    $rest = $consultas->actualizarContraseñaDesdeAfuera($correo,$pass);
                    if($rest==true){
                        include "../Modelo/Mail.php";
                        $mail = new mensajes();

                        $mail->confirmacionContra($correo);
                        session_unset();
                        session_destroy();
                        echo "<script> alert('Contraseña actualizada con éxito, por favor, inicie sesión'); window.location= '../Vista/index.html' </script>";
                        
                    }else{
                        echo "<script> alert('Error: Imposible actualizar la base de datos, intente nuevamente.'); window.location= '../Vista/cambiar_contra.php' </script>";

                    }
                }

            }else{
                echo "<script> alert('Error: Las contraseñas ingresadas no son iguales, intente nuevamente.'); window.location= '../Vista/cambiar_contra.php' </script>";

            }

        }else{

            echo "<script> alert('Error: La contraseña ingresada no es igual a la actual, intente nuevamente.'); window.location= '../Vista/cambiar_contra.php' </script>";

        }


    }


    if(isset($_POST['action'])  && $_POST['action']=='cerrarSesion'){
        
        session_unset();
        session_destroy();
        echo "<script> alert('Gracias por preferinos, hasta la próxima.'); window.location= '../Vista/login.html' </script>";
        

    }



?>