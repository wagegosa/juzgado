<?php 
$alert = '';
session_start();
if(!empty($_SESSION['active'])){
  switch ($_SESSION['perfil']) {
    case '1':
      header('location: ./admin/');
      break;

    // case '2':
    //   header('location: ./operario/');
    //   break;

    // case '3':
    //   header('location: ./empresa/');
    //   break;
  }
}else{
  if(!empty($_POST)){
      require_once "./config/General/connexion.php";
      $conn= new DataBase();
      $link = $conn->Conectarse();
      $user = $_POST['usuario'];
      $pass = $_POST['pass'];
      $query = "SELECT idUsuario, perfil, usuario, nom_comple FROM juzgado.usuario WHERE usuario = '$user' AND pass = '$pass'  AND activo = 'Y'";
	    // echo "<pre>";
	    // print_r($query);
	    // echo "</pre>";
	    // die();
      $result = mysqli_query($link,$query);
      mysqli_close($link);
      $resulta = mysqli_num_rows($result);
      if($resulta > 0){
        $data = mysqli_fetch_array($result);
        $_SESSION['active'] = true;
        $_SESSION['idUser'] = $data['idtba_Usuario'];
        $_SESSION['perfil'] = $data['perfil'];
        $_SESSION['usuario']  = $data['usuario'];
        $_SESSION['nombre']   = $data['nom_comple'];
        switch ($_SESSION['perfil']) {
          case '1':
            header('location: ./admin/');
            break;
          
          // case '2':
          //   header('location: ./operario/');
          //   break;

          // case '3':
          //   header('location: ./empresa/');
          //   break;
        }
      }else{
        $alert = 'El <strong>usuario</strong> o la <strong>clave</strong> son incorrectos';
        session_destroy();
      }
  }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Juzgado</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="img/RamaJudicial.png"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/login_v2/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/login_v2/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/login_v2/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/login_v2/vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="css/login_v2/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/login_v2/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/login_v2/vendor/select2/select2.min.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="css/login_v2/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/login_v2/css/util.css">
	<link rel="stylesheet" type="text/css" href="css/login_v2/css/main.css">
	<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" autocomplete="off" id="frm" action="">
					<span class="login100-form-title p-b-48">
						<img src="img/RamaJudicial.png" alt="AVATAR" width="100" height="100">
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Ingrese usuario">
						<input class="input100" type="text" name="usuario" id="usuario">
						<span class="focus-input100" data-placeholder="Usuario"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Ingrese contraseña">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pass">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>
					<?php if($alert != "" || $alert != null){ ?>
          <div class="alert alert-warning"><?php echo isset($alert) ? $alert : ''; ?></div>
          <?php } ?>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--===============================================================================================-->
	<script src="css/login_v2/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<!-- <script src="css/assets/animsition/js/animsition.min.js"></scrip> -->
	<script src="css/login_v2/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="css/login_v2/vendor/bootstrap/js/popper.js"></script>
	<script src="css/login_v2/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="css/login_v2/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="css/login_v2/vendor/daterangepicker/moment.min.js"></script>
	<script src="css/login_v2/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="css/login_v2/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="css/login_v2/js/main.js"></script>

</body>
</html>