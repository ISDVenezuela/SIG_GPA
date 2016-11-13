<?php
/*
 * autor:maria ruiz
 * descripcion: el usuario elige la cantidad de productos que desea retirar del inventario
 *
 */
session_start();
require '../../php/classLogueo.php';
$valid=new validar();
if ($valid->comprobar())

{

  
    $nick=$_SESSION['minick'];
    


         require '../../php/conexion.php';
          $conexion=conexion();
          //consulta a la base de datos
          $sql_usuario = "SELECT * FROM `usuarios` where nick='$nick'";
          $result_usuario=mysql_query($sql_usuario,$conexion);
          if ($row=mysql_fetch_array($result_usuario)){
            
              ?>
            <html>
            <head>
                <link rel="stylesheet" title="Principal-Aplicaciones" type="text/css" href="../../css/main-aplicacion.css" />
                <script type="text/javascript" language="javascript" src="../../js/validacion.js">	</script>
	               
           </head>

            <body>
        <div class="Contenedor-Editable" id="Region-Editable">
               <span class="Titulo-Aplicacion"> Perfil de Usuario </span>
        <span class="Separador_Modulo">  </span>
        <div class='Tabla-Aplicacion'>
        <table id="tabla">
         <tr>
         <th><div class='Tabla-Elemento-Encabezado'>Usuario</div></th>
         <th><div class='Tabla-Elemento-Encabezado'>Nombre </div></th>
         <th><div class='Tabla-Elemento-Encabezado' style="width:230px; ">Correo Electronico</div></th>
        <tr>
	<td><div class='Tabla-Elemento' style="height:20px;"><?php echo $nick;?> </div></td>
	<td><div class='Tabla-Elemento' style="height:20px;"><?php echo $row["nombre"]; ?></div></td>
	<td><div class='Tabla-Elemento' style="height:20px; width:230px; "><?php echo $row["correo"]; ?></div></td>
	</tr>
        </table><?php }?>
     </div>
     <span class="Sub-Titulo-Texto">Modificar los Datos del Usuario </span>
        <div class="Contenedor-Formulario">
    <?php echo "<form id='modificar_usuario' name='modificar_usuario' method='post'  enctype='multipart/form-data'  action='modificar_usuario_consulta.php'>";?>      
      <?php
      if (($nick!="root") && ($nick!="administrador"))
      {?>
         <div class="Contenedor-Elemneto-Formulario">
             <span class="Sub-Titulo-Formulario"> Usuario</span>
		  <input type="text" name="id_usuario" id="id_usuario" />
           </div> 
      <div class="Contenedor-Elemneto-Formulario">
            <span class="Sub-Titulo-Formulario">Nombre </span>
              <input type="text" name="nombre" id="nombre" />
     </div>
     <?php }?>
     <div class="Contenedor-Elemneto-Formulario">
	   <span class="Sub-Titulo-Formulario"> Correo Electronico</span>
           <input type="text" name="correo" id="correo" />
     </div>
     <div class="Contenedor-Elemneto-Formulario">
	 <span class="Sub-Titulo-Formulario"> Correo Electronico Nuevamente</span>
         <input type="text" name="correo2" id="correo2" />
    </div>
    <div class="Contenedor-Elemneto-Formulario">
	 <span class="Sub-Titulo-Formulario"> Contraseña</span>
         <input type="password" name="contrasena_registro" id="contrasena_registro" />
   </div>
   <div class="Contenedor-Elemneto-Formulario">
       <span class="Sub-Titulo-Formulario"> Contraseña Nuevamente</span>
       <input type="password" name="contrasena_registro2" id="contrasena_registro2" />
   </div>
   <div class="Contenedor-Elemneto-Formulario">
       <span class="Sub-Titulo-Formulario"><?php require '../../php/classcaptcha.php'; crear();?>	 </span>	
  </div>
  <div class="Contenedor-Elemneto-Formulario">						    
       <span class="Sub-Titulo-Formulario"> * Introduzca el Codigo de la Imagen </span>
        <input type="text" name="captcha" id="captcha" />
    </div>
	
	
       <div class="Contenedor-Elemneto-Formulario" id="Contenedor-Elemneto-Formulario-aux">
                    <div class="Principio-Boton"> </div>
                        <input name="Aceptar" class="Boton" type="submit"  value="Modificar" />
                        <div class="Final-Boton"></div>
                        <div class="Principio-Boton"> </div>
                        <input name="Cancelar" class="Boton" type="reset"  value="Reestablecer" />
                        <div class="Final-Boton"> </div>
                    </div>
            </div>
	 
		  
	


                </form>
                <span class="Sub-Titulo-Texto">* El Codigo es Obligatorio </span>
	    </div>
        </div>
             
        </body>

        </html>
        <?php mysql_close($conexion);} 
        ?>




























