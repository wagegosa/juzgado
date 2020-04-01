<?php
session_start();
if (!empty($_SESSION['active']) && $_SESSION['perfil'] === "1") {
  if ($_GET != null) {
    require('../../../config/General/connexion.php');
    $Con= new DataBase();
    $Conn= $Con->Conexion();
    $_GET['id'] ? $_GET['id'] : '';
    try {
      $query="SELECT * FROM naturaleza WHERE id_naturaleza = ".$_GET['id'].";";
      $Resul= $Conn->prepare($query);
      $Resul->bindParam(':id', $id);
      $Resul->execute();
      $Resul->setFetchMode(PDO::FETCH_ASSOC);
      $Resultado= $Resul->rowCount();
      if($Resultado!=0){
        while ($R= $Resul->fetch()):
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <!--Bootstrap núcleo CSS-->
  <link rel="stylesheet" media="screen" href="../../../css/assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" media="screen" href="../../../css/assets/bootstrap/css/bootstrap.min.css">
  <!--Biblioteca de iconos monocromáticos y símbolos-->
  <link rel="stylesheet" href="../../../css/assets/bootstrap/fonts/glyphicons-pro/css/glyphicons-pro.css">
  <link rel="stylesheet" href="../../../css/assets/bootstrap/fonts/font-awesome/css/font-awesome.min.css">
  <title>Naturaleza</title>
</head>
<body>
  <div class="container">
    <?php include "../../../plantillas/menu/menu_admin2.php";?>
    <div class="row">
      <div class="col-md-12">
        <h3 class="page-header"><span class="glyphicons glyphicons-group"></span> Naturaleza</h3>
        <ol class="breadcrumb">
          <li><a href="">Inicio</a></li>
          <li><a href="">Configuraciones</a></li>
          <li><a href="">Naturaleza</a></li>
          <li class="active">Nueva Naturaleza</li>
        </ol>
      </div>
    </div>
    <form action="../../../config/ClassNaturaleza/ClassNaturaleza_upd.php" class="frm" id="frm" autocomplete="off" method="post">
      <div class="row form-group">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          <label for="nombre">Nombre</label>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?=$R['nombre'];?>" require>
        </div>
      </div>
      <div class="row form-group">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          <label for="nombre">Activo</label>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
          <?php  
          if($R['activo'] === "Y"){
          ?>
            <label for="Y" class="radio-inline"><input type="radio" name="activo" id="activo" value="Y" checked > Si</label>
            <label for="N" class="radio-inline"><input type="radio" name="activo" id="activo" value="N" > No</label>
          <?php 
          }else{?>
            <label for="Y" class="radio-inline"><input type="radio" name="activo" id="activo" value="Y"  > Si</label>
            <label for="N" class="radio-inline"><input type="radio" name="activo" id="activo" value="N" checked> No</label>
          <?php } ?>
        </div>
      </div>
      <div class="row form-group">
        <input type="hidden" name="id" id="id" value="<?= $R['id_naturaleza']?>">
        <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>
      </div>
    </form>
  </div>
  <!-- LIBRERIAS validadoras-->
  <script src="../../css/assets/js/plugins/jquery/jquery-3.2.1.min.js"></script>
  <script src="../../css/assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php
        endwhile;
      } else{
        echo "No se encontraron registros con el ID " .$id;
      }
    }catch (PDOException $e) {
      die("Error occurred:" . $e->getMessage());
    }
  }
} 
?>