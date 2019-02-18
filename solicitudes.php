<?php
    session_start();
    include("config.php");
    include('header.php');    
?>

<img src="assets/img/img_banner.png" class="img-responsive" style="margin-top: -20px;">

<section class="brake-line" id="page-head" style="margin-top: 20px; margin-bottom: 50px;">
    <div class="inner">
        <div class="container">
            <div class="row">
                <div class="title" style="margin-top: -55px;">      
                    <h1>Solicitudes</h1>
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
                    <th>Facultad</th>
                    <th>Carrera</th>
                    <th>Materia</th>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Status</th>
                    <th>Cantidad</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                
                <?php 
                
                $cuentaProfesor = $_SESSION['NoCuenta'];
                mysqli_set_charset($db, "utf8");
                $sql = "SELECT L.idLibro, L.titulo,L.autor,S.aprobacion, S.cantidad, F.nombreF, C.nombreC, M.nombreM, S.idFacultad, S.idCarrera, S.idMateria
                FROM libros AS L INNER JOIN solicitudes AS S ON L.idLibro=S.idLibro INNER JOIN facultades AS F ON S.idFacultad=F.idFacultad INNER JOIN carreras AS C ON S.idCarrera=C.idCarrera INNER JOIN materias AS M ON S.idMateria=M.idMateria
                WHERE S.cuentaProfesor = $cuentaProfesor";
                $res=mysqli_query($db,$sql);
                
                while($row=mysqli_fetch_array($res)) { ?>
                    <tr>
                        <td><?php echo $row['nombreF']; ?></td>
                        <td><?php echo $row['nombreC']; ?></td>
                        <td><?php echo $row['nombreM']; ?></td>
                        <td><?php echo $row['titulo']; ?></td>
                        <td><?php echo $row['autor']; ?></td>
                        <td><?php echo $row['aprobacion']; ?></td>
                        <td><?php echo $row['cantidad']; ?></td>
                        <td><a href="modificar.php?idLibro=<?php echo $row['idLibro']; ?>&facultad=<?php echo $row['idFacultad']; ?>&carrera=<?php echo $row['idCarrera']; ?>&materia=<?php echo $row['idMateria']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                        <td><a href="#" data-href="eliminar.php?idLibro=<?php echo $row['idLibro']; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a></td>
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

    <div class="col-md-4 col-md-offset-5">
        <a href="identificacion.php?" class="btn btn-primary">Regresar</a>
    </div>
    
    <!--<div align="center">
        <button onclick="window.location.href='identificacion.php'" class="btn btn-green" style="font-family: Raleway, sans-serif; color : #FFF;" type="submit" >Regresar</button>
    </div>-->

</div>


<?php 
    include('footer.php'); 
?>