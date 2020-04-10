<?php 
session_start();
if(!empty($_SESSION['active']) && $_SESSION['perfil'] === "1"){
  date_default_timezone_set('America/Bogota');
  $hoy = date('Y-m-d');
  $min = date("Y-m-d",strtotime($hoy."- 6 month")); 
  //Conexión a la base de datos
  require "../../config/General/connexion.php";
  include "../../config/ClassNaturaleza/ClassNaturaleza_sel.php";
  include '../../config/ClassNovedad/ClassNovedad_sel.php';
  $natu = new Naturaleza();
  $nove = new Novedad();
  $naturaleza = $natu->listarNaturaleza();
  $novedad = $nove->ListarNovedadAct();

  $Con= new DataBase();
  $Conn= $Con->Conexion();

  $_GET['id'] ? $_GET['id'] : '';

  try {
    $query="SELECT * FROM historial where consecutivo = ".$_GET['id'].";";
// echo "<pre>";
// print_r($query);
// echo "</pre>";
// die();
    $Resul= $Conn->prepare($query);
    $Resul->bindParam(':id', $id);
    $Resul->execute();
    $Resul->setFetchMode(PDO::FETCH_ASSOC);
    // $Resul->setFetchMode(PDO::FETCH_ASSOC);
    $Resultado= $Resul->rowCount();

    if($Resultado!=0){
      while ($R= $Resul->fetch()):
?>
<!DOCTYPE html>
<html lang="es" ng-app> 

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="../../img/RamaJudicial.png"/>
  <!--Bootstrap núcleo CSS-->
  <link rel="stylesheet" media="screen" href="../../css/assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" media="screen" href="../../css/assets/bootstrap/css/bootstrap.min.css">
  <!--Biblioteca de iconos monocromáticos y símbolos-->
  <link rel="stylesheet" href="../../css/assets/bootstrap/fonts/glyphicons-pro/css/glyphicons-pro.css">
  <link rel="stylesheet" href="../../css/assets/bootstrap/fonts/font-awesome/css/font-awesome.min.css">
  <!--Paginación, filtrado de registros-->
  <link rel="stylesheet" href="../../css/assets/footable/css/footable.bootstrap.min.css">
  <!-- Plugin para cuadro de selección personalizable con soporte para búsqueda. -->
  <link rel="stylesheet" href="../../css/plugins/select2/select2.min.css">
  <link rel="stylesheet" href="../../css/plugins/select2/select2-bootstrap.css">
  <!-- style para menu --> 
  <link rel="stylesheet" type="text/css" href="../../css/menu/css/menu.css">

  <title>Asistentes</title>
</head>
<body>
  <div class="container">
    <?php include "../../plantillas/menu/menu_admin2.php"; ?>
    <div class="row">
        <div class="col-md-12">
          <h3 class="page-header"><span class="glyphicons glyphicons-group"></span> Historial</h3>
          <ol class="breadcrumb">
            <li><a href="">Inicio</a></li>
            <li><a href="">Historial</a></li>
            <li class="active">Nuevo Historial</li>
          </ol>
        </div>
      </div>
    <!-- Formulario -->
      <form method="post" autocomplete="off" id="frm" action="../../config/ClassHistorial/ClassHistorial_upd.php">
        <!-- Natura -->
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            <label for="email">Naturaleza:</label>
          </div>
          <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
            <select name="naturaleza" id="naturaleza" class="form-control select2" required="required">
              <option value="0">Seleccione... </option>
              <?php foreach ($naturaleza as $listarN): ?>
                <?php if($R['naturaleza'] == $listarN->id_naturaleza){ ?>
                  <option value="<?= $listarN->id_naturaleza;?>" selected><?= $listarN->nombre;?></option>
                <?php }else{ ?>
                  <option value="<?= $listarN->id_naturaleza;?>"><?= $listarN->nombre;?></option>
              <?php }
            endforeach; ?>
            </select>
            <span class="help-block" id="error"></span>
          </div>
        </div>
        <!-- Consecutivo -->
        <!-- <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            <label for="Hora">Consecutiv:o</label>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
            <input type="text" class="form-control" name="consecutivo" id="consecutivo" placeholder="Consecutivo" required="required">
            <span class="help-block" id="error"></span>
          </div>
        </div> -->
        <!-- Demandante -->
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            <label for="email">Demandante:</label>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
            <input type="text" class="form-control" name="demandante" id="demandante" placeholder="Demandante" minlength="7" maxlength="120" required="required" value="<?= $R['demandante']; ?>">
            <span class="help-block" id="error"></span>
          </div>
        </div>
        <!-- Demandado -->
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            <label for="email">Demandado:</label>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
            <input type="text" class="form-control" name="demandado" id="demandado" placeholder="Demandado" minlength="7" maxlength="120" required="required" value="<?= $R['demandado']; ?>">
            <span class="help-block" id="error"></span>
          </div>
        </div>
        <!-- Fecha Reparto -->
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            <label for="direccion">Fecha Reparto:</label>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
            <input type="date" class="form-control" name="fec_reparto" id="fec_reparto" min="<?= $min;?>" max="<?= $hoy;?>" placeholder="Fecha Reparto" required="required" value="<?= $R['fe_reparto'];?>">
            <span class="help-block" id="error"></span>
          </div>
        </div>
        <!-- Fecha Terminación -->
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            <label for="fec_termina">Fecha Terminación:</label>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
            <input type="date" class="form-control" name="fec_termina" id="fec_termina" min="<?= $min;?>" max="<?= $hoy;?>" placeholder="Fecha Terminación" value="<?= $R['fe_terminacion'];?>">
            <span class="help-block" id="error"></span>
          </div>
        </div>
        <!-- Novedad -->
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            <label for="novedad">Novedad:</label>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
            <select name="novedad" id="novedad" class="form-control select2" required="required">
              <option value="0">Seleccione... </option>
              <?php foreach ($novedad as $listarL): ?>
                <?php if($R['novedad'] == $listarL->id_novedad){ ?>
                  <option value="<?= $listarL->id_novedad;?>" selected><?= $listarL->nombre;?></option>
                <?php }else{ ?>
                  <option value="<?= $listarL->id_novedad;?>"><?= $listarL->nombre;?></option>
              <?php }
            endforeach; ?>
            </select>
            <span class="help-block" id="error"></span>
          </div>
        </div>
        <!-- Archivo -->
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            <label for="archivo">Archivo:</label>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
            <input type="text" class="form-control" name="archivo" id="archivo" placeholder="Archivo" value="<?= $R['archivo']; ?>">
            <span class="help-block" id="error"></span>
          </div>
        </div>
        <!-- Boton -->
        <div><br> 
          <input type="hidden" name="id" id="id" value="<?=$R['consecutivo'] ?>">
          <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>
        </div>
      </form>
    </div>
    <!-- LIBRERIAS validadoras-->
    <script src="../../css/assets/js/plugins/jquery/jquery-3.2.1.min.js"></script>
    <script src="../../css/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- Plugin para la validación de formularios -->
    <script src="../../css/assets/jquery_validation/dist/jquery.validate.min.js"></script>
    <script src="../../css/assets/jquery_validation/dist/localization/messages_es.js"></script>
    <!-- Plugin para listado, navegación y filtrado en tablas -->
    <script src="../../css/assets/footable/js/footable.min.js"></script>
    <script src="../../css/assets/footable/js/configTable.js"></script>
    <!-- Plugin para cuadro de selección personalizable con soporte para búsqueda. -->
    <script src="../../js/plugins/select2/select2.full.js"></script>
    <script src="../../js/plugins/select2/es.js"></script>
    <!-- para el menu -->
    <script src="../../css/menu/js/menu.js"></script>
    <script>
      $(document).ready(function() {
        $(".select2").select2({
          language: "es"
        });
     });
    </script>
  </body>
  </html>
<?php    
      endwhile;
    }else{
      echo "No se encontraron registros con el ID " .$id;
    }
  } catch (PDOException $e) {
    die("Error occurred:" . $e->getMessage());
  }
}
?>