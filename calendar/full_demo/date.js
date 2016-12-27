window.onload = function() {
	
	document.getElementById("sumar").addEventListener("click",datos,true);
	document.getElementById("restar").addEventListener("click",datos2,true);
	document.getElementById("hoy").addEventListener("click",datos_auto,true);
	datos_auto();
	consulta_ajax();
	
}//Aqui termina la funcion de agregar al momento de cargar la pagina


function datos_auto(){

	var fecha = new Date();
	var fecha_automatica = new Array;
	fecha_automatica.dia = fecha.getDate();
	fecha_automatica.mes = obtener_mes(fecha.getMonth()+1).num;
	fecha_automatica.ano = fecha.getFullYear();

	aumenta(fecha_automatica);
	
}

function add_cero(dia_add){

	var dia_final = (dia_add.length == 1)? "0"+dia_add : dia_add;

	return dia_final;

}//En esta funcion se adhiere un cero si el dia es uno.. ya que en la base de datos el dia se mantiene con un uno

function mes_search(fs){

	var search2 = fs.split("");
	var mes_final = (search2[0] == "0") ? search2[1] : fs;
	
	return mes_final;
}//Esta funcion lo quehace es quitar el cero en caso de haberlo en el mes para que haga la busqueda ya que el mes no lo tiene en la base de datos

function datos(){

	var dato = document.getElementById("dia7").innerHTML;
	var fecha_manual = new Array();
	var temp = dato.split("/");
	fecha_manual.dia = temp[0];
	fecha_manual.mes = temp[1];
	fecha_manual.ano = temp[2];
	
	aumenta(fecha_manual);

}

function datos2(){

	var dato = document.getElementById("dia1").innerHTML;
	var fecha_manual = new Array();
	var temp = dato.split("/");
	fecha_manual.dia = temp[0];
	fecha_manual.mes = temp[1];
	fecha_manual.ano = temp[2];
	
	resta(fecha_manual);

}


function resta(datos_fecha){

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
	
	}
	
}

function aumenta(datos_fecha){

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
	
	
	//consulta_ajax(fecha_estelar[0]+"/"+fecha_estelar[1]+"/"+fecha_estelar[2]);
	//document.getElementById("hora"+i).innerHTML = consulta_ajax(fecha_ajax);
	document.getElementById("dia"+i).innerHTML = fecha_estelar[0]+"/"+fecha_estelar[1]+"/"+fecha_estelar[2];
	
	}
	
}

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
	
}

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
}


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


function consulta_ajax_sumar(){





}//Aqui termina la funcion de consulta_ajax_sumar



function consulta_ajax(){
	
	
	/*
	
	for(var c = 1;c<=7;c++)
	{
		var search = document.getElementById("dia"+c).innerHTML;
		var arreglo_search = search.split('/');
				
		var fecha_search = add_cero(arreglo_search[0])+"/"+mes_search(arreglo_search[1])+"/"+arreglo_search[2];
		
		var url = 'consulta_fecha.php?inicio='+fecha_search;	
			ajax = new objetoAjax();
			ajax.open("GET",url,true);
			ajax.onreadystatechange = function() {
	
		if(ajax.readyState == 4){
		
			document.getElementById("hora"+c).innerHTML = ajax.responseText;
			
		}
	}
	
	
	ajax.send(null);*/
	
	}//Aqui termina el for acerca del envio de datos al servidor
	
	
}//Aqui termina la funcion ajax



