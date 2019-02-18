<?php
session_start();

include("config.php");

if (isset($_POST['btnLogin'])) 
    {
        $myaccount = mysqli_real_escape_string($db, $_POST['noCuenta']);
        $mypassword = mysqli_real_escape_string($db, $_POST['password']);

        mysqli_set_charset($db, "utf8");
        $sql = "SELECT * FROM administradores WHERE cuentaAdministrador='$myaccount' and password='$mypassword'";
        $sql2 = "SELECT * FROM profesores WHERE cuentaProfesor='$myaccount' and password='$mypassword'";
        $result = mysqli_query($db, $sql);
        $result2 = mysqli_query($db, $sql2);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
        //$active = $row['active'];

        $count = mysqli_num_rows($result);
        $count2 = mysqli_num_rows($result2);

        // If result matched $myusername and $mypassword, table row must be 1 row

        if ($count == 1) 
        {
            $_SESSION['NoCuenta'] = $myaccount;
            $_SESSION['Password'] = $mypassword;
            $_SESSION['Nombre'] = $row['nombre'];
            $_SESSION['idFacultad'] = $row['idFacultad'];
            $_SESSION['TipoUsuario'] = 'A';
            header("Location: index.php");
        } 
        else if ($count2 == 1)
        {
            $_SESSION['NoCuenta'] = $myaccount;
            $_SESSION['Password'] = $mypassword;
            $_SESSION['Nombre'] = $row['nombre'];
            $_SESSION['TipoUsuario'] = 'P';
            header("Location: index.php");
        }
        else
        {
            header("Location: error.php");
        }

    } 
    else 
    {
    include('header.php');
    
    ?>

    <section class="brake-line" id="page-head" >
        <div class="inner">
            <div class="container">
                <div class="row">
                    <div class="title" style="margin-top: -55px;">      
                        <h1>Acceso al Sistema</h1>
                </div>
            </div>
        </div>   
    </section>

    <div class="jumbotron" style="background-color: white; margin-top: 400px;">
      <div class="container">
      </div>
    </div>
     
<div class="row login_box">
        
        <div class="col-md-12 col-xs-12" align="center">
            <div class="line" style="font-family: 'Century Gothic', sans-serif; color : #FFF;">
            <h3>
                <tr>
                    <th width="114" scope="col"><font id="cl"><strong>0</strong></font></th>
                </tr>
            </h3>
            </div>
            <div class="outter"><img src="assets/img/img_login.png" class="image-circle"/></div>   
            <h1 style="font-family: 'Raleway', sans-serif; color : #FFF; font-weight: 200;">Bienvenido</h1>
        </div>

        <form method="post">
            <div class="col-md-12 col-xs-12 login_control">
                
                    <div class="control">
                        <div class="label" style="font-family: 'Raleway', sans-serif;">Número de cuenta</div>
                        <input type="text" onkeypress="return AllowOnlyNumbers(event);" maxlength="8" class="form-control" name="noCuenta"/>
                    </div>

                    <div class="control">
                         <div class="label" style="font-family: 'Raleway', sans-serif;">Contraseña</div>
                        <input type="password" class="form-control" name="password"/>
                    </div>
                    <div align="center">
                        <button class="btn btn-orange" style="font-family: 'Raleway', sans-serif; color : #FFF;" type="submit"  name="btnLogin">LOGIN</button>
                    </div>
            </div>
        </form>
    </div>

    <?php
    include('footer.php');
}
?>

