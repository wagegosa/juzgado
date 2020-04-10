<?php 
session_start();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href=""><img src="../img/RamaJudicial.png" class="img-rounded" alt="Cinque Terre" width="40" height="30"></a>
    <!-- Historial -->
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Hitorial
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li><a class="dropdown-item" href="../admin/historial/Con_historial.php">Consulta</a></li>
          <li><a class="dropdown-item" href="../admin/historial/index.php">Nueva</a></li>
        </ul>
      </li>
    </ul>
    <!-- Reporte -->
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Reporte
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li><a class="dropdown-item" href="../admin/exportar/index.php">Generar Reportes</a></li>
        </ul>
      </li>
    </ul>
    <!-- configuracion -->
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Configuración
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <!-- Usuario -->
          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Usuario</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../admin/configuracion/usuario/index.php">Consulta </a></li>
              <li><a class="dropdown-item" href="../admin/configuracion/usuario/New_usuario.php">Nuevo</a></li>
            </ul>
          </li>
        <!-- Perfil -->
          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Perfil</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../admin/configuracion/perfil/index.php">Consulta </a></li>
              <li><a class="dropdown-item" href="../admin/configuracion/perfil/New_Perfil.php">Nuevo</a></li>
            </ul>
          </li>
        <!-- Naturaleza -->
          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Naturaleza</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../admin/configuracion/naturaleza/index.php">Consulta </a></li>
              <li><a class="dropdown-item" href="../admin/configuracion/naturaleza/New_Naturaleza.php">Nuevo</a></li>
            </ul>
          </li>
        <!-- Novedad -->
          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Novedad</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../admin/configuracion/novedad/index.php">Consulta </a></li>
              <li><a class="dropdown-item" href="../admin/configuracion/novedad/New_Novedad.php">Nuevo</a></li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
  </div>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
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