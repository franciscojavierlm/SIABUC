<?php
include("cfg.php");

    //mysqli_set_charset($db, "utf8");
    $sql = "SELECT nombre FROM clientes";
    $res=ibase_query($conn,$sql);
    while($row=ibase_fetch_assoc($res))
    {
     print_r($row['NOMBRE']);
    }
?>
