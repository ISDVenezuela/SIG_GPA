<?php
/*
 * autor: Wilmer Rojas
 * Descripcion: pagina de inicio del sistema
 */

//iniciamos sesion
	session_start();
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
    <title> SIG - GPA </title>
     <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" title="Principal-Aplicaciones" type="text/css" href="./css/main-aplicacion.css" />
    <script type="text/javascript" language="javascript" src="js/validacion.js">	</script>   
</head>
<body>  
    <div class="Contenedor" id="Main-externo">
       <div class="Contenedor" id="Main-header">
             <a href="index.php"><span class="Contenedor-con-Imagen" id="Main-Logo"></span></a>
			<div class="Contenedor" id="Contenedor-Degradado">
			    <div class="Contenedor-con-Imagen" id="Logo-Continuacion">
			    	<span class="Contenedor" id="Nombre-Aplicacion"> <<< Sistema de Gestion de los Procesos Administrativos >>> </span>
				 </div>
				 <div class="Contenedor-con-Imagen" id="Logo-Final"></div>
			</div>
       </div>
       <div >
            <div class="Contenedor-con-sombra" id="Main-BackCuerpoLeft"> 
                <div class="Contenedor" id="Main-Cuerpo">
                    <div class="Contenedor-con-Bordes" id="Main-Identificador_usuario">
                        
                         <?php //generacion de la fecha
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
                        <span class="Texto-Identificador" id="Main-Fecha"><?php echo "Hoy es ".$dia." de ".$mes." de ".$ano; ?></span>
                    
                    <div class="Contenedor" id="Main-breadcrumbs">
                        <div id="Main-Traza"><div id="Main-Traza-aux"></div></div>
						<div class="EsquinasBread" id="EsquinaBreadDerecha"></div>
					</div>
					<div class="Contenedor-Editable" id="Region-Editable">
				
						   <span class="Titulo-Aplicacion">INICIO DE SESIÓN</span>		
						    <span class="Separador_Modulo">  </span>
							<span class="Sub-Titulo-Aplicacion"> Ingrese sus Datos Por Favor</span>	
						
							<div class="Contenedor-Formulario">
							<form id="form" name="form" method="post" onSubmit="return verifica_inicio(this)" action="modulos/login/iniciar.php" >
							   
								<div class="Contenedor-Elemneto-Formulario">
								    <span class="Sub-Titulo-Formulario"> Usuario </span>
                                                                     <input type="text" name="nick" id="nick"/>
								</div>
								<div class="Contenedor-Elemneto-Formulario">
								    <span class="Sub-Titulo-Formulario"> Contraseña</span>
                                                                    <input type="password" name="contrasena" id="contrasena" />
								</div>
								
								<div class="Contenedor-Elemneto-Formulario" id="Contenedor-Elemneto-Formulario-aux">
								    <div class="Principio-Boton"> </div>
								    <input name="Aceptar" id="Aceptart" class="Boton" type="submit"  value="Aceptar" />
								    <div class="Final-Boton"></div>
								    <div class="Principio-Boton"> </div>
								    <input name="Cancelar" class="Boton" type="reset"  value="Restablecer" />
								    <div class="Final-Boton"> </div>
								</div>
						    </form>
						    <a href="modulos/recordar_clave_usuario/recordar.php" class="Contenedor-Texto-Menu"><span class="Text-menu" > Olvido su Contraseña? </span></a>
						    <a href="modulos/registro_usuario/registrarse.php" class="Contenedor-Texto-Menu"><span class="Text-menu" > Registrarse </span></a>
							</div>
					
					   </div>
				   </div>
  		    	</div>
            </div>
        </div> 
        <div class="Contenedor-con-Bordes" id="Main-Contenedor-footer">
            <p> Se recomienda utilizar <span style="color: red;">Mozilla Firefox</span> para una mejor visualizacion
            el cual es estandar PDVSA</p>

        </div>
     </div>
    
    
   </body>
</html>