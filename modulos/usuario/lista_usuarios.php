<?php 

//autor:maria ruiz
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
                                            $sql_usuario = "SELECT * FROM `usuarios`";
                                          
                                            $result_usuario=mysql_query($sql_usuario,$conexion);
                                            if ($row=mysql_fetch_array($result_usuario))
                                            {
												                                      	
                                            	
                                            	?>
                                                <span class='Titulo-Aplicacion'>Administrar Usuarios</span>
                                                <span class='Separador_Modulo'></span>
                                                <div class='Tabla-Aplicacion'>
                                             <table>
						<tr>
						  <td><a  href="xls_usuarios.php" class="Contenedor-Texto-Menu"><span class="Text-menu"> Exportar a Excel </span><img src="../../imagenes/excel.jpg" width="30" height="30" alt="" /> </a></td>
						  <?php if ($_SESSION['minick']=="root")  {?>
						  <td><a  href="lista_usuarios_del.php" class="Contenedor-Texto-Menu"><span class="Text-menu"> Usuarios Eliminados </span><img src="../../imagenes/papelera.jpg" width="30" height="30" alt="" /> </a></td>
						  <?php }?>
						  </tr>
					    </table>
                                                    <!-- se imprime lo encontrado en la base de datos -->

                                                    
                                                    <table id="tabla">
                                                     <thead><tr>
                                                     <th><div class='Tabla-Elemento-Encabezado'>Nick</div></th>
                                                     <th><div class='Tabla-Elemento-Encabezado'>Nombre </div></th>
                                                     <th><div class='Tabla-Elemento-Encabezado' style="width:230px; ">Correo</div></th>
                                                     <th><div class='Tabla-Elemento-Encabezado-opera' style="width:70px;" >Eliminar</div></th>
                                                    </tr></thead> <tbody>
                                                <?php do {
															if (($row["nick"]!="Administrador") && ($row["nick"]!="ROOT") && ($row["estado"]!=1) ){
														
                                                	                                               	
																$user=$row["nick"];
												                   ?>
												                     <tr>
												                     <td><div class='Tabla-Elemento' style="height:20px;"><?php echo "<a href='../detalle/detalle_usuario.php?usuario=$user'>"?> <?php echo $row["nick"]?></a></div></td>
												                     <td><div class='Tabla-Elemento' style="height:20px;"><?php echo $row["nombre"] ?></div></td>
											     		    	     <td><div class='Tabla-Elemento' style="width:230px; height:20px;"><?php echo $row["correo"] ?></div></td>
														     <td><div class='Tabla-Elemento-opera' style="height:20px;" ><?php echo "<a href='eliminacion_usuario.php?user=$user'>"?><div align="center"></div><img src="../../imagenes/papelera.jpg" width="30px"  height="20px" alt="eliminar" ></div> </a></div></td>
												                     </tr>
												                    <?php
												                    }//fin de if de validar que no se imprima los datos del administrador
												                                                           
                                               } while ($row=mysql_fetch_array($result_usuario));
                                               ?>	
					       </tbody>
                                               </table> <?php
                                             } else {
                                                    echo "¡ La base de datos está vacia !";
                                              }


                                        ?>

                                                </div>
                                               
                                                 		
                                                </body>
    </html>
<?php
 } //fin 
?>
