<?php
    session_start();
    include("config.php");
    include('header.php');

    $idLibro = $_GET['idLibro'];   
    mysqli_set_charset($db, "utf8");
    $sql = "DELETE libros, solicitudes
    FROM solicitudes INNER JOIN libros ON solicitudes.idLibro=libros.idLibro 
    WHERE (solicitudes.idSolicitud='$idLibro')";
?>


<img src="assets/img/img_banner.png" class="img-responsive" style="margin-top: -20px;">

<section class="brake-line" id="page-head" style="margin-top: 20px; margin-bottom: 50px;">
    <div class="inner">
        <div class="container">
            <div class="row">
                <div class="title" style="margin-top: -55px;">
                    <h1>Eliminado</h1>
                </div>
            </div>
        </div>
    </div>
</section>
    
    
<?php
    if(mysqli_query($db,$sql))
    {
?>
    <div class="container">
        <div class="row">
            <div class="row" style="text-align:center">
                <h3>Eliminado con exito :)</h3>
                <a href="solicitudes.php" class="btn btn-primary">Regresar</a>
            </div>
        </div>
    </div>
<?php 
    } 
    else 
    {
?>
    <div class="container">
        <div class="row">
            <div class="row" style="text-align:center">
                <h3>Eliminado fallido :(</h3>
                <a href="solicitudes.php?" class="btn btn-primary">Regresar</a>
            </div>
        </div>
    </div>
<?php
    }
?>

<?php 
    include('footer.php'); 
?>
