<?php

//iniciamos sesion
	session_start();
echo ("<?xml version=\"1.0\" encoding=\"UTF-8\"?>");
echo ("<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">"); ?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
    <title> <<< Sistema de Gestion de los Procesos Administrativos >>> </title>
     <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" title="Principal-Aplicaciones" type="text/css" href="../../css/main-aplicacion.css" />
    <script type="text/javascript" language="javascript" src="../../js/validacion.js">	</script>
</head>
<body>
    <div class="Contenedor" id="Main-externo">
       <div class="Contenedor" id="Main-header">
             <a href="../../index.php"><span class="Contenedor-con-Imagen" id="Main-Logo"></span></a>
			<div class="Contenedor" id="Contenedor-Degradado">
			    <div class="Contenedor-con-Imagen" id="Logo-Continuacion">
			    	<span class="Contenedor" id="Nombre-Aplicacion">Sistema de Gestion de los Procesos Administrativos</span>
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
                                            <!-- region principal-->
                                                      <div class="Contenedor-Editable" id="Region-Editable">
                                                           <span class="Titulo-Aplicacion">Registro de Usuario Nuevo</span>
						    <span class="Separador_Modulo">  </span>
							<span class="Sub-Titulo-Texto">Introduzca los Datos del Usuario Nuevo </span>
							<div class="Contenedor-Formulario">
                                <form id="registro" name="registro" method="post" enctype="multipart/form-data" action="registro.php" onsubmit="return novacio(this)">
                                <div class="Contenedor-Elemneto-Formulario">
                                    <span class="Sub-Titulo-Formulario"> Cedula </span>
                                        <input type="text" maxlength="10" name="cedula" id="cedula" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" />
                                </div>
								<div class="Contenedor-Elemneto-Formulario">
								    <span class="Sub-Titulo-Formulario">Nombre </span>
                                        <input type="text" name="nombre" id="nombre" />
								</div>
                                <div class="Contenedor-Elemneto-Formulario">
                                    <span class="Sub-Titulo-Formulario">Apellido </span>
                                        <input type="text" name="apellido" id="apellido" />
                                </div>
                                <div class="Contenedor-Elemneto-Formulario">
                                    <span class="Sub-Titulo-Formulario">Numero de Carnet </span>
                                        <input type="text" name="num_carnet" id="num_carnet" maxlength="6" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/>
                                </div>
								<div class="Contenedor-Elemneto-Formulario">
								    <span class="Sub-Titulo-Formulario"> Correo Electronico</span>
                                        <input type="text" name="correo" id="correo" />
								</div>
                                <div class="Contenedor-Elemneto-Formulario">
								    <span class="Sub-Titulo-Formulario"> Correo Electronico Nuevamente</span>
                                        <input type="text" name="correo2" id="correo2" />
								</div>
                                <div class="Contenedor-Elemneto-Formulario">
                                    <span class="Sub-Titulo-Formulario">Extension </span>
                                        <input type="text" name="extension" id="extension" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/>
                                </div>
                                <div class="Contenedor-Elemneto-Formulario">
                                    <span class="Sub-Titulo-Formulario">Tipo de Usuario </span>
                                        <input type="text" name="tipo_usuario" id="tipo_usuario" maxlength="1" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/>
                                </div>
                                <div class="Contenedor-Elemneto-Formulario">
                                    <span class="Sub-Titulo-Formulario"> Indicador </span>
                                        <input type="text" name="id_usuario" id="id_usuario" />
                                </div>
                                <div class="Contenedor-Elemneto-Formulario">
								    <span class="Sub-Titulo-Formulario"> Contraseña</span>
                                        <input type="password" name="contrasena_registro" id="contrasena_registro" />
								</div>
                                <div class="Contenedor-Elemneto-Formulario">
								    <span class="Sub-Titulo-Formulario"> Contraseña Nuevamente</span>
                                        <input type="password" name="contrasena_registro2" id="contrasena_registro2" />
								</div>
                                <!-- Ingreso del Captcha -->
                                <div class="Contenedor-Elemneto-Formulario">
									<span class="Sub-Titulo-Formulario"><?php require 'classcaptcha.php'; crear();?></span>	
								</div>
								<div class="Contenedor-Elemneto-Formulario">						    
								    <span class="Sub-Titulo-Formulario"> Introduzca el Codigo de la Imagen </span>
                                        <input type="text" name="captcha" id="captcha" />
								</div>
                                <!-- Fin del Captcha -->

                                                                
                                                                                                                             
								<div class="Contenedor-Elemneto-Formulario" id="Contenedor-Elemneto-Formulario-aux">
								    <div class="Principio-Boton"> </div>
								    <input name="Aceptar" class="Boton" type="submit"  value="Cargar Datos" />
								    <div class="Final-Boton"></div>
								    <div class="Principio-Boton"> </div>
								    <input name="Cancelar" class="Boton" type="reset"  value="Reestablecer" />
								    <div class="Final-Boton"> </div>
								</div>
                                                                </form>
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
    </div>
</body>
</html>
