<?php
//inicia las variables en modo sección 
session_start();
//se asigna las variables 
$_SESSION['ID_ISBN']   = $_POST['ID_ISBN'];
$_SESSION['nameBook']  = $_POST['nameBook'];
$_SESSION['authors']   = $_POST['authors'];
$_SESSION['publisher'] = $_POST['publisher'];
$key                   = "MJHSYKIP";

if ($_SESSION['nameBook'] <> "") {
    // strtolower devuelve una cadena de minúsculas
    $str          = $_SESSION['nameBook']; //strtolower($_SESSION['nameBook']);
    //se remplaza los espacios en blanco por el carácter (_)
    $cadenaTitulo = preg_replace('/ /', '_', $str);
    //Se obtiene el XML de la URL concatenando la variable correspondiente para la búsqueda y se le asigna una variable local
    $titulo       = file_get_contents("http://isbndb.com/api/v2/xml/" . $key . "/book/" . $cadenaTitulo);
    //se crea un Objecto para poder ser manipulado con una función y como parámetro la variable local
    $isbndb       = new SimpleXMLElement($titulo);
    //se coloca un titulo con color y y tamaño
    
    echo "<font color=#0000FF size=\"4\">mostrado por TITULO</font>" . "<br/>";
    echo "Titulo: " . $isbndb->data->title;
    echo "<br/>";
    echo "Autores: " . $isbndb->data->{'author_data'}->name;
    echo "<br/>";
    $dada = $isbndb->data->{'publisher_name'};
    echo "Editorial: " . $dada;
    echo "<br/>";
    echo "ISBN 10 : " . $isbndb->data->isbn10;
    echo "<br/>";
    echo " ISBN 13 : " . $isbndb->data->isbn13;
    echo "<br/><br/>";
}

if ($_SESSION['authors'] <> "") {
    $str         = strtolower($_SESSION['authors']);
    $cadenaAutor = preg_replace('/ /', '_', $str);
    $autor       = file_get_contents("http://isbndb.com/api/v2/xml/" . $key . "/author/" . $cadenaAutor);
    
    $isbndb = new SimpleXMLElement($autor);
    
    echo "<font color=#0000FF size=\"4\">mostrado por AUTOR</font>" . "<br/>";
    echo "Titulo(s): ";
    foreach ($isbndb->data->{'book_ids'} as $book) {
        $cad = preg_replace('/_/', ' ', $book);
        echo $cad . "<br/>";
    }
    echo "Autor: " . $isbndb->data->name;
    echo "<br/>";
    echo "Categorías: ";
    foreach ($isbndb->data->{'category_ids'} as $Categorias) {
        $cad = preg_replace('/_/', ' ', $Categorias);
        echo $cad . "<br/>";
    }
    echo "<br/>";
    
}

if ($_SESSION['ID_ISBN'] <> "") {
    $cadenaIsbn = preg_replace('/ /', '_', $_SESSION['ID_ISBN']);
    //Se obtiene el XML de la URL concatenando la variable correspondiente para la búsqueda y se le asigna una variable local
    $isbn       = file_get_contents("http://isbndb.com/api/v2/xml/" . $key . "/book/" . $cadenaIsbn);
    //se crea un Objecto para poder ser manipulado con una función y como parámetro la variable local
    $isbndb     = new SimpleXMLElement($isbn);
    //se coloca un titulo con color y y tamaño
    echo "<font color=#0000FF size=\"4\">mostrado por ISBN</font>" . "<br/>";
    echo "Titulo: " . $isbndb->data->title;
    echo "<br/>";
    echo "Autores: " . $isbndb->data->{'author_data'}->name;
    echo "<br/>";
    $dada = $isbndb->data->{'publisher_name'};
    echo "Editorial: " . $dada;
    echo "<br/>";
    echo "ISBN 10 : " . $isbndb->data->isbn10;
    echo "<br/>";
    echo " ISBN 13 : " . $isbndb->data->isbn13;
    echo "<br/><br/>";
}

if ($_SESSION['publisher'] <> "") {
    $str        = strtolower($_SESSION['publisher']);
    $cadenaEdit = preg_replace('/ /', '_', $str);
    $editorial  = file_get_contents("http://isbndb.com/api/v2/xml/" . $key . "/publisher/" . $cadenaEdit);
    
    $isbndb = new SimpleXMLElement($editorial);
    
    echo "<font color=#0000FF size=\"4\">mostrado por EDITORIAL</font>" . "<br/>";
    echo "Autor: " . $isbndb->data->name;
    echo "<br/>";
    echo "Categorias: ";
    foreach ($isbndb->data->{'category_ids'} as $Categorias) {
        $cad = preg_replace('/_/', ' ', $Categorias);
        echo $cad . "<br/>";
    }
    echo "Titulo(s): ";
    foreach ($isbndb->data->{'book_ids'} as $book) {
        $cad = preg_replace('/_/', ' ', $book);
        echo $cad . "<br/>";
    }
}
?>
