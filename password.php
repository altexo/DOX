<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css">
</head>

<body>
<form name="form1" method="post" action="">
<span id="sprypassword1">
<label for="password">Password</label>
<input type="password" name="password" id="password">
<span class="passwordRequiredMsg">Se requiere un valor.</span><span class="passwordMinCharsMsg">Debe ingresar al menos 6 caracteres.</span><span class="passwordMaxCharsMsg">Excede el número de caracteres (12).</span></span>
<br /><span id="spryconfirm1">
<label for="pass2">De nuevo</label>
<input type="password" name="pass2" id="pass2">
<span class="confirmRequiredMsg">A value is required.</span><span class="confirmInvalidMsg">The values don't match.</span></span>
<br>
<br>
<input type="submit" name="button" id="button" value="Submit">
</form>
<script type="text/javascript">
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1", {minChars:6, maxChars:12});
var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "password");
</script>
</body>
</html>