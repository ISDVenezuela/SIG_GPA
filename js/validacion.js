/* validacion de inicio de sesion*/
function verifica_inicio(){
		
	if (document.form.nick.value.length==0){
		alert("Debe Ingresar  Usuario");
		document.form.nick.focus();
		return false;
	}
	
	if (document.form.contrasena.value.length==0){
		alert ("Debe ingresar su contraseña");
		document.form.contrasena.focus();
		return false;
		}
		
	text_usuario=form.usuario.value;
	text_passwd=form.contrasena.value;
	if((text_usuario.indexOf(' ',0)!=-1)  || (text_passwd.indexOf(' ',0)!=-1)){
		alert("El usuario o la contraseña tienen espacios en blanco vuelva introducir los datos");
		document.form.usuario.focus();
		return false;
			
		}
		
 return true; 
}//fin de verifica_inicio



/*validacion para el registro */
function novacio()
{ 	
                    //para el resgistro

			
			
			if (document.registro.id_usuario.value.length==0){
				alert ("Debe ingresar su Usuario");
				document.registro.id_usuario.focus();
				return false;				
			}
			
			
			if (document.registro.nombre.value.length==0){
				alert ("Debe ingresar su nombre");
				document.registro.nombre.focus();
				return false;
			}
			
			if (document.registro.correo.value.length==0){
				alert ("Debe ingresar su correo electronico");
				document.registro.correo.focus();
				return false;
			}
			
			if (document.registro.correo2.value.length==0){
				alert ("Debe ingresar su correo electronico nuevamente");
				document.registro.correo2.focus();
				return false;
			}
			
			if (document.registro.contrasena_registro.value.length==0){
				alert ("Debe ingresar una contraseña");
				document.registro.contrasena_registro.focus();
				return false;
			}
			
			if (document.registro.contrasena_registro2.value.length==0){
				alert ("Debe ingresar su contraseña nuevamente");
				document.registro.contrasena_registro2focus();
				return false;
			}
			
			if (document.registro.captcha.value.length==0){
				alert ("Debe ingresar su CAPTCHA");
				document.registro.captcha.focus();
				return false;
			}


			
			if (document.registro.contrasena_registro2.value != document.registro.contrasena_registro.value){

			     alert("las contraseñas no coinciden");
			     document.registro.contrasena_registro.focus();
			     return false;
			     
			}
			
			if (document.registro.correo2.value != document.registro.correo.value){

			    alert("los correos electronicos no coinciden");
			    document.registro.correo.focus();
			    return false;
			}




			
			
			
		  re=/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/;
        if(!re.exec(document.registro.correo.value))    {
				alert("Los correos estan mal escrito");
			    document.registro.correo.focus();            
            return false;
       }else{
            return true;
         }			
			


        //validacion de genero
		if (!( (document.registro.sexo.value=="Femenino") || (document.registro.sexo.value=="Masculino") ) ) 
				{	alert( "Debe seleccionar su sexo" ) ;
					return false;
				}


			
			
			//evaluando espacios en blanco en los campos 
			
			
	      text_id=registro.id_usuario.value;
	      text_passwd=registro.contrasena_registro.value;
     	      text_passwd2=registro.contrasena_registro.value;
	      text_correo=registro.correo.value;
	      text_correo2=registro.correo2.value;
	   
      
	      if((text_id.indexOf(' ',0)!=-1)  || (text_passwd.indexOf(' ',0)!=-1) ||
				(text_correo.indexOf(' ',0)!=-1)  || (text_correo2.indexOf(' ',0)!=-1) || (text_passwd2.indexOf(' ',0)!=-1)){
				   alert("Existen campos con espacios en blanco");
					document.registro.nombre.focus();		    
		    return false;
			}
			
			
		
		
			if(text_id.length < 4) {
					alert("La cadena de caracteres para el Usuario es menor de la permitida (4 caracteres min)");
						return false;
				}
				
			if(text_id.length > 10) {
					alert("La cadena de caracteres para el Usuario es mayor de la permitida(10 caracteres max)");
						return false;
				}	
			
			if(text_passwd.length < 4) {
					alert("La cadena de caracteres para la contraseña es menor de la permitida (4 caracteres min)");
						return false;
				}
					
		     if(text_passwd.length > 16) {
					alert("La cadena de caracteres para la contraseña es mayor de la permitida (16 caracteres max)");
						return false;
				}
			


                                //validacion del correo
        email=form.correo.value;
	if ((email.indexOf('@',0)==-1) || (email.indexOf(';',0)!=-1)
		(email.indexOf(' ',0)==-1) || (email.indexOf('/',0)!=-1)
		(email.indexOf(';',0)==-1) || (email.indexOf('<',0)!=-1)
		(email.indexOf('>',0)==-1) || (email.indexOf('*',0)!=-1)
		(email.indexOf('|',0)==-1) || (email.indexOf('`',0)!=-1)
		(email.indexOf('&',0)==-1) || (email.indexOf('$',0)!=-1)
		(email.indexOf('!',0)==-1) || (email.indexOf('"',0)!=-1)
		(email.indexOf(':',0)==-1)){
			alert("Correo Electronico Incorrecto");
                           return false;

	  }


       if((text_id.indexOf(' ',0)!=-1) ) {
		alert("El usuario no debe tener espacios en blanco vuelva introducir los datos");
		document.registro.id_usuario.focus();
		return false;
			
		}









	
	
			return true; // si la funcion devuelve true hace el submit si no no lo hace
	
						
}



function recordar(){


                        if (document.form_recordar.id_usuario.value.length==0){
				alert ("Debe ingresar su Usuario");
				document.form_recordar.id_usuario.focus();
				return false;
			}

			if (document.form_recordar.correo.value.length==0){
				alert ("Debe ingresar su correo electronico");
				document.form_recordar.correo.focus();
				return false;
			}




         	  re=/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/;
                    if(!re.exec(document.form_recordar.correo.value))    {
                                            alert("El correo esta mal escrito");
                                        document.form_recordar.correo.focus();
                        return false;
                   }else{
                        return true;
                     }



                         text_id=form_recordar.id_usuario.value;
                         text_correo=form_recordar.correo.value;




                           if((text_id.indexOf(' ',0)!=-1) || (text_correo.indexOf(' ',0)!=-1) ){
				   alert("Existen campos con espacios en blanco");
					document.form_recordar.id_usuario.focus();
		          return false;
			}





    return true;// si la funcion devuelve true hace el submit si no no lo hace
}



function validarletras(e) {
   tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true;
    patron =/[A-Za-z\s]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}
  
function validarCargar(){
        if (document.form4.item.value.length==0){
				alert ("Debe Introducir el item");
				document.form4.item.focus();
				return false;
	}
        if (document.form4.manufacturer.value.length==0){
				alert ("Debe ingresar el Fabricante");
				document.form4.manufacturer.focus();
				return false;
 	}
        if (document.form4.modelo.value.length==0){
				alert ("Debe ingresar el modelo");
				document.form4.modelo.focus();
				return false;
 	}
        if (document.form4.ubicacion.value=="---Seleccione---"){
				alert ("Debe ingresar la ubicacion");
				document.form4.ubicacion.focus();
				return false;
 	}

        if (document.form4.cantidad.value.length==0){
				alert ("Debe ingresar la Cantidad");
				document.form4.cantidad.focus();
				return false;
 	}

        if (document.form4.descripcion.value.length==0){
				alert ("Debe ingresar la descripcion");
				document.form4.descripcion.focus();
				return false;
 	}

return true;
}


function agregar(){

	
valid=/^(?:\+|-)?\d+$/; 	

 if (document.agregar.cantidad.value.length==0){
				alert ("Debe ingresar la cantidad");
				document.agregar.cantidad.focus();
				return false;
 	}
 	


  if (document.agregar.ubicacion.value=="---Seleccione---"){
				alert ("Debe ingresar la ubicacion");
				document.agregar.ubicacion.focus();
				return false;
 	}



   if(!valid.exec(document.agregar.cantidad.value))    {
                       alert("El campo contiene caracteres alfabeticos");
                       document.agregar.cantidad.focus();
                      return false;
                   }else{
                        return true;
                     }

return true;
}

