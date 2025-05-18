<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $connection = mysqli_connect('localhost', 'root', '','imagenes');

    $objetoBorrar = $_POST["IDObjeto"];

    if(!$connection){
        echo "No se ha podido conectar con el servidor", mysql_error();
    }
    else{
        
        $instruccion_SQL = "DELETE FROM carrito WHERE ID='$objetoBorrar'";

        if(mysqli_query($connection, $instruccion_SQL)){
        header("Location: Carrito.php");

        }
    }
    //unset($_POST['submit']);
}


?>