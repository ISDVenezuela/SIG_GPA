<!--

Descripcion: el usuario aqui podra consultar los movimientos de los usuarios realizados en diferente fechas

-->

<?php
session_start();
require '../../php/classLogueo.php';
$valid=new validar();
if ($valid->comprobar()){
?>

<html>  
<head>
    <link rel="stylesheet" title="Principal-Aplicaciones" type="text/css" href="../../css/main-aplicacion.css" />
    <script type="text/javascript" language="javascript" src="../../js/validacion.js">	</script>
    <!--- para el calendario -->
	<script src="../../js/jscal2.js"type="text/javascript"></script>			
	<script src="../../js/lang/es.js"type="text/javascript"></script>	
	
	<link rel="stylesheet" href="../../css/jscal2.css" type="text/css" />
	<link rel="stylesheet" href="../../css/border-radius.css" type="text/css" />
	<!--- -->
</head> 
		
<body>                     
	<div class="Contenedor-Editable" id="Region-Editable">
    	<span class="Titulo-Aplicacion">Consulta de Movimientos de Inventario</span>
		<span class="Separador_Modulo">  </span>					
		<span class="Sub-Titulo-Texto" style="margin-top:60px;">Introduzca la Fecha a Consultar </span>
		<div class="Contenedor-Formulario">
            <form id="form4" name="form4" method="post"  enctype="multipart/form-data"  action="consulta_movimientos.php">
			<div class="Contenedor-Elemneto-Formulario">
				<span style="margin-top:40px; margin-left:200px;" class="Sub-Titulo-Formulario"> Desde: </span>
                <?php /* se asigna el valor del dia actual a los campos desde y hasta */
					$hoy[]="";
                    $hoy= date("Y-m-d");
                ?>
				<input  style="margin-left:200px;"   name="desde" id="fecha" value="<?php echo $hoy;?>" readonly="true" type="text" >
				<script type="text/javascript">
					new Calendar({
						inputField: "fecha",
						dateFormat: "%Y-%m-%d",
						trigger: "fecha",
						bottomBar: true,
						onSelect: function() {
							var date = Calendar.intToDate(this.selection.get());
							LEFT_CAL.args.min = date;
							LEFT_CAL.redraw();
							this.hide();
						}
					});
				</script>                                                                      
        	</div>
			<div class="Contenedor-Elemneto-Formulario">
				<span class="Sub-Titulo-Formulario" style="margin-left:200px;"> Hasta: </span>
            	<input  style="margin-left:200px;" name="hasta" id="fecha2" value="<?php echo $hoy;?>" readonly="true" type="text" >
				<script type="text/javascript">
					new Calendar({
						inputField: "fecha2",
						dateFormat: "%Y-%m-%d",
						trigger: "fecha2",
						bottomBar: true,
						onSelect: function() {
							var date = Calendar.intToDate(this.selection.get());
							LEFT_CAL.args.min = date;
							LEFT_CAL.redraw();
							this.hide();
						}
					});
				</script>                                                                      
        	</div>
			<div style="margin-left:160px;" class="Contenedor-Elemneto-Formulario" id="Contenedor-Elemneto-Formulario-aux">
				<div class="Principio-Boton"> </div>
				<input name="Aceptar" class="Boton" type="submit"  value="Consultar" />
				<div class="Final-Boton"></div>
				<div class="Principio-Boton"> </div>
				<input name="Cancelar" class="Boton" type="reset"  value="Reestablecer" />
				<div class="Final-Boton"> </div>
			</div>
            </form>
		</div>
    </div>

</body>
</html>
<?php
}?>