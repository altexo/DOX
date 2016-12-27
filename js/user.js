/**
 * @author Ivan
 */
function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}


	
function foc(){
	document.getElementById('user').focus();

}

function recordar()
{
	divResult2 = document.getElementById('rec');
	id=document.getElementById('id').value;
	//instanciamos el objetoAjax
	ajax=objetoAjax();
	//usamos el medoto POST
	//archivo que realizará la operacion
	//datoscliente.php
	ajax.open("POST", "user.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divResult2.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores
	ajax.send("id="+id)
	
}

function email()
{
	divResult2 = document.getElementById('rec');
	id=document.getElementById('id').value;
	email=document.getElementById('email').value;
	//instanciamos el objetoAjax
	ajax=objetoAjax();
	//usamos el medoto POST
	//archivo que realizará la operacion
	//datoscliente.php
	ajax.open("POST", "user.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divResult2.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores
	ajax.send("id="+id+"&email="+email)
	
}
//Recordar Contraseña
function rem()
{
	if(email == '')
	{
		alert("El campo E-mail es obligatorio.")
	}
	else if(valEmail() == false)
	{
		alert("Dirección de correo electrónico inválida.");
		valEmail()
	}
	

	
}
//Validar e-mail
function valEmail()
{
	valor = document.getElementById('email').value;
    re=/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/
    if(!re.exec(valor))    
	{
        return false;
    }
	else
	{	
		enviar();
        return true;
    }	
}
function enviar()
{
	divResult2 = document.getElementById('tabla');
	//id=document.getElementById('id').value;
	email=document.getElementById('email').value;
	//instanciamos el objetoAjax
	ajax=objetoAjax();
	//usamos el medoto POST
	//archivo que realizará la operacion
	//datoscliente.php
	ajax.open("POST", "user.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divResult2.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores
	ajax.send("email="+email)
}

