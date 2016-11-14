<?php 
// Descripcion: el usuario aqui se le presenta un formulario donde el mismo ingresara un repuesto nuevo de forma manual 

session_start();
require '../../php/classLogueo.php';
$valid=new validar();
if ($valid->comprobar()){
?>


<html>  
<head>
    <link rel="stylesheet" title="Principal-Aplicaciones" type="text/css" href="../../css/main-aplicacion.css" />
    <script type="text/javascript" language="javascript" src="../../js/validacion.js">	</script>
 </head> 

<body>

<?php 
	require '../../php/conexion.php';
	$conexion=conexion();
?>                     

<div class="Contenedor-Editable" id="Region-Editable">
    <span class="Titulo-Aplicacion">Sistema de Gestion de los Procesos Administrativos</span>
	<span class="Separador_Modulo">  </span>
	<span class="Sub-Titulo-Aplicacion">Cargar Solicitud de Compra de Materiales</span>
	<span class="Sub-Titulo-Texto">Introduzca los Datos de la Compra de Materiales </span>
	<div class="Contenedor-Formulario">
        <form id="form4" name="form4" method="post"  enctype="multipart/form-data" onSubmit="return validarCargar(this)" action="cargar_datos.php">
		
		<div class="Contenedor-Elemneto-Formulario">
			<span class="Sub-Titulo-Formulario">Lugar</span><input type="text" name="lugar" id="lugar" maxlength="50"  />
			<span class="Sub-Titulo-Formulario">Unidad Organizativa Solicitante</span>
            <input type="text" name="unidad_solicitante" id="unidad_solicitante" maxlength="100"  />
		</div>

		<div class="Contenedor-Elemneto-Formulario">
			
		</div>

		<div class="Contenedor-Elemneto-Formulario">
			<span class="Sub-Titulo-Formulario">Fecha Requerida</span>
            <input type="text" name="unidad_solicitante" id="unidad_solicitante" maxlength="20"  />
		</div>

		<div class="Contenedor-Elemneto-Formulario">
			<span class="Sub-Titulo-Formulario">Lugar de Entrega</span>
            <input type="text" name="lugar_entrega" id="lugar_entrega" maxlength="100"  />
		</div>

		<div class="Contenedor-Elemneto-Formulario">
			<span class="Sub-Titulo-Formulario">Persona Contacto que Recibe</span>
            <input type="text" name="persona_recibe" id="persona_recibe" maxlength="100"  />
		</div>

		<div class="Contenedor-Elemneto-Formulario">
			<span class="Sub-Titulo-Formulario"> Observacion </span>
            <textarea class="input-style" rows="3" cols="60"  name="observacion" id="observacion"></textarea>
		</div>

		<div class="Contenedor-Elemneto-Formulario">
			<span class="Sub-Titulo-Formulario">Requerido por:</span>
            <select name="requerido" id="requerido" >
            	<option value="---Seleccione---" selected="selected" >---Seleccione---</option>
            	<?php
      				//consulta a la base de datos
        			$sql_requerido = "SELECT * FROM `usuario`";                                          
        			$result_requerido=mysql_query($sql_requerido,$conexion);
        			if ($row1=mysql_fetch_array($result_requerido)) {
        				do {
							if (($row1["INDICADOR"]!="ADMIN") && ($row1["ESTADO"]!=1) ){             
								echo'<OPTION VALUE="'.$row1['CEDULA'].'">'.$row1['NOMBRE'].' '.$row1['APELLIDO'].'</OPTION>';    
                            }
						} while ($row1=mysql_fetch_array($result_requerido));
					}
				?>
            </select>
		</div>

		<div class="Contenedor-Elemneto-Formulario">
			<span class="Sub-Titulo-Formulario">Aprobado por:</span>
            <select name="aprobado" id="aprobado" >
            	<option value="---Seleccione---" selected="selected" >---Seleccione---</option>
            	<?php
      				//consulta a la base de datos
        			$sql_aprobado = "SELECT * FROM `usuario`";                                          
        			$result_aprobado=mysql_query($sql_aprobado,$conexion);
        			if ($row=mysql_fetch_array($result_aprobado)) {
        				do {
							if (($row["INDICADOR"]!="ADMIN") && ($row["ESTADO"]!=1) && ($row["TIPO_USUARIO"]!=2) ){             
								echo'<OPTION VALUE="'.$row['CEDULA'].'">'.$row['NOMBRE'].' '.$row['APELLIDO'].'</OPTION>';    
                            }
						} while ($row=mysql_fetch_array($result_aprobado));
					}
				?>
            </select>
		</div>

		<div class="Contenedor-Elemneto-Formulario">
			<span class="Sub-Titulo-Formulario">Elaborado por:</span>
            <select name="elaborado" id="elaborado" >
            	<option value="---Seleccione---" selected="selected" >---Seleccione---</option>
            	<?php
      				//consulta a la base de datos
        			$sql_elaborado = "SELECT * FROM `usuario`";                                          
        			$result_elaborado=mysql_query($sql_elaborado,$conexion);
        			if ($row=mysql_fetch_array($result_elaborado)) {
        				do {
							if (($row["INDICADOR"]!="ADMIN") && ($row["ESTADO"]!=1) ){             
								echo'<OPTION VALUE="'.$row['CEDULA'].'">'.$row['NOMBRE'].' '.$row['APELLIDO'].'</OPTION>';    
                            }
						} while ($row=mysql_fetch_array($result_elaborado));
					}
				?>
            </select>
		</div>

		<table>  
       		<tr>
          		<td><span class="Sub-Titulo-Formulario">Cantidad Pedida</span></td>
          		<td><input type="text" name="cantidad_pedida" id="cantidad_pedida"/></td>
     		</tr>
   			<tr>
      	  		<td><span class="Sub-Titulo-Formulario">Unidad Medida</span></td>
          		<td><input type="text" name="unidad_medida" id="unidad_medida"/></td>
        	</tr>
        	<tr>
      	  		<td><span class="Sub-Titulo-Formulario">Descripcion del Material</span></td>
          		<td><textarea name="descripcion_material" id="descripcion_material" rows="3" cols="30"></textarea></td>
        	</tr>
        	<tr>
      	  		<td><span class="Sub-Titulo-Formulario">Costo o Estimado Unitario</span></td>
          		<td><input type="text" name="costo_unitario" id="costo_unitario"/></td>
        	</tr>
        	<tr>
      	  		<td><span class="Sub-Titulo-Formulario">Total del Costo o Estimado</span></td>
          		<td><input type="text" name="total_costo" id="total_costo"/></td>
        	</tr>
			<tr>
          		<td><span class="Sub-Titulo-Formulario">MATERIALES A SOLICITAR</span></td>
          		<td align="left" valign="top">
          		<table width="700">
            		<tr> 
              			<td colspan="2" align="right"><input id="agregar" type="button" value="Agregar" /></td>
            		</tr>  
            		<tr>
            			<td colspan="2">
              			<div class="contenedorTabla">
              				<table class="tabla_modelo" cellpadding="0" cellspacing="0">
              					<tr>
                    				<th>Renglon</th>
                        			<th>Cantidad Pedida</th>
                        			<th>unidad Medida</th>
                        			<th>Descripcion del Material</th>
                        			<th>Costo Unitario</th>
                        			<th>Total del Costo</th>
                        			<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    			</tr>
                				<tbody id="cuerpoTabla">
									<tr>
                        				<td colspan="4" align="center">Ingrese Materiales a Solicitar.</td>
                        			</tr>
								</tbody>
              				</table>
              			</div>
          				</td>
        			</tr>
        		</tablet>
        	</tr>  
		</table>

								
		<div class="Contenedor-Elemneto-Formulario" id="Contenedor-Elemneto-Formulario-aux">
			<div class="Principio-Boton"> </div>
			<input name="Aceptar" class="Boton" type="submit"  value="Guardar" />
			<div class="Final-Boton"></div>
			<div class="Principio-Boton"> </div>
			<input name="Cancelar" class="Boton" type="reset"  value="Reestablecer" />
			<div class="Final-Boton"> </div>
		</div>
        </form>
	</div>
    <span class="Sub-Titulo-Texto">* Solo puede escribir el fabricante en el CUADRO de TEXTO Ó Elegir UNO de la LISTA</span>
</div>

</body>
</html>
<?php }
?>
