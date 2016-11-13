<?php
/*
 * descripcion: aqui se elimina de la base de datos el repuesto
 */



////iniciamos sesion
session_start();

require '../../php/classLogueo.php';
$valid=new validar();
if ($valid->comprobar()){


$user=$_SESSION['user_session'];


  // se establece la conexion la base de datos
     require '../../php/conexion.php';
     $conexion=conexion();

  
  

 
 //sql para la eliminacion del producto del inventario
 $estado=1;
 $sql= "UPDATE `usuario`  SET ESTADO='$estado' WHERE INDICADOR='$user'";
     
     
   $error=0;  
    //Se desactiva el usuario DE LA TABLA DE USUARIO y se registra la elimancion en la tabla de user_del
   if (!mysql_query($sql,$conexion))
   {
    $error=1;
    }


    if ($error==1){
         echo "<table align='center' style='margin-top:40px;'> 
		<tr>
			<td> <span style='color:red;'>Error: Falla al Eliminar Usuario </span></td>
		</tr>
		<tr><td><span style='color:red;'>Volviendo Atras .....</span></td>
		</tr>
		 </table>";
 
 echo ("<html><head><meta http-equiv='REFRESH' content='2;URL=lista_usuarios.php'/></head><body></body></html>");
 return;

    }else{

     echo "<table align='center' style='margin-top:40px;'> 
		<tr>
			<td> <span style='color:red;'>Eliminacion de Usuario Existosamente</span></td>
		</tr>
		<tr><td><span style='color:red;'>Volviendo Atras .....</span></td>
		</tr>
		 </table>";
 
 echo ("<html><head><meta http-equiv='REFRESH' content='2;URL=lista_usuarios.php'/></head><body></body></html>");
 return;


   }
    
     
    
   



 }


?>
