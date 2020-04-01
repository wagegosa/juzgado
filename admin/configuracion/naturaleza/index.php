<?php  
session_start();
if(!empty($_SESSION['active']) && $_SESSION['perfil'] === "1"){
  require "../../../config/General/connexion.php";
  include '../../../config/ClassNaturaleza/ClassNaturaleza_sel.php';
  $natu = new Naturaleza();
  $naturaleza = $natu->listarNaturalezaActi();
  $alert = 'Se <strong>Almacenaron</strong> los datos corrrectamente';
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
    <?php include "../../../plantillas/menu/menu_admin2.php";
            if ($_GET != null) { ?>
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
        <div class="pull-right">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
              <a href="New_Naturaleza.php" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-plus"></span> Nueva Naturaleza </a>
            </form>
          </div>
      </div>
    </div>
    <!-- tabla -->
      <div class="row">
        <div class="col-md-12">
        <form id="Con_Area" name="Con_Area" method="post">
            <div class="input-group">
              <span class="input-group-addon">
                  <i class="glyphicon glyphicon-search"></i>
              </span>
              <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
            </div>
           <table class="table table-bordered  table-hover table-striped" id="myTable" width="100%" name="myTable">
            <thead>
              <tr>
                <th data-filterable="false">Nro</th>
                <th data-breakpoints="xs sm">Nombre</th>
                <th data-breakpoints="xs sm">Activo</th>
                <th data-breakpoints="xs sm" data-filterable="false">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $c=1;
                foreach($naturaleza as $libro):
              ?>
              <tr>
                <td><?= $c++; ?></td>
                <td><?= $libro->nombre; ?></td>
                <td><?php 
                  if($libro->activo == "Y"){
                    echo "Si";
                  }else{
                    echo "No";
                  }
                ; ?></td>
                <td>
                  <a href="Edi_Naturaleza.php?id=<?= $libro->id_naturaleza;?>" class="btn btn-primary btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                </td>
              </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </form>
        </div>
      </div>
  </div>
  <!-- LIBRERIAS validadoras-->
  <script src="../../css/assets/js/plugins/jquery/jquery-3.2.1.min.js"></script>
  <script src="../../css/assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>