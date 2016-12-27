<?
include("librerias/conexion.php");
$id = $_GET['id'];

conectar();
$sql = "delete from doctor where id = ".$id."";
$sql2 = "delete from clinica where id_doctor = ".$id."";	

if($result = mysql_query($sql) and $result2 = mysql_query($sql2))
{ 
desconectar();
?>

<script type="text/javascript">
window.location.href = "doctor.php";
</script>

<?
}
?>