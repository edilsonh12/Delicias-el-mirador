<?php

    class conection{
        
        function conexion(){

            $usuario = "u703401377_root";
            $contraseña = ">0aL|>8i>X";
            $servidor = "localhost";
            $db = "u703401377_proyecto";
        
            $con=new mysqli($servidor,$usuario,$contraseña,$db);
            if($con->connect_errno){
            echo "El sitio web está experimentado problemas";
            }
        
            return $con;


        }


    }


?>




