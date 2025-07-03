<?php
include("includes/configuracion.php");
session_start();
if($_SESSION==NULL){
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Inicio de Sesion</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo $url?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo $url?>plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo $url?>plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo $url?>css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><b><?php echo $sistema?></b></a>
            <small><?php echo $titulo?></small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="includes/ingresar.php">
                    <div class="msg">Inicia sesión para comenzar tu sesión</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="usuario" placeholder="Usuario" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="clave" placeholder="Contraseña" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Recordarme</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit" formaction="includes/ingresar.php">Ingresar</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?php echo $url?>plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo $url?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo $url?>plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo $url?>plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo $url?>js/admin.js"></script>
    <script src="<?php echo $url?>js/pages/examples/sign-in.js"></script>
</body>

</html>
<?php
}
if($_SESSION!=NULL)
{
	if($_SESSION['nivel']=="USUARIO")
	{
	header("location:".$url."administracion/");
	}
	if($_SESSION['nivel']=="admin")
	{
	header("location:".$url."usuarios/");
	}
	else if($_SESSION['nivel']=="vendedor")
	{
	header("location:".$url."vendedor/");
	}
	else
	{
		session_unset();
		session_destroy();
		header("location:$url");
	}
}
?>