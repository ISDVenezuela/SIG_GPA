<?php  
/*
 * autor: wilmer rojas
 * Descripcion: la pagina inicial donde se loguea el usuario por su formulario
 * de inicio de sesion o logueo llama a este php donde se valida los datos del usuario
 * y de existir en la base de datos se llama a redireccion.php el cual se encarga
 * de llamar a la pagina principal del sistema
 */

if(!isset($_POST))
{
	?>
			<script type="text/javascript" language="javascript" >
				alert('Error: No se envio formulario');
	 			</script>	
				<?php
				  echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=../../index.php'/></head><body></body></html>");
					return;
}
else
{
	
				if ($_POST['nick']==''){
						?>           	
						<script type="text/javascript" language="javascript" >
								alert('Error: Hace falta el  usuario');
								document.form.nick.focus();
					  </script>	
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=../../index.php'/></head><body></body></html>");
	           	return;
	           }
	
	          if ($_POST['contrasena']==''){
		            ?>           	
						<script type="text/javascript" language="javascript" >
								alert('Error: Hace falta la contraseña del usuario ');
								document.form.contrasena.focus();
					  </script>	
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=../../index.php'/></head><body></body></html>");
	           	return;
	           }
	   
	   	
	   		   	
	   	$key=$_POST['contrasena'];        
	   	$sobrenombre=$_POST['nick'];	      	  
					           
	        
	           
	      //validar si el nick y la contraseña no contenga espacios en blanco      
	           if (substr_count($key, ' ')  || substr_count($sobrenombre,' '))
				{
						?><script>
						alert("El usuario o la contraseña tienen espacios en blanco vuelva introducir los datos");
						</script>
						<?php
   	        	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=../../index.php'/></head><body></body></html>");
	           	return;
				}
	
	
	

	   
      
		
      	  				    
	  // se conecta a la base de datos
				require '../../php/conexion.php';
				$conexion=conexion();
											
					
			//consulta
			$estado=0;
			$result= mysql_query("SELECT INDICADOR,CLAVE from  usuario where INDICADOR='$sobrenombre' and ESTADO='$estado' ", $conexion);
			if ($rows=mysql_fetch_array($result))
			 {
				 if ($rows["CLAVE"]==$key){
					 	//creacion de variables de session 
						session_start();
						$_SESSION['miid']=session_id();
						$_SESSION['minick']=$sobrenombre;
						$session=$_SESSION['miid'];
                       mysql_close($conexion);
     				   header("Location: redireccion.php");
                  }  
                  else{
						?>
					 <script type="text/javascript" language="javascript" >
						alert('Error: La contraseña es Invalida');
					</script>
			   <?php		
				mysql_close($conexion);
				echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=../../index.php'/></head><body></body></html>");			
				return;				
			   }
	     }else{
						?>
					 <script type="text/javascript" language="javascript" >
						alert('Error: Usuario no Existe en la base de datos');
					</script>
			   <?php		
				mysql_close($conexion);
				echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=../../index.php'/></head><body></body></html>");			
				return;	
			}			
return;	
}

?>

