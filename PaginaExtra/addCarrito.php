<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $connection = mysqli_connect('localhost', 'root', '','imagenes');

    $cliente = $_POST["ID_cliente"];
    $objeto = $_POST["ID_objeto"];
    $cantidad = $_POST["cantidad"];

    if(!$connection){
        echo "No se ha podido conectar con el servidor", mysql_error();
    }
    else{
        
        $instruccion_SQL = "INSERT INTO carrito (ID_Cliente, ID_Objeto, Cantidad) VALUES ('$cliente', '$objeto', '$cantidad')";

        $resultado = mysqli_query($connection, $instruccion_SQL);


        //header("Location: PaginaExtra.php");

        
    }
    //unset($_POST['submit']);
}


?>