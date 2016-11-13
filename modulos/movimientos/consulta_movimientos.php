<?php 

//descripcion: aqui se muestra los movimientos de los usuarios de acuerdo ala fecha introducida por el usuario

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
														
				//se asignan las variables que vienen del formulario, son las variables de las fechas
				extract($_POST);														
				$fecha_desde=$_POST['desde'];
				$fecha_hasta=$_POST['hasta'];
				if ($fecha_desde>$fecha_hasta)							
				{?>
                                      <script type="text/javascript" language="javascript" >
						      alert('Error:La fecha desde es mayor a la fecha hasta, modifique la fecha por favor');
						    </script>
						    <?php
						      echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=movimientos.php'/></head><body></body></html>");
				             return;

                               	}else{									
															//conexion a la base de datos				                                            
                                            require '../../php/conexion.php';
				                                  $conexion=conexion();

													//consulta a la base de datos
										    
                                            $sql_movimiento ="SELECT * FROM solicitud_compra WHERE FECHA>= '$fecha_desde' and fecha <='$fecha_hasta'"; 
                                            $result_movimiento=mysql_query($sql_movimiento,$conexion);
                                            if ($row=mysql_fetch_array($result_movimiento))
                                            {?>
                                                <span class='Titulo-Aplicacion'>Movimientos</span>
                                                <span class='Separador_Modulo'></span>
                                                <div class='Tabla-Aplicacion'>
					<table>		
		    			     <tr>
                                              <td> <a  href="xls_movimientos.php?desde=<?php echo $fecha_desde;?> &hasta=<?php echo $fecha_hasta;?> " class="Contenedor-Texto-Menu"><span class="Text-menu"> Exportar a Excel </span><img src="../../imagenes/excel.jpg" width="30" height="30" alt="" /> </a></td>
                                             <td><a  href="movimientos.php" class="Contenedor-Texto-Menu"><span class="Text-menu">Volver a Introducir Fecha de Consulta </span></a></td>		                              
                                          </tr>    
                                         </table>
                                              <!-- se imprime lo encontrado en la base de datos -->
                                                <table id="tabla"><thead><tr><div>
													 <td><div class='Tabla-Elemento-Encabezado'># Movimiento</div></td>
                                                     <td><div class='Tabla-Elemento-Encabezado'>Modelo</div></td>
                                                     <td><div class='Tabla-Elemento-Encabezado'>Cantidad </div></td>
                                                     <td><div class='Tabla-Elemento-Encabezado'>Fecha</div></td>
                                                     <td><div class='Tabla-Elemento-Encabezado' >Usuario</div></td>
                                                     <td><div class='Tabla-Elemento-Encabezado'>Motivo</div></td>
                                                    </div></tr></thead><tbody>
                                                <?php do {
                                                	

                                                        $modelo=$row["modelo"];
                                                	$user=$row["referencia"];
                                                        $motivo=$row["motivo"];
							$fecha=$row["fecha"];    
                                                    ?>
                                                    	
                                                     <tr><div>
													<td><div class='Tabla-Elemento' style="height:20px;"><?php echo $row["numero"];?></div></td>	 
                                                    <td><div class='Tabla-Elemento' style="height:20px;"><?php echo $row["modelo"];?></div></td>
                                                     <td><div class='Tabla-Elemento' style="height:20px;"><?php echo $row["cantidad"]; ?></div></td>
                                                     <td><div class='Tabla-Elemento' style="height:20px;"><?php echo $row["fecha"]; ?></div></td>
                                                     <td><div class='Tabla-Elemento' style="height:20px;"><?php echo "<a href='../detalle/detalle_usuario.php?usuario=$user'>";?><?php echo $row["referencia"]?></a></div></td>
                                                     <td><div class='Tabla-Elemento' style="height:20px;"><?php  echo "<a href='motivos.php?modelo=$modelo &fecha=$fecha &motivo=$motivo  '>............</a>";?></div></td>
                                                     </div></tr>
                                                    <?php
                                               } while ($row=mysql_fetch_array($result_movimiento));
                                               ?></tbody></table> <?php
                                             } else {
                                                    echo "¡NO hay Movimientos en este rango de Fechas !";
                                              }

					}									
                                        ?>
                                        				
                                                </div>
                                                
                                                </body>
    </html>
<?php
 } //fin 
?>
