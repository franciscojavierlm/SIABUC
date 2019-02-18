<?php
session_start();
include("config.php");
include('header.php');

$_SESSION['idFacultad'] = $_POST['Facultad'];
$_SESSION['idCarrera'] = $_POST['Carrera'];
$_SESSION['idMateria'] = $_POST['Materia'];
?>

<img src="assets/img/img_banner.png" class="img-responsive" style="margin-top: -20px;">

<section class="brake-line" id="page-head" style="margin-top: 20px; margin-bottom: 50px;">
    <div class="inner">
        <div class="container">
            <div class="row">
                <div class="title" style="margin-top: -55px;">      
                    <h1>Búsqueda</h1>
                  </div>   
            </div>
        </div>
    </div>   
</section>

<form action="googlebooks.php" method="post" name="formu" id="formu" onsubmit="return initialize()">         
    <div class="container">
        <div class="col-md-6 col-md-offset-3">      
            <!--FORMULARIO-->
            <form class="form-horizontal">
                                    
                <!-- Select Basic -->
                <div class="form-group">
                    
                    <label class="col-md-2 control-label" for="selectbasic">
                        <input name="optionsRadios" id="optionsRadios1" type="radio" checked="checked">
                        Titulo
                    </label>
                    
                    <fieldset id="myTitulo">            
                        <div class="col-md-9">                    
                            <input class="form-control" placeholder="Titulo" type="text" name="nameBook" id="search" autofocus/>
                        </div>
                    </fieldset>
                    
                </div>
                

                <!-- Select Basic -->
                <div class="form-group">

                    <label class="col-md-2 control-label" for="selectbasic">
                        <input name="optionsRadios" id="optionsRadios2" type="radio">
                        Autor
                    </label>
                
                    <fieldset id="myAutor" disabled="">
                        <div class="col-md-9">
                            <input class="form-control" placeholder="Autor(es)" type="text" name="authors" id="authors" autofocus />
                        </div>
                    </fieldset>
                    
                </div>


                <!-- Select Basic -->
                <div class="form-group">
                
                    <label class="col-md-2 control-label" for="selectbasic">
                        <input name="optionsRadios" id="optionsRadios3" type="radio">
                        Edit
                    </label>
                
                    <fieldset id="myEditorial" disabled="">
                        <div class="col-md-9">
                            <input class="form-control" placeholder="Editorial" type="text" name="publisher" id="publisher" autofocus/>
                        </div>
                    </fieldset>
                    
                </div>


                <!-- Select Basic -->
                <div class="form-group">
                    
                    <label class="col-md-2 control-label" for="selectbasic">
                        <input name="optionsRadios" id="optionsRadios4" type="radio">
                        ISBN
                    </label>
                
                    <fieldset id="myISBN" disabled="">
                        <div class="col-md-9">
                            <input class="form-control" placeholder="ISBN" type="text" name="ID_ISBN" id="ID_ISBN" autofocus/>
                        </div>
                    </fieldset>
                
                </div>

                <div align="center">
                    <button class="btn btn-green" style="font-family: Raleway, sans-serif; color : #FFF;" id="submit" name="submit" type="submit" >Buscar</button>
                </div>
                
                   
                <script type="text/javascript">
  
                    //Titulo
                    $("#optionsRadios1").click(function() {$("#myTitulo").prop("disabled", false);});
                    $("#optionsRadios1").click(function() {$("#myAutor").prop("disabled", true);});
                    $("#optionsRadios1").click(function() {$("#myEditorial").prop("disabled", true);});
                    $("#optionsRadios1").click(function() {$("#myISBN").prop("disabled", true);});
                    
                    //Autor
                    $("#optionsRadios2").click(function() {$("#myAutor").prop("disabled", false);});
                    $("#optionsRadios2").click(function() {$("#myTitulo").prop("disabled", true);});
                    $("#optionsRadios2").click(function() {$("#myEditorial").prop("disabled", true);});
                    $("#optionsRadios2").click(function() {$("#myISBN").prop("disabled", true);});
                    
                    //Editorial
                    $("#optionsRadios3").click(function() {$("#myEditorial").prop("disabled", false);});
                    $("#optionsRadios3").click(function() {$("#myTitulo").prop("disabled", true);});
                    $("#optionsRadios3").click(function() {$("#myAutor").prop("disabled", true);});
                    $("#optionsRadios3").click(function() {$("#myISBN").prop("disabled", true);});
                           
                    //ISBN
                    $("#optionsRadios4").click(function() {$("#myISBN").prop("disabled", false);});
                    $("#optionsRadios4").click(function() {$("#myTitulo").prop("disabled", true);});
                    $("#optionsRadios4").click(function() {$("#myAutor").prop("disabled", true);});
                    $("#optionsRadios4").click(function() {$("#myEditorial").prop("disabled", true);});
                    
                </script>
            </form>
        </div>
    </div>  
</form>


<?php 
include('footer.php');
?>
