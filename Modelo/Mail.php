<?php

    class mensajes{

        function correo($correo, $codigo){

                       // Varios destinatarios
                       $para  = $correo; // atención a la coma
                
                       // título
                       $título = 'Validar cuenta';
                       
                       // mensaje
                       $mensaje = '
                              <html>
                              <head>
                                <title>Activación de la cuenta</title>
                              </head>
                              <body>
                                  <br>
                                  <h1> Bienvenid@, estamos encantados de darle la bienvenida a nuestro servicio. </h1>
                                  <br>
                                  
                                <p>Para completar tu registro, ingresa en la plataforma el siguente codigo: ' . $codigo . '</p>
                                <br>
                                <br>
                                <br>
                                <p>Muchas gracias por preferirnos.</p> <br>
                                <h5>ATT: Su equipo desarrollador. </h5>
                                
                              </body>
                              </html>
                              ';
                       
                       // Para enviar un correo HTML, debe establecerse la cabecera Content-type
                       $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                       $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                       
                       // Cabeceras adicionales
                       //$cabeceras .= 'To: Mary <' . $para . '>, Kelly <' . $para . '>' . "\r\n";
                       /*$cabeceras .= 'From: Recordatorio <cumples@example.com>' . "\r\n";
                       $cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
                       $cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";*/
                       
                       // Enviarlo
                       $res = false;
                       mail($para, $título, $mensaje, $cabeceras);
                 

        }
    


    function codigoCambiarContra($correo, $codigo){

       // Varios destinatarios
       $para  = $correo; // atención a la coma
                
       // título
       $título = 'Validar cuenta';
       
       // mensaje
       $mensaje = '
              <html>
              <head>
                <title>Cambio de contraseña</title>
              </head>
              <body>
                  <br>
                  <h1> Bienvenid@. </h1>
                  <br>
                <p>Para poder iniciar con su proceso de cambio de su clave</p>  <br>
                <p>Ingresese en la plataforma el siguente codigo: ' . $codigo . '</p>
                <br>
                <br>
                <br>
                <p>Muchas gracias por preferirnos.</p> <br>
                <h5>ATT: Su equipo desarrollador. </h5>
                
              </body>
              </html>
              ';
       
       // Para enviar un correo HTML, debe establecerse la cabecera Content-type
       $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
       $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
       
       // Cabeceras adicionales
       //$cabeceras .= 'To: Mary <' . $para . '>, Kelly <' . $para . '>' . "\r\n";
       /*$cabeceras .= 'From: Recordatorio <cumples@example.com>' . "\r\n";
       $cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
       $cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";*/
       
       // Enviarlo
       $res = false;
       mail($para, $título, $mensaje, $cabeceras);

    }


    function confirmacionContra($correo){

      // Varios destinatarios
      $para  = $correo; // atención a la coma
                
      // título
      $título = 'Validar cuenta';
      
      // mensaje
      $mensaje = '
             <html>
             <head>
               <title>Confirmación cambio de contraseña</title>
             </head>
             <body>
                 <br>
                 <h1> Confirmacion. </h1>
                 <br>
               <p>Su cambio de contraseña fue éxito/p>  <br>
               <p>Si usted no ha sido el cambió la contraseña, por favor, comunicarse al siguiente correo:</p>
               <br>
               <p>administrador@panadería.com</p>
               <br>
               <br>
               <br>
               <p>Muchas gracias por preferirnos.</p> <br>
               <h5>ATT: Su equipo desarrollador. </h5>
               
             </body>
             </html>
             ';
      
      // Para enviar un correo HTML, debe establecerse la cabecera Content-type
      $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
      $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      
      // Cabeceras adicionales
      //$cabeceras .= 'To: Mary <' . $para . '>, Kelly <' . $para . '>' . "\r\n";
      /*$cabeceras .= 'From: Recordatorio <cumples@example.com>' . "\r\n";
      $cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
      $cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";*/
      
      // Enviarlo
      $res = false;
      mail($para, $título, $mensaje, $cabeceras);

    }


  }

?>