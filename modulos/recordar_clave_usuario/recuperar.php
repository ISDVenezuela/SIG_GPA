<?php
/*
 * descripción: aqui es donde se consulta a la base de datos y se verifica si existe el usuario y correo
 * en la base de datos, de existir se le devuelve su contraseña mostrandosela en la pantalla
 */
	       
if(!($_POST))
{

	?>
				<script type="text/javascript" language="javascript" >
				alert('Error: No se envio ningun formulario');
	 			</script>
				<?php
				  echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=recordar.php'/></head><body></body></html>");

			return;

}else{	       
	       
	       
	       
	       //asignacion de variables 
	       
	       
	        $usuario=$_POST["id_usuario"];
	        $correo=$_POST["correo"];
	        $usuario=strtoupper($usuario);
	        $correo=strtoupper($correo);
	       
	         require '../../php/conexion.php';
				 $conexion=conexion();
				   $result= mysql_query("SELECT * from  usuario where INDICADOR='$usuario' and  CORREO='$correo'", $conexion);
		          if ($rows=mysql_fetch_array($result)){
		          	
									     $clave=$rows['CLAVE'];    
									         echo "Su Contraseña es:".$clave;
                       
						     				 echo ("<html><head><meta http-equiv='REFRESH' content='5;URL=../../index.php'/></head><body></body></html>");
						           		
		          	
		          	
		          	}else{
						          
						          ?>
								<script type="text/javascript" language="javascript" >
								alert('Error: el usuario y correo no existen en la base de datos');
					 			</script>
								<?php
								  echo ("<html><head><meta http-equiv='REFRESH' content='2;URL=recordar.php'/></head><body></body></html>");
				                                  
							    return;
						          
		          	}
				 


} //fin del else
?>
