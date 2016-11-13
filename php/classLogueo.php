<?php
/*
 * descripcion: en esta clase php se valida si el usuario esta logueado
 */

class validar{
	
function comprobar() {


if  (!isset($_SESSION['miid'])  )
{
?>
<script type="text/javascript" language="javascript" >
alert('Error: Usted no esta logueado');
</script>	

<?php

 echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=../../php/vacio.php'/></head><body></body></html>");
return false;
	
}else { return true;
}

}

}

?>
