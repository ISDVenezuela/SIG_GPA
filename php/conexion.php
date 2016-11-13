<?php


function conexion() {
	/*Informacion de la conexion*/
		$servidor = "127.0.0.1:3306";
		$usuario =	"root";
		$clave = "";
		$basedatos = "sig_gpa";
	/*Fin Informacion de la conexion*/	
	 //conexion a al base de datos
         $conexion = mysql_connect($servidor,$usuario,$clave);
			if(!$conexion)
			{
			?>
				<script type="text/javascript" language="javascript" >
				alert('Error: Fallo de conexion con el servidor');
	 			</script>	
				<?php
				  echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=../index.php'/></head><body></body></html>");
			
			return;
			}
					
      //conexion al schema			
			$bd = mysql_select_db($basedatos, $conexion);
			if(!$bd)
			{
				?>
				<script type="text/javascript" language="javascript" >
				alert('Error: No se pudo establecer la conexion con la base de datos');
	 			</script>	
				<?php
				  echo ("<html><head><meta http-equiv='REFRESH' content='0;URL=../index.php'/></head><body></body></html>");
				 mysql_close($conexion);
			return;
			}    	
	
	
	return $conexion;
	
	}


?>
