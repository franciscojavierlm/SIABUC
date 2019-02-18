<?php
    session_start();
    include("config.php");
    include('header.php'); 
    
    $_SESSION['idFacultad'] = $_POST['Facultad'];
    $_SESSION['idCarrera'] = $_POST['Carrera'];
    $_SESSION['idMateria'] = $_POST['Materia'];
    
    
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
                    <h1>Lista de Profesores</h1>
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
                    <th>N° de Cuenta</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>               
                <?php 
                mysqli_set_charset($db, "utf8");
                $sql = "SELECT S.cuentaProfesor,P.nombreP,P.apellidoPaterno,P.apellidoMaterno 
                FROM solicitudes AS S INNER JOIN profesores AS P ON S.cuentaProfesor = P.cuentaProfesor 
                WHERE idFacultad = $idFacultad AND idCarrera = $idCarrera AND idMateria = $idMateria GROUP BY cuentaProfesor ";
                $res=mysqli_query($db,$sql);
                
                while($row=mysqli_fetch_array($res)) { ?>
                    <tr>
                        <td><?php echo $row['cuentaProfesor']; ?></td>
                        <td><?php echo $row['nombreP']; ?></td>
                        <td><?php echo $row['apellidoPaterno']; ?></td>
                        <td><?php echo $row['apellidoMaterno']; ?></td>
                        <td> 
                            <a href="solicitudesview.php?cuentaProfesor=<?php echo $row['cuentaProfesor']; ?>&nombre=<?php echo $row['nombreP']; ?>&facultad=<?php echo $idFacultad; ?>&carrera=<?php echo $idCarrera; ?>&materia=<?php echo $idMateria; ?>"<span class="glyphicon glyphicon-search"></span></a>
                        </td>                      
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>


<?php 
    include('footer.php'); 
?>