
          
function consulta(){
	

var buscar=$("#buscar").val();

//cambia todo lo contenido en el div por lo que devuleve el php con echo o print
$("#principal2").load("consulta_inventario.php",{bus : buscar });

}




function cargar(){

var codigo=document.form_cargar.codigo.value;
var manufacturer=document.form_cargar.manufacturer.value;
var descrip=document.form_cargar.descripcion.value;
var mod=document.form_cargar.modelo.value;
var lugar=document.form_cargar.cant.ubica;
var cantidad=document.form_cargar.cant.value;

$("#principal2").load("cargar_datos.php",{item : codigo, manufac: manufacturer, descri: descrip, modelo:mod, ubi:lugar, cant:cantidad });

}