 <?php
 //llamamos a la connecion
require('../General/connexion.php');
//capturamos
$perfil= $_POST['perfil'];
$activo= $_POST['activo'];
//Validamos que el metodo POST este enviando datos.
if ($_POST != "" ){
  try{
    $Con= new DataBase();
    $Conexion= $Con->Conexion();
    $query = "INSERT INTO gloriadiaz.tbp_perfil(nombre, activo) VALUES ('$perfil', '$activo');";
// echo "<pre>";
// print_r($query);
// echo "<pre>";
// die;
    $Conexion->query($query);
    echo "<script>alert('¡Se almaceno correctamente.!');</script>";
    header("Location: ../../admin/configuracion/perfil/index.php");
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