<?php 
session_start();
$alert = 'Se <strong>Almacenaron</strong> los datos corrrectamente';
?>
<!DOCTYPE html>
<html lang="es" ng-app> 

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Bootstrap núcleo CSS-->
  <link rel="stylesheet" media="screen" href="../../css/assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" media="screen" href="../../css/assets/bootstrap/css/bootstrap.min.css">
  <!--Biblioteca de iconos monocromáticos y símbolos-->
  <link rel="stylesheet" href="../../css/assets/bootstrap/fonts/glyphicons-pro/css/glyphicons-pro.css">
  <link rel="stylesheet" href="../../css/assets/bootstrap/fonts/font-awesome/css/font-awesome.min.css">
  <!-- Plugin para cuadro de selección personalizable con soporte para búsqueda. -->
  <link rel="stylesheet" href="../../css/plugins/select2/select2.min.css">
  <link rel="stylesheet" href="../../css/plugins/select2/select2-bootstrap.css">
  <title>Historial</title>
</head>
<body>
  <div class="container">
    <?php include "../../plantillas/menu/menu_admin2.php"; ?>
    <?php if($_GET != null){?>
      <div class="alert alert-success"><?php echo isset($alert) ? $alert : ''; ?></div>
    <?php } ?>
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
    <form method="post" autocomplete="on" id="frm" action="../../config/ClassHistorial/ClassHistorial_Ins.php">
      <!-- Natura -->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          <label for="email">Naturaleza:</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
          <select name="localidad" id="localidad" class="form-control select2">
            <option value="0">Seleccione... </option>
            <?php foreach ($local as $listarL): ?>
              <option value="<?= $listarL->tbp_localida;?>"><?= $listarL->nombre;?></option>
            <?php endforeach; ?>
          </select>
          <span class="help-block" id="error"></span>
        </div>
      </div>
      <!-- Consecutivo -->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          <label for="Hora">Consecutiv:o</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
          <input type="text" class="form-control" name="consecutivo" id="consecutivo" placeholder="Consecutivo" required="required">
          <span class="help-block" id="error"></span>
        </div>
      </div>
      <!-- Demandante -->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          <label for="email">Demandante:</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
          <input type="number" class="form-control" name="demandante" id="demandante" placeholder="Demandante" minlength="7" maxlength="10">
          <span class="help-block" id="error"></span>
        </div>
      </div>
      <!-- Demandado -->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          <label for="email">Demandado:</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
          <input type="text" class="form-control" name="demandado" id="demandado" placeholder="Demandado" required="required">
          <span class="help-block" id="error"></span>
        </div>
      </div>
      <!-- Fecha Reparto -->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          <label for="direccion">Fecha Reparto:</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
          <input type="text" class="form-control" name="fec_reparto" id="fec_reparto" placeholder="Fecha Reparto">
          <span class="help-block" id="error"></span>
        </div>
      </div>
      <!-- Fecha Terminación -->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          <label for="fec_termina">Fecha Terminación:</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
          <input type="text" class="form-control" name="fec_termina" id="fec_termina" placeholder="Fecha Terminación">
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
            <?php foreach ($local as $listarL): ?>
              <option value="<?= $listarL->tbp_localida;?>"><?= $listarL->nombre;?></option>
            <?php endforeach; ?>
          </select>
          <span class="help-block" id="error"></span>
        </div>
      </div>
      <!-- Lugar Votación -->
      <!-- <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          <label for="Localidad">Lugar Votación:</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
          <select name="lugar_votacio" id="lugar_votacio" class="form-control select2">
            <option value="0">Seleccione... </option>
            <?php foreach ($lugar_vota as $listarV): ?>
              <option value="<?= $listarV->idtbp_lugares_votacio;?>"><?= $listarV->nombre;?></option>
            <?php endforeach; ?>
          </select>
          <span class="help-block" id="error"></span>
        </div>
      </div> -->
      <!-- Archivo -->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          <label for="archivo">Archivo:</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
          <input type="text" class="form-control" name="archivo" id="archivo" placeholder="Archivo">
          <span class="help-block" id="error"></span>
        </div>
      </div>
      <div><br> 
        <input type="hidden" id="reunión" name="reunion" value="<?=$R['idtba_reunion'];?>">
        <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>
      </div>
    </form>
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
  <script>
    $(document).ready(function() {
      $(".select2").select2({
        language: "es"
      });
   });
  </script>
</body>
</html>