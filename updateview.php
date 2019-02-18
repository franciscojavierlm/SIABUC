<?php
    session_start();
    include("config.php");
    include('header.php');

    $_SESSION['Titulo'] = $_POST['Titulo'];
    $_SESSION['idLibro'] = $_POST['idLibro'];  
    $_SESSION['Autor'] = $_POST['Autor']; 
    $_SESSION['Editorial'] = $_POST['Editorial'];
    $_SESSION['ISBN_10'] = $_POST['ISBN_10'];  
    $_SESSION['ISBN_13'] = $_POST['ISBN_13']; 
    $_SESSION['Fecha'] = $_POST['Fecha'];
    $_SESSION['Paginas'] = $_POST['Paginas'];  
    $_SESSION['Idioma'] = $_POST['Idioma']; 
    $_SESSION['Clasificacion'] = $_POST['Clasificacion']; 
    $_SESSION['Aprobacion'] = $_POST['Aprobacion']; 
    $_SESSION['Cantidad'] = $_POST['Cantidad']; 
    $_SESSION['nombre'] = $_POST['nombre'];
    $_SESSION['cuentaProfesor'] = $_POST['cuentaProfesor']; 
    $_SESSION['idFacultad'] = $_POST['idFacultad']; 
    $_SESSION['idCarrera'] = $_POST['idCarrera']; 
    $_SESSION['idMateria'] = $_POST['idMateria']; 

    $titulo = $_SESSION['Titulo'];
    $idLibro = $_SESSION['idLibro'];
    $autor = $_SESSION['Autor'];
    $editorial = $_SESSION['Editorial'];
    $iSBN_10 = $_SESSION['ISBN_10'];
    $iSBN_13 =  $_SESSION['ISBN_13'];
    $fecha = $_SESSION['Fecha'];
    $paginas = $_SESSION['Paginas'];
    $idioma = $_SESSION['Idioma'];
    $clasificacion= $_SESSION['Clasificacion'];
    $aprobacion= $_SESSION['Aprobacion'];
    $cantidad= $_SESSION['Cantidad'];
    
    $nombre = $_SESSION['nombre'];
    $cuentaProfesor = $_SESSION['cuentaProfesor'];
    $facultad =$_SESSION['idFacultad'];
    $carrera =$_SESSION['idCarrera'];
    $materia =$_SESSION['idMateria'];
    

    mysqli_set_charset($db, "utf8");
    $sql = "UPDATE libros
    INNER JOIN solicitudes ON libros.idLibro=solicitudes.idLibro
    SET libros.titulo='$titulo' , libros.autor='$autor', libros.editorial='$editorial', libros.ISBN10='$iSBN_10', libros.ISBN13='$iSBN_13',libros.año=$fecha, libros.paginas=$paginas, libros.idioma='$idioma', libros.clasificacion='$clasificacion',solicitudes.aprobacion=$aprobacion,solicitudes.cantidad=$cantidad 
    WHERE libros.idLibro = $idLibro";
?>

<img src="assets/img/img_banner.png" class="img-responsive" style="margin-top: -20px;">

<section class="brake-line" id="page-head" style="margin-top: 20px; margin-bottom: 50px;">
    <div class="inner">
        <div class="container">
            <div class="row">
                <div class="title" style="margin-top: -55px;">
                    <h1>Actualizado</h1>
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
                    <h3>Modificado con exito :)</h3>
                    <a href="solicitudesview.php?nombre=<?php echo $nombre; ?>&cuentaProfesor=<?php echo $cuentaProfesor; ?>&facultad=<?php echo $facultad; ?>&carrera=<?php echo $carrera; ?>&materia=<?php echo $materia; ?>" class="btn btn-primary">Regresar</a>
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
                    <h3>Modificado fallido :(</h3>
                    <a href="solicitudesview.php?nombre=<?php echo $nombre; ?>&cuentaProfesor=<?php echo $cuentaProfesor; ?>&facultad=<?php echo $facultad; ?>&carrera=<?php echo $carrera; ?>&materia=<?php echo $materia; ?>" class="btn btn-primary">Regresar</a>
                </div>
            </div>
        </div>
<?php
    }
?>

<?php 
    include('footer.php'); 
?>
