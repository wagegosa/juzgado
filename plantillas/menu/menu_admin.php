<?php 
  session_start();
?>
<div class="pos-f-t">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="">Juzgado de Familia</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav">
        <!-- historial -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Historial  </a>
            <ul class="dropdown-menu">
              <li><a href="../admin/historial/Con_historial.php">Consulta</a></li>
              <li><a href="../admin/historial/index.php">Nueva</a></li>
            </ul>
        </li>
        <!-- usuarios -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Usuarios  </a>
            <ul class="dropdown-menu">
              <li><a href="../admin/usuarios/index.php">Consulta</a></li>
              <li><a href="../admin/usuarios/New_usuario.php">Nuevo</a></li>
            </ul>
        </li>
        <!-- Perfil -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Perfil  </a>
            <ul class="dropdown-menu">
              <li><a href="../admin/perfil/index.php">Consulta</a></li>
              <li><a href="../admin/perfil/New_Perfil.php">Nuevo</a></li>
            </ul>
        </li>
        <!-- Reporte -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Reporte  </a>
            <ul class="dropdown-menu">
              <li><a href="../admin/exportar/index.php">Generar Reportes</a></li>
            </ul>
        </li>
      </ul>
    </div>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION['usuario']; ?>  </a>
          <ul class="dropdown-menu">
            <li><a href="../config/General/salir.php">Salir</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</div>