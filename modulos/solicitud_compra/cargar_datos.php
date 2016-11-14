<?php
/*
autor: Maria de los Angeles Ruiz Fernandez
descripcion: aqui llegan los datos de cargar_inventario.php y se evaluan si cumplen con las validaciones correspondientes
				se insertan los datos en la base de datos si no existe de existir se envia al usuario a otro php
				para que actualice el repuesto	            
            
*/			
session_start();
require '../../php/classLogueo.php';
$valid=new validar();
if ($valid->comprobar()){
	
extract($_POST);


    //asignacion de variables

    $sap=$_POST['sap'];
    $manu=$_POST['manufacturer'];
    $fabricante=$_POST['fabricante'];
    $descripcion=$_POST['descripcion'];
    $modelo=$_POST['modelo'];
    $cant=$_POST['cantidad'];
   
		
	// se pasa mayuscula la descripcion, el modelo  y el fabricante 
    $modelo=strtoupper($modelo);
    $sap=strtoupper($sap);
    $descripcion=strtoupper($descripcion);


  
    
       
//Acontinuacion se presenta la validacion de los campos       
       
        	
        	
        	if (($manu!="") && ($fabricante!="---Seleccione---"))
        	{?>
        	<script type="text/javascript" language="javascript" >
								alert('Error: Solo puede escribir el fabricante en el CUADRO de TEXTO Ó Elegir UNO de la LISTA');
								document.form4.item.focus();
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=cargado_manual.php'/></head><body></body></html>");
	           	return;
        	
		    }
		    
		      	
        	
        	
   	
	           
	           

                     if ($descripcion==''){
		            ?>
						<script type="text/javascript" language="javascript" >
								alert('Error: Hace falta la descripcion de la pieza');
								document.form4.descripcion.focus();
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=cargado_manual.php'/></head><body></body></html>");
	           	return;
	           }
                     if ($modelo==''){
		            ?>
						<script type="text/javascript" language="javascript" >
								alert('Error: Hace falta el modelo del Repuesto ');
								document.form4.modelo.focus();
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=cargado_manual.php'/></head><body></body></html>");
	           	return;
	           }
                     if ($cant=='')
                     {
                           ?>
			<script type="text/javascript" language="javascript" >
				alert('Error: Ingrese la cantidad del repuesto');
		                	document.form.cantidad.focus();
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=cargado_manual.php'/></head><body></body></html>");
	           	return;
	           }
              
              
              
               $patron="/^[[:digit:]]+$/";
                          
              
              if (!(preg_match($patron, $cant)))
                       {
                         ?>
			<script type="text/javascript" language="javascript" >
				alert('Error: La Cantidad No esta Expresada en Datos Numericos enteros positivos');
		                	document.form.cantidad.focus();
					  </script>
	 					<?php
	           	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=cargado_manual.php'/></head><body></body></html>");
	           	return;

              }
              
              
              
              
              //validar si el usuario, contraseña y el nombre  no contenga espacios en blanco      
	    if (substr_count($modelo,' '))
				{
						?><script>
						alert("Error:Modelo tienen espacios en blanco vuelva a introducir");
						</script>
						<?php
   	        	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=cargado_manual.php'/></head><body></body></html>");
	           	return;
				}
       if (substr_count($sap,' '))
				{
						?><script>
						alert("Error: Codigo SAP tiene  espacios en blanco vuelva a introducir ");
						</script>
						<?php
   	        	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=cargado_manual.php'/></head><body></body></html>");
	           	return;
				}













 if (($fabricante!="---Seleccione---") && $manu==""){
				
				$manu=$fabricante;
				
	}elseif (($fabricante=="---Seleccione---") && $manu!=""){

                $manu=strtoupper($manu); 
  }











  
    //se crean variable de sesion con los datos proporcionados por el usuario, las mismas se usaran en caso de que tenga
    //que ir a otra pagina y llevarnos las variables
    
    	$_SESSION['sap_session']=$sap;
    	$_SESSION['manu_session']=$manu;
    	$_SESSION['sap_session']=$sap;
    	$_SESSION['descripcion_session']=$descripcion;
    	$_SESSION['modelo_session']=$modelo;
        






      
      
       // se sube la foto del usuario al servidor			
					require '../../php/subir_imagen.php'; 
					subir();
			// se asigna la direccion a de la foto a $mifoto y la miniatura a $minifoto
					$mifoto=$_SESSION['foto'];
					$minifoto=$_SESSION['miniatura'];

   
   // se establece la conexion la base de datos
     require '../../php/conexion.php';
     $conexion=conexion();


	// se hace una consulta sql al la base de datos para saber si existe el repuesto

//si el estado del repuesto es existente
 $estado=0;
$result= mysql_query("SELECT * from  repuestos where modelo='$modelo' and estado='$estado' ", $conexion);
if ($rows=mysql_fetch_array($result))
{
	
	 ?>
       <script type="text/javascript" language="javascript" >
            alert('Error: El Modelo ya existe en la base de datos');

            </script>
    <?php
	
	
	
 echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=cargado_manual.php'/></head><body></body></html>");
 return;
	    
     
}

//se consulta si el codigo sap ya existe

$result_sap=mysql_query("SELECT * from repuestos where item='$sap' ",$conexion);
if ($row=mysql_fetch_array($result_sap)){
		if ($row["item"]!=""){
	
	 ?>
       <script type="text/javascript" language="javascript" >
            alert('Error: El Codigo SAP ya existe en la base de datos');

            </script>
    <?php
	
	
 echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=cargado_manual.php'/></head><body></body></html>");
 return;
         }
 }



//si ya existe pero su estado es eliminado 
$estado=1;
$result= mysql_query("SELECT * from  repuestos where modelo='$modelo' and estado='$estado' ", $conexion);
if ($rows=mysql_fetch_array($result))
{
	

//aqui se busca el directorio donde estaba la antigua foto y se elimina

$directorio="";
$sql_borrar = "SELECT * FROM repuestos where modelo='$modelo'";
$result=mysql_query($sql_borrar,$conexion);
if ($row=mysql_fetch_array($result))
{
  $directorio=$row['foto'];
 if ($directorio!="../../imagenes/repuesto.jpg"){
 
  $i=strrpos($directorio, "/");
  $i++;
  $cadenanueva=substr($directorio,0,$i);   
 
 

	
  require "../../php/borrar.php";  
  eliminarDir("../../$cadenanueva");
  }

}
//se actualiza la tabla repuesto
$estado=0;
$sql="UPDATE repuestos SET item='$sap', Manufacturer_Name='$manu', descripcion='$descripcion', foto='$mifoto', miniatura='$miniatura', estado='$estado' where modelo='$modelo'";

//se registra en la tabla del inventario
  $sql2="insert into  inventario (modelo,cantidad) VALUES ('$modelo','$cant')";


     $referencia=$_SESSION['minick'];
     $motivo="Cargado de Datos";
     $fecha=date("Y-m-d");
     
     //sql para registrar el movimiento del usuario
     $sql3="insert into movimientos (modelo,cantidad,fecha,referencia,motivo) VALUES ('$modelo','$cant','$fecha','$referencia','$motivo')";

  
 
                             
  //esta variable servira de bandera para decir si existio o no un error de ser 1 es q hubo
     $error=0;

 // SE ACTUALIZA LA TABLA  DE REPUESTOS
    if (!mysql_query($sql,$conexion) )
     {
         $error=1;

    }
     //SE ACTUALIZA LA TABLA DE INVENTARIO
   if (!mysql_query($sql2,$conexion))

    {
          $error=1;

    }

 	//SE INSERTA LA TABLA DE MOVIMIENTO
   if (!mysql_query($sql3,$conexion))

    {
          $error=1;

    }

	// se pregunta si existio un error
	if ($error==1){					
	mysql_close($conexion);
     ?>
	<script type="text/javascript" language="javascript" >
			alert('Error: Falla al Guardar los Datos ');
	</script>
	 <?php
	     echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=cargado_manual.php'/></head><body></body></html>");
	 	 return;
    }else{
   	 mysql_close($conexion);
     ?>
     <script type="text/javascript" language="javascript" >
			alert('Guardado de Datos Existosamente ');
	 </script>
	 <?php
	  	echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=cargado_manual.php'/></head><body></body></html>");
       return;
      }
}//fin de cargado de datos cuando ya existe el repuesto pero su estado es de eliminado

                                 // por no existir se carga los datos en la tabla de repuestos

                                 //sql para insertar los datos en la tabla de repuestos
                                 

									
									  
                             $sql="insert into  inventario (modelo,cantidad) VALUES ('$modelo','$cant')";
                             $sql2="insert into  repuestos (modelo,item,Manufacturer_Name,descripcion,foto,miniatura) VALUES ('$modelo','$sap','$manu','$descripcion','$mifoto','$minifoto')";
                             
										/*acontinuacion se realiza el sql que guaradar en la tabla de movimientos lo que el usuario esta haciendo*/                             
                             //obtenemos la fecha
                             $fecha=date("Y-m-d");
                             $referencia=$_SESSION['minick'];
                             $motivo="Cargado de Datos";
                             $sql3="insert into movimientos (modelo,cantidad,fecha,referencia,motivo) VALUES ('$modelo','$cant','$fecha','$referencia','$motivo')";
                            
                            
                            //esta variable servira de bandera para decir si existio o no un error de ser 1 es q hubo 
                            $error=0;
                            
                            // SE INSERTA EN LA TABLA DE INVENTARIO
                             if (!mysql_query($sql,$conexion))

                                {
                                                        $error=1;
                                                       
                                }
                                
							// SE INSERTA EN LA TABLA DE REPUESTOS
                             if (!mysql_query($sql2,$conexion) )
                               {
                                $error=1;

                                }
                                
                                // se registra en la tabla de movimientos lo que ha hecho el usuario 
                                if (!mysql_query($sql3,$conexion) )
                               {
                                         $error=1;
                                }
                                
										// se pregunta si existio un error
										if ($error==1){					
										mysql_close($conexion);
                                ?>
											<script type="text/javascript" language="javascript" >
											alert('Error: Falla al Guardar los Datos ');
							
							  				</script>
	 									<?php
	 	          					echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=cargado_manual.php'/></head><body></body></html>");
	 	          					return;

                               }else{
                               	
                               	 mysql_close($conexion);
                                ?>
											<script type="text/javascript" language="javascript" >
											alert('Guardado de Datos Existosamente ');
							
							  				</script>
	 									<?php
	 	          					echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=cargado_manual.php'/></head><body></body></html>");
                               	
                               	}
    
}
?>
