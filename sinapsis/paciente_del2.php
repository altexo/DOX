<?
include("librerias/conexion.php");
$id = $_GET['id'];

conectar();
$sql = "delete from paciente where id = ".$id."";

if($result = mysql_query($sql))
{ 
desconectar();
?>

<script type="text/javascript">
window.location.href = "pacientes.php";
</script>

<?
}
?>