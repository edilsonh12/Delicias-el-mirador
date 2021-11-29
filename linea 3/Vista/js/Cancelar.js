
    function Cancelar(){                            
       //Ingresamos un mensaje a mostrar
        var mensaje = confirm("¿Está seguro que quiere cerrar sesión?");
     //Detectamos si el usuario acepto el mensaje
      if (mensaje == true) {
       //alert("Registro eliminado con éxito");
        return true;
         }
      //Detectamos si el usuario denegó el mensaje
             else {
       alert("No se ha cerrado sesión.");
        return false;
        }
   }
                
            

