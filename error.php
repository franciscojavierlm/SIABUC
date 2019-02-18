<?php
session_start();

include('header.php'); ?>

<div id="container">
    <div id="content">
        <div id="contentleft" style="margin-bottom: -40px;">
        <h1>Error al intentar entrar al sistema</h1>
            <p>Ocurrio un error al intentar entrar el sistema. Es probable que el usuario y/o contraseña que introdujo, no sean correctas.</p>
            <p>Favor de volver a intentar.</p>
            <p>Si el problema continua, favor de contactar al administrador del sistema.</p><BR>
        </div>
    </div>
</div><!--contentleft-->

<?php include('footer.php'); ?>