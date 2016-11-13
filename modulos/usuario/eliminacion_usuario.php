<?php
/* descripcion: aqui se le pregunta al administrador si esta seguro de eliminar el usuario
 */

////iniciamos sesion
session_start();

require '../../php/classLogueo.php';
$valid=new validar();
if ($valid->comprobar()){

$_SESSION['user_session']=$_GET['user'];


    ?>



<script type="text/javascript" language="javascript">
   var answer = confirm("Esta Seguro de Eliminar el Usuario de la  base de datos del Inventario?")
	if (answer){
		
		
		window.location = "consulta_eliminar_usuario.php";

	}
	else{
		alert("Volviendo Atras!!!");
                window.location = "lista_usuarios.php";
        
	}
	</script>


<?php

}
?>
