<?

	include("conexion.php");

	conectar();
		
	$datos = mysql_query("select * from datos");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>

	<title>Prueba de Calendario</title>
	<link rel='stylesheet' type='text/css' href='reset.css' />
	<link rel='stylesheet' type='text/css' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/start/jquery-ui.css' />
	<link rel='stylesheet' type='text/css' href='../jquery.weekcalendar.css' />
	<link rel='stylesheet' type='text/css' href='demo.css' />
	
	<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js'></script>
	<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js'></script>
	<script type='text/javascript' src='../jquery.weekcalendar.js'></script>
	<script type='text/javascript' src='fechas.js'></script>
	<script type='text/javascript'>//Aqui esta el codigo que hace que funcione el calendario
	
	
	
	$(document).ready(function() {


   var $calendar = $('#calendar');
   var id = <? echo mysql_num_rows($datos) ?>;

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
         if (calEvent.end.getTime() < new Date().getTime()) {
			$event.css("backgroundColor", "#aaa");
            $event.find(".wc-time").css({
               "backgroundColor" : "#999",
               "border" : "1px solid #888"
			  
            });
         }		 
		 if (calEvent.status == "cita-web") {
			$event.css("backgroundColor", "#8ACBC5");
            $event.find(".wc-time").css({
               "backgroundColor" : "#8ACBC5",
               "border" : "1px solid #888",
			    "fontWeight" :"bold"
            });
         }
		 if (calEvent.status == "no-citar") {
			$event.css("backgroundColor", "#CF0816");
            $event.find(".wc-time").css({
               "backgroundColor" : "#CF0816",
               "border" : "1px solid #888",
			    "fontWeight" :"bold"
            });
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
         var bodyField = $dialogContent.find("textarea[name='body']");


         $dialogContent.dialog({
            modal: true,
            title: "Datos sobre la cita",
            close: function() {
               $dialogContent.dialog("destroy");
               $dialogContent.hide();
               $('#calendar').weekCalendar("removeUnsavedEvents");
            },
            buttons: {
									
               guardar : function() {
                  calEvent.id = id+1;
                  id++;
                  calEvent.start = new Date(startField.val());
                  calEvent.end = new Date(endField.val());
                  calEvent.title = titleField.val();
                  calEvent.body = bodyField.val();
				  $calendar.weekCalendar("removeUnsavedEvents");
                  $calendar.weekCalendar("updateEvent", calEvent);
				  raiz(id,startField.val(),endField.val(),titleField.val(),"cita-web",1);
                  $dialogContent.dialog("close");
               },
			   
			   "no citar" : function() {
                  calEvent.id = id+1;
                  id++;
                  calEvent.start = new Date(startField.val());
                  calEvent.end = new Date(endField.val());
                  calEvent.title = titleField.val();
                  calEvent.body = bodyField.val();
				  $calendar.weekCalendar("removeUnsavedEvents");
                  $calendar.weekCalendar("updateEvent", calEvent);
				  raiz(id,startField.val(),endField.val(),titleField.val(),"no-citar",1);
                  $dialogContent.dialog("close");
               },
			      cancelar : function() {
                  $dialogContent.dialog("close");
               }
            }
         }).show();

         $dialogContent.find(".date_holder").text($calendar.weekCalendar("formatDate", calEvent.start));
         setupStartAndEndTimeFields(startField, endField, calEvent, $calendar.weekCalendar("getTimeslotTimes", calEvent.start));

      },
      eventDrop : function(calEvent, $event) {
			
			raiz(calEvent.id,calEvent.start,calEvent.end,calEvent.title,calEvent.status,2);
			
      },
      eventResize : function(calEvent, $event) {
			 
			 raiz(calEvent.id,calEvent.start,calEvent.end,calEvent.title,calEvent.status,2);
			 	  
	  
	  
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
         var bodyField = $dialogContent.find("textarea[name='body']");
         bodyField.val(calEvent.body);

         $dialogContent.dialog({
            modal: true,
            title: "Editar - " + calEvent.title,
            close: function() {
               $dialogContent.dialog("destroy");
               $dialogContent.hide();
               $('#calendar').weekCalendar("removeUnsavedEvents");
            },
            buttons: {
			
			    Guardar : function() {
                  calEvent.start = new Date(startField.val());
                  calEvent.end = new Date(endField.val());
                  calEvent.title = titleField.val();
                  calEvent.body = bodyField.val();
				  raiz(id,startField.val(),endField.val(),titleField.val(),"cita-web",1);				  
				  $calendar.weekCalendar("updateEvent", calEvent);
				  $dialogContent.dialog("close");
               },
               "borrar" : function() {
                  $calendar.weekCalendar("removeEvent", calEvent.id);
				  raiz(id,startField.val(),endField.val(),titleField.val(),"cita-web",3);
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
										
						$inicial = separar_fecha($bd['inicio']);
						$final = separar_fecha($bd['final']);
						$hinicio = separar_hora($bd['hinicio']);
						$hfinal = separar_hora($bd['hfinal']);
					
						echo "
					{
						'id':".$bd['id'].",
						'start': new Date(".$inicial[1].",".(($inicial[2])-1).",".$inicial[3].",".$hinicio[1].",".$hinicio[2]."),
						'end': new Date(".$final[1].",".(($final[2])-1).",".$final[3].",".$hfinal[1].",".$hfinal[2]."),
						'title':'".$bd['titulo']."',
						'status':'".$bd['status']."'

					},"
					;	
					
					
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


	<h1>Calendar Test * </h1>
	<div id="about_button_container">
		<button type="button" id="about_button">Acerca de DOX</button>
	</div>
	<div id='calendar'></div>
	<div id="event_edit_container">
		<form>
			<input type="hidden" />
			<ul>
				<li>
					<span>Fecha: </span><span class="date_holder"></span> 
				</li>
				<li>
					<label for="start">Tiempo Inicial: </label><select name="start" id="inicial"><option value="">Select Start Time</option></select>
				</li>
				<li>
					<label for="end">Tiempo Final: </label><select name="end" id="final"><option value="">Select End Time</option></select>
				</li>
				<li>
					<label for="title">Titulo: </label><input type="text" name="title" />
				</li>
				<li>
					<label for="body">Observaciones: </label><textarea name="body"></textarea>
				</li>
			</ul>
		</form>
	</div>
	<div id="about">
		<h2>Summary</h2>
		<p>
			This calendar implementation demonstrates further usage of the calendar with editing and deleting of events. 
			It stops short however of implementing a server-side back-end which is out of the scope of this plugin. It 
			should be reasonably evident by viewing the demo source code, where the points for adding ajax should be. 
			Note also that this is **just a demo** and some of the demo code itself is rough. It could certainly be 
			optimised.
		</p>
		<p>
			***Note: This demo is straight out of SVN trunk so may show unreleased features from time to time.
		</p>
		<h2>Demonstrated Features</h2>
		<p>
			This calendar implementation demonstrates the following features:
		</p>
		<ul class="formatted">
			<li>Adding, updating and deleting of calendar events using jquery-ui dialog. Also includes 
				additional calEvent data (body field) not defined by the calEvent data structure to show the storage 
				of the data within the calEvent</li>
			<li>Dragging and resizing of calendar events</li>
			<li>Restricted timeslot rendering based on business hours</li>
			<li>Week starts on Monday instead of the default of Sunday</li>
			<li>Allowing calEvent overlap with staggered rendering of overlapping events</li>
			<li>Use of the 'getTimeslotTimes' method to retrieve valid times for a given event day. This is used to populate
				select fields for adding, updating events.</li>
			<li>Use of the 'eventRender' callback to add a different css class to calEvents in the past</li>
			<li>Use of additional calEvent data to enforce readonly behaviour for a calendar event. See the event
				titled "i'm read-only"</li>
		</ul>
	</div>
	
</body>
</html>
