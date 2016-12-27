window.onload = function() {
	
	document.getElementById("sumar").addEventListener("click",datos,true);
	document.getElementById("restar").addEventListener("click",datos2,true);
	document.getElementById("hoy").addEventListener("click",datos_auto,true);
	datos_auto();
	consulta_ajax();
	iniciar_mapa2();
}//Aqui termina la funcion de agregar al momento de cargar la pagina


function datos_auto(){

	var fecha = new Date();
	var fecha_automatica = new Array;
	fecha_automatica.dia = fecha.getDate()-1;
	fecha_automatica.mes = obtener_mes(fecha.getMonth()+1).num;
	fecha_automatica.ano = fecha.getFullYear();
	
	
	aumenta(fecha_automatica);
	
}//Esta funcion es para cargar los datos de la fecha actual que viene de la funcion de window.onload

function datos(){

	var dato = document.getElementById("dia7").innerHTML;
	var fecha_manual = new Array();
	var temp = dato.split("/");
	fecha_manual.dia = temp[0];
	fecha_manual.mes = temp[1];
	fecha_manual.ano = temp[2];
	
	aumenta(fecha_manual);

}//Esta funcion se utiliza cuando el usuario mueve la fecha y se toma el ultimo campo

function datos2(){

	var dato = document.getElementById("dia1").innerHTML;
	var fecha_manual = new Array();
	var temp = dato.split("/");
	fecha_manual.dia = temp[0];
	fecha_manual.mes = temp[1];
	fecha_manual.ano = temp[2];
	
	resta(fecha_manual);

}//Esta funcion se utiliza cuando el usuario mueve la fecha y se toma el primer campo


//Funcion del mapa en ficha-doctor
function iniciar_mapa2()
{
	var latlng = new google.maps.LatLng(37.56196293439277,-1.8062639236450195);
	var myLatLng = new google.maps.LatLng(37.56196293439277,-1.8062639236450195);

	var myOptions = {
      zoom: 15,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("mapa-ficha-doctor"), myOptions);
	
 
  
  var marcador = new google.maps.Marker({
      position: myLatLng,
      map: map,
	  title:"Te Esperamos"
  });
	
	
}

function resta(datos_fecha){



	if(resta_stop() != document.getElementById("dia1").innerHTML){
		
	

	var fechas_movimiento = new Array();

	for(var i = 1;i<=7;i++)
	{	
	
	var fecha_actual = datos_fecha.mes+"/"+datos_fecha.dia+"/"+datos_fecha.ano;
	hoy = new Date(fecha_actual);
	var incremento = i;
	hoy.setTime(hoy.getTime()-incremento*24*60*60*1000); 
	var mes = hoy.getMonth()+1; 
	if(mes<=9) mes='0'+mes; 
	var fecha_temp = hoy.getDate()+"/"+mes+"/"+hoy.getFullYear(); 
	var fecha_estelar = fecha_temp.split("/");
	
	document.getElementById("dia"+(8-i)).innerHTML = fecha_estelar[0]+"/"+fecha_estelar[1]+"/"+fecha_estelar[2];
	fechas_movimiento[i] = fecha_estelar[0]+"/"+fecha_estelar[1]+"/"+fecha_estelar[2];
	}
	
	consulta_ajax_movimiento(fechas_movimiento);
	
	}//Aqui termina la comprobacion


}//Aqui termina la funcion resta que se usa cuando el usuario mueve la consulta de horas para una fecha menor

function resta_stop(){
	
	var fecha = new Date();
	
	var fecha_actual = obtener_mes(fecha.getMonth()+1).num+"/"+fecha.getDate()+"/"+fecha.getFullYear();
	
	var hoy_final = new Date(fecha_actual);
	var mes = hoy.getMonth()+1; 
	if(mes<=9) mes='0'+mes; 
	var fecha_temp = hoy_final.getDate()+"/"+mes+"/"+hoy_final.getFullYear(); 
	var fecha_estelar = fecha_temp.split("/");

	var fecha_comprobacion = fecha_estelar[0]+"/"+fecha_estelar[1]+"/"+fecha_estelar[2];
	return fecha_comprobacion;
}




function aumenta(datos_fecha){

	var fechas_movimiento = new Array();

	for(var i = 1;i<=7;i++)
	{	
	
	var fecha_actual = datos_fecha.mes+"/"+datos_fecha.dia+"/"+datos_fecha.ano;
	hoy = new Date(fecha_actual);
	var incremento = i;
	hoy.setTime(hoy.getTime()+incremento*24*60*60*1000);	 
	var mes = hoy.getMonth()+1; 
	if(mes<=9) mes='0'+mes; 
	var fecha_temp = hoy.getDate()+"/"+mes+"/"+hoy.getFullYear(); 
	var fecha_estelar = fecha_temp.split("/");
	
	document.getElementById("dia"+i).innerHTML = fecha_estelar[0]+"/"+fecha_estelar[1]+"/"+fecha_estelar[2];
	fechas_movimiento[i] = fecha_estelar[0]+"/"+fecha_estelar[1]+"/"+fecha_estelar[2];
	}
	
	consulta_ajax_movimiento(fechas_movimiento);
	
	
}//Aqui se aumentan los datos en el calendario


function obtener_mes(m){

	var meses = new Array();

	switch(m)
	{
		case 1:
		meses.es = "Enero";
		meses.esmin = "Ene";
		meses.num = 1;
		
		break;
		
		case 2:
		meses.es = "Febrero";
		meses.esmin = "Feb";
		meses.num = 2;
		
		break;
		
		case 3:
		meses.es = "Marzo";
		meses.esmin = "Mar";
		meses.num = 3;
		
		break;

		case 4:
		meses.es = "Abril";
		meses.esmin = "Abr";
		meses.num = 4;
		
		break;
		
		case 5:
		meses.es = "Mayo";
		meses.esmin = "May";
		meses.num = 5;
		
		break;
		
		case 6:
		meses.es = "Junio";
		meses.esmin = "Jun";
		meses.num = 6;
		
		break;
		
		case 7:
		meses.es = "Julio";
		meses.esmin = "Jul";
		meses.num = 7;
		
		break;
		
		case 8:
		meses.es = "Agosto";
		meses.esmin = "Ago";
		meses.num = 8;
		
		break;
		
		case 9:
		meses.es = "Septiembre";
		meses.esmin = "Sep";
		meses.num = 9;
		
		break;
		
		case 10:
		meses.es = "Octubre";
		meses.esmin = "Oct";
		meses.num = 10;
		
		break;
		
		case 11:
		meses.es = "Noviembre";
		meses.esmin = "Nov";
		meses.num = 11;
		
		break;
		
		case 12:
		meses.es = "Diciembre";
		meses.esmin = "Dic";
		meses.num = 12;
		
		break;
		
		
	}

	return meses;
	
}//En esta funcion se obtienen los meses en distintos formatos para reutilizarse despues


function obtener_dia(d)
{
	var dias = new Array();

	switch(d)
	{
		case "Mon":
		dias.es = "Lunes";
		dias.esmin = "Lun";
		dias.num = 1;
		
		break;
	
		case "Tue":
		dias.es = "Martes";
		dias.esmin = "Mar";
		dias.num = 2;
	
		break;
		
		case "Wed":
		dias.es = "Miercoles";
		dias.esmin = "Mie";
		dias.num  = 3;
		
		break;
		
		case "Thu":
		dias.es = "Jueves";
		dias.esmin = "Jue";
		dias.num = 4;
		
		break;
		
		
		case "Fri":
		dias.es = "Viernes";
		dias.esmin = "Vie";
		dias.num = 5;
		
		break;
		
		case "Sat":
		dias.es = "Sabado";
		dias.esmin = "Sab";
		dias.num = 6;
		
		break;
		
		case "Sun":
		dias.es = "Domingo";
		dias.esmin = "Dom";
		dias.num = 7;
		
		break;
		
	
	}
}//En esta funcion se obtienen los dias en distintos formatos para reutilizarse despues


function fecha_busqueda(ajax){

	var fecha = ajax.split("/");
	var mes = (fecha[1].length == 1)? "0"+fecha[1] : fecha[1];
	var dia = (fecha[0].length == 1)? "0"+fecha[0] : fecha[0];
	var fecha_return  = fecha[2]+"-"+mes+"-"+dia;

	return fecha_return;

}//Esta funcion lo que hace es que voltea la fecha para acomodarla a la fecha en la base de datos para realizar la busqueda por medio de Ajax



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
}//Funcion en beta.. para la creacion del objeto AJAX*


function consulta_ajax_movimiento(arreglo){

var fechas_send = new Array();
	fechas_send = fechas_get();
	var doctor = obtener_id();
	var clinica = obtener_clinica();
	ajax = new objetoAjax();
	var url = 'consulta_fecha.php?1='+fechas_send[1]+'&2='+fechas_send[2]+'&3='+fechas_send[3]+'&4='+fechas_send[4]+'&5='+fechas_send[5]+'&6='+fechas_send[6]+'&7='+fechas_send[7]+'&8='+doctor+'&9='+clinica;		
	
	ajax.open("GET",url,true);
	ajax.onreadystatechange = function() {
	
		if(ajax.readyState == 4){
		
			document.getElementById("horas_consulta").innerHTML = ajax.responseText;
			
		}
		
	}
	ajax.send(null);


}//Aqui termina la funcion de consulta_ajax_movimiento o restar fecha que se se usa cuando el usuario mueve la funcionde sumar o restar fecha

function consulta_ajax(){

	var fechas_send = new Array();
	fechas_send = fechas_get();
	var doctor = obtener_id();
	var clinica = obtener_clinica();
	ajax = new objetoAjax();
	var url = 'consulta_fecha.php?1='+fechas_send[1]+'&2='+fechas_send[2]+'&3='+fechas_send[3]+'&4='+fechas_send[4]+'&5='+fechas_send[5]+'&6='+fechas_send[6]+'&7='+fechas_send[7]+'&8='+doctor+'&9='+clinica;		
	
	ajax.open("GET",url,true);
	ajax.onreadystatechange = function() {
	
		if(ajax.readyState == 4){
		
			document.getElementById("horas_consulta").innerHTML = ajax.responseText;
			
		}
		
	}
	ajax.send(null);

}//Aqui termina la funcion ajax : la cual hace la consulta de horas cuando se usa la funcion window.onload


function obtener_id(){
	var doctor = document.getElementById("iddoctor_oculto").value;
	return parseInt(doctor);
}//Funcion para obtener los campos ocultos necesarios

function obtener_clinica(){
	var clinica = document.getElementById("clinica_oculto").value;
	return clinica;
}//Funcion para obtener los campos ocultos necesarios


function fechas_get()
{
	var fechas_get = new Array();

	for(var cont = 1;cont <=7;cont++)
	{
		fechas_get[cont] = fecha_busqueda(document.getElementById("dia"+cont).innerHTML);	
		
	}//Aqui termina el for la para la asignacion 


	return fechas_get;
	
}//Aqui termina la funcion que se encarga de obtener todas fechas que seran enviadas en la funcion de consulta_ajax




