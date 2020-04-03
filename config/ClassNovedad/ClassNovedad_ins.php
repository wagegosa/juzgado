<?php 
require('../General/connexion.php');
$nombre = $_POST['nombre'];
$activo = $_POST['activo'];
if ($_POST != null) {
  try {
    $con = new DataBase();
    $conn = $con->Conexion();
    $query = "INSERT INTO novedad(nombre, activo) 
                   VALUES ('$nombre', '$activo')";
    // echo "<pre>";
    // print_r($query);
    // echo "</pre>";
    // die();
    $conn->query($query);
    header("Location: ../../admin/configuracion/novedad/New_Novedad.php?c=1");
  } catch (PDOException $e) {
    die("Ha ocurrido un error inesperado en la base de datos.<br>".$e->getMessage());
    echo "Por favor revisar los datos que se estan insertando.";
  }
}

?>