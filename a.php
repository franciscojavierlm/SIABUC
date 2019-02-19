<?php
include("cfg.php");
$myaccount =  "prueba";
$mypassword = "9276";

$sql = "SELECT * FROM clientes WHERE nombre='$myaccount' and cliente_id='$mypassword'";

$result = ibase_query($conn, $sql);
$si = ibase_fetch_row($result);

//echo is_array($si) ? 'Array' : 'No es un array';

if($si){
  echo "pasa";
}else{
  echo "nel";
}

//echo count($si);
//echo $count;

 ?>
