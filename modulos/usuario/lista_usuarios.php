<?php 

//descripcion: aqui se muestran los usuarios del sistema

session_start();
require '../../php/classLogueo.php';
$valid=new validar();
if ($valid->comprobar()){
?>


<html>  
<head>
    <link rel="stylesheet" title="Principal-Aplicaciones" type="text/css" href="../../css/main-aplicacion.css" />
      	<script type="text/javascript" language="javascript" src="../../js/jquery.js"></script> 
        <script type="text/javascript" language="javascript" src="../../js/dataTables.js"></script>
		
		<script type="text/javascript" charset="utf-8"> 
			jQuery.fn.dataTableExt.aTypes.push(
				function ( sData ) {
					return 'html';
				}
			);
			
			$(document).ready(function() {
				$('#tabla').dataTable();
			} );
		</script>    
    
    
</head> 

<body> 
    
    <?php
    //conexion a la base de datos				                                            
        require '../../php/conexion.php';
	    $conexion=conexion();
      	//consulta a la base de datos
        $sql_usuario = "SELECT * FROM `usuario`";                                          
        $result_usuario=mysql_query($sql_usuario,$conexion);
        if ($row=mysql_fetch_array($result_usuario)) {              ?>
            <span class='Titulo-Aplicacion'>Administrar Usuarios</span>
            <span class='Separador_Modulo'></span>
            <div class='Tabla-Aplicacion'>
            <!-- se imprime lo encontrado en la base de datos -->
                <table id="tabla">
                    <thead><tr>
                        <th><div class='Tabla-Elemento-Encabezado'>Indicador</div></th>
                        <th><div class='Tabla-Elemento-Encabezado'>Nombre </div></th>
                        <th><div class='Tabla-Elemento-Encabezado'>Apellido </div></th>
                        <th><div class='Tabla-Elemento-Encabezado' style="width:230px; ">Correo</div></th>
                        <th><div class='Tabla-Elemento-Encabezado-opera' style="width:70px;" >Eliminar</div></th>
                    </tr></thead>
                    <tbody>
                        <?php 
                        do {
							if (($row["INDICADOR"]!="ADMIN") && ($row["ESTADO"]!=1) ){
								$user=$row["INDICADOR"];                ?>
								<tr>
									<td><div class='Tabla-Elemento' style="height:20px;"><?php echo "<a href='../detalle/detalle_usuario.php?usuario=$user'>"?> <?php echo $row["INDICADOR"]?></a></div></td>
									<td><div class='Tabla-Elemento' style="height:20px;"><?php echo $row["NOMBRE"] ?></div></td>
                                    <td><div class='Tabla-Elemento' style="height:20px;"><?php echo $row["APELLIDO"] ?></div></td>
									<td><div class='Tabla-Elemento' style="width:230px; height:20px;"><?php echo $row["CORREO"] ?></div></td>
									<td><div class='Tabla-Elemento-opera' style="height:20px;" ><?php echo "<a href='eliminacion_usuario.php?user=$user'>"?>
                                        <div align="center"><img src="../../imagenes/sacar.jpg" width="20px"  height="20px" alt="eliminar" ></div></div> </a></div></td>
								</tr>
							<?php       
                            }//fin de if de validar que no se imprima los datos del administrador
						} while ($row=mysql_fetch_array($result_usuario));
                        ?>	
					</tbody>
                </table> <?php
        } else {
            echo "¡ La base de datos está vacia !";
        }               ?>
            </div>
                                               
                                                 		
</body>
</html>
<?php
 } //fin 
?>
