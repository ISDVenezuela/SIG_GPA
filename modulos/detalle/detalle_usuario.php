<?php 

//descripcion: aqui se muestra los datos del usuario 

session_start();
require '../../php/classLogueo.php';
$valid=new validar();
if ($valid->comprobar()){
?>


<html>  
<head>
    <link rel="stylesheet" title="Principal-Aplicaciones" type="text/css" href="../../css/main-aplicacion.css" />
</head> 

<body> 
    
    <?php
	//conexion a la base de datos				                                            
    require '../../php/conexion.php';
	$conexion=conexion();
    //consulta a la base de datos		
	$user=$_GET['usuario'];				
    $sql_inventario = "SELECT * FROM `usuario` where INDICADOR='$user'";
    $result_inventario=mysql_query($sql_inventario,$conexion);
    if ($row=mysql_fetch_array($result_inventario)) {           ?>
        <span class='Titulo-Aplicacion'>Usuario</span>
        <span class='Separador_Modulo'></span>
        <span class="Sub-Titulo-Aplicacion"> Datos De Usuario</span>
        <div class='Tabla-Aplicacion'>
            <!-- se imprime lo encontrado en la base de datos -->
            <table><tr><div>
                <td><div class='Tabla-Elemento-Encabezado' style="width:230px; height:50px;">Indicador</div></td>
                <td><div class='Tabla-Elemento' style="width:230px; height:50px;"><?php echo $row["INDICADOR"]?></div></td>
            </tr>
            <tr> 
                <td><div class='Tabla-Elemento-Encabezado' style="width:230px; height:50px;">Nombre </div></td>
				<td><div class='Tabla-Elemento' style="width:230px; height:50px;"><?php echo $row["NOMBRE"] ?></div></td> 
            </tr>
            <tr> 
                <td><div class='Tabla-Elemento-Encabezado' style="width:230px; height:50px;">Apellido </div></td>
                <td><div class='Tabla-Elemento' style="width:230px; height:50px;"><?php echo $row["APELLIDO"] ?></div></td> 
            </tr>
            <tr> 
                <td><div class='Tabla-Elemento-Encabezado' style="width:230px; height:50px;">Cedula </div></td>
                <td><div class='Tabla-Elemento' style="width:230px; height:50px;"><?php echo $row["CEDULA"] ?></div></td> 
            </tr>
            <tr> 
                <td><div class='Tabla-Elemento-Encabezado' style="width:230px; height:50px;">Carnet </div></td>
                <td><div class='Tabla-Elemento' style="width:230px; height:50px;"><?php echo $row["CARNET"] ?></div></td> 
            </tr>
			<tr>                                                    
                <td><div class='Tabla-Elemento-Encabezado' style="width:230px; height:50px;">Correo</div></td>
                <td><div class='Tabla-Elemento' style="width:230px; height:50px;"><?php echo $row["CORREO"] ?></div></td>
            </tr>
            <tr> 
                <td><div class='Tabla-Elemento-Encabezado' style="width:230px; height:50px;">Extension </div></td>
                <td><div class='Tabla-Elemento' style="width:230px; height:50px;"><?php echo $row["EXTENSION"] ?></div></td> 
            </tr>
            <tr> 
                <td><div class='Tabla-Elemento-Encabezado' style="width:230px; height:50px;">Tipo Usuario </div></td>
                <?php
                    if (($row["TIPO_USUARIO"]==1)) {
                        $Tipo_Usuario="Superintendente";
                    } elseif (($row["TIPO_USUARIO"]==2)) {
                        $Tipo_Usuario="Analista";
                    }
                ?>
                <td><div class='Tabla-Elemento' style="width:230px; height:50px;"><?php echo $Tipo_Usuario ?></div></td> 
            </tr>
            </table> 
            <?php mysql_close($conexion);
    } else {?>
        <script type="text/javascript" language="javascript" >
		  alert('Error:El Usuario NO Existe,  Fue Eliminado ');
		</script>
		<?php
		echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=../movimientos/movimientos.php'/></head><body></body></html>");
		mysql_close($conexion);
		return;
    }
        ?>
        </div>
</body>
</html>
<?php
 } //fin 
?>










