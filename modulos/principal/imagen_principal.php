<?php 

//descripcion: aqui se muestra la imagen princiapl del sistema que es una vista aerea del copem  

session_start();
require '../../php/classLogueo.php';
$valid=new validar();
if ($valid->comprobar()){
?>


<html>  
<head>
    <link rel="stylesheet" title="Principal-Aplicaciones" type="text/css" href="../../css/main-aplicacion.css" />
</head> 

<body> 


<div id="imagen_principal">
<img src="../../imagenes/imagen_principal_copem.jpg"  alt="imagen de copem" >
</div>

   </body>
    </html>
<?php
 } //fin 
?>










