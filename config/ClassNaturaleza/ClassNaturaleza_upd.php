<?php
//llamamos a la connecion
require('../General/connexion.php');
//capturamos
$nombre= $_POST['nombre'];
$activo = $_POST['activo'];
$id_naturaleza = $_POST['id'];
if($_POST != "" ){
  try{
    $Con= new DataBase();
    $Conexion= $Con->Conexion();
    $query = "UPDATE naturaleza 
                 SET nombre= '$nombre', activo = '$activo' 
               WHERE id_naturaleza = ".$id_naturaleza.";";
    $Conexion->query($query);
    header("Location: ../../admin/configuracion/naturaleza/index.php?c=1");
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