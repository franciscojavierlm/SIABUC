<?php
    session_start();
    include("config.php");
    include('header.php'); 
      
    $_SESSION['nombre'] = $_GET['nombre'];
    $_SESSION['idLibro'] = $_GET['idLibro'];   
    $_SESSION['cuentaProfesor'] = $_GET['cuentaProfesor'];
    $_SESSION['idFacultad'] = $_GET['facultad'];
    $_SESSION['idCarrera'] = $_GET['carrera'];
    $_SESSION['idMateria'] = $_GET['materia'];
    
    
    $idLibro = $_SESSION['idLibro'];
    $nombre = $_SESSION['nombre'];
    $cuentaProfesor = $_SESSION['cuentaProfesor'];
    $idFacultad = $_SESSION['idFacultad'];
    $idCarrera = $_SESSION['idCarrera'];
    $idMateria = $_SESSION['idMateria'];
    
    mysqli_set_charset($db, "utf8");
    $sql = "SELECT L.titulo,L.idLibro,L.autor,L.editorial,L.ISBN10,L.ISBN13,L.año,L.paginas,L.idioma,L.clasificacion, S.aprobacion,S.cantidad
    FROM libros AS L INNER JOIN solicitudes AS S ON L.idLibro=S.idLibro
    WHERE S.idLibro=$idLibro;";
    $res=mysqli_query($db,$sql);
    $row=mysqli_fetch_array($res);   
?>

<img src="assets/img/img_banner.png" class="img-responsive" style="margin-top: -20px;">

<section class="brake-line" id="page-head" style="margin-top: 20px; margin-bottom: 50px;">
    <div class="inner">
        <div class="container">
            <div class="row">
                <div class="title" style="margin-top: -55px;">      
                    <h1>Modificar Información</h1>
                    <!--<h1>Lista de Solicitudes del Profesor <?php /*echo $nombre;*/ ?></h1>-->
                  </div>   
            </div>
        </div>
    </div>   
</section>




<div class="container">
    <form class="form-horizontal" method="POST" action="updateview.php" autocomplete="off">
        
        <div class="form-group">
            <label for="Titulo" class="col-sm-2 control-label">Titulo</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Titulo" name="Titulo" placeholder="Titulo" value="<?php echo $row['titulo']; ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="Autor" class="col-sm-2 control-label">Autor</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Autor" name="Autor" placeholder="Autor" value="<?php echo $row['autor']; ?>">
            </div>
        </div>
        
        <div class="form-group">
            <label for="Editorial" class="col-sm-2 control-label">Editorial</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Editorial" name="Editorial" placeholder="Editorial" value="<?php echo $row['editorial']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="ISBN_10" class="col-sm-2 control-label">ISBN 10</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="ISBN_10" name="ISBN_10" placeholder="ISBN 10" value="<?php echo $row['ISBN10']; ?>">
            </div>
        </div>
        
        <div class="form-group">
            <label for="ISBN_13" class="col-sm-2 control-label">ISBN 13</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="ISBN_13" name="ISBN_13" placeholder="ISBN 13" value="<?php echo $row['ISBN13']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="Fecha" class="col-sm-2 control-label">Año</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Fecha" name="Fecha" placeholder="Fecha" value="<?php echo $row['año']; ?>">
            </div>
        </div>
        
        <div class="form-group">
            <label for="Paginas" class="col-sm-2 control-label">Paginas</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Paginas" name="Paginas" placeholder="Paginas" value="<?php echo $row['paginas']; ?>">
            </div>
        </div>
        
        <div class="form-group">
            <label for="Idioma" class="col-sm-2 control-label">Idioma</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Idioma" name="Idioma" placeholder="Idioma" value="<?php echo $row['idioma']; ?>">
            </div>
        </div>
        
        <div class="form-group">
            <label for="Clasificacion" class="col-sm-2 control-label">Clasificación</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Clasificacion" name="Clasificacion" placeholder="Clasificacion" value="<?php echo $row['clasificacion']; ?>">
            </div>
        </div>
        
        <div class="form-group">
            <label for="Aprobacion" class="col-sm-2 control-label">Aprobacion</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="aprobacion" name="Aprobacion" placeholder="Aprobacion" value="<?php echo $row['aprobacion']; ?>">
            </div>
        </div>
        
        <div class="form-group">
            <label for="Cantidad" class="col-sm-2 control-label">Cantidad</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="cantidad" name="Cantidad" placeholder="Cantidad" value="<?php echo $row['cantidad']; ?>">
            </div>
        </div>
        
        <input type="hidden" id="id" name="idLibro" value="<?php echo $row['idLibro']; ?>" />
        <input type="hidden" id="id" name="nombre" value="<?php echo $nombre; ?>" />
        <input type="hidden" id="id" name="cuentaProfesor" value="<?php echo $cuentaProfesor; ?>" />
        <input type="hidden" id="id" name="idFacultad" value="<?php echo $idFacultad; ?>" />
        <input type="hidden" id="id" name="idCarrera" value="<?php echo $idCarrera; ?>" />
        <input type="hidden" id="id" name="idMateria" value="<?php echo $idMateria; ?>" />
        
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="solicitudesview.php?nombre=<?php echo $nombre; ?>&cuentaProfesor=<?php echo $cuentaProfesor; ?>&facultad=<?php echo $idFacultad;?>&carrera=<?php echo $idCarrera; ?>&materia=<?php echo $idMateria; ?>" class="btn btn-default">Regresar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>      
        
    </form>
</div>

    

<?php 
    include('footer.php'); 
?>