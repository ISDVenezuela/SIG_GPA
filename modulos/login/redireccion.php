<?php
/*
 * Descripción: se verifica si el usuario esta logueado de estarlo se redirecciona a la pagina principal
 * del sistema y se le da un mensaje de Bienvenida
 */
session_start();

if  (!$_SESSION['miid'])
{
?>
<script type="text/javascript" language="javascript" >
alert('Error: Usted no esta logueado');
</script>
<?php
 echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=../../index.php'/></head><body></body></html>");
return 0;

}
else
{

?>

<script type="text/javascript" language="javascript" >
//alert('::::BIENVENIDO:::::');
</script>
<?php

 echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=../principal/contenido_principal.php'/></head><body></body></html>");

}
?>
