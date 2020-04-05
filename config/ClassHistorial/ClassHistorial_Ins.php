 <?php
 date_default_timezone_set('America/Bogota');
 $hoy = date('Y-m-d');
 //llamamos a la connecion
require('../General/connexion.php');
//capturamos
// $reunion = $_POST['reunion'];
$naturaleza= $_POST['naturaleza'];
// $consecutivo= $_POST['consecutivo'];
$demandante= $_POST['demandante'];
$demandado= $_POST['demandado'];
$fec_reparto= $_POST['fec_reparto'];
$fec_termina= $_POST['fec_termina'];
$novedad = $_POST['novedad'];
$archivo = $_POST['archivo'];
//Validamos que el metodo POST este enviando datos.
if ($_POST != "" ){
  try{
    $Con= new DataBase();
    $Conexion= $Con->Conexion();
    $query = "INSERT INTO historial
                          (naturaleza, demandante, demandado, 
                          fe_reparto, fe_terminacion, novedad, archivo) 
                   VALUES ('$naturaleza', '$demandante', 
                          '$demandado', '$fec_reparto', '$fec_termina', 
                          '$novedad', '$archivo')";
    // echo "<pre>";
    // print_r($query);
    // echo "</pre>";
    // die();
    $Conexion->query($query);
    header("Location: ../../admin/historial/index.php?c=1");
  }
  catch ( PDOException $e ){
    die("Ha ocurrido un error inesperado en la base de datos.<br>".$e->getMessage());
    echo "Por favor revisar los datos que se estan insertando.";
  }
}
//si no esta enviando datos, nos notifica por un scritp y nos muestra que nos trae.
else{
  echo "<script>alert('¡Por favor revisar los datos ingresados, estos no pueden estar vacíos! ');</script>";
  die('<h1>Por favor regrese a la pagina anterior y termine de ingresar datos.</h1>');
   // echo '<input type="hidden" id="error" name="error">'
  header("Location:../../admin/preguntas/Con_preguntas.php");
}
?>