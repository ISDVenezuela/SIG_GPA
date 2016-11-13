<?php
/*
 * autor: maria de los angeles ruiz fernandez 
 * Descripcion: Aqui se cierra la sesion del usuario y se redirecciona para la pagina de inicio o
 * logueo. se destruye la variable de session del usuario.
 *
 */
session_start();
require '../../php/classLogueo.php';
$valid=new validar();
if ($valid->comprobar()){


session_destroy();
		?>
			<script type="text/javascript" language="javascript" >
				alert("<<<<< Gracias Por Visitar El Sitio Web, Cerrando La Session >>>>>");
			</script>
		<?php	
		 echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=../../index.php'/></head><body></body></html>");
		return;		
		}

?>
