<?php

	
function crear(){
	

//defino el tamaño de la imagen y la creo
$ancho=120;
$alto=33;
$imagen=imagecreatetruecolor($ancho, $alto);

//defino los colores de la imagen

$rgb[0]=rand(0,255);
$rgb[1]=rand(0,255);
$rgb[2]=rand(0,255);

$randomcolor=imagecolorallocate($imagen, $rgb[0], $rgb[1], $rgb[0]);

//rellena con color la imagen
imagefill($imagen,0,0, $randomcolor);


//definir el color negro a la linea
$negro=imagecolorallocate($imagen,0,0,0);

//marco de la imagen
imageline($imagen,0,0, $ancho,0, $negro);
imageline($imagen,0,0,0,$alto, $negro);
imageline($imagen,$ancho-1,$alto-1,0,$alto-1,$negro);
imageline($imagen,$ancho-1,$alto-1,$ancho-1,0,$negro);

//color de la rejilla
$gray=imagecolorallocate($imagen, 100,100, 100);
//rejilla
imageline($imagen,25,0,25,$alto,$gray);
imageline($imagen,50,0,50,$alto,$gray);
imageline($imagen,75,0,75,$alto,$gray);
imageline($imagen,0,13,$ancho,13,$gray);
imageline($imagen,0,26,$ancho,26,$gray);
imageline($imagen,0,39,$ancho,39,$gray);

//texto simple 
//imagestring($imagen,2,1,41, "@josemiqui",$negro);


//texto aleatorio
$random=substr(str_replace("0","",str_replace("O","",strtoupper(md5(rand(9999,99999))))),0,5);

//creamos una variable de session para el codigo captcha codificando en md5 $random 
$_SESSION['keycaptcha']=$random;


//cambiando el color del txt aleatorio parar que constraste 
$randomColorInv=imagecolorallocate($imagen, 255-$rgb[0], 255-$rgb[1], 255-$rgb[2]);



//por fin tenemos nuestra imagen con el txt aleatorio contrastado con el fondo
//imagestring($imagen,5,30,17,$random,$randomColorInv);

//textfont
$ttf="../../ttf/earwig factory rg.ttf";
imagefttext($imagen,26, rand(-5, 3),3,22,$randomColorInv,$ttf,$random);


//ruido con puntos en la imagen
for($i=0;$i<=800;$i++)
 {
	$randx=rand(0,120);
	$randy=rand(0,55);
	imagesetpixel($imagen,$randx, $randy,$randomColorInv);
	
	}

//guaradar imagen en disco 
imagepng($imagen,'../../imagenes/captcha.png');
echo ("<img src='../../imagenes/captcha.png' alt='captcha' >");
//sacar imagen de memoria ram
imagedestroy($imagen);


} //fin de la funcion crear

 ?>

 
