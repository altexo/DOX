// ********** BEGIN VALIDATION FUNCTIONS ***********

// Muestra la fecha Actual (o de la maquina) para un campo llamado fecha_ini
function FechaActual() {
var mydate=new Date()
var theyear=mydate.getYear()
if (theyear < 1000)
theyear+=1900
var theday=mydate.getDay()
var themonth=mydate.getMonth()+1
if (themonth<10)
themonth="0"+themonth
var theday=mydate.getDate()
if (theday<10)
theday="0"+theday

//////EDIT below three variable to customize the format of the date/////

var displayfirst=theday
var displaysecond=themonth
var displaythird=theyear

////////////////////////////////////

//document.forms[0].txtFecha.value=displayfirst+"/"+displaysecond+"/"+displaythird
document.forms[0].fecha_ini.value=displayfirst+"/"+displaysecond+"/"+displaythird

}

// Muestra la fecha Actual (o de la maquina) para un campo llamado fecha_cierre
function FechaActualCierre() {
var mydate=new Date()
var theyear=mydate.getYear()
if (theyear < 1000)
theyear+=1900
var theday=mydate.getDay()
var themonth=mydate.getMonth()+1
if (themonth<10)
themonth="0"+themonth
var theday=mydate.getDate()
if (theday<10)
theday="0"+theday

//////EDIT below three variable to customize the format of the date/////

var displayfirst=theday
var displaysecond=themonth
var displaythird=theyear

////////////////////////////////////

//document.forms[0].txtFecha.value=displayfirst+"/"+displaysecond+"/"+displaythird
document.forms[0].fecha_cierre.value=displayfirst+"/"+displaysecond+"/"+displaythird

}


// ===== Compara el mes =====
function mesLetra ( mesNumero ) {
	if (mesNumero  == "01" ) {
		return "Enero"
	}
	if (mesNumero  == "02" ) {
		return "Febrero"
	}
	if (mesNumero  == "03" ) {
		return "Marzo"
	}
	if (mesNumero  == "04" ) {
		return "Abril"
	}
	if (mesNumero  == "05" ) {
		return "Mayo"
	}
	if (mesNumero  == "06" ) {
		return "Junio"
	}
	if (mesNumero  == "07" ) {
		return "Julio"
	}
	if (mesNumero  == "08" ) {
		return "Agosto"
	}
	if (mesNumero  == "09" ) {
		return "Septiembre"
	}
	if (mesNumero  == "10" ) {
		return "Octubre"
	}
	if (mesNumero  == "11" ) {
		return "Noviembre"
	}
	if (mesNumero  == "12" ) {
		return "Diciembre"
	}
}

function validate_date(formName, fieldDescription, textName)
{
 var errMsg="", lenErr=false, dateErr=false;
 var testObj=eval('document.' + formName + '.' + textName + '.value');
 var testStr=testObj.split('/');
 //var MsgError="";
 if(testStr.length>3 || testStr.length<3)
 {
  fieldValue	= document.forms[0][textName].value; 
  if(( fieldValue == "" ) || ( fieldValue == " " )) {
		return "";
  }
 
  lenErr=true;
  dateErr=true;
  errMsg+="Existe un error en el formato de la Fecha.";
 }
 var monthsArr = new Array("01", "02", "03", "04", "05", "06", "07", "08" ,"09", "10", "11", "12");
 var daysArr = new Array;
 for (var i=0; i<12; i++)
 {
  if(i!=1)
  {
   if((i/2)==(Math.round(i/2)))
   {
    if(i<=6)
    {
     daysArr[i]="31";
    }
    else
    {
     daysArr[i]="30";
    }
   }
   else
   {
    if(i<=6)
    {
     daysArr[i]="30";
    }
    else
    {
     daysArr[i]="31";
    }
   }
  }
  else
  {
   if((testStr[2]/4)==(Math.round(testStr[2]/4)))
   {
    daysArr[i]="29";
   }
   else
   {
    daysArr[i]="28";
   }
  }
 } 
 var monthErr=false, yearErr=false;
 if(testStr[2]<1000 && !lenErr)
 {
  yearErr=true;
  dateErr=true;
  errMsg+="El año\"" + testStr[2] + "\" no es correcto.";
 }
 for(var i=0; i<12; i++)
 {
  if(testStr[1]==monthsArr[i])
  {
   var setMonth=i;
   break;
  }
 }
 if(!lenErr && (setMonth==undefined))
 {
  monthErr=true;
  errMsg+="El mes \"" + testStr[1] + "\" no es correcto.";
  dateErr=true;
 }
 if(!monthErr && !yearErr && !lenErr)
 {
  if(testStr[0]>daysArr[setMonth])
  {
   errMsg+=mesLetra (testStr[1]) + ' ' + testStr[2] + ' no tiene ' + testStr[0] + ' dias.';
   dateErr=true;
  }
 }
 if(!dateErr)
 {
   return "";
  //eval('document.' + formName + '.' + 'submit()');
 }
 else
 { 
   //MsgError = "\"" + fieldDescription +  "\"  - " + errorMsg + "";
   //return "Error en la Fecha!!";
   return "\"" + fieldDescription +  "\"  - " + errMsg + "";
   //return fieldDescription + " - " + errMsg;
  //alert(errMsg + '\n____________________________\n\nFecha de EJEMPLO :\n23/02/1983');
  //eval('document.' + formName + '.' + textName + '.focus()');
  //eval('document.' + formName + '.' + textName + '.select()');
 }
  
}


function runValidation() {

		// Add the error messages, if any
	var obj_Error	= new ErrorMsg();
	obj_Error.AddCategory();
	for ( var i = 1; i < ( numChecks + 1 ); i++ )  {
		if ( checkFields[i] != "" ) obj_Error.AddMessage( checkFields[i] );
	}

		// Display errors
	if( obj_Error.errors == false ) {
	    vendedor_guar();
		//document.forms[0].submit();
		//document.forma_datos.submit();
	} else {
		obj_Error.DisplayMessage();
		return false;
	}
	
}


	// ===== Verifica si Ambas contraseñas son Iguales =====
function es_igual_contrasena ( fieldName1, fieldName2, fieldDescription, errorLabel ) {
	errorMsg	= "";
	fieldValue1	= document.forms[0][fieldName1].value;
	fieldValue2	= document.forms[0][fieldName2].value;
	
	if(( fieldValue2 != fieldValue1 )) {
		errorMsg = "\"" + fieldDescription +  "\"  - " + errorLabel + "";
	}
	return errorMsg ;
}

	// ===== Check if field is required STRINGS=====
function isRequired ( fieldName, fieldDescription, errorLabel ) {
	errorMsg	= "";
	fieldValue	= document.forms[0][fieldName].value;
	if(( fieldValue == "" ) || ( fieldValue == " " )) {
		errorMsg = "\"" + fieldDescription +  "\"  - " + errorLabel + "";
	}
	return errorMsg ;
}

	// ===== Check if field is required NUMBERS=====
function isRequiredNum ( fieldName, fieldDescription, errorLabel ) {
	errorMsg	= "";
	fieldValue	= document.forms[0][fieldName].value;
	if(( fieldValue == "0.00" ) || ( fieldValue == "0" )) {
		errorMsg = "\"" + fieldDescription +  "\"  - " + errorLabel + "";
	}
	return errorMsg ;
}

	// ===== Validate field minimum and maximum length =====
function validateMinMax ( fieldName, fieldDescription, minLength, maxLength ) {
	errorMsg	= "";
	fieldValue	= document.forms[0][fieldName].value;
	fieldLength	= document.forms[0][fieldName].value.length;
	if ( fieldLength < minLength ) {
		errorMsg = "\"" + fieldDescription +  "\"  - Por favor introduzca como MINIMO " + minLength + " caracteres.";
	} else if (( fieldLength > maxLength ) && ( maxLength > 0 )) {
		errorMsg = "\"" + fieldDescription +  "\"  - Por favor introduzca como MAXIMO " + maxLength + " caracteres.";
	}
	return errorMsg ;
}

	// ===== Check if netry contains only valid characters =====
function checkValidChars( fieldName, fieldDescription, errorLabel, validCharsList ) {
	errorMsg	= "";
	fieldValue	= document.forms[0][fieldName].value;
	fieldLength	= document.forms[0][fieldName].value.length;
	for( var i=0; i<fieldLength; i++ ) {
		if ( validCharsList.indexOf( fieldValue.charAt( i )) == -1 ) {
			errorMsg = "\"" + fieldDescription +  "\" - " + errorLabel + "";
		}
	}
	return errorMsg ;
}

	// ===== Check if entry contains entirely identical characters =====
function checkIdentical( fieldName, fieldDescription, errorLabel ) {
	errorMsg	= "";
	fieldValue	= document.forms[0][fieldName].value;
	fieldLength	= document.forms[0][fieldName].value.length;

	if (( fieldLength > 1 ) && ( isComposedOfChars( fieldValue.charAt( 0 ), fieldValue ))) {
		errorMsg = "\"" + fieldDescription +  "\" - " + errorLabel + "";
	}
	return errorMsg ;
}

function isComposedOfChars( curChar, inString ) {
	return ( indexOfFirstNotIn( curChar, inString ) == -1 );
}

function indexOfFirstNotIn( okayChars, inString ) {
	for ( var i=0; i<inString.length; i++ ) {
		if ( okayChars.indexOf( inString.charAt( i )) == -1 ) {
			return i;
		}
	}
	return -1;
}

	// ===== Check if entry contains entirely sequential characters =====
function checkSequential( fieldName, fieldDescription, errorLabel ) {
	errorMsg	= "";
	fieldValue	= document.forms[0][fieldName].value;
	fieldLength	= document.forms[0][fieldName].value.length;

	if ( fieldLength > 1 ) {
		for ( var i = 1; i < ( numSeqStr + 1 ); i++ )  {
			if ( strSeq[i].indexOf( fieldValue ) != -1 ) {
				errorMsg = "\"" + fieldDescription +  "\" - " + errorLabel + "";
			}
		}
	}
	return errorMsg ;
}

	// ===== Check if an option has been selected =====
function validateSelectBox( fieldName, fieldDescription, errorLabel, checkWhat ) {
	errorMsg	= "";
	optSelected	= document.forms[0][fieldName].selectedIndex;
	fieldValue	= document.forms[0][fieldName].options[optSelected].value;
	if( fieldValue == checkWhat ) {
		errorMsg = "\"" + fieldDescription +  "\" - " + errorLabel + "";
	}
	return errorMsg ;
}

	// ===== Check if a checkbox or radio button has been selected =====
function validateBtnsBox( fieldName, fieldDescription, errorLabel ) {
	errorMsg	= "";
	selection = null;
	thisButton		= document.forms[0][fieldName];
	for( var i=0; i<thisButton.length; i++ ) {
		if( thisButton[i].checked ) {
		   selection = thisButton[i].value;
		}
	}
	if( selection == null ) {
		//errorMsg = "\"" + fieldDescription +  "\" - " + errorLabel + "";
		errorMsg = "\"" + fieldDescription +  "\" - " + errorLabel + "" + thisButton.length;
	}
	return errorMsg;
}

	// ===== Check if a checkbox or radio button has been selected =====
function validateBtnBox( fieldName, fieldDescription, errorLabel ) {
	errorMsg	= "";
	selection = null;
	thisButton		= document.forms[0][fieldName];
		if( thisButton.checked ) {
		   selection = thisButton.value;
		}
	if( selection == null ) {
		//errorMsg = "\"" + fieldDescription +  "\" - " + errorLabel + "";
		errorMsg = "\"" + fieldDescription +  "\" - " + errorLabel + "";
	}
	return errorMsg;
}

	// ===== Check if entry contains only numbers =====
function validateNumBox( fieldName, fieldDescription, errorLabel ) {
	errorMsg	= "";
	fieldValue	= document.forms[0][fieldName].value;
	fieldLength	= document.forms[0][fieldName].value.length;

	for( var i = 0; i < fieldLength; i++ ) {
		var ch = fieldValue.substring( i, i + 1 );
		if (( ch < "0" ) || ( ch > "9" )) {
			errorMsg = "\"" + fieldDescription +  "\" - " + errorLabel + "";
		}
	}
	return errorMsg ;
}

	// ===== Validate an email address =====
function validateEmailBox ( fieldName, fieldDescription, errorLabel ) {
	errorMsg	= "";
	fieldValue	= document.forms[0][fieldName].value;
	fieldLength	= document.forms[0][fieldName].value.length;

	if ( fieldLength > 0 ) {

		if (( errorLabel == "" ) || ( errorLabel == null )) {

			errorLabel1	= "Este NO ES un EMAIL valido!.";			// Not valid
			errorLabel2	= "Falta el signo [ @ ].";					// Missing "@"
			errorLabel3	= "Falta el signo [ . ].";					// Missing "."
			errorLabel4	= "No puede comenzar con un espacio.";		// Starts with " "
			errorLabel5	= "No puede comenzar el signo [ @ ].";		// Starts with "@"
			errorLabel6	= "No puede comenzar el signo [ . ].";		// Starts with "."

			if ( fieldValue.indexOf( "@" ) == -1 ) {
				errorMsg = "\"" + fieldDescription +  "\"  - " + errorLabel2 + "";
			} else if ( fieldValue.indexOf( "." ) == -1 ) {
				errorMsg = "\"" + fieldDescription +  "\"  - " + errorLabel3 + "";
			} else if ( fieldValue.charAt( 0 ) == " " ) {
				errorMsg = "\"" + fieldDescription +  "\"  - " + errorLabel4 + "";
			} else if ( fieldValue.charAt( 0 ) == "@" ) {
				errorMsg = "\"" + fieldDescription +  "\"  - " + errorLabel5 + "";
			} else if ( fieldValue.charAt( 0 ) == "." ) {
				errorMsg = "\"" + fieldDescription +  "\"  - " + errorLabel6 + "";
			}

		} else {

			if (( fieldValue.indexOf( "@" ) == -1 ) || 					// Missing "@"
				( fieldValue.indexOf( "." ) == -1 ) || 					// Missing "."
				( fieldValue.charAt( 0 ) == "@" ) || 					// Starts with "@"
				( fieldValue.charAt( 0 ) == "." ) 						// Starts with "."
				) {
				errorMsg = "\"" + fieldDescription +  "\"  - " + errorLabel1 + "";
			}
		}
	}
	return errorMsg ;
}
// *********** END VALIDATION FUNCTIONS ************


// ************ BEGIN OBJECT FUNCTIONS *************
function AddCategory( str_Name ) {
		// Creates a new category object at the next space in the array
	this.obj_Errors[this.obj_Errors.length] = new NewCategory( str_Name );
	this.NewCategory = NewCategory;
}

function NewCategory( str_Name) {
		//  Initializes the category values
	this.str_Name		= str_Name;
	this.str_Error		= "";
}

function AddMessage( str_Msg ) {
	for ( var i = 0; i < this.obj_Errors.length; i++ )  {
		this.obj_Errors[i].str_Error += errorBullet;
		this.obj_Errors[i].str_Error += str_Msg + "\n";
		this.errors = true;
		return true;
	}
}

function ErrorMsg() {
		//  This is the object you create to keep track of errors in the document
	this.obj_Errors		= new Array();
	this.errors			= false;
	this.AddCategory	= AddCategory;
	this.AddMessage		= AddMessage;
	this.DisplayMessage	= DisplayMessage;
}
// ************* END OBJECT FUNCTIONS **************


function DisplayMessage() {
		// Displays the error messages.
		// If none, false is returned and no message is displayed.
	if ( this.errors == false ) {
		return false;
	} else {
		var str_msg = "";
		str_msg += errorLine1 + "\n";
		str_msg += errorLine2 + "\n";
		for ( var i = 0; i < this.obj_Errors.length; i++ ) {			// Go through all of the objects
			if ( this.obj_Errors[i].str_Error != '' ) {					// If errors, write the errors
				str_msg += "\n" + errorLine3 + "\n";
				str_msg += this.obj_Errors[i].str_Error + "\n";
			}
		}
		alert( str_msg );												// Display the error message
		return true;
	}
}

function changeBox(cbox) {
box = eval(cbox);
box.checked = !box.checked;
}

// CONVIERTE AL FORMATO DE MONEDA  
function formatCurrency(num) {
num = num.toString().replace(/\$|\,/g,'');
if(isNaN(num))
num = "0";
sign = (num == (num = Math.abs(num)));
num = Math.floor(num*100+0.50000000001);
cents = num%100;
num = Math.floor(num/100).toString();
if(cents<10)
cents = "0" + cents;
for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
num = num.substring(0,num.length-(4*i+3))+','+
num.substring(num.length-(4*i+3));
return (((sign)?'':'-') + '$' + num + '.' + cents);
}

// CONVIERTE A NUMERO REAL
function formatReal(num) {
num = num.toString().replace(/\|\,/g,'');
if(isNaN(num))
num = "0";
sign = (num == (num = Math.abs(num)));
num = Math.floor(num*100+0.50000000001);
cents = num%100;
num = Math.floor(num/100).toString();
if(cents<10)
cents = "0" + cents;
for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
num = num.substring(0,num.length-(4*i+3))+','+
num.substring(num.length-(4*i+3));
return (((sign)?'':'-') + '' + num + '.' + cents);
}

// CONVIERTE A NUMERO ENTERO
function formatNumero(num) {
num = num.toString();
if(isNaN(num)) num = "0";
num = Math.abs(num)
return (num);
}

function DateFormat(vDateName, vDateValue, e, dateCheck, dateType) {
vDateType = dateType;
// vDateName = object name
// vDateValue = value in the field being checked
// e = event
// dateCheck 
// True  = Verify that the vDateValue is a valid date
// False = Format values being entered into vDateValue only
// vDateType
// 1 = mm/dd/yyyy
// 2 = yyyy/mm/dd
// 3 = dd/mm/yyyy
//Enter a tilde sign for the first number and you can check the variable information.
if (vDateValue == "~") {
alert("AppVersion = "+navigator.appVersion+" \nNav. 4 Version = "+isNav4+" \nNav. 5 Version = "+isNav5+" \nIE Version = "+isIE4+" \nYear Type = "+vYearType+" \nDate Type = "+vDateType+" \nSeparator = "+strSeperator);
vDateName.value = "";
vDateName.focus();
return true;
}
var whichCode = (window.Event) ? e.which : e.keyCode;
// Check to see if a seperator is already present.
// bypass the date if a seperator is present and the length greater than 8
if (vDateValue.length > 8 && isNav4) {
if ((vDateValue.indexOf("-") >= 1) || (vDateValue.indexOf("/") >= 1))
return true;
}
//Eliminate all the ASCII codes that are not valid
var alphaCheck = " abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ/-";
if (alphaCheck.indexOf(vDateValue) >= 1) {
if (isNav4) {
vDateName.value = "";
vDateName.focus();
vDateName.select();
return false;
}
else {
vDateName.value = vDateName.value.substr(0, (vDateValue.length-1));
return false;
   }
}
if (whichCode == 8) //Ignore the Netscape value for backspace. IE has no value
return false;
else {
//Create numeric string values for 0123456789/
//The codes provided include both keyboard and keypad values
var strCheck = '47,48,49,50,51,52,53,54,55,56,57,58,59,95,96,97,98,99,100,101,102,103,104,105';
if (strCheck.indexOf(whichCode) != -1) {
if (isNav4) {
if (((vDateValue.length < 6 && dateCheck) || (vDateValue.length == 7 && dateCheck)) && (vDateValue.length >=1)) {
alert("Invalid Date\nPlease Re-Enter");
vDateName.value = "";
vDateName.focus();
vDateName.select();
return false;
}
if (vDateValue.length == 6 && dateCheck) {
var mDay = vDateName.value.substr(2,2);
var mMonth = vDateName.value.substr(0,2);
var mYear = vDateName.value.substr(4,4)
//Turn a two digit year into a 4 digit year
if (mYear.length == 2 && vYearType == 4) {
var mToday = new Date();
//If the year is greater than 30 years from now use 19, otherwise use 20
var checkYear = mToday.getFullYear() + 30; 
var mCheckYear = '20' + mYear;
if (mCheckYear >= checkYear)
mYear = '19' + mYear;
else
mYear = '20' + mYear;
}
var vDateValueCheck = mMonth+strSeperator+mDay+strSeperator+mYear;
if (!dateValid(vDateValueCheck)) {
alert("Invalid Date\nPlease Re-Enter");
vDateName.value = "";
vDateName.focus();
vDateName.select();
return false;
}
return true;
}
else {
// Reformat the date for validation and set date type to a 1
if (vDateValue.length >= 8  && dateCheck) {
if (vDateType == 1) // mmddyyyy
{
var mDay = vDateName.value.substr(2,2);
var mMonth = vDateName.value.substr(0,2);
var mYear = vDateName.value.substr(4,4)
vDateName.value = mMonth+strSeperator+mDay+strSeperator+mYear;
}
if (vDateType == 2) // yyyymmdd
{
var mYear = vDateName.value.substr(0,4)
var mMonth = vDateName.value.substr(4,2);
var mDay = vDateName.value.substr(6,2);
vDateName.value = mYear+strSeperator+mMonth+strSeperator+mDay;
}
if (vDateType == 3) // ddmmyyyy
{
var mMonth = vDateName.value.substr(2,2);
var mDay = vDateName.value.substr(0,2);
var mYear = vDateName.value.substr(4,4)
vDateName.value = mDay+strSeperator+mMonth+strSeperator+mYear;
}
//Create a temporary variable for storing the DateType and change
//the DateType to a 1 for validation.
var vDateTypeTemp = vDateType;
vDateType = 1;
var vDateValueCheck = mMonth+strSeperator+mDay+strSeperator+mYear;
if (!dateValid(vDateValueCheck)) {
alert("Invalid Date\nPlease Re-Enter");
vDateType = vDateTypeTemp;
vDateName.value = "";
vDateName.focus();
vDateName.select();
return false;
}
vDateType = vDateTypeTemp;
return true;
}
else {
if (((vDateValue.length < 8 && dateCheck) || (vDateValue.length == 9 && dateCheck)) && (vDateValue.length >=1)) {
alert("Invalid Date\nPlease Re-Enter");
vDateName.value = "";
vDateName.focus();
vDateName.select();
return false;
         }
      }
   }
}
else {
// Non isNav Check
if (((vDateValue.length < 8 && dateCheck) || (vDateValue.length == 9 && dateCheck)) && (vDateValue.length >=1)) {
alert("Invalid Date\nPlease Re-Enter");
vDateName.value = "";
vDateName.focus();
return true;
}
// Reformat date to format that can be validated. mm/dd/yyyy
if (vDateValue.length >= 8 && dateCheck) {
// Additional date formats can be entered here and parsed out to
// a valid date format that the validation routine will recognize.
if (vDateType == 1) // mm/dd/yyyy
{
var mMonth = vDateName.value.substr(0,2);
var mDay = vDateName.value.substr(3,2);
var mYear = vDateName.value.substr(6,4)
}
if (vDateType == 2) // yyyy/mm/dd
{
var mYear = vDateName.value.substr(0,4)
var mMonth = vDateName.value.substr(5,2);
var mDay = vDateName.value.substr(8,2);
}
if (vDateType == 3) // dd/mm/yyyy
{
var mDay = vDateName.value.substr(0,2);
var mMonth = vDateName.value.substr(3,2);
var mYear = vDateName.value.substr(6,4)
}
if (vYearLength == 4) {
if (mYear.length < 4) {
alert("Invalid Date\nPlease Re-Enter");
vDateName.value = "";
vDateName.focus();
return true;
   }
}
// Create temp. variable for storing the current vDateType
var vDateTypeTemp = vDateType;
// Change vDateType to a 1 for standard date format for validation
// Type will be changed back when validation is completed.
vDateType = 1;
// Store reformatted date to new variable for validation.
var vDateValueCheck = mMonth+strSeperator+mDay+strSeperator+mYear;
if (mYear.length == 2 && vYearType == 4 && dateCheck) {
//Turn a two digit year into a 4 digit year
var mToday = new Date();
//If the year is greater than 30 years from now use 19, otherwise use 20
var checkYear = mToday.getFullYear() + 30; 
var mCheckYear = '20' + mYear;
if (mCheckYear >= checkYear)
mYear = '19' + mYear;
else
mYear = '20' + mYear;
vDateValueCheck = mMonth+strSeperator+mDay+strSeperator+mYear;
// Store the new value back to the field.  This function will
// not work with date type of 2 since the year is entered first.
if (vDateTypeTemp == 1) // mm/dd/yyyy
vDateName.value = mMonth+strSeperator+mDay+strSeperator+mYear;
if (vDateTypeTemp == 3) // dd/mm/yyyy
vDateName.value = mDay+strSeperator+mMonth+strSeperator+mYear;
} 
if (!dateValid(vDateValueCheck)) {
alert("Invalid Date\nPlease Re-Enter");
vDateType = vDateTypeTemp;
vDateName.value = "";
vDateName.focus();
return true;
}
vDateType = vDateTypeTemp;
return true;
}
else {
if (vDateType == 1) {
if (vDateValue.length == 2) {
vDateName.value = vDateValue+strSeperator;
}
if (vDateValue.length == 5) {
vDateName.value = vDateValue+strSeperator;
   }
}
if (vDateType == 2) {
if (vDateValue.length == 4) {
vDateName.value = vDateValue+strSeperator;
}
if (vDateValue.length == 7) {
vDateName.value = vDateValue+strSeperator;
   }
} 
if (vDateType == 3) {
if (vDateValue.length == 2) {
vDateName.value = vDateValue+strSeperator;
}
if (vDateValue.length == 5) {
vDateName.value = vDateValue+strSeperator;
   }
}
return true;
   }
}
if (vDateValue.length == 10&& dateCheck) {
if (!dateValid(vDateName)) {
// Un-comment the next line of code for debugging the dateValid() function error messages
//alert(err);  
alert("Invalid Date\nPlease Re-Enter");
vDateName.focus();
vDateName.select();
   }
}
return false;
}
else {
// If the value is not in the string return the string minus the last
// key entered.
if (isNav4) {
vDateName.value = "";
vDateName.focus();
vDateName.select();
return false;
}
else
{
vDateName.value = vDateName.value.substr(0, (vDateValue.length-1));
return false;
         }
      }
   }
}
function dateValid(objName) {
var strDate;
var strDateArray;
var strDay;
var strMonth;
var strYear;
var intday;
var intMonth;
var intYear;
var booFound = false;
var datefield = objName;
var strSeparatorArray = new Array("-"," ","/",".");
var intElementNr;
// var err = 0;
var strMonthArray = new Array(12);
strMonthArray[0] = "Jan";
strMonthArray[1] = "Feb";
strMonthArray[2] = "Mar";
strMonthArray[3] = "Apr";
strMonthArray[4] = "May";
strMonthArray[5] = "Jun";
strMonthArray[6] = "Jul";
strMonthArray[7] = "Aug";
strMonthArray[8] = "Sep";
strMonthArray[9] = "Oct";
strMonthArray[10] = "Nov";
strMonthArray[11] = "Dec";
//strDate = datefield.value;
strDate = objName;
if (strDate.length < 1) {
return true;
}
for (intElementNr = 0; intElementNr < strSeparatorArray.length; intElementNr++) {
if (strDate.indexOf(strSeparatorArray[intElementNr]) != -1) {
strDateArray = strDate.split(strSeparatorArray[intElementNr]);
if (strDateArray.length != 3) {
err = 1;
return false;
}
else {
strDay = strDateArray[0];
strMonth = strDateArray[1];
strYear = strDateArray[2];
}
booFound = true;
   }
}
if (booFound == false) {
if (strDate.length>5) {
strDay = strDate.substr(0, 2);
strMonth = strDate.substr(2, 2);
strYear = strDate.substr(4);
   }
}
//Adjustment for short years entered
if (strYear.length == 2) {
strYear = '20' + strYear;
}
strTemp = strDay;
strDay = strMonth;
strMonth = strTemp;
intday = parseInt(strDay, 10);
if (isNaN(intday)) {
err = 2;
return false;
}
intMonth = parseInt(strMonth, 10);
if (isNaN(intMonth)) {
for (i = 0;i<12;i++) {
if (strMonth.toUpperCase() == strMonthArray[i].toUpperCase()) {
intMonth = i+1;
strMonth = strMonthArray[i];
i = 12;
   }
}
if (isNaN(intMonth)) {
err = 3;
return false;
   }
}
intYear = parseInt(strYear, 10);
if (isNaN(intYear)) {
err = 4;
return false;
}
if (intMonth>12 || intMonth<1) {
err = 5;
return false;
}
if ((intMonth == 1 || intMonth == 3 || intMonth == 5 || intMonth == 7 || intMonth == 8 || intMonth == 10 || intMonth == 12) && (intday > 31 || intday < 1)) {
err = 6;
return false;
}
if ((intMonth == 4 || intMonth == 6 || intMonth == 9 || intMonth == 11) && (intday > 30 || intday < 1)) {
err = 7;
return false;
}
if (intMonth == 2) {
if (intday < 1) {
err = 8;
return false;
}
if (LeapYear(intYear) == true) {
if (intday > 29) {
err = 9;
return false;
   }
}
else {
if (intday > 28) {
err = 10;
return false;
      }
   }
}
return true;
}
function LeapYear(intYear) {
if (intYear % 100 == 0) {
if (intYear % 400 == 0) { return true; }
}
else {
if ((intYear % 4) == 0) { return true; }
}
return false;
}

//  End -->

<!-- Begin
function emailCheck (fieldName, fieldDescription) {
errorMsg	= "";
emailStr = document.forms[0][fieldName].value;

if (emailStr=="") {
return errorMsg;
}
/* The following variable tells the rest of the function whether or not
to verify that the address ends in a two-letter country or well-known
TLD.  1 means check it, 0 means don't. */

var checkTLD=1;

/* The following is the list of known TLDs that an e-mail address must end with. */

var knownDomsPat=/^(com|net|org|edu|int|mil|gov|arpa|biz|aero|name|coop|info|pro|museum)$/;

/* The following pattern is used to check if the entered e-mail address
fits the user@domain format.  It also is used to separate the username
from the domain. */

var emailPat=/^(.+)@(.+)$/;

/* The following string represents the pattern for matching all special
characters.  We don't want to allow special characters in the address. 
These characters include ( ) < > @ , ; : \ " . [ ] */

var specialChars="\\(\\)><@,;:\\\\\\\"\\.\\[\\]";

/* The following string represents the range of characters allowed in a 
username or domainname.  It really states which chars aren't allowed.*/

var validChars="\[^\\s" + specialChars + "\]";

/* The following pattern applies if the "user" is a quoted string (in
which case, there are no rules about which characters are allowed
and which aren't; anything goes).  E.g. "jiminy cricket"@disney.com
is a legal e-mail address. */

var quotedUser="(\"[^\"]*\")";

/* The following pattern applies for domains that are IP addresses,
rather than symbolic names.  E.g. joe@[123.124.233.4] is a legal
e-mail address. NOTE: The square brackets are required. */

var ipDomainPat=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/;

/* The following string represents an atom (basically a series of non-special characters.) */

var atom=validChars + '+';

/* The following string represents one word in the typical username.
For example, in john.doe@somewhere.com, john and doe are words.
Basically, a word is either an atom or quoted string. */

var word="(" + atom + "|" + quotedUser + ")";

// The following pattern describes the structure of the user

var userPat=new RegExp("^" + word + "(\\." + word + ")*$");

/* The following pattern describes the structure of a normal symbolic
domain, as opposed to ipDomainPat, shown above. */

var domainPat=new RegExp("^" + atom + "(\\." + atom +")*$");

/* Finally, let's start trying to figure out if the supplied address is valid. */

/* Begin with the coarse pattern to simply break up user@domain into
different pieces that are easy to analyze. */

var matchArray=emailStr.match(emailPat);

if (matchArray==null) {

/* Too many/few @'s or something; basically, this address doesn't
even fit the general mould of a valid e-mail address. */

errorLabel = "El Correo Electrónico esta incorrecto (verifica los simbolos @ y .)";
errorMsg = "\"" + fieldDescription +  "\"  - " + errorLabel + "";
//alert("El Correo Electrónico esta incorrecto (verifica los simbolos @ y .)");
return errorMsg;
}
var user=matchArray[1];
var domain=matchArray[2];

// Start by checking that only basic ASCII characters are in the strings (0-127).

for (i=0; i<user.length; i++) {
if (user.charCodeAt(i)>127) {
errorLabel = "El nombre de Usuario contiene caracteres Inválidos.";
errorMsg = "\"" + fieldDescription +  "\"  - " + errorLabel + "";
//alert("El nombre de Usuario contiene caracteres Inválidos.");
return errorMsg;
   }
}
for (i=0; i<domain.length; i++) {
if (domain.charCodeAt(i)>127) {
errorLabel = "El nombre de Dominio contiene caracteres Inválidos.";
errorMsg = "\"" + fieldDescription +  "\"  - " + errorLabel + "";
//alert("El nombre de Dominio contiene caracteres Inválidos.");
return errorMsg;
   }
}

// See if "user" is valid 

if (user.match(userPat)==null) {

// user is not valid
errorLabel = "El nombre de Usuario no parece ser Válido.";
errorMsg = "\"" + fieldDescription +  "\"  - " + errorLabel + "";
//alert("El nombre de Usuario no parece ser Válido.");
return errorMsg;
}

/* if the e-mail address is at an IP address (as opposed to a symbolic
host name) make sure the IP address is valid. */

var IPArray=domain.match(ipDomainPat);
if (IPArray!=null) {

// this is an IP address

for (var i=1;i<=4;i++) {
if (IPArray[i]>255) {
errorLabel = "La dirección IP de Destino es Inválida!";
errorMsg = "\"" + fieldDescription +  "\"  - " + errorLabel + "";
//alert("La dirección IP de Destino es Inválida!");
return errorMsg;
   }
}
return errorMsg;
}

// Domain is symbolic name.  Check if it's valid.
 
var atomPat=new RegExp("^" + atom + "$");
var domArr=domain.split(".");
var len=domArr.length;
for (i=0;i<len;i++) {
if (domArr[i].search(atomPat)==-1) {
errorLabel = "El nombre de Dominio no parace ser Válido.";
errorMsg = "\"" + fieldDescription +  "\"  - " + errorLabel + "";
//alert("El nombre de Dominio no parace ser Válido.");
return errorMsg;
   }
}

/* domain name seems valid, but now make sure that it ends in a
known top-level domain (like com, edu, gov) or a two-letter word,
representing country (uk, nl), and that there's a hostname preceding 
the domain or country. */

if (checkTLD && domArr[domArr.length-1].length!=2 && 
domArr[domArr.length-1].search(knownDomsPat)==-1) {
errorLabel = "El Correo Electrónico debe terminar con un nombre de Dominio conocido o dos letras " + "del pais.";
errorMsg = "\"" + fieldDescription +  "\"  - " + errorLabel + "";
//alert("El Correo Electrónico debe terminar con un nombre de Dominio conocido o dos letras " + "pais.");
return errorMsg;
}

// Make sure there's a host name preceding the domain.

if (len<2) {
errorLabel = "Esta dirección no tiene un nombre de host!";
errorMsg = "\"" + fieldDescription +  "\"  - " + errorLabel + "";
//alert("Esta dirección no tiene un nombre de host!");
return errorMsg;
}

// If we've gotten this far, everything's valid!
return errorMsg;
}

// -------------------------------------------------------------------------
// 2 Funciones para el control de Fechas via Select Box
// -------------------------------------------------------------------------

function populate(inForm)
{
var temp=0;
var today= new Date();
var day= today.getDate();
var month= today.getMonth();
var year= today.getFullYear();
<!-- t2= prompt("Enter the number of years to fetch",1); -->
t2=35;



for (var i=0; i <31 ; i++)
	{
	var x= String(i+1);
	
	inForm.day.options[i] = new Option(x,x);
	}

for (var i=0; i <31 ; i++)
	{
	var d=0;
	d=inForm.day.options[i].value;
	if(d=day){
		inForm.day.options[d-1].selected=true;
		break;}
	}

for (var i=0,j=year; i <t2 ; i++, j--)
	{
	var y= String(j);
	inForm.year.options[i] = new Option(y,y);
		
	}
for(var i=0;i<12;i++)
	{
	
	if(i=month)
		{inForm.month.options[i].selected=true;
	break;}
	
	}

}

function populate2(inForm2)
{
var t3=0;


if(inForm2.month.options[1].selected)

t3=28;
else if(inForm2.month.options[8].selected||inForm2.month.options[3].selected||inForm2.month.options[5].selected||inForm2.month.options[10].selected)
t3=30;
else
t3=31;


for(i=0;i<31;i++){
inForm2.day.options[i]=null;
}

for (var i=0; i <t3 ; i++)
	{
	var x= String(i+1);
	inForm2.day.options[i] = new Option(x);
		
	}
}

// -------------------------------------------------------------------------
//  End -->

//Javascript name: My Date Time Picker
//Date created: 16-Nov-2003 23:19
//Scripter: TengYong Ng
//Website: http://www.rainforestnet.com
//Copyright (c) 2003 TengYong Ng
//FileName: DateTimePicker.js
//Version: 0.8
//Contact: contact@rainforestnet.com
// Note: Permission given to use this script in ANY kind of applications if
//       header lines are left unchanged.

//Global variables
var winCal;
var dtToday=new Date();
var Cal;
var docCal;
var MonthName=["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio","Julio", 
	"Agosto", "Septiembre", "Octubre", "Noviembre", "Deciembre"];
var WeekDayName=["Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado"];	
var exDateTime;//Existing Date and Time

//Configurable parameters
var cnTop="200";//top coordinate of calendar window.
var cnLeft="200";//left coordinate of calendar window
var WindowTitle ="Calendario";//Date Time Picker title.
var WeekChar=2;//number of character for week day. if 2 then Mo,Tu,We. if 3 then Mon,Tue,Wed.
var CellWidth=20;//Width of day cell.
var DateSeparator="/";//Date Separator, you can change it to "/" if you want.
var TimeMode=24;//default TimeMode value. 12 or 24

var ShowLongMonth=true;//Show long month name in Calendar header. example: "January".
var ShowMonthYear=true;//Show Month and Year in Calendar header.
var MonthYearColor="#cc0033";//Font Color of Month and Year in Calendar header.
var WeekHeadColor="#0099CC";//Background Color in Week header.
var SundayColor="#6699FF";//Background color of Sunday.
var SaturdayColor="#CCCCFF";//Background color of Saturday.
var WeekDayColor="white";//Background color of weekdays.
var FontColor="blue";//color of font in Calendar day cell.
var TodayColor="#FFFF33";//Background color of today.
var SelDateColor="#FFFF99";//Backgrond color of selected date in textbox.
var YrSelColor="#cc0033";//color of font of Year selector.
var ThemeBg="";//Background image of Calendar window.
//end Configurable parameters
//end Global variable

function NewCal(pCtrl,pFormat,pShowTime,pTimeMode)
{
	Cal=new Calendar(dtToday);
	if ((pShowTime!=null) && (pShowTime))
	{
		Cal.ShowTime=true;
		if ((pTimeMode!=null) &&((pTimeMode=='12')||(pTimeMode=='24')))
		{
			TimeMode=pTimeMode;
		}		
	}	
	if (pCtrl!=null)
		Cal.Ctrl=pCtrl;
	if (pFormat!=null)
		Cal.Format=pFormat.toUpperCase();
	
	exDateTime=document.getElementById(pCtrl).value;
	if (exDateTime!="")//Parse Date String
	{
		var Sp1;//Index of Date Separator 1
		var Sp2;//Index of Date Separator 2 
		var tSp1;//Index of Time Separator 1
		var tSp1;//Index of Time Separator 2
		var strMonth;
		var strDate;
		var strYear;
		var intMonth;
		var YearPattern;
		var strHour;
		var strMinute;
		var strSecond;
		//parse month
		Sp1=exDateTime.indexOf(DateSeparator,0)
		Sp2=exDateTime.indexOf(DateSeparator,(parseInt(Sp1)+1));
		
		if ((Cal.Format.toUpperCase()=="DDMMYYYY") || (Cal.Format.toUpperCase()=="DDMMMYYYY"))
		{
			strMonth=exDateTime.substring(Sp1+1,Sp2);
			strDate=exDateTime.substring(0,Sp1);
		}
		else if ((Cal.Format.toUpperCase()=="MMDDYYYY") || (Cal.Format.toUpperCase()=="MMMDDYYYY"))
		{
			strMonth=exDateTime.substring(0,Sp1);
			strDate=exDateTime.substring(Sp1+1,Sp2);
		}
		if (isNaN(strMonth))
			intMonth=Cal.GetMonthIndex(strMonth);
		else
			intMonth=parseInt(strMonth,10)-1;	
		if ((parseInt(intMonth,10)>=0) && (parseInt(intMonth,10)<12))
			Cal.Month=intMonth;
		//end parse month
		//parse Date
		if ((parseInt(strDate,10)<=Cal.GetMonDays()) && (parseInt(strDate,10)>=1))
			Cal.Date=strDate;
		//end parse Date
		//parse year
		strYear=exDateTime.substring(Sp2+1,Sp2+5);
		YearPattern=/^\d{4}$/;
		if (YearPattern.test(strYear))
			Cal.Year=parseInt(strYear,10);
		//end parse year
		//parse time
		if (Cal.ShowTime==true)
		{
			tSp1=exDateTime.indexOf(":",0)
			tSp2=exDateTime.indexOf(":",(parseInt(tSp1)+1));
			strHour=exDateTime.substring(tSp1,(tSp1)-2);
			Cal.SetHour(strHour);
			strMinute=exDateTime.substring(tSp1+1,tSp2);
			Cal.SetMinute(strMinute);
			strSecond=exDateTime.substring(tSp2+1,tSp2+3);
			Cal.SetSecond(strSecond);
		}	
	}
	winCal=window.open("","DateTimePicker","toolbar=0,status=0,menubar=0,fullscreen=no,width=195,height=245,resizable=0,top="+cnTop+",left="+cnLeft);
	docCal=winCal.document;
	RenderCal();
}

function RenderCal()
{
	var vCalHeader;
	var vCalData;
	var vCalTime;
	var i;
	var j;
	var SelectStr;
	var vDayCount=0;
	var vFirstDay;

	docCal.open();
	docCal.writeln("<html><head><title>"+WindowTitle+"</title>");
	docCal.writeln("<script>var winMain=window.opener;</script>");
	docCal.writeln("//Código Google Analitics
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-19893855-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script> </head>
<body background='"+ThemeBg+"' link="+FontColor+" vlink="+FontColor+"><form name='Calendar'>");

	vCalHeader="<table border=1 cellpadding=1 cellspacing=1 width='100%' align=\"center\" valign=\"top\">\n";
	//Month Selector
	vCalHeader+="<tr>\n<td colspan='7'><table border=0 width='100%' cellpadding=0 cellspacing=0><tr><td align='left'>\n";
	vCalHeader+="<select name=\"MonthSelector\" onChange=\"javascript:winMain.Cal.SwitchMth(this.selectedIndex);winMain.RenderCal();\">\n";
	for (i=0;i<12;i++)
	{
		if (i==Cal.Month)
			SelectStr="Selected";
		else
			SelectStr="";	
		vCalHeader+="<option "+SelectStr+" value >"+MonthName[i]+"\n";
	}
	vCalHeader+="</select></td>";
	//Year selector
	vCalHeader+="\n<td align='right'><a href=\"javascript:winMain.Cal.DecYear();winMain.RenderCal()\"><b><font color=\""+YrSelColor+"\"><</font></b></a><font face=\"Verdana\" color=\""+YrSelColor+"\" size=2><b> "+Cal.Year+" </b></font><a href=\"javascript:winMain.Cal.IncYear();winMain.RenderCal()\"><b><font color=\""+YrSelColor+"\">></font></b></a></td></tr></table></td>\n";	
	vCalHeader+="</tr>";
	//Calendar header shows Month and Year
	if (ShowMonthYear)
		vCalHeader+="<tr><td colspan='7'><font face='Verdana' size='2' align='center' color='"+MonthYearColor+"'><b>"+Cal.GetMonthName(ShowLongMonth)+" "+Cal.Year+"</b></font></td></tr>\n";
	//Week day header
	vCalHeader+="<tr bgcolor="+WeekHeadColor+">";
	for (i=0;i<7;i++)
	{
		vCalHeader+="<td align='center'><font face='Verdana' size='2'>"+WeekDayName[i].substr(0,WeekChar)+"</font></td>";
	}
	vCalHeader+="</tr>";	
	docCal.write(vCalHeader);
	
	//Calendar detail
	CalDate=new Date(Cal.Year,Cal.Month);
	CalDate.setDate(1);
	vFirstDay=CalDate.getDay();
	vCalData="<tr>";
	for (i=0;i<vFirstDay;i++)
	{
		vCalData=vCalData+GenCell();
		vDayCount=vDayCount+1;
	}
	for (j=1;j<=Cal.GetMonDays();j++)
	{
		var strCell;
		vDayCount=vDayCount+1;
		if ((j==dtToday.getDate())&&(Cal.Month==dtToday.getMonth())&&(Cal.Year==dtToday.getFullYear()))
			strCell=GenCell(j,true,TodayColor);//Highlight today's date
		else
		{
			if (j==Cal.Date)
			{
				strCell=GenCell(j,true,SelDateColor);
			}
			else
			{	 
				if (vDayCount%7==0)
					strCell=GenCell(j,false,SaturdayColor);
				else if ((vDayCount+6)%7==0)
					strCell=GenCell(j,false,SundayColor);
				else
					strCell=GenCell(j,null,WeekDayColor);
			}		
		}						
		vCalData=vCalData+strCell;

		if((vDayCount%7==0)&&(j<Cal.GetMonDays()))
		{
			vCalData=vCalData+"</tr>\n<tr>";
		}
	}
	docCal.writeln(vCalData);	
	//Time picker
	if (Cal.ShowTime)
	{
		var showHour;
		showHour=Cal.getShowHour();		
		vCalTime="<tr>\n<td colspan='7' align='center'>";
		vCalTime+="<input type='text' name='hour' maxlength=2 size=1 style=\"WIDTH: 22px\" value="+showHour+" onchange=\"javascript:winMain.Cal.SetHour(this.value)\">";
		vCalTime+=" : ";
		vCalTime+="<input type='text' name='minute' maxlength=2 size=1 style=\"WIDTH: 22px\" value="+Cal.Minutes+" onchange=\"javascript:winMain.Cal.SetMinute(this.value)\">";
		vCalTime+=" : ";
		vCalTime+="<input type='text' name='second' maxlength=2 size=1 style=\"WIDTH: 22px\" value="+Cal.Seconds+" onchange=\"javascript:winMain.Cal.SetSecond(this.value)\">";
		if (TimeMode==12)
		{
			var SelectAm =(parseInt(Cal.Hours,10)<12)? "Selected":"";
			var SelectPm =(parseInt(Cal.Hours,10)>=12)? "Selected":"";

			vCalTime+="<select name=\"ampm\" onchange=\"javascript:winMain.Cal.SetAmPm(this.options[this.selectedIndex].value);\">";
			vCalTime+="<option "+SelectAm+" value=\"AM\">AM</option>";
			vCalTime+="<option "+SelectPm+" value=\"PM\">PM<option>";
			vCalTime+="</select>";
		}	
		vCalTime+="\n</td>\n</tr>";
		docCal.write(vCalTime);
	}	
	//end time picker
	docCal.writeln("\n</table>");
	docCal.writeln("</form></body></html>");
	docCal.close();
}

function GenCell(pValue,pHighLight,pColor)//Generate table cell with value
{
	var PValue;
	var PCellStr;
	var vColor;
	var vHLstr1;//HighLight string
	var vHlstr2;
	var vTimeStr;
	
	if (pValue==null)
		PValue="";
	else
		PValue=pValue;
	
	if (pColor!=null)
		vColor="bgcolor=\""+pColor+"\"";
	else
		vColor="";	
	if ((pHighLight!=null)&&(pHighLight))
		{vHLstr1="color='red'><b>";vHLstr2="</b>";}
	else
		{vHLstr1=">";vHLstr2="";}	
	
	if (Cal.ShowTime)
	{
		vTimeStr="winMain.document.getElementById('"+Cal.Ctrl+"').value+=' '+"+"winMain.Cal.getShowHour()"+"+':'+"+"winMain.Cal.Minutes"+"+':'+"+"winMain.Cal.Seconds";
		if (TimeMode==12)
			vTimeStr+="+' '+winMain.Cal.AMorPM";
	}	
	else
		vTimeStr="";		
	PCellStr="<td "+vColor+" width="+CellWidth+" align='center'><font face='verdana' size='2'"+vHLstr1+"<a href=\"javascript:winMain.document.getElementById('"+Cal.Ctrl+"').value='"+Cal.FormatDate(PValue)+"';"+vTimeStr+";window.close();\">"+PValue+"</a>"+vHLstr2+"</font></td>";
	return PCellStr;
}

function Calendar(pDate,pCtrl)
{
	//Properties
	this.Date=pDate.getDate();//selected date
	this.Month=pDate.getMonth();//selected month number
	this.Year=pDate.getFullYear();//selected year in 4 digits
	this.Hours=pDate.getHours();	
	
	if (pDate.getMinutes()<10)
		this.Minutes="0"+pDate.getMinutes();
	else
		this.Minutes=pDate.getMinutes();
	
	if (pDate.getSeconds()<10)
		this.Seconds="0"+pDate.getSeconds();
	else		
		this.Seconds=pDate.getSeconds();
		
	this.MyWindow=winCal;
	this.Ctrl=pCtrl;
	this.Format="ddMMyyyy";
	this.Separator=DateSeparator;
	this.ShowTime=false;
	if (pDate.getHours()<12)
		this.AMorPM="AM";
	else
		this.AMorPM="PM";	
}

function GetMonthIndex(shortMonthName)
{
	for (i=0;i<12;i++)
	{
		if (MonthName[i].substring(0,3).toUpperCase()==shortMonthName.toUpperCase())
		{	return i;}
	}
}
Calendar.prototype.GetMonthIndex=GetMonthIndex;

function IncYear()
{	Cal.Year++;}
Calendar.prototype.IncYear=IncYear;

function DecYear()
{	Cal.Year--;}
Calendar.prototype.DecYear=DecYear;
	
function SwitchMth(intMth)
{	Cal.Month=intMth;}
Calendar.prototype.SwitchMth=SwitchMth;

function SetHour(intHour)
{	
	var MaxHour;
	var MinHour;
	if (TimeMode==24)
	{	MaxHour=23;MinHour=0}
	else if (TimeMode==12)
	{	MaxHour=12;MinHour=1}
	else
		alert("TimeMode can only be 12 or 24");		
	var HourExp=new RegExp("^\\d\\d$");
	if (HourExp.test(intHour) && (parseInt(intHour,10)<=MaxHour) && (parseInt(intHour,10)>=MinHour))
	{	
		if ((TimeMode==12) && (Cal.AMorPM=="PM"))
		{
			if (parseInt(intHour,10)==12)
				Cal.Hours=12;
			else	
				Cal.Hours=parseInt(intHour,10)+12;
		}	
		else if ((TimeMode==12) && (Cal.AMorPM=="AM"))
		{
			if (intHour==12)
				intHour-=12;
			Cal.Hours=parseInt(intHour,10);
		}
		else if (TimeMode==24)
			Cal.Hours=parseInt(intHour,10);	
	}
}
Calendar.prototype.SetHour=SetHour;

function SetMinute(intMin)
{
	var MinExp=new RegExp("^\\d\\d$");
	if (MinExp.test(intMin) && (intMin<60))
		Cal.Minutes=intMin;
}
Calendar.prototype.SetMinute=SetMinute;

function SetSecond(intSec)
{	
	var SecExp=new RegExp("^\\d\\d$");
	if (SecExp.test(intSec) && (intSec<60))
		Cal.Seconds=intSec;
}
Calendar.prototype.SetSecond=SetSecond;

function SetAmPm(pvalue)
{
	this.AMorPM=pvalue;
	if (pvalue=="PM")
	{
		this.Hours=(parseInt(this.Hours,10))+12;
		if (this.Hours==24)
			this.Hours=12;
	}	
	else if (pvalue=="AM")
		this.Hours-=12;	
}
Calendar.prototype.SetAmPm=SetAmPm;

function getShowHour()
{
	var finalHour;
    if (TimeMode==12)
    {
    	if (parseInt(this.Hours,10)==0)
		{
			this.AMorPM="AM";
			finalHour=parseInt(this.Hours,10)+12;	
		}
		else if (parseInt(this.Hours,10)==12)
		{
			this.AMorPM="PM";
			finalHour=12;
		}		
		else if (this.Hours>12)
		{
			this.AMorPM="PM";
			if ((this.Hours-12)<10)
				finalHour="0"+((parseInt(this.Hours,10))-12);
			else
				finalHour=parseInt(this.Hours,10)-12;	
		}
		else
		{
			this.AMorPM="AM";
			if (this.Hours<10)
				finalHour="0"+parseInt(this.Hours,10);
			else
				finalHour=this.Hours;	
		}
	}
	else if (TimeMode==24)
	{
		if (this.Hours<10)
			finalHour="0"+parseInt(this.Hours,10);
		else	
			finalHour=this.Hours;
	}	
	return finalHour;	
}				
Calendar.prototype.getShowHour=getShowHour;		

function GetMonthName(IsLong)
{
	var Month=MonthName[this.Month];
	if (IsLong)
		return Month;
	else
		return Month.substr(0,3);
}
Calendar.prototype.GetMonthName=GetMonthName;

function GetMonDays()//Get number of days in a month
{
	var DaysInMonth=[31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
	if (this.IsLeapYear())
	{
		DaysInMonth[1]=29;
	}	
	return DaysInMonth[this.Month];	
}
Calendar.prototype.GetMonDays=GetMonDays;

function IsLeapYear()
{
	if ((this.Year%4)==0)
	{
		if ((this.Year%100==0) && (this.Year%400)!=0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	else
	{
		return false;
	}
}
Calendar.prototype.IsLeapYear=IsLeapYear;

function FormatDate(pDate)
{
	if (this.Format.toUpperCase()=="DDMMYYYY")
		return (pDate+DateSeparator+(this.Month+1)+DateSeparator+this.Year);
	else if (this.Format.toUpperCase()=="DDMMMYYYY")
		return (pDate+DateSeparator+this.GetMonthName(false)+DateSeparator+this.Year);
	else if (this.Format.toUpperCase()=="MMDDYYYY")
		return ((this.Month+1)+DateSeparator+pDate+DateSeparator+this.Year);
	else if (this.Format.toUpperCase()=="MMMDDYYYY")
		return (this.GetMonthName(false)+DateSeparator+pDate+DateSeparator+this.Year);			
}
Calendar.prototype.FormatDate=FormatDate;	
