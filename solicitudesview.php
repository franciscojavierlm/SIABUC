<?php
    session_start();
    include("config.php");
    include('header.php'); 
    
    $_SESSION['nombre'] = $_GET['nombre'];
    $_SESSION['cuentaProfesor'] = $_GET['cuentaProfesor'];
    $_SESSION['idFacultad'] = $_GET['facultad'];
    $_SESSION['idCarrera'] = $_GET['carrera'];
    $_SESSION['idMateria'] = $_GET['materia'];
    
    $nombre = $_SESSION['nombre'];
    $cuentaProfesor = $_SESSION['cuentaProfesor'];
    $idFacultad = $_SESSION['idFacultad'];
    $idCarrera = $_SESSION['idCarrera'];
    $idMateria = $_SESSION['idMateria'];
?>

<img src="assets/img/img_banner.png" class="img-responsive" style="margin-top: -20px;">

<section class="brake-line" id="page-head" style="margin-top: 20px; margin-bottom: 50px;">
    <div class="inner">
        <div class="container">
            <div class="row">
                <div class="title" style="margin-top: -55px;">      
                    <h1>Lista de Solicitudes</h1>
                    <!--<h1>Lista de Solicitudes del Profesor <?php /*echo $nombre;*/ ?></h1>-->
                  </div>   
            </div>
        </div>
    </div>   
</section>



<div class="container">
    <div class="row table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Editorial</th>
                    <th>ISBN 10</th>
                    <th>ISBN 13</th>
                    <th>Año</th>
                    <th>Paginas</th>
                    <th>Idioma</th>
                    <th>Clasificacion</th>
                    <th>Status</th>
                    <th>Cantidad</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                mysqli_set_charset($db, "utf8");
                $sql = "SELECT L.idLibro,L.titulo,L.autor,L.editorial,L.ISBN10,L.ISBN13,L.año,L.paginas,L.idioma,L.clasificacion,S.aprobacion, S.cantidad
                FROM libros AS L INNER JOIN solicitudes AS S ON L.idLibro=S.idLibro  
                WHERE S.cuentaProfesor = $cuentaProfesor AND S.idFacultad = $idFacultad AND S.idCarrera = $idCarrera AND S.idMateria = $idMateria";
                $res=mysqli_query($db,$sql);
                
                while($row=mysqli_fetch_array($res)) { ?>
                    <tr>
                        <td><?php echo $row['idLibro']; ?></td>
                        <td><?php echo $row['titulo']; ?></td>
                        <td><?php echo $row['autor']; ?></td>
                        <td><?php echo $row['editorial']; ?></td>
                        <td><?php echo $row['ISBN10']; ?></td>
                        <td><?php echo $row['ISBN13']; ?></td>
                        <td><?php echo $row['año']; ?></td>
                        <td><?php echo $row['paginas']; ?></td>
                        <td><?php echo $row['idioma']; ?></td>
                        <td><?php echo $row['clasificacion']; ?></td>
                        <td><?php echo $row['aprobacion']; ?></td>
                        <td><?php echo $row['cantidad']; ?></td>
                        <td> 
                            <a href="modificarview.php?idLibro=<?php echo $row['idLibro']; ?>&cuentaProfesor=<?php echo $cuentaProfesor; ?>&nombre=<?php echo $nombre; ?>&facultad=<?php echo $idFacultad; ?>&carrera=<?php echo $idCarrera; ?>&materia=<?php echo $idMateria; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                        </td>
                        <td> 
                            <a href="#" data-href="eliminarview.php?idLibro=<?php echo $row['idLibro']; ?>&cuentaProfesor=<?php echo $cuentaProfesor; ?>&nombre=<?php echo $nombre; ?>&facultad=<?php echo $idFacultad; ?>&carrera=<?php echo $idCarrera; ?>&materia=<?php echo $idMateria; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a>
                        </td> 
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Eliminar Solicitud</h4>
                </div>
                <div class="modal-body">
                    ¿Desea eliminar está solicitud?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger btn-ok">Eliminar</a>
                </div>
            </div>
        </div>
    </div>
    
    <script>
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

        $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
    });
    </script>

    
    <form method="POST">
        <div class="col-md-4 col-md-offset-5">
            <input type="hidden" id="id" name="Facultad" value="<?php echo $idFacultad; ?>" />
            <input type="hidden" id="id" name="Carrera" value="<?php echo $idCarrera; ?>" />
            <input type="hidden" id="id" name="Materia" value="<?php echo $idMateria; ?>" />
            <button type="submit" formaction="profesoresview.php" class="btn btn-primary">Regresar</button>
        </div>
    </form>

</div>


<?php 
    include('footer.php'); 
?>