<?php
/*
 * autor: maria ruiz
 * descripcion: Aqui se modifican los datos del  usuario
 * modificar.php
 */


session_start();
require '../../php/classLogueo.php';
$valid=new validar();
if ($valid->comprobar())

{
//asignacion de variables
$nick=$_SESSION['minick'];
$nick_modificar=$_POST['id_usuario'];
$nombre=$_POST['nombre'];
$correo1=$_POST['correo1'];
$correo2=$_POST['correo2'];
$contrasena1=$_POST['contrasena_registro'];
$contrasena2=$_POST['contrasena_registro2'];
$captcha=$_POST['captcha'];


//validaciones de datos
if (($nick_modificar=="") && ($nombre=="") && ($correo1=="") && ($correo2=="") && ($contrasena1=="") && ($contrasena2=="") && ($captcha==""))
{?>

<script type="text/javascript" language="javascript" >
								alert('Error: No se selcciono nada');
								
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=modificar_usuario.php'/></head><body></body></html>");
	           	return;


}
if ($correo1!=$correo2){
?>

<script type="text/javascript" language="javascript" >
					alert('Error: Los correos Electronicos No Son Iguales');
								
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=modificar_usuario.php'/></head><body></body></html>");
	           	return;

}
  
if ($contrasena1!=$contrasena2){
?>

<script type="text/javascript" language="javascript" >
								alert('Error: Las contraseñas NO son Iguales');
								
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=modificar_usuario.php'/></head><body></body></html>");
	           	return;

}

if (($nick_modificar!="") && ($nombre!="") && ($correo1!="") && ($correo2!="") && ($contrasena1!="") && ($contrasena2!="") && ($captcha==""))
{
		?>
				<script type="text/javascript" language="javascript" >
				alert('Error: Falto Introducir el Codigo el cual es Obligatorio');
	 			</script>
				<?php
				  echo ("Error:El codigo captcha es incoprrecto ");
				  echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=modificar_usuario.php'/></head><body></body></html>");

			return;

}



$captcha=strtoupper($captcha);


 if (($captcha) != ($_SESSION['keycaptcha'])){
			?>
				<script type="text/javascript" language="javascript" >
				alert('Error: El Codigo es incorrecto');
	 			</script>
				<?php
				  echo ("Error:El codigo captcha es incoprrecto ");
				  echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=modificar_usuario.php'/></head><body></body></html>");

			return;
}
			






// se establece la conexion la base de datos
     require '../../php/conexion.php';
     $conexion=conexion();



if (($nick_modificar!="") && ($nombre=="") && ($correo1=="") && ($correo2=="") && ($contrasena1=="") && ($contrasena2=="") )
{

//modificacion de nick
$sql_modificar="UPDATE usuarios SET nick='$nick_modificar'where nick='$nick'";


if (!mysql_query($sql_modificar,$conexion))

    {?>
          <script type="text/javascript" language="javascript" >
								alert('Error: No se pudo Modificar Usuario');
								
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=modificar_usuario.php'/></head><body></body></html>");
	           	return;


    }else{?>

                                  <script type="text/javascript" language="javascript" >
								alert('Modificacion de Usuario Existosamente');
								
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=../../php/vacio.php'/></head><body></body></html>");
	           	return;
  }//fin de if de query


}//fin de if de nick



if (($nick_modificar=="") && ($nombre!="") && ($correo1=="") && ($correo2=="") && ($contrasena1=="") && ($contrasena2==""))

{


//modificacion de nombre
$sql_modificar="UPDATE usuarios SET nombre='$nombre' where nick='$nick'";


if (!mysql_query($sql_modificar,$conexion))

    {?>
          <script type="text/javascript" language="javascript" >
								alert('Error: No se pudo Modificar Usuario');
								
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=modificar_usuario.php'/></head><body></body></html>");
	           	return;


    }else{?>

                                  <script type="text/javascript" language="javascript" >
								alert('Modificacion de Usuario Existosamente');
								
					  </script>
	 					<?php
			// se modifica el nick de session
			  $_SESSION['minick']=$nick_modificar;

	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=../../php/vacio.php'/></head><body></body></html>");
	           	return;
  }//fin de if de query






}//fin de modificacion de nombre



if (($nick_modificar=="") && ($nombre=="") && ($correo1!="") && ($correo2!="") && ($contrasena1=="") && ($contrasena2==""))
{


//modificacion de nombre
$sql_modificar="UPDATE usuarios SET correo='$correo1' where nick='$nick'";


if (!mysql_query($sql_modificar,$conexion))

    {?>
          <script type="text/javascript" language="javascript" >
					alert('Error: No se pudo Modificar Usuario');
								
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=modificar_usuario.php'/></head><body></body></html>");
	           	return;


    }else{?>

                                  <script type="text/javascript" language="javascript" >
						alert('Modificacion de Usuario Existosamente');
								
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=../../php/vacio.php'/></head><body></body></html>");
	           	return;
  }//fin de if de query





}//fin de modificar correo


if (($nick_modificar=="") && ($nombre=="") && ($correo1=="") && ($correo2=="") && ($contrasena1!="") && ($contrasena2!=""))
{
//modificar contrasena


$sql_modificar="UPDATE usuarios SET clave='$contrasena1' where nick='$nick'";


if (!mysql_query($sql_modificar,$conexion))

    {?>
          <script type="text/javascript" language="javascript" >
					alert('Error: No se pudo Modificar Usuario');
								
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=modificar_usuario.php'/></head><body></body></html>");
	           	return;


    }else{?>

                                  <script type="text/javascript" language="javascript" >
						alert('Modificacion de Usuario Existosamente');
								
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=../../php/vacio.php'/></head><body></body></html>");
	           	return;
  }//fin de if de query





}//fin de modificar contraseña



if (($nick_modificar!="") && ($nombre!="") && ($correo1=="") && ($correo2=="") && ($contrasena1=="") && ($contrasena2==""))
{
//modificar usuario y nombre


$sql_modificar="UPDATE usuarios SET nick='$nick_modificar', nombre='$nombre' where nick='$nick'";


if (!mysql_query($sql_modificar,$conexion))

    {?>
          <script type="text/javascript" language="javascript" >
					alert('Error: No se pudo Modificar Usuario');
								
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=modificar_usuario.php'/></head><body></body></html>");
	           	return;


    }else{?>

                                  <script type="text/javascript" language="javascript" >
						alert('Modificacion de Usuario Existosamente');
								
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=../../php/vacio.php'/></head><body></body></html>");
	           	return;
  }//fin de if de query





}//fin de modificar nick y nombre


if (($nick_modificar!="") && ($nombre=="") && ($correo1!="") && ($correo2!="") && ($contrasena1=="") && ($contrasena2==""))
{
//modificar usuario y correo


$sql_modificar="UPDATE usuarios SET nick='$nick_modificar', correo='$correo1' where nick='$nick'";


if (!mysql_query($sql_modificar,$conexion))

    {?>
          <script type="text/javascript" language="javascript" >
					alert('Error: No se pudo Modificar Usuario');
								
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=modificar_usuario.php'/></head><body></body></html>");
	           	return;


    }else{?>

                                  <script type="text/javascript" language="javascript" >
						alert('Modificacion de Usuario Existosamente');
								
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=../../php/vacio.php'/></head><body></body></html>");
	           	return;
  }//fin de if de query





}//fin de modificar usuario y correo

if (($nick_modificar!="") && ($nombre=="") && ($correo1=="") && ($correo2=="") && ($contrasena1!="") && ($contrasena2!=""))
{
//modificar usuario y contraseña


$sql_modificar="UPDATE usuarios SET nick='$nick_modificar', clave='$contrasena1' where nick='$nick'";


if (!mysql_query($sql_modificar,$conexion))

    {?>
          <script type="text/javascript" language="javascript" >
					alert('Error: No se pudo Modificar Usuario');
								
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=modificar_usuario.php'/></head><body></body></html>");
	           	return;


    }else{?>

                                  <script type="text/javascript" language="javascript" >
						alert('Modificacion de Usuario Existosamente');
								
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=../../php/vacio.php'/></head><body></body></html>");
	           	return;
  }//fin de if de query





}//fin de modificar usuario y contraseña

if (($nick_modificar!="") && ($nombre!="") && ($correo1!="") && ($correo2!="") && ($contrasena1=="") && ($contrasena2==""))
{
//modificar usuario, nombre, correo


$sql_modificar="UPDATE usuarios SET nick='$nick_modificar', nombre='$nombre', correo='$correo1'  where nick='$nick'";


if (!mysql_query($sql_modificar,$conexion))

    {?>
          <script type="text/javascript" language="javascript" >
					alert('Error: No se pudo Modificar Usuario');
								
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=modificar_usuario.php'/></head><body></body></html>");
	           	return;


    }else{?>

                                  <script type="text/javascript" language="javascript" >
						alert('Modificacion de Usuario Existosamente');
								
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=../../php/vacio.php'/></head><body></body></html>");
	           	return;
  }//fin de if de query





}//fin de modificar usuario,nombre y correo



if (($nick_modificar!="") && ($nombre!="") && ($correo1=="") && ($correo2=="") && ($contrasena1!="") && ($contrasena2!=""))
{
//modificar usuario, nombre y contraseña


$sql_modificar="UPDATE usuarios SET nick='$nick_modificar', nombre='$nombre', clave='$contrasena1' where nick='$nick'";


if (!mysql_query($sql_modificar,$conexion))

    {?>
          <script type="text/javascript" language="javascript" >
					alert('Error: No se pudo Modificar Usuario');
								
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=modificar_usuario.php'/></head><body></body></html>");
	           	return;


    }else{?>

                                  <script type="text/javascript" language="javascript" >
						alert('Modificacion de Usuario Existosamente');
								
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=../../php/vacio.php'/></head><body></body></html>");
	           	return;
  }//fin de if de query





}//fin de modificar usuario, contraseña y nombre

if (($nick_modificar!="") && ($nombre=="") && ($correo1!="") && ($correo2!="") && ($contrasena1!="") && ($contrasena2!=""))
{
//modificar usuario, correo y contraseña


$sql_modificar="UPDATE usuarios SET nick='$nick_modificar', correo='$correo1', clave='$contrasena1' where nick='$nick'";


if (!mysql_query($sql_modificar,$conexion))

    {?>
          <script type="text/javascript" language="javascript" >
					alert('Error: No se pudo Modificar Usuario');
								
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=modificar_usuario.php'/></head><body></body></html>");
	           	return;


    }else{?>

                                  <script type="text/javascript" language="javascript" >
						alert('Modificacion de Usuario Existosamente');
								
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=../../php/vacio.php'/></head><body></body></html>");
	           	return;
  }//fin de if de query





}//fin de modificar usuario, contraseña y correo

if (($nick_modificar!="") && ($nombre!="") && ($correo1!="") && ($correo2!="") && ($contrasena1!="") && ($contrasena2!=""))
{
//modificar usuario, nombre ,correo,  contraseña


$sql_modificar="UPDATE usuarios SET nick='$nick_modificar', nombre='$nombre', correo='$correo1', clave='$contrasena1' where nick='$nick'";


if (!mysql_query($sql_modificar,$conexion))

    {?>
          <script type="text/javascript" language="javascript" >
					alert('Error: No se pudo Modificar Usuario');
								
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=modificar_usuario.php'/></head><body></body></html>");
	           	return;


    }else{?>

                                  <script type="text/javascript" language="javascript" >
						alert('Modificacion de Usuario Existosamente');
								
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=../../php/vacio.php'/></head><body></body></html>");
	           	return;
  }//fin de if de query





}//fin de modificar usuario, contraseña, nombre y correo


if (($nick_modificar=="") && ($nombre!="") && ($correo1!="") && ($correo2!="") && ($contrasena1=="") && ($contrasena2==""))
{
//modificar nombre y correo


$sql_modificar="UPDATE usuarios SET nombre='$nombre', correo='$correo1' where nick='$nick'";


if (!mysql_query($sql_modificar,$conexion))

    {?>
          <script type="text/javascript" language="javascript" >
					alert('Error: No se pudo Modificar Usuario');
								
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=modificar_usuario.php'/></head><body></body></html>");
	           	return;


    }else{?>

                                  <script type="text/javascript" language="javascript" >
						alert('Modificacion de Usuario Existosamente');
								
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=../../php/vacio.php'/></head><body></body></html>");
	           	return;
  }//fin de if de query





}//fin de modificar nombre, correo

if (($nick_modificar=="") && ($nombre!="") && ($correo1=="") && ($correo2=="") && ($contrasena1!="") && ($contrasena2!=""))
{
//modificar nombre y contraseña


$sql_modificar="UPDATE usuarios SET nombre='$nombre',  clave='$contrasena1' where nick='$nick'";


if (!mysql_query($sql_modificar,$conexion))

    {?>
          <script type="text/javascript" language="javascript" >
					alert('Error: No se pudo Modificar Usuario');
								
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=modificar_usuario.php'/></head><body></body></html>");
	           	return;


    }else{?>

                                  <script type="text/javascript" language="javascript" >
						alert('Modificacion de Usuario Existosamente');
								
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=../../php/vacio.php'/></head><body></body></html>");
	           	return;
  }//fin de if de query





}//fin de modificar  contraseña y nombre


if (($nick_modificar=="") && ($nombre!="") && ($correo1!="") && ($correo2!="") && ($contrasena1!="") && ($contrasena2!=""))
{
//modificar correo,  nombre y contraseña


$sql_modificar="UPDATE usuarios SET nombre='$nombre', correo='$correo1', clave='$contrasena1' where nick='$nick'";


if (!mysql_query($sql_modificar,$conexion))

    {?>
          <script type="text/javascript" language="javascript" >
					alert('Error: No se pudo Modificar Usuario');
								
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=modificar_usuario.php'/></head><body></body></html>");
	           	return;


    }else{?>

                                  <script type="text/javascript" language="javascript" >
						alert('Modificacion de Usuario Existosamente');
								
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=../../php/vacio.php'/></head><body></body></html>");
	           	return;
  }//fin de if de query





}//fin de modificar  contraseña , nombre, correo


if (($nick_modificar=="") && ($nombre=="") && ($correo1!="") && ($correo2!="") && ($contrasena1!="") && ($contrasena2!=""))
{
//modificar correo y contraseña


$sql_modificar="UPDATE usuarios SET correo='$correo1', clave='$contrasena1' where nick='$nick'";


if (!mysql_query($sql_modificar,$conexion))

    {?>
          <script type="text/javascript" language="javascript" >
					alert('Error: No se pudo Modificar Usuario');
								
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=modificar_usuario.php'/></head><body></body></html>");
	           	return;


    }else{?>

                                  <script type="text/javascript" language="javascript" >
						alert('Modificacion de Usuario Existosamente');
								
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=../../php/vacio.php'/></head><body></body></html>");
	           	return;
  }//fin de if de query





}//fin de modificar  contraseña y correo



} //fin de validacion de session
?>
