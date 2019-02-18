<?php
    session_start();
    include("config.php");

    $Titulo = $_POST['Titulo'];
    $Autor = $_POST['Autor'];
    $Editorial = $_POST['Editorial'];
    $Fecha = $_POST['Fecha'];
    $Categoria= $_POST['Categoria'];
    if(isset($_POST['ISBN_10'])){
        $ISBN_10 = $_POST['ISBN_10'];
    }else {$ISBN_10="";}
    if(isset($_POST['ISBN_13'])){
        $ISBN_13 = $_POST['ISBN_13'];
    }else{$ISBN_13 ="";}
    $Paginas = $_POST['Paginas'];
    $Idioma = $_POST['Idioma'];
    
    $cuentaProfesor = $_SESSION['NoCuenta'];
    $idFacultad = $_SESSION['idFacultad'];
    $idCarrera = $_SESSION['idCarrera'];
    $idMateria = $_SESSION['idMateria'];
    $fecha = date("Y-m-d");   
    
    mysqli_set_charset($db, "utf8");
    $sql = "INSERT INTO libros VALUES('','$Titulo','$Autor','$Editorial','$ISBN_10','$ISBN_13','$Fecha','$Paginas','$Idioma','$Categoria')";
    
    if(mysqli_query($db,$sql))
    {
        $idLibro = mysqli_insert_id($db);
        echo "<img src='assets/img/img_add_correct.png' width='30' height='30'/>"; 
        
        /*
        echo "idLibro: " . $idLibro . "<br>";
        echo "Cuenta Professor: " . $cuentaProfesor . "<br>";
        echo "idFacultad: " . $idFacultad . "<br>";
        echo "idMateria: " . $idCarrera . "<br>";
        echo "idCarrera: " . $idMateria . "<br>";
        echo "Fecha: " . $fecha . "<br>" ;*/
               
        mysqli_set_charset($db, "utf8");
        $sql2 = "INSERT INTO solicitudes VALUES('','$idLibro','$cuentaProfesor','$idFacultad','$idCarrera','$idMateria','',1,'$fecha')";

        if(mysqli_query($db,$sql2))
        {
            ?>
            <div class="container">
                <div class="row">
                    <div class="popupunder alert alert-success fade in">
                        <button type="button" class="close close-sm" data-dismiss="alert">
                            <i class="glyphicon glyphicon-remove"></i>
                        </button>
                        <strong>Éxito : </strong>
                            La solicitud se ha enviado!
                    </div>
                </div>              
            </div>   

            <script src="assets/plugins/jquery-1.10.2.js"></script>
            <script src="assets/plugins/bootstrap.js"></script>
            <script src="assets/js/custom.js"></script>
            
            <?php                          
        }
        else
        {
            ?>
            <div class="container">
                <div class="row">
                    <div class="popupunder alert alert-danger fade in">
                        <button type="button" class="close close-sm" data-dismiss="alert">
                            <i class="glyphicon glyphicon-remove"></i>
                        </button>
                        <strong>Error : </strong>
                            La solicitud no se ha enviado!
                    </div>
                </div>              
            </div>   

            <script src="assets/plugins/jquery-1.10.2.js"></script>
            <script src="assets/plugins/bootstrap.js"></script>
            <script src="assets/js/custom.js"></script>
            
            <?php  
        }
    
    }
    else
    {
        echo "<img src='assets/img/img_add_error.png' width='30' height='30'/>";
    }
    
    
?>