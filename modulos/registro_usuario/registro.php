<?php

/*
 * autor:maria ruiz
 * descripcion: aqui se validan y registran los datos de los usuarios
 */
session_start();

if(!($_POST))
{

	?>
				<script type="text/javascript" language="javascript" >
				alert('Error: No se envio ningun formulario');
	 			</script>
				<?php
				  echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=registrarse.php'/></head><body></body></html>");

			return;

}
else
{
	 //asignacion de variables
		$cedula=$_POST["cedula"];
	   	$nombre=$_POST["nombre"];
	   	$apellido=$_POST["apellido"];
	   	$carnet=$_POST["num_carnet"];
	   	$correo=$_POST["correo"];
	   	$correo2=$_POST["correo2"];
	   	$extension=$_POST["extension"];
	   	$tipo_usuario=$_POST["tipo_usuario"];
	   	$estado_usuario=0;
	   	$usuario=$_POST["id_usuario"];
	   	$key=$_POST["contrasena_registro"];
	   	$key2=$_POST["contrasena_registro2"];

          


//validacion de los campos

	   	if($cedula == "") {
	   		?>
	   		<script type="text/javascript" language="javascript" >
			alert('Error: Debe de ingresar su cedula');
	 			</script>
				<?php
					echo ("Error: Debe de ingresar su nombre");
				  	echo ("<html><head><meta http-equiv='REFRESH' content='2;URL=registrarse.php'/></head><body></body></html>");
					return;
	   	}

		if($nombre == "") {
		   ?>
			<script type="text/javascript" language="javascript" >
			alert('Error: Debe de ingresar su nombre');
	 			</script>
				<?php
					echo ("Error: Debe de ingresar su nombre");
				  echo ("<html><head><meta http-equiv='REFRESH' content='2;URL=registrarse.php'/></head><body></body></html>");
		return;
	   }else {
		 if(is_numeric($nombre)) {
		 ?>
			<script type="text/javascript" language="javascript" >
			alert('Error: El nombre no debe de ser datos numericos');
	 			</script>
				<?php
				  echo ("Error:El nombre no debe de ser datos numericos");
				  echo ("<html><head><meta http-equiv='REFRESH' content='2;URL=registrarse.php'/></head><body></body></html>");
		    return;

			}
		}

		if($apellido == "") {
		   ?>
			<script type="text/javascript" language="javascript" >
			alert('Error: Debe de ingresar su apellido');
	 			</script>
				<?php
					echo ("Error: Debe de ingresar su apellido");
				  echo ("<html><head><meta http-equiv='REFRESH' content='2;URL=registrarse.php'/></head><body></body></html>");
		return;
	   }else {
		 if(is_numeric($apellido)) {
		 ?>
			<script type="text/javascript" language="javascript" >
			alert('Error: El apellido no debe de ser datos numericos');
	 			</script>
				<?php
				  echo ("Error:El apellido no debe de ser datos numericos");
				  echo ("<html><head><meta http-equiv='REFRESH' content='2;URL=registrarse.php'/></head><body></body></html>");
		    return;

			}
		}

	if($tipo_usuario == "") {
	   		?>
	   		<script type="text/javascript" language="javascript" >
			alert('Error: Debe de ingresar el Tipo de Usuario');
	 			</script>
				<?php
					echo ("Error: Debe de ingresar el Tipo de Usuario");
				  	echo ("<html><head><meta http-equiv='REFRESH' content='2;URL=registrarse.php'/></head><body></body></html>");
					return;
	   	}

  	if($usuario == ""){
		 ?>
			<script type="text/javascript" language="javascript" >
			alert('Error:Debe de ingresar su Indicador');
	 			</script>
				<?php
				  echo ("Error:Debe de ingresar su Indicador");
				  echo ("<html><head><meta http-equiv='REFRESH' content='2;URL=registrarse.php'/></head><body></body></html>");
		    return;
	}

	if($correo == ""){
		 ?>
			<script type="text/javascript" language="javascript" >
			alert('Error:Debe de ingresar su correo');
	 			</script>
				<?php
				 echo ("Error:Debe de ingresar su correo");
				  echo ("<html><head><meta http-equiv='REFRESH' content='2;URL=registrarse.php'/></head><body></body></html>");
		    return;

	}

	if($correo2 == ""){
		 ?>
			<script type="text/javascript" language="javascript" >
			alert('Error:Debe de ingresar su correo nuevamente');
	 			</script>
			<?php
			echo ("Error:Debe de ingresar su correo nuevamente");
				  echo ("<html><head><meta http-equiv='REFRESH' content='2;URL=registrarse.php'/></head><body></body></html>");
		  return;
	}else {
		if($correo2!=$correo) {

			?>
			<script type="text/javascript" language="javascript" >
			alert('Error:Los correos no coinciden');
	 			</script>
			<?php
			     echo ("Error:Los correos no coinciden");
				  echo ("<html><head><meta http-equiv='REFRESH' content='2;URL=registrarse.php'/></head><body></body></html>");
		  return;
			}
		}

	if($key == ""){
		?>
			<script type="text/javascript" language="javascript" >
			alert('Error:Ingrese su contraseña');
	 			</script>
			<?php
			     echo ("Error:Ingrese su contraseña");
				  echo ("<html><head><meta http-equiv='REFRESH' content='2;URL=registrarse.php'/></head><body></body></html>");
		  return;
	}

	if($key2 == ""){
		?>
			<script type="text/javascript" language="javascript" >
			alert('Error:Debe ingresar su contraseÃ±a nuevamente');
	 			</script>
			<?php
			     echo ("Error:Debe ingresar su contraseña nuevamente");
				  echo ("<html><head><meta http-equiv='REFRESH' content='2;URL=registrarse.php'/></head><body></body></html>");
		  return;
	}
	if($key2!=$key) {
			?>
			<script type="text/javascript" language="javascript" >
			alert('Error:Las contraseñas no coinciden');
	 			</script>
			<?php
			     echo ("Error:Las contraseñas no coinciden ");
				  echo ("<html><head><meta http-equiv='REFRESH' content='2;URL=registrarse.php'/></head><body></body></html>");
		  return;
	}




 //validar si el usuario, contraseña y el nombre  no contenga espacios en blanco      
	    if (substr_count($usuario,' '))
				{
						?><script>
						alert("El indicador tienen espacios en blanco vuelva a introducir");
						</script>
						<?php
   	        	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=../../index.php'/></head><body></body></html>");
	           	return;
				}
       if (substr_count($key,' '))
				{
						?><script>
						alert("La contraseña tienen espacios en blanco vuelva introducir");
						</script>
						<?php
   	        	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=../../index.php'/></head><body></body></html>");
	           	return;
				}


	$captcha=$_POST['captcha'];
	$captcha=strtoupper($captcha);


	    if (($captcha) != ($_SESSION['keycaptcha'])){
			?>
				<script type="text/javascript" language="javascript" >
				alert('Error: El codigo captcha es incorrecto');
	 			</script>
				<?php
				  echo ("Error:El codigo captcha es incoprrecto ");
				  echo ("<html><head><meta http-equiv='REFRESH' content='2;URL=registrarse.php'/></head><body></body></html>");

			return;
			}else
			{


			

			// se conecta a la base de datos
				require '../../php/conexion.php';
				$conexion=conexion();
//se pregunta si el correo existe
$estado=0;
 $result= mysql_query("SELECT * from  usuario where CORREO='$correo' and ESTADO='$estado'", $conexion);
		if ($rows=mysql_fetch_array($result))
	          {
			?>
				<script type="text/javascript" language="javascript" >
				alert('Error: El Correo ya Existe');
	 			</script>
				<?php
				  echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=registrarse.php'/></head><body></body></html>");
                                  
			return;

             }


// preguntar si existe el usuario en el la base datos
	   $estado=0;
        $result= mysql_query("SELECT * from  usuario where INDICADOR='$usuario'  and ESTADO='$estado'", $conexion);
		if ($rows=mysql_fetch_array($result))
	          {
			?>
				<script type="text/javascript" language="javascript" >
				alert('Error: El Usuario ya Existe');
	 			</script>
				<?php
				  echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=registrarse.php'/></head><body></body></html>");
                                  
			return;

             }
             
             
             
 //si el usuario esta un estado de eliminado            
            $estado=1;
        $result= mysql_query("SELECT * from  usuario where INDICADOR='$usuario'  and ESTADO='$estado'", $conexion);
		if ($rows=mysql_fetch_array($result))
        {
			
			 $usuario=strtoupper($usuario);
             $correo=strtoupper($correo);
             $nombre=strtoupper($nombre);
             $apellido=strtoupper($apellido);
			
			//registro del usuario
			$sql="UPDATE usuarios SET CEDULA='$cedula', NOMBRE='$nombre', APELLIDO='$apellido', CARNET='$carnet', CORREO='$correo', EXTENSION='$extension', TIPO_USUARIO='$tipo_usuario', CLAVE='$key', ESTADO='$estado_usuario' where INDICADOR='$usuario'";
            
			if (!mysql_query($sql,$conexion))
			{
							?>
						<script type="text/javascript" language="javascript" >
						alert("Error al insertar Registro");
			    		</script>
						<?php
						  mysql_close($conexion);
				        echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=registrarse.php'/></head><body></body></html>");
						return;
			}
			else
			{
				//creacion de variables de session
				$_SESSION['miid']=session_id();
				$_SESSION['minick']=$usuario;
				$session=$_SESSION['miid'];
	
			 	?>

			<script type="text/javascript" language="javascript" >
			
			alert('::::BIENVENIDO:::::');

			</script>
       	<?php
			   mysql_close($conexion);
				//la siguiente instruccion nos direcciona a la siguiente pagina
		   echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=../principal/contenido_principal.php'/></head><body></body></html>");
           return;
		}
			
		}   
           
           
           //si el usuario nunca existio se aplica el codigo subsiguiente
           
               
					
                $usuario=strtoupper($usuario);
                $correo=strtoupper($correo);
                $nombre=strtoupper($nombre);
                $apellido=strtoupper($apellido);

			//registro de los datos en la base de datos
                     $sql="insert into  usuario (CEDULA, NOMBRE, APELLIDO, CARNET, CORREO, EXTENSION, TIPO_USUARIO, CLAVE, ESTADO, INDICADOR)";
                     $sql.= "VALUES ('$cedula', '$nombre', '$apellido', '$carnet', '$correo', '$extension', '$tipo_usuario', '$key', '$estado_usuario', '$usuario')";


			if (!mysql_query($sql,$conexion))
			{
							?>
						<script type="text/javascript" language="javascript" >
						alert("Error al insertar Registro");
			    		</script>
						<?php
						  mysql_close($conexion);
				        echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=registrarse.php'/></head><body></body></html>");
						return;
			}
			else
			{
				//creacion de variables de session
				$_SESSION['miid']=session_id();
				$_SESSION['minick']=$usuario;
				$session=$_SESSION['miid'];
	
			 	?>

			<script type="text/javascript" language="javascript" >
			
			alert('::::BIENVENIDO:::::');

			</script>
       	<?php
				//la siguiente instruccion nos direcciona a la siguiente pagina
		   echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=../principal/contenido_principal.php'/></head><body></body></html>");

		   mysql_close($conexion);


			}


			mysql_close($conexion);

               

		}  //// fin del if de la validacion del captcha

return;
}
?>
