 <?php
//llamamos a la connecion
require('../General/connexion.php');
//capturamos
$naturaleza= $_POST['naturaleza'];
$consecutivo= $_POST['id'];
$demandante= $_POST['demandante'];
$demandado= $_POST['demandado'];
$fec_reparto= $_POST['fec_reparto'];
$fec_termina= $_POST['fec_termina'];
$novedad= $_POST['novedad'];
$archivo = $_POST['archivo'];
if($_POST != "" ){
  try{
    $Con= new DataBase();
    $Conexion= $Con->Conexion();
    $query = "UPDATE historial 
                 SET naturaleza = '$naturaleza', demandante = '$demandante',
                     demandado = '$demandado', fe_reparto = '$fec_reparto',
                     fe_terminacion = '$fec_termina', novedad = '$novedad',
                     archivo = '$archivo' 
                WHERE consecutivo= ".$consecutivo.";";
// echo "<pre>";
// print_r($query);
// echo "</pre>";
// die();
    $Conexion->query($query);
    header("Location: ../../admin/historial/Con_historial.php?c=1");
  }
  catch ( PDOException $e ){
    echo "<script>alert('¡Por favor revisar los datos ingresados, estos no pueden estar vacíos! ');</script>";
    die('<h1>Por favor regrese a la pagina anterior y termine de ingresar datos.</h1>');
    // die("Ha ocurrido un error inesperado en la base de datos.<br>".$e->getMessage());
  }
}
else{
  die("<script>alert('¡Por favor revisar los datos ingresados, estos no pueden estar vacíos! ');</script>");
}

?>