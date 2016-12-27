<?
//in(select id from doctor where id=".$_POST['nombre'].")
session_start();

include("conexion.php");

	
	conectar();
	
	
	$datos = mysql_query("select * from datos where iddoctor = ".$_GET['id']."");
	$num_row = mysql_num_rows($datos);
	mysql_query('SET CHARACTER SET utf8');
	
	
	$s = "Select * from doctor where id = '".$_GET['id']."'";
	$sql = mysql_query($s);
	$num = mysql_num_rows($sql);
	mysql_query('SET CHARACTER SET utf8');
	$row = mysql_fetch_array($sql);
	
	switch($row['titulo'])
	{
		case 1: $tit = "Dr"; break;
		case 2: $tit = "Dra"; break;
		case 3: $tit = "Psic"; break;
		case 4: $tit = "Sr"; break;
		case 5: $tit = "Sra"; break;
		case 6: $tit = "Srita"; break;
		case 7: $tit = "MC"; break;
		case 8: $tit = "Lic"; break;
		case 9: $tit = "Ing"; break;
	}
	
	
	$mensaje = "Bienvenido ".$tit." ".$row['nombre']." ".$row['a_paterno']." ".$row['a_materno'];





?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DOX Calendar - <? echo $tit." ".$row['nombre']." ".$row['a_paterno']." ".$row['a_materno']; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel='stylesheet' type='text/css' href='reset.css' />
	<link rel='stylesheet' type='text/css' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/start/jquery-ui.css' />
	<link rel='stylesheet' type='text/css' href='../jquery.weekcalendar.css' />
	<link rel='stylesheet' type='text/css' href='demo.css' />
	<style type="text/css">
	.botonclinica {
	background-color: #14B9D6;
	border-bottom-left-radius: 2px;
	border-bottom-right-radius: 2px;
	border-top-left-radius: 2px;
	border-top-right-radius: 2px;
	color: #FFFFFF;
	display: block;
	float: left;
	height: 30px;
	line-height: 30px;
	margin-top: 10px;
	text-align: center;
	text-decoration: none;
	padding: 4px;
	padding-left:10px;
	padding-right:10px;
	margin-right: 4px;
	margin-bottom: 4px;
}
.botonclinica:hover {
	color: #FF9;
	text-decoration: none;
}
    h1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	font-weight: normal;
	color: #004C91;
	margin: 0px;
	padding: 0px;
}
    body {
	margin: 10px;
	background-color: #E6F9FF;
}
#cajainfo {
	clear: both;
	width: 100%;
	margin-right: auto;
	margin-left: auto;
	background-color: #E6F9FF;
	padding-top: 40px;
}
    #caja1 {
	float: left;
	width: 30%;
}
    #caja2 {
	width: 300px;
	float: left;
}
#cajacentro {
	width: 960px;
	margin-right: auto;
	margin-left: auto;
	padding-bottom: 40px;
}
    #mitabla {
	border: 1px solid #15B9D6;
	background-color: #FFF;
}
    #mitabla tr th, #mitabla tr td {
	padding: 5px;
}
#mitabla tr th{
	background-color: #15B9D6;
	color: #FFF;
}
    #mitabla tr td {
	padding-top: 5px;
	padding-bottom: 5px;
}
    .clave {
	background-color: #DEEFFF;
	display: block;
	height: 30px;
	width: 60px;
	color: #14B5D2;
	font-size: 16px;
	line-height: 30px;
	text-align: center;
}
    .bagenda {
	background-color: #15B9D6;
	height: 30px;
	display: inline-block;
	float: left;
	margin-right: 10px;
	margin-left: 10px;
	font-size: 12px;
	color: #FFF;
	line-height: 30px;
	text-decoration: none;
	padding-right: 10px;
	padding-left: 10px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
}
#mandar {
	background-color: #15B9D6;
	height: 30px;
	display: block;
	margin-right: auto;
	margin-left: auto;
	font-size: 12px;
	color: #FFF;
	line-height: 30px;
	text-decoration: none;
	padding-right: 10px;
	padding-left: 10px;
	width: 50%;
}
#mandar:hover , .bagenda:hover{
	background-color: #1EC3E9;
	font-size: 12px;
}
    #cabeza {
	background-color: #FFF;
	width: 100%;
}
#monto , #concepto{
	text-decoration: none;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
	background-color: #F1F0F3;
	width: 400px;
}
    </style>
	<script type="text/javascript" src="jquery.js"></script>
	<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js'></script>
	<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js'></script>
	<script type='text/javascript' src='../jquery.weekcalendar.js'></script>
	<script type='text/javascript' src='fechas.js'></script>
	<script type='text/javascript'>//Aqui esta el codigo que hace que funcione el calendario
	
	
	
	function obtener_clinica(){
      
      var lista = document.getElementById("clinica-select");
      var valor = lista.options[lista.selectedIndex].value;
      return valor;
   }
	
	$(document).ready(function() {


   var $calendar = $('#calendar');
   var id = <? echo $num_row; ?>;
   var iddoctor = <? echo $row['id']; ?>;
   $calendar.weekCalendar({
      timeslotsPerHour : 4,
      allowCalEventOverlap : true,
      overlapEventsSeparate: true,
      firstDayOfWeek : 1,
      businessHours :{start: 8, end: 24, limitDisplay: true },
      daysToShow : 7,
      height : function($calendar) {
         return $(window).height() - $("h1").outerHeight() - 1;
      },
      eventRender : function(calEvent, $event) {
         if (calEvent.end.getTime() < new Date().getTime()) 
		 {
			$event.css("backgroundColor", "#aaa");
            $event.find(".wc-time").css({
               "backgroundColor" : "#999",
               "border" : "1px solid #888"});
         }	
		 else
		 {
			 if (calEvent.status == "no-citar") 
			 {
         		$event.css("backgroundColor", "#CF0816");
            	$event.find(".wc-time").css({
               	"backgroundColor" : "#CF0816",
               	"border" : "1px solid #888",
             	"fontWeight" :"bold"});
         	}
		 	else
		 	{
                if (calEvent.status == "cita-hecha" ) 
				{					
         			$event.css("backgroundColor", "#A3BF8F");
            		$event.find(".wc-time").css({
               		"backgroundColor" : "#A1B55D",
               		"border" : "1px solid #888",
             		"fontWeight" :"bold"});
         		}
				else
				{
					if (calEvent.status == "cita-cancelada") 
					{
         				$event.css("backgroundColor", "#9A2EFE");
            			$event.find(".wc-time").css({
               			"backgroundColor" : "#4B088A",
               			"border" : "1px solid #888",
             			"fontWeight" :"bold"});
         			}
					else
					{
						if (calEvent.status == "cita-web" && calEvent.title != "") 
						{
         				$event.css("backgroundColor", "#e8a900");
            			$event.find(".wc-time").css({
               			"backgroundColor" : "#dfa916",
               			"border" : "1px solid #888",
             			"fontWeight" :"bold"});		
						}
						
					}
						
				}
		 	}
       
         }
		 

      
		 		 
      },
      draggable : function(calEvent, $event) {
         return calEvent.readOnly != true;
         
      },
      resizable : function(calEvent, $event) {
         return calEvent.readOnly != true;
      },
      eventNew : function(calEvent, $event) {
         
         var $dialogContent = $("#event_edit_container");
         resetForm($dialogContent);
         var startField = $dialogContent.find("select[name='start']").val(calEvent.start);
         var endField = $dialogContent.find("select[name='end']").val(calEvent.end);
         var titleField = $dialogContent.find("input[name='title']");
         var bodyField = $dialogContent.find("textarea[name='bodyf']");
     

         $dialogContent.dialog({
            modal: true,
            title: "Datos sobre la cita",
            close: function() {
               $dialogContent.dialog("destroy");
               $dialogContent.hide();
               $('#calendar').weekCalendar("removeUnsavedEvents");
            },
            buttons: {
									
               Guardar : function() { // Este Guardar es cuando el evento se crea por Primera Vez.
                  calEvent.id = id+1;
                  id++;
                  calEvent.iddoctor = iddoctor;
                  calEvent.start = new Date(startField.val());
                  calEvent.end = new Date(endField.val());
                  calEvent.title = titleField.val();
                  calEvent.bodyf = bodyField.val();
                  calEvent.status = "cita-web";
                  calEvent.clinica = obtener_clinica();

				  $calendar.weekCalendar("removeUnsavedEvents");
                  $calendar.weekCalendar("updateEvent", calEvent);
raiz(calEvent.iddoctor,calEvent.id,startField.val(),endField.val(),titleField.val(),bodyField.val(),calEvent.status,1,calEvent.clinica);
                  $dialogContent.dialog("close");
               },
			   
			   "Bloquear Cita" : function() {
                  calEvent.id = id+1;
                  id++;
                  calEvent.iddoctor = iddoctor;
                  calEvent.start = new Date(startField.val());
                  calEvent.end = new Date(endField.val());
                  calEvent.title = titleField.val();
                  calEvent.bodyf = bodyField.val();
                  calEvent.status = "no-citar";
                 calEvent.clinica = obtener_clinica();
				  $calendar.weekCalendar("removeUnsavedEvents");
                  $calendar.weekCalendar("updateEvent", calEvent);
				  raiz(calEvent.iddoctor,calEvent.id,startField.val(),endField.val(),titleField.val(),bodyField.val(),calEvent.status,1,calEvent.clinica);
             
                  $dialogContent.dialog("close");
               },
			   
			   
			      Cerrar : function() {
                  $dialogContent.dialog("close");
                  //con esta funcion se cierra la caja de dialogo sin necesida de mover nada....
               }
            }
         }).show();

         $dialogContent.find(".date_holder").text($calendar.weekCalendar("formatDate", calEvent.start));
 setupStartAndEndTimeFields(startField, endField, calEvent, $calendar.weekCalendar("getTimeslotTimes", calEvent.start));

      },
      eventDrop : function(calEvent, $event) {
       
         var $dialogContent = $("#event_edit_container");
         resetForm($dialogContent);

         var startField = $dialogContent.find("select[name='start']").val(calEvent.start);
         var endField = $dialogContent.find("select[name='end']").val(calEvent.end);
         var titleField = $dialogContent.find("input[name='title']").val(calEvent.title);
		 var bodyField = $dialogContent.find("textarea[name='bodyf']").val(calEvent.bodyf);
         var statusField = calEvent.status;
         var clinica = $("select[name='clinica']").val(calEvent.clinica);
          $dialogContent.dialog({
            modal: true,
            title: "Verificar - " + calEvent.title,
            close: function() {
               $dialogContent.dialog("destroy");
               $dialogContent.hide();
               $('#calendar').weekCalendar("removeUnsavedEvents");

            },
             buttons: {
         
             aceptar : function() {
                  calEvent.start = new Date(startField.val());
                  calEvent.end = new Date(endField.val());
                  calEvent.title = titleField.val();
				  calEvent.bodyf = bodyField.val();
                  calEvent.status = statusField;
                  calEvent.clinica = obtener_clinica();
                  
raiz(calEvent.iddoctor,calEvent.id,startField.val(),endField.val(),titleField.val(),bodyField.val(),calEvent.status,2,calEvent.clinica);    
              $calendar.weekCalendar("updateEvent", calEvent);
              $dialogContent.dialog("close");
               },
               cancelar : function() {
               
                  $dialogContent.dialog("close");
               }
            }
         }).show();
          var startField = $dialogContent.find("select[name='start']").val(calEvent.start);
         var endField = $dialogContent.find("select[name='end']").val(calEvent.end);
         $dialogContent.find(".date_holder").text($calendar.weekCalendar("formatDate", calEvent.start));
         setupStartAndEndTimeFields(startField, endField, calEvent, $calendar.weekCalendar("getTimeslotTimes", calEvent.start));
         $(window).resize().resize(); //fixes a bug in modal overlay size ??


          },
      eventResize : function(calEvent, $event) {
      
            var $dialogContent = $("#event_edit_container");
         resetForm($dialogContent);

         var startField = $dialogContent.find("select[name='start']").val(calEvent.start);
         var endField = $dialogContent.find("select[name='end']").val(calEvent.end);
         var titleField = $dialogContent.find("input[name='title']").val(calEvent.title);
		 var bodyField = $dialogContent.find("textarea[name='bodyf']").val(calEvent.bodyf);
         var statusField = calEvent.status;
         var clinica = $("select[name='clinica']").val(calEvent.clinica);
          $dialogContent.dialog({
            modal: true,
            title: "Verificar - " + calEvent.title,
            close: function() {
               $dialogContent.dialog("destroy");
               $dialogContent.hide();
               $('#calendar').weekCalendar("removeUnsavedEvents");

            },
             buttons: {
         
             aceptar : function() {
                  calEvent.start = new Date(startField.val());
                  calEvent.end = new Date(endField.val());
                  calEvent.title = titleField.val();
				  calEvent.bodyf = bodyField.val();
                  calEvent.status = statusField;
                   calEvent.clinica = obtener_clinica();
raiz(calEvent.iddoctor,calEvent.id,startField.val(),endField.val(),titleField.val(),bodyField.val(),calEvent.status,2,calEvent.clinica);             
              $calendar.weekCalendar("updateEvent", calEvent);
              $dialogContent.dialog("close");
               },
               cancelar : function() {
               
                  $dialogContent.dialog("close");
               }
            }
         }).show();
          var startField = $dialogContent.find("select[name='start']").val(calEvent.start);
         var endField = $dialogContent.find("select[name='end']").val(calEvent.end);
         $dialogContent.find(".date_holder").text($calendar.weekCalendar("formatDate", calEvent.start));
         setupStartAndEndTimeFields(startField, endField, calEvent, $calendar.weekCalendar("getTimeslotTimes", calEvent.start));
         $(window).resize().resize(); //fixes a bug in modal overlay size ??



         
		},
      eventClick : function(calEvent, $event) {

         if (calEvent.readOnly) {
            return;
         }

         var $dialogContent = $("#event_edit_container");
         resetForm($dialogContent);
         var startField = $dialogContent.find("select[name='start']").val(calEvent.start);
         var endField = $dialogContent.find("select[name='end']").val(calEvent.end);
         var titleField = $dialogContent.find("input[name='title']").val(calEvent.title);
         var bodyField = $dialogContent.find("textarea[name='bodyf']").val(calEvent.bodyf);
        var clinica = $("select[name='clinica']").val(calEvent.clinica);

         $dialogContent.dialog({
            modal: true,
            title: "Editar - " + calEvent.title,
            close: function() {
               $dialogContent.dialog("destroy");
               $dialogContent.hide();
               $('#calendar').weekCalendar("removeUnsavedEvents");

            },
            buttons: {
         
             Actualizar : function() { // Este Guardar es el que opera cuando el evento YA ESTÁ CREADO.
                
				  calEvent.start = new Date(startField.val());
                  calEvent.end = new Date(endField.val());
                  calEvent.title = titleField.val();
                  calEvent.bodyf = bodyField.val();
                  calEvent.status = "cita-web";
                  calEvent.iddoctor = iddoctor;
                  calEvent.clinica = obtener_clinica();
raiz(calEvent.iddoctor,calEvent.id,startField.val(),endField.val(),titleField.val(),bodyField.val(),calEvent.status,2,
calEvent.clinica);             
              $calendar.weekCalendar("updateEvent", calEvent);
              $dialogContent.dialog("close");
               },
               "Eliminar" : function() {
                  $calendar.weekCalendar("removeEvent", calEvent.id);
raiz(calEvent.iddoctor,calEvent.id,startField.val(),endField.val(),titleField.val(),bodyField.val(),"borrado",2,
calEvent.clinica);
                 
                  $dialogContent.dialog("close");
               },
               Cancelar : function() {
               
                  $dialogContent.dialog("close");
               }
            }
         }).show();
         var startField = $dialogContent.find("select[name='start']").val(calEvent.start);
         var endField = $dialogContent.find("select[name='end']").val(calEvent.end);
         $dialogContent.find(".date_holder").text($calendar.weekCalendar("formatDate", calEvent.start));
         setupStartAndEndTimeFields(startField, endField, calEvent, $calendar.weekCalendar("getTimeslotTimes", calEvent.start));
         $(window).resize().resize(); //fixes a bug in modal overlay size ??

      },
      eventMouseover : function(calEvent, $event) {
                  
      },
      eventMouseout : function(calEvent, $event) {

      },
      noEvents : function() {

      },
      data : function(start, end, callback) {
         callback(getEventData());
      }
   });

   function resetForm($dialogContent) {
      $dialogContent.find("input").val("");
      $dialogContent.find("textarea").val("");
   }

   function getEventData() {
      var year = new Date().getFullYear();
   var month = new Date().getMonth();
      var day = new Date().getDate();
      return {
         events : [
            

         <?
         
               while($bd = mysql_fetch_array($datos))
               {
                   if($bd['status'] != 'borrado')
                   { 
                              
                  $inicial = separar_fecha($bd['inicio']);
                  $final = separar_fecha($bd['final']);
                  $hinicio = separar_hora($bd['hinicio']);
                  $hfinal = separar_hora($bd['hfinal']);
				/*  $bd['bodyf'] = str_replace ( "\r\n", "CACA", $bd['bodyf'] );*/
               
                  echo "
               {
                  'iddoctor':".$bd['iddoctor'].",
                  'id':".$bd['id'].",
                  'start': new Date(".$inicial[1].",".(($inicial[2])-1).",".$inicial[3].",".$hinicio[1].",".$hinicio[2]."),
                  'end': new Date(".$final[1].",".(($final[2])-1).",".$final[3].",".$hfinal[1].",".$hfinal[2]."),
                  'title':'".$bd['titulo']."',
				  'bodyf':'".$bd['bodyf']."',
                  'status':'".$bd['status']."',
                  'clinica':'".$bd['clinica']."'

               },"
               ;  
               
            }//A qui termina el if de status borrado
               
               }        
         
         ?>       
         
         ]
      };
   }


   /*
    * Sets up the start and end time fields in the calendar event
    * form for editing based on the calendar event being edited
    */
   function setupStartAndEndTimeFields($startTimeField, $endTimeField, calEvent, timeslotTimes) {

      for (var i = 0; i < timeslotTimes.length; i++) {
         var startTime = timeslotTimes[i].start;
         var endTime = timeslotTimes[i].end;
         var startSelected = "";
         if (startTime.getTime() === calEvent.start.getTime()) {
            startSelected = "selected=\"selected\"";
         }
         var endSelected = "";
         if (endTime.getTime() === calEvent.end.getTime()) {
            endSelected = "selected=\"selected\"";
         }
         $startTimeField.append("<option value=\"" + startTime + "\" " + startSelected + ">" + timeslotTimes[i].startFormatted + "</option>");
         $endTimeField.append("<option value=\"" + endTime + "\" " + endSelected + ">" + timeslotTimes[i].endFormatted + "</option>");

      }
      $endTimeOptions = $endTimeField.find("option");
      $startTimeField.trigger("change");
   }

   var $endTimeField = $("select[name='end']");
   var $endTimeOptions = $endTimeField.find("option");

   //reduces the end time options to be only after the start time options.
   $("select[name='start']").change(function() {
      var startTime = $(this).find(":selected").val();
      var currentEndTime = $endTimeField.find("option:selected").val();
      $endTimeField.html(
            $endTimeOptions.filter(function() {
               return startTime < $(this).val();
            })
            );

      var endTimeSelected = false;
      $endTimeField.find("option").each(function() {
         if ($(this).val() === currentEndTime) {
            $(this).attr("selected", "selected");
            endTimeSelected = true;
            return false;
         }
      });

      if (!endTimeSelected) {
         //automatically select an end date 2 slots away.
         $endTimeField.find("option:eq(1)").attr("selected", "selected");
      }
   });


   var $about = $("#about");

   $("#about_button").click(function() {
      $about.dialog({
         title: "DOX",
         width: 600,
         close: function() {
            $about.dialog("destroy");
            $about.hide();
         },
         buttons: {
            close : function() {
               $about.dialog("close");
            }
         }
      }).show();
   });


});	
	
	</script>
	
	
</head>
<body> 
<? 
conectar();
$sql2 = mysql_query("Select * From doctor, clinica where doctor.id = clinica.id_doctor and doctor.id = ".$_GET['id']."");
desconectar();

?><div id="cabeza"><div id="caja1">
<img src="../../visual/iconos/dox-calendar.png" alt="" width="190" height="68" /></div><div id="caja2">
<h1><? if(isset($mensaje)){echo $mensaje;} ?> </h1>
   <? while($row2 = mysql_fetch_array($sql2)) {?> 
   <a href="http://www.dox.mx/ficha-doctor.php?id=<? echo $row['id']; ?>&clinica=<? echo $row2[19]; ?>" target="_blank"  class="botonclinica">Mi ficha</a>
  
  <a href="http://www.dox.mx/calendar/a/calendar-u.php?id=<? echo $row['id']; ?>" target="_self"  class="botonclinica">Mi Agenda</a>
  
  <a class="botonclinica" href="http://www.dox.mx/ficha-doctor.php?id=<? echo $row['id']; ?>&clinica=<? echo $row2[19]; ?>" target="_blank">Clínica <? echo $row2[21]; ?></a><? } ?>
   </div><div style="clear:both"></div>
   </div>
	<!--<div id="about_button_container">
	<button type="button" id="refresh">Actualizar</button>	<button type="button" id="about_button">Acerca de DOX</button>
	</div>-->
<div id="cajainfo">
    
    <div id="cajacentro">
      <h1>¡Éxito!</h1>
      <p>Su cita con clave de reserva
  <? 
		conectar();
		
		
		$sql = mysql_query("SELECT * FROM datos where id = '".$_GET['iddato']."' and status = 'cita-hecha'  ORDER BY inicio DESC, hinicio DESC limit 0,10")or die("ERROR: Problemas con la Base de Datos. Contacte al Webmaster.");
mysql_query('SET CHARACTER SET utf8');
$row2 = mysql_fetch_array($sql);
echo $row2['clavereserva'];
	$d = "update datos  set status='autorizar-factura', autorizar='1', email='".$_GET['email']."', concepto='".$_GET['concepto']."', monto='".$_GET['monto']."' where id = '".$_GET['iddato']."'";
	$datos = mysql_query($d);   
	   
	   ?> ha sido autorizada para poder emitir una factura y ha sido enviada a <? echo $_GET['email'] ?>
        
        
        <?
	   //inicio email envio
	   
	   //Enviar correo doctor, paciente realizó una cita
$emailfac = $_GET['email'];
$sfrom1="DOX <no_contestar@dox.mx>"; //cuenta que envia 
$sdestinatario1=$emailfac; //cuenta destino 
$ssubject1="Ya puede generar su factura en DOX.mx"; //título

/*$shtml1="00:11 Query pasó por INSERT y luego hizo insert into datos(iddoctor,id,inicio,final,hinicio,hfinal,titulo,bodyf,status,clinica) VALUES('".$iddoctor."',
'".$row4[0]."', '".$inicio."', '".$final."', '".$hinicio."', '".$hfinal."','".$titulo."','".$bodyf."', '".$status."', '".$clinica."')";*/
$shtml1= "
<html> 
			
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
<body bgcolor=\"#DCEEFC\"> 

<table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"font-family:arial\" >
  <tr>
    <td height=\"40\" colspan=\"3\" align=\"center\" valign=\"middle\" bgcolor=\"#66CCFF\"><a href=\"http://www.dox.mx\" style=\"color:white\">Mensaje generado desde dox.mx</a></td>
  </tr>
  <tr>
    <td width=\"10%\">&nbsp;</td>
    <td align=\"center\"><a href=\"index.php\"><img src=\"http://www.dox.mx/visual/exito1.png\" width=\"545\" height=\"44\" /></a></td>
    <td width=\"10%\">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align=\"center\" style=\"font-size:13px\"><p><br>
        <h2>¡Ya puede generar su factura de DOX.mx!</h2></p>
      <p>-----------------------------------------</p>
	  <p>Solo acceda a su usuario en DOX.mx, entre a su panel y genere, imprima o recupere su factura desde la comodidad de un click.</p>
	  <p>-----------------------------------------</p>
   
      <br>
      DOX.mx es marca registrada 2014.
<br>
      <br>
	  <p style=\"font-size:10px\">AVISO DE PRIVACIDAD SIMPLIFICADO: DOX SOLUTIONS, S.A. DE C.V., CON DOMICILIO EN CALLE RIO QUELITE NO. 180, COL. GUADALUPE C.P. 80220 EN CULIACÁN, SINALOA, MÉXICO. UTILIZARÁ SUS DATOS PERSONALES AQUÍ RECABADOS PARA PODER GARANTIZAR EL BUEN FUNCIONAMIENTO DE LA APLICACIÓN Y/O HERRAMIENTA WEB A LA QUE ESTÁN ACCESANDO, ASÍ COMO RECIBIR NOTIFICACIONES, INVITACIONES, PROMOCIONES Y NOTICIAS, PARA PODER PERMITIR LA IDENTIFICACIÓN DEL USUARIO EN CASO DE MAL USO DEL SITIO. SI REQUIERE MAYOR INFORMACIÓN ACERCA DEL TRATAMIENTO Y DE LOS DERECHOS QUE PUEDE HACER VALER, USTED PUEDE ACCEDER AL AVISO DE PRIVACIDAD COMPLETO A TRAVÉS DE NUESTRA PAGINA <a href=\"http://www.dox.mx\" target=\"_blank\">WWW.DOX.MX</a> Y/O AL CORREO ELECTRONICO <a href=\"mailto:correo@dox.mx\">CORREO@DOX.MX</a>.</p>
   </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height=\"111\" background=\"http://dox.mx/visual/ciudad.png\"  colspan=\"3\" style=\" background-image:url(http://dox.mx/visual/ciudad.png); background-position:initial initial; background-repeat:repeat no-repeat; height:111px; margin-top:20px\" >&nbsp;</td>
  </tr>
</table>		
			
	</body></html>
";
$sheader1="From:".$sfrom1."\nReply-To:".$sfrom1."\n"; 
$sheader1=$sheader1."X-Mailer:PHP/".phpversion()."\n"; 
$sheader1=$sheader1."Mime-Version: 1.0\n"; 
$sheader1=$sheader1."Content-Type: text/html; charset=utf-8\r\n\r\n"; 
mail($sdestinatario1,$ssubject1,$shtml1,$sheader1);

	   
	   //fin email envio
	   ?>
        
        
        <? desconectar();
	   ?>
        
        
      </p>
      <p>&nbsp;</p>
      <p><a href="http://www.dox.mx/calendar/a/calendar-u.php?id=<? echo $row['id']; ?>">&lt; Regresar a Agenda</a></p>
      <p>&nbsp;</p>
  </div></div>
	
	<div id="about">
	  <h2>DOX</h2>
		<p>
			En este calendario podrás definir los espacios de tiempo que tendrás disponible para reservar citas, así como indicar el tiempo no disponible.
		</p>
		<p>
			También aparecerán todas las citas realizadas a través de <a href="http://www.dox.mx" target="_blank">DOX</a>
		</p>
		<h2>Instrucciones</h2>
		<p>
			Para indicar el espacio disponible debes hacer lo siguiente:
		</p>
		<ul class="formatted">
			<li>Hacer clic en el calendario en la hora y día que deseas abrir espacio para una cita.</li>
			<li>Aparecerá un menú donde podrás indicar la hora de inicio y final.</li>
			<li>Y hacer clic en el botón de GUARDAR. </li>
			
		</ul>
        <p>
			Para indicar el espacio no disponible debes hacer lo siguiente:
		</p>
		<ul class="formatted">
			<li>Seguir los mismos pasos que en ejemplo anterior sólo que hacer clic en el botón de BLOQUEAR CITA.</li>
		</ul>
        
        <h2>Cada color representa una situación</h2>
        <p>
			
            Azul: Espacio disponible para una cita.</br>
            Rojo: Espacio no disponible para una cita.</br>
            Verde: Cita realizada vía web.</br>
            Morado: Cita cancelada via web.</br>
            Gris: Cita anterior.</br>
            Naranja: Cita creada por el doctor.
		</p>
	</div>
</body>
</html>

