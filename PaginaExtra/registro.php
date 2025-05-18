<?php

$usuario = "";
$contraseña = "";
$correcto = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $connection = mysqli_connect('localhost', 'root', '','imagenes');

    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];

    if(!$connection){
        echo "No se ha podido conectar con el servidor", mysql_error();
    }
    else{
        $con = mysqli_query($connection,"SELECT * FROM cuentas");
        $id = 0;
        while($consulta = mysqli_fetch_array($con)){
            if($consulta['usuario'] == $usuario){
                $id = $consulta['ID'];
            }
        }
        ///////////////////////////////////////////////////////
        if (isset($_POST['iniciarSesion'])) {
            if ($id != 0){
                $con = mysqli_query($connection,"SELECT * FROM cuentas WHERE ID='$id'");
                while($consulta = mysqli_fetch_array($con)){
                    if($consulta['contraseña'] == $contraseña){
                        session_start();
                        $_SESSION['id'] = $id;
                        header("Location: PaginaExtra.php");
                    } else{
                        $correcto = "La contraseña es incorrecta";
                        return $consulta;
                    }
                }

            } else{
                $correcto = "Este perfil no existe";
                return $consulta;
            }

            /////////////////////////////////////////////////////////
        } else if (isset($_POST['crearCuenta'])) {
            if ($id == 0){
                $instruccion_SQL = "INSERT INTO cuentas (usuario, contraseña) VALUES ('$usuario', '$contraseña')";

                $resultado = mysqli_query($connection, $instruccion_SQL);
                $id = $connection->insert_id;
                session_start();
                $_SESSION['id'] = $id;
                header("Location: PaginaExtra.php");
            } else{
                $correcto = "Este perfil ya existe";
                return $consulta;
            }

        }


        //header("Location: PaginaExtra.php");

        
    }
    //unset($_POST['submit']);
}


?>