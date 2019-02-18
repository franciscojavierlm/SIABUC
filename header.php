<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Registro Bibliográfico Automatizado</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLE CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />    
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- Icono de la página -->
    <link href='assets/img/img_udec_logo_icono.png' rel='shortcut icon' type='image/png'> 
    <!-- Login --> 
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>   
    <link href="assets/css/styleLogin.css" rel="stylesheet">
</head>
    
<body onload="mueveReloj()">
    
    <!--/.NAVBAR START FROM HERE-->
    <!--<div class="navbar navbar-inverse navbar-static-top" style="background: url('assets/img/ej.png') no-repeat;">-->
    <div class="navbar navbar-inverse navbar-static-top">  
        <div class="container">          
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--<a class="navbar-brand" href="#">YOUR LOGO</a>
                style="margin: 0 auto; height: 70px;"  class="img-responsive"-->
                <a class="navbar-brand" href="index.php"><img src="assets/img/img_udec_logo.png" width="300" class="img-responsive"></a>  
            </div>
                  
            <div class="navbar-collapse collapse">
                <?php
                    if (isset($_SESSION['NoCuenta'])) {
                        if ($_SESSION['TipoUsuario'] == 'A') {
                            ?>
                
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#">Administrador</a></li>
                                <li><a href="identificacion.php">Identificación</a></li>
                                <!--<li><a href="#">Lista de Solicitudes</a></li>-->
                                <li><a href="#">LSCU</a></li>
                                <!--<li><a href="#">LSCU Review</a></li>
                                <li><a href="#">Sincronización</a></li>-->
                                <li><a href="cerrarsesion.php">Cerrar Sesión (<?php echo $_SESSION['NoCuenta'] ?>)</a></li>
                            </ul>
                
                            <?php
                        } else { 
                            ?>
                
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#">Profesor</a></li>
                                <li><a href="identificacion.php">Identificación</a></li>
                                <!--<li><a href="#">Búsqueda</a></li>-->
                                <li><a href="#">LSC</a></li>
                                <li><a href="solicitudes.php">Solicitudes</a></li>
                                <!--<li><a href="cerrarsesion.php">Cerrar Sesión</a></li>-->
                                <!--<li><a href="cerrarsesion.php">Cerrar Sesión (<?php /*echo $_SESSION['NoCuenta'] */?>)</a></li>-->
                                <li><a href="cerrarsesion.php">Cerrar Sesión (<?php echo $_SESSION['NoCuenta'] ?>)</a></li>
                            </ul>
                
                            <?php
                        }
                    } else {
                        ?>

                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="login.php">Acceso al Sistema</a></li>
                        </ul>
               
                        <?php
                    }
                ?>
                
            </div>
        </div>
    </div>
   <!--/.NAVBAR END-->

           
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/plugins/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
    