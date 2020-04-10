<?php  
session_start();
if(!empty($_SESSION['active']) && $_SESSION['perfil'] === "1"){
  $alert = 'Se <strong>Almacenaron</strong> los datos corrrectamente';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="../../../img/RamaJudicial.png"/>
  <!--Bootstrap núcleo CSS-->
  <link rel="stylesheet" media="screen" href="../../../css/assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" media="screen" href="../../../css/assets/bootstrap/css/bootstrap.min.css">
  <!--Biblioteca de iconos monocromáticos y símbolos-->
  <link rel="stylesheet" href="../../../css/assets/bootstrap/fonts/glyphicons-pro/css/glyphicons-pro.css">
  <link rel="stylesheet" href="../../../css/assets/bootstrap/fonts/font-awesome/css/font-awesome.min.css">
  <!-- menu -->
  <link rel="stylesheet" type="text/css" href="../../../css/menu/css/menu.css">
  <title>Naturaleza</title>
</head>
<body>
  <div class="container">
    <?php include "../../../plantillas/menu/menu_admin3.php"; 
    if($_GET != null){?>
      <div class="alert alert-success"><?php echo isset($alert) ? $alert : ''; ?></div>
    <?php } ?>
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
    <form action="../../../config/ClassNaturaleza/ClassNaturaleza_Ins.php" class="frm" id="frm" autocomplete="off" method="post">
      <div class="row form-group">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          <label for="nombre" >Nombre</label>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" require>
        </div>
      </div>
      <div class="row form-group">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          <label for="nombre">Activo</label>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
          <label for="Y" class="radio-inline"><input type="radio" name="activo" id="activo" value="Y" checked> Si</label>
          <label for="N" class="radio-inline"><input type="radio" name="activo" id="activo" value="N" disabled> No</label>
        </div>
      </div>
      <div class="row form-group">
        <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>
      </div>
    </form>
  </div>
  <!-- LIBRERIAS validadoras-->
  <script src="../../../css/assets/bootstrap/js/jquery.min.js"></script>
  <script src="../../../css/assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="../../../css/assets/bootstrap/js/popper.min.js"></script>
  <script src="../../../css/assets/bootstrap/js/custom.js"></script>
  <script src="../../../css/assets/footable/js/footable.min.js"></script>
  <script src="../../../css/assets/footable/js/configTable.js"></script>
  <!-- menu -->
  <script src="../../../css/menu/js/menu.js"></script>
</body>
</html>
<?php } ?>