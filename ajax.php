<?php
include("Config.php");

$facultad = (isset($_GET['facultad']) ? $_GET['facultad'] : null);
$carrera = (isset($_GET['carrera']) ? $_GET['carrera'] : null);


if($facultad!="")
{
        mysqli_set_charset($db, "utf8");
        $sql = "SELECT idCarrera, idFacultad, nombreC FROM carreras WHERE idFacultad=$facultad";
        $res=mysqli_query($db,$sql);
        
	echo "<select class='form-control' id='carrerayy' onchange='change_carrera()'>";
        echo "<option selected>"; echo "Selecciona..."; echo "</option>";
	while($row=mysqli_fetch_array($res))
	{
		echo "<option value='$row[idCarrera]'>"; echo $row["nombreC"]; echo "</option>";
	}
	
	echo "</select>";
}


if($carrera!="")
{
        mysqli_set_charset($db, "utf8");
        $sql = "SELECT idMateria, idCarrera, nombreM FROM materias WHERE idCarrera=$carrera";
        $res=mysqli_query($db,$sql);
       
	echo "<select class='form-control' id='asignaturayy' onchange='change_asignatura()'>";
        echo "<option selected>"; echo "Selecciona..."; echo "</option>";
	while($row=mysqli_fetch_array($res))
	{
		echo "<option value='$row[idMateria]'>"; echo $row["nombreM"]; echo "</option>";
	}
	
	echo "</select>";
}

?>