<?php
/*
 * descripcion: esta es la pagina principal del sistema
 * en la cual se presentaran todo el contenido del inventario en el iframe que esta en un div central
 * se cuenta con un menu lateral y un cabecera con el logo de la empresa y nombre de la aplicacion
 */
//iniciamos sesion
	session_start();     
require '../../php/classLogueo_Inicio.php';
$valid=new validar();
if ($valid->comprobar()){

echo ("<?xml version=\"1.0\" encoding=\"UTF-8\"?>");
echo ("<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">"); ?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
    <title> <<< Sistema de Gestion de los Procesos Administrativos >>> </title>
     <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" title="Principal-Aplicaciones" type="text/css" href="../../css/main-aplicacion.css" />
    <script type="text/javascript" language="javascript" src="../../js/validacion.js">	</script>
    <script type="text/javascript" language="javascript" src="../../js/consultas.js">	</script> <!-- REVISAR -->
    <script src="../../jquery/jquery.js" type="text/javascript"></script>
<style type='text/css'>

    #principal
		{
		position:absolute;
		top:120px;
		left:190px;
		width:810px;
		height:100%;
		max-height:750px;
      	border:0;
	  	overflow:hidden;
                
		}
	
		
</style>
   
</head>
<body>
    <div class="Contenedor" id="Main-externo">
       <div class="Contenedor" id="Main-header">
             <a href="contenido_principal.php"><span class="Contenedor-con-Imagen" id="Main-Logo"></span></a>
			<div class="Contenedor" id="Contenedor-Degradado">
			    <div class="Contenedor-con-Imagen" id="Logo-Continuacion">
			    	<span class="Contenedor" id="Nombre-Aplicacion">Sistema de Gestion de los Procesos Administrativos </span>
				 </div>
				 <div class="Contenedor-con-Imagen" id="Logo-Final"></div>
			</div>
       </div>
       <div >
            <div class="Contenedor-con-sombra" id="Main-BackCuerpoLeft">
                <div class="Contenedor" id="Main-Cuerpo">
                    <div class="Contenedor-con-Bordes" id="Main-Identificador_usuario">
                        	<?php
				 require '../../php/conexion.php';
				 $conexion=conexion();

				//consulta
				$minick=$_SESSION['minick'];
				$result= mysql_query("SELECT NOMBRE from  usuario where INDICADOR='$minick'", $conexion);
				if ($rows=mysql_fetch_array($result))
				 {
			         
			          $name=$rows['NOMBRE'];
			                   //generacion de la fecha

                                            $dia = date ("d");
                                            $mes = date ("m");
                                            $ano = date ("Y");
                                            if ($mes == 1) {
                                            $mes = "Enero";
                                            }
                                            if ($mes == 2) {
                                            $mes = "Febrero";
                                            }
                                            if ($mes == 3) {
                                            $mes = "Marzo";
                                            }
                                            if ($mes == 4) {
                                            $mes = "Abril";
                                            }
                                            if ($mes == 5) {
                                            $mes = "Mayo";
                                            }
                                            if ($mes == 6) {
                                            $mes = "Junio";
                                            }
                                            if ($mes == 7) {
                                            $mes = "Julio";
                                            }
                                            if ($mes == 8) {
                                            $mes = "Agosto";
                                            }
                                            if ($mes == 9) {
                                            $mes = "Septiembre";
                                            }
                                            if ($mes == 10) {
                                            $mes = "Octubre";
                                            }
                                            if ($mes == 11) {
                                            $mes = "Noviembre";
                                            }
                                            if ($mes == 12) {
                                            $mes = "Diciembre";
                                            }



			         ?>
                        <span class="Texto-Identificador" id="Main-Usuario"> Bienvenido, <a href="../usuario/modificar_usuario.php" target="principal"><?php echo $name;?>,</a>  <a href="../login/cerrar.php">Cerrar Sesión</a> </span>
                                    <span class="Texto-Identificador" id="Main-Fecha"><?php echo "Hoy es ".$dia." de ".$mes." de ".$ano; ?></span>
                            <?php
							}
							?>

                    <div class="Contenedor" id="Main-breadcrumbs">
                        <div id="Main-Traza"><div id="Main-Traza-aux"></div></div>
						<div class="EsquinasBread" id="EsquinaBreadDerecha"></div>
					</div>
                                     
					<div class="Contenedor-Editable-Fondo" id="Vista">
					  
            <div class="Contenedor-Editable" id="Menu"> <!-- Comienzo del Menu -->

              <!-- MENU DEL ADMINISTRADOR -->
              <?php $admin=$_SESSION['minick']; $admin=strtoupper($admin);   
                if ($admin=="ADMIN") { ?>                      
                  <span class="PuntoHo_Cortico"></span>
                  <a   href="../usuario/lista_usuarios.php" target="principal" class="Contenedor-Texto-Menu">
                  <span class="Text-menu" > Administrar Usuarios </span></a>                                                  
                <?php } else { ?>
						      <a  href="imagen_principal.php" target="principal" class="Contenedor-Texto-Menu"><span class="Text-menu" > SOLICITUD COMPRA MATERIAL </span></a>
                  <a  href="../solicitud_compra/agregar_compra.php" class="Contenedor-Texto-sub-Menu" target="principal" ><span class="Text-menu" > Agregar Solicitud Compra </span></a>
							   <a href="../solicitud_compra/modificar_compra.php" class="Contenedor-Texto-sub-Menu" target="principal" ><span class="Text-menu"> Modificar Solicitud Compra </span></a>
							   <a href="../solicitud_compra/eliminar_compra.php" class="Contenedor-Texto-sub-Menu" target="principal" ><span class="Text-menu"> Eliminar Solicitud Compra </span></a>
                 <a href="../solicitud_compra/consultar_compra.php" class="Contenedor-Texto-sub-Menu" target="principal" ><span class="Text-menu"> Consultar Solicitud Compra </span></a>
						    
                  <span class="PuntoHo_Cortico"></span>
                                     
                  <a  href="imagen_principal.php" target="principal" class="Contenedor-Texto-Menu"><span class="Text-menu" > SOLICITUD CONTRATO DE SERVICIO </span></a>
                  <a  href="../solicitud_servicio/agregar_servicio.php" class="Contenedor-Texto-sub-Menu" target="principal" ><span class="Text-menu" > Agregar Solicitud Servicio </span></a>
                 <a href="../solicitud_servicio/modificar_servicio.php" class="Contenedor-Texto-sub-Menu" target="principal" ><span class="Text-menu"> Modificar Solicitud Servicio </span></a>
                 <a href="../solicitud_servicio/eliminar_servicio.php" class="Contenedor-Texto-sub-Menu" target="principal" ><span class="Text-menu"> Eliminar Solicitud Servicio </span></a>
                 <a href="../solicitud_servicio/consultar_servicio.php" class="Contenedor-Texto-sub-Menu" target="principal" ><span class="Text-menu"> Consultar Solicitud Servicio </span></a>

                <?php } ?> 
               <!-- FIN DEL MENU -->

					  </div>
                                            <!-- este es el div principal-->
						
							
	
						<iframe  name="principal" id="principal"  src="imagen_principal.php" scrolling="no">
						          
						</iframe>				       
				     
				   </div>
  		    	</div>
            </div>
        </div>
        <div class="Contenedor-con-Bordes" id="Main-Contenedor-footer">
        <p> Se recomienda utilizar <span style="color: red;">Mozilla Firefox</span> para una mejor visualizacion
            el cual es estandar PDVSA</p>
     </div>
    </div>
    </div>
   </body>
</html>
<?php }
?>
