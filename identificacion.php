<?php
session_start();
include("cfg.php");
include('header.php');
?>

<img src="assets/img/img_banner.png" class="img-responsive" style="margin-top: -20px;">


    <section class="brake-line" id="page-head" style="margin-top: 20px; margin-bottom: 50px;">
        <div class="inner">
            <div class="container">
                <div class="row">
                    <div class="title" style="margin-top: -55px;">
                        <h1>Identificación</h1>
                      </div>
                </div>
            </div>
        </div>
    </section>





<?php
    if (isset($_SESSION['NoCuenta']))
        {
        if ($_SESSION['TipoUsuario'] == 'A')
            {

            $idFacultad = $_SESSION['idFacultad'];
            ?>
                <form name="frmIdentificacion" action="profesoresview.php" method="post">
                    <div class="container">
                        <div class="col-md-6 col-md-offset-3">
                            <!--FORMULARIO-->
                            <form class="form-horizontal">
                                <fieldset>

                                    <!-- Select Basic -->
                                    <div class="form-group">
                                    <label class="col-md-2 control-label" for="selectbasic">Facultad</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="facultadyy" onchange="change_facultad()">
                                                <option>Selecciona...</option>

                                                <?php
                                                    mysqli_set_charset($db, "utf8");
                                                    $sql = "SELECT idFacultad, nombreF FROM facultades WHERE idFacultad = $idFacultad";
                                                    $res=mysqli_query($db,$sql);
                                                    while($row=mysqli_fetch_array($res))
                                                    {
                                                        ?>
                                                        <option value="<?php echo $row["idFacultad"]; ?>"><?php echo $row["nombreF"]; ?></option>
                                                        <?php
                                                    }
                                                ?>

                                            </select>
                                        </div>
                                    </div>

                                    <!-- Select Basic -->
                                    <div class="form-group">
                                    <label class="col-md-2 control-label" for="selectbasic">Carrera</label>
                                        <div class="col-md-9">
                                            <div id="carrera">
                                                <select  class="form-control">
                                                        <option>Selecciona...</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Select Basic -->
                                    <div class="form-group">
                                    <label class="col-md-2 control-label" for="selectbasic">Asignatura</label>
                                        <div class="col-md-9">
                                            <div id="asignatura">
                                                <select  class="form-control">
                                                        <option>Selecciona...</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text_input">
                                        <input type="hidden" id="txtIdFacultad" name="Facultad" type="text" />
                                    </div>

                                    <div class="text_input">
                                        <input type="hidden" id="txtIdCarrera" name="Carrera" type="text" />
                                    </div>

                                    <div class="text_input">
                                        <input type="hidden" id="txtIdMateria" name="Materia" type="text" />
                                    </div>


                                    <div align="center">
                                        <button class="btn btn-green" style="font-family: Raleway, sans-serif; color : #FFF;" type="submit" >Indentificar</button>
                                    </div>

                                </fieldset>
                            </form>
                        </div>
                    </div>
                </form>
            <?php
            }
                else
            {
            ?>

                <form name="frmIdentificacion" action="busqueda.php" method="post">
                    <div class="container">
                        <div class="col-md-6 col-md-offset-3">
                            <!--FORMULARIO-->
                            <form class="form-horizontal">
                                <fieldset>

                                    <!-- Select Basic -->
                                    <div class="form-group">
                                    <label class="col-md-2 control-label" for="selectbasic">Facultad</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="facultadyy" onchange="change_facultad()">
                                                <option>Selecciona...</option>

                                                <?php
                                                    mysqli_set_charset($db, "utf8");
                                                    $sql = "SELECT idFacultad, nombreF FROM facultades";
                                                    $res=mysqli_query($db,$sql);
                                                    while($row=mysqli_fetch_array($res))
                                                    {
                                                        ?>
                                                        <option value="<?php echo $row["idFacultad"]; ?>"><?php echo $row["nombreF"]; ?></option>
                                                        <?php
                                                    }
                                                ?>

                                            </select>
                                        </div>
                                    </div>

                                    <!-- Select Basic -->
                                    <div class="form-group">
                                    <label class="col-md-2 control-label" for="selectbasic">Carrera</label>
                                        <div class="col-md-9">
                                            <div id="carrera">
                                                <select  class="form-control">
                                                        <option>Selecciona...</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Select Basic -->
                                    <div class="form-group">
                                    <label class="col-md-2 control-label" for="selectbasic">Asignatura</label>
                                        <div class="col-md-9">
                                            <div id="asignatura">
                                                <select  class="form-control">
                                                        <option>Selecciona...</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text_input">
                                        <input type="hidden" id="txtIdFacultad" name="Facultad" type="text" />
                                    </div>

                                    <div class="text_input">
                                        <input type="hidden" id="txtIdCarrera" name="Carrera" type="text" />
                                    </div>

                                    <div class="text_input">
                                        <input type="hidden" id="txtIdMateria" name="Materia" type="text" />
                                    </div>


                                    <div align="center">
                                        <button class="btn btn-green" style="font-family: Raleway, sans-serif; color : #FFF;" type="submit" >Indentificar</button>
                                    </div>

                                </fieldset>
                            </form>
                        </div>
                    </div>
                </form>
            <?php
            }
        }
        else
        {
        ?>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="login.php">Acceso al Sistema</a></li>
            </ul>
            <?php
        }
?>



<script type="text/javascript">
        function change_facultad()
        {
                var xmlhttp=new XMLHttpRequest();
                xmlhttp.open("GET","ajax.php?facultad="+document.getElementById("facultadyy").value,false);
                xmlhttp.send(null);
                //alert(xmlhttp.responseText);
                document.getElementById("carrera").innerHTML=xmlhttp.responseText;
                //alert(document.getElementById("facultadyy").value);

                var facultad = document.getElementById("facultadyy").value; //alert(facultad);
                idFacultad = facultad;
                //Display the new price to the user
                document.getElementById("txtIdFacultad").value = idFacultad;

                if(document.getElementById("facultadyy").value == "Selecciona...")
                {
                    document.getElementById("asignatura").innerHTML="<select class='form-control'><option>Selecciona...</option></select>";
                }
                else
                {
                    document.getElementById("asignatura").innerHTML="<select class='form-control'><option>Selecciona...</option></select>";
                }

        }

        function change_carrera()
        {
                var xmlhttp=new XMLHttpRequest();
                xmlhttp.open("GET","ajax.php?carrera="+document.getElementById("carrerayy").value,false);
                xmlhttp.send(null);
                //alert(xmlhttp.responseText);
                document.getElementById("asignatura").innerHTML=xmlhttp.responseText;
                //alert(document.getElementById("carrerayy").value);

                var carrera = document.getElementById("carrerayy").value; //alert(carrera);
                idCarrera = carrera;
                document.getElementById("txtIdCarrera").value = idCarrera;
        }


        function change_asignatura()
        {
                //alert(document.getElementById("asignaturayy").value);

                var materia = document.getElementById("asignaturayy").value; //alert(materia);
                idMateria = materia;
                document.getElementById("txtIdMateria").value = idMateria;
        }
</script>



<?php
include('footer.php');
?>
