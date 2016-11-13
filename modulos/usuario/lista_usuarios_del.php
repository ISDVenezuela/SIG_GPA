<?php 

//autor:maria ruiz
//descripcion: aqui se muestran los usuarios del sistema que fueron o han sido eliminados

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
                                            $sql_usuario = "SELECT * FROM `user_del`";
                                          
                                            $result_usuario=mysql_query($sql_usuario,$conexion);
                                            if ($row=mysql_fetch_array($result_usuario))
                                            {
												                                      	
                                            	
                                            	?>
                                                <span class='Titulo-Aplicacion'>Usuarios Eliminados</span>
                                                <span class='Separador_Modulo'></span>
                                                <div class='Tabla-Aplicacion'>
                                             <table>
						<tr>
						  <td><a  href="xls_usuarios_del.php" class="Contenedor-Texto-Menu"><span class="Text-menu"> Exportar a Excel </span><img src="../../imagenes/excel.jpg" width="30" height="30" alt="" /> </a></td>
						  </tr>
					    </table>
                                                    <!-- se imprime lo encontrado en la base de datos -->

                                                    
                                                    <table id="tabla">
                                                     <thead><tr>
                                                     <th><div class='Tabla-Elemento-Encabezado'>Nick</div></th>
                                                     <th><div class='Tabla-Elemento-Encabezado'>Fecha</div></th>
                                                     </tr></thead> <tbody>
                                                <?php do {
														                                            	
																$user=$row["nick"];
												                   ?>
												                     <tr>
												                     <td><div class='Tabla-Elemento' style="height:20px;"><?php echo "<a href='../detalle/detalle_usuario.php?usuario=$user'>"?> <?php echo $row["nick"]?></a></div></td>
												                     <td><div class='Tabla-Elemento' style="height:20px;"><?php echo $row["fecha"] ?></div></td>
											     		              </tr>
												                    <?php
												                   
												                                                           
                                               } while ($row=mysql_fetch_array($result_usuario));
                                               ?>	
					       </tbody>
                                               </table> <?php
                                             } else {
                                                    echo "¡ No existen Usuarios Eliminados!";
                                              }


                                        ?>

                                                </div>
                                               
                                                 		
                                                </body>
    </html>
<?php
 } //fin 
?>
