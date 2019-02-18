<?php
session_start();
include('header.php');

$query = $_POST['nameBook'];
//echo $query;

?>

<img src="assets/img/img_banner.png" class="img-responsive" style="margin-top: -20px;">

<section class="brake-line" id="page-head" style="margin-top: 20px; margin-bottom: 50px;">
    <div class="inner">
        <div class="container">
            <div class="row">
                <div class="title" style="margin-top: -55px;">      
                    <h1>Lista de Solicitudes de Compra</h1>
                  </div>   
            </div>
        </div>
    </div>   
</section>

<section class="brake-line" id="page-head" style="margin-top: 20px; margin-bottom: 50px;">
    <div class="inner">
        <div class="container">
            <div class="row">
                <div class="title" style="margin-top: -55px;">      
                    <img src="assets/img/img_googlebooks.png" class="img-responsive" style="margin-top: -20px; margin: 0 auto;">
                </div>   
            </div>
        </div>
    </div>   
</section>
    


<?php

error_reporting(E_ALL);

$v = isset($_GET['v']) ? $_GET['v'] : '1';
$key = isset($_GET['key']) ? $_GET['key'] : 'AIzaSyCDjCQnJs3aANXFpsnxUdEIYPiyPJsfQEU';  
$ip = isset($_GET['ip']) ? $_GET['ip'] : $_SERVER['REMOTE_ADDR'];    
$type = isset($_GET['type']) ? $_GET['type'] : 'all';   
$start = isset($_GET['start']) ? $_GET['start'] : 1;    
$limit = isset($_GET['limit']) ? $_GET['limit'] : '6'; 
$params = 'q='.urlencode($query).'&startIndex='.$start.'&maxResults='.$limit;     
$url = 'https://www.googleapis.com/books/v'.$v.'/volumes?key='.$key.'&userIp='.$ip.'&'.$params.'';   
$request = file_get_contents($url);
$data = json_decode($request,true);
$totalItems = $data['totalItems']; 

if ($totalItems > 0) 
{ ?>
    <div id="contenido">
        <div class="container">
            <?php  for($i=0;$i < count($data['items']);++$i)  
            { 
                $jdata = $data['items'][$i]; ?>
            
            <form id ="myForm<?php echo $i ?>" accion="" method="post" class="col-md-4 col-sm-4 col-xs-12">                        

                    <section id="pricing-one" style="margin-top: -80px;">
    
                            <div class="row text-center pad-row">         
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="panel panel-primary">                         
                                        <div class="panel-heading">

                                            <?php //titulo?>
                                            <?php if(isset($jdata['volumeInfo']['title'])) { ?>
                                            <?php $Titulo=$jdata['volumeInfo']['title'];
                                            //echo "<h4>" . $Titulo . "</h4>";
                                            echo "<h1><input class='panel-headinga' type='text' name='Titulo' value='$Titulo' readonly></h1>" ; ?>

                                            <?php } else { ?> 
                                            <?php $Titulo=isset($jdata['volumeInfo']['title']);
                                            //echo "<h4>" . $Titulo . "</h4>";
                                            echo "<input class='panel-headinga'  type='text' name='Titulo' value=' ' readonly>" ; ?>
                                            <?php } ?>

                                        </div>     
                                        <div class="panel-body" style="margin-top: -50px;">
                                            <ul class="plan">      
                                                <li>
                                                    <strong>

                                                    <?php //Imagen?>
                                                    <?php if(isset($jdata['volumeInfo']['imageLinks'])) { ?>
                                                        <img src="<?php echo rawurldecode($jdata['volumeInfo']['imageLinks']['smallThumbnail']); ?>" width="128" height="166" />
                                                    <?php } else { ?> 
                                                        <img src="assets/img/img_not_availabe.png"/>
                                                    <?php } ?>

                                                    </strong> 
                                                </li>  
                                                <li><strong>Autor:</strong>

                                                    <?php // Autor?>
                                                    <?php if(isset($jdata['volumeInfo']['authors'])) { ?>
                                                        <?php $Autor=$jdata['volumeInfo']['authors'][0]; 
                                                        //echo $Autor;
                                                        echo "<input class='panel-headinga2' style='border:none' type='text' name='Autor' value='$Autor' readonly > <br>" ;?>

                                                    <?php } else { ?> 
                                                        <?php $Autor=isset($jdata['volumeInfo']['authors'][0]); 
                                                        //echo $Autor;
                                                        echo "<input class='panel-headinga2' style='border:none' type='text' name='Autor' value=' ' readonly > <br>" ;?>
                                                    <?php } ?>
                                                </li>
                                                <li><strong>Editorial:</strong> 
                                                    <?php // Editorial?>
                                                    <?php if(isset($jdata['volumeInfo']['publisher'])) { ?>
                                                        <?php $Editorial = $jdata['volumeInfo']['publisher']; 
                                                        //echo $Editorial;
                                                        echo "<input class='panel-headinga2' style='border:none' type='text' name='Editorial' value='$Editorial' readonly > <br>" ;?>
                                                    <?php } else { ?> 
                                                        <?php $Editorial = isset($jdata['volumeInfo']['publisher']); 
                                                        //echo $Editorial;
                                                        echo "<input class='panel-headinga2' style='border:none' type='text' name='Editorial' value=' ' readonly > <br>" ;?>
                                                    <?php } ?>
                                                </li>
                                                <li><strong>ISBN:</strong>
                                                    <?php // ISBN?>
                                                    <?php if(isset($jdata['volumeInfo']['industryIdentifiers'])) { ?>
                                                         <?php $ISBN = $jdata['volumeInfo']['industryIdentifiers'][0]['identifier']; 
                                                            if(strlen($ISBN) == 10){
                                                                echo "<input class='panel-headinga2' style='border:none' type='text' name='ISBN_10' value='$ISBN' readonly > <br>" ;
                                                         }else{ echo "<input class='panel-headinga2' style='border:none' type='text' name='ISBN_13' value='$ISBN' readonly > <br>" ;}
                                                        ?>
                                                    <?php } else { ?> 
                                                        <?php $ISBN= isset($jdata['volumeInfo']['industryIdentifiers'][0]['identifier']); 
                                                        echo "<input class='panel-headinga2' style='border:none' type='text' name='ISBN' value=' ' readonly > <br>" ;?>
                                                    <?php } ?>
                                                </li>
                                                <li><strong>Categoria:</strong>
                                                    <?php // Categoria?>
                                                    <?php if(isset($jdata['volumeInfo']['categories'])) { ?>
                                                        <?php $Categoria = strtolower($jdata['volumeInfo']['categories'][0]); 
                                                        //echo $Categoria;
                                                        echo "<input class='panel-headinga2' style='border:none' type='text' name='Categoria' value='$Categoria' readonly > <br>" ;?>
                                                    <?php } else { ?> 
                                                        <?php $Categoria = isset($jdata['volumeInfo']['categories'][0]); 
                                                        //echo $Categoria;
                                                        echo "<input class='panel-headinga2' style='border:none' type='text' name='Categoria' value=' ' readonly > <br>" ;?>
                                                    <?php } ?>
                                                </li>
                                                <li><strong>Fecha:</strong> 
                                                    <?php // Fecha?>
                                                    <?php if(isset($jdata['volumeInfo']['publishedDate'])) { ?>
                                                        <?php $Fecha = $jdata['volumeInfo']['publishedDate']; 
                                                        //echo $Fecha;
                                                        echo "<input class='panel-headinga2' style='border:none' type='text' name='Fecha' value='$Fecha' readonly > <br>" ;?>
                                                    <?php } else { ?> 
                                                        <?php $Fecha = isset($jdata['volumeInfo']['publishedDate']); 
                                                        //echo $Fecha;
                                                        echo "<input class='panel-headinga2' style='border:none' type='text' name='Fecha' value=' ' readonly > <br>" ;?>
                                                    <?php } ?>
                                                </li>
                                                <li><strong>Paginas:</strong>                                                        
                                                    <?php //paginas?>
                                                    <?php if(isset($jdata['volumeInfo']['pageCount'])) { ?>
                                                        <?php $paginas = $jdata['volumeInfo']['pageCount']; 
                                                        //echo $paginas;
                                                        echo "<input class='panel-headinga2' style='border:none' type='text' name='Paginas' value='$paginas' readonly > <br>" ;?>
                                                    <?php } else { ?> 
                                                        <?php $paginas= isset($jdata['volumeInfo']['pageCount']); 
                                                        //echo $paginas;
                                                        echo "<input class='panel-headinga2' style='border:none' type='text' name='Paginas' value=' ' readonly > <br>" ;?>
                                                    <?php } ?>                                                        
                                                </li>
                                                <li><strong>Idioma:</strong>                 
                                                    <?php //idioma?>
                                                    <?php if(isset($jdata['volumeInfo']['language'])) { ?>
                                                        <?php $Idioma = $jdata['volumeInfo']['language']; 
                                                        //echo $Idioma;
                                                        echo "<input class='panel-headinga2' style='border:none' type='text' name='Idioma' value='$Idioma' readonly > <br>" ;?>
                                                    <?php } else { ?> 
                                                        <?php $Idioma= isset($jdata['volumeInfo']['language']); 
                                                        //echo $Idioma;
                                                        echo "<input class='panel-headinga2' style='border:none' type='text' name='Idioma' value=' ' readonly > <br>" ;?>
                                                    <?php } ?>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="panel-footer" style="margin-top: -61px;">
                                            <button class="btn btn-orange" style="font-family: 'Raleway', sans-serif; color : #FFF; border-radius: 10px; font-size: 15px;" type="submit" id="enviar<?php echo $i?>" name="chek" formaction="googlebooksInsert.php">Enviar Solicitud</button>
                                            <span id="result<?php echo $i ?>"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </section>
                </form>
<?php
            } ?>
        </div>
    </div>
<?php } 
    else 
    { ?>
        no more results
<?php } ?> 
              
<section class="brake-line" id="page-head" style="margin-top: 20px; margin-bottom: 50px;">
    <div class="inner">
        <div class="container">
            <div class="row">
                <div class="title" style="margin-top: -55px;">      
                    <img src="assets/img/img_openlibrary.png" class="img-responsive" style="margin-top: -20px; margin: 0 auto; ">
                </div>   
            </div>
        </div>
    </div>   
</section>

<section class="brake-line" id="page-head" style="margin-top: 20px; margin-bottom: 50px;">
    <div class="inner">
        <div class="container">
            <div class="row">
                <div class="title" style="margin-top: -55px;">      
                    <img src="assets/img/img_isbndb.png" class="img-responsive" style="margin-top: -20px; margin: 0 auto; ">
                </div>   
            </div>
        </div>
    </div>   
</section>
       
        
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/my_script.js" type="text/javascript"></script>

<?php 
include('footer.php');
?>
