<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ENKOR-TECH</title>
    <meta name="ENKOR" content="Página oficial de empresa de refrigeración ENKOR-TECH">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="extra.css">
    <link rel="icon" href="../imagenes/iconos/logo%20icono.png">
</head>

<body>
    <nav>
        <a href="../index.html" style="float: left; width: 200px;"><img id="logoNav" src="../imagenes/logos/ENKOR-TECH-LOGOTIPODIGITAL-01.png"></a>
        <a href="../index.html" style="float: left; width: 200px;"><img id="logoNavEscondido" src="../imagenes/logos/ENKOR-TECH-LOGOTIPODIGITAL-02TR.png"></a>
        <div id="divNav">
            <div class="elNav invisibleCelular"><a href="../QuienesSomos.html">Quiénes somos</a></div>
            <div class="elNav invisibleCelular"><a href="../NuestrosClientes.html">Nuestros clientes</a></div>
            <div class="elNav invisibleCelular"><a href="../NuestrosServicios.html">Nuestros servicios</a></div>
            <div class="elNav invisibleCelular"><a href="../Contacto.html">Contacto</a></div>
            <a onclick="toggleMenu()" id="elNavMenu"><img src="../imagenes/iconos/BotonMenu.png"></a>
        </div>
    </nav>
    <a href="PaginaExtra.php">
            <div id="BtnIrATienda">Ir a Tienda</div></a>
    <div class="contenido" style="margin-bottom: 30px;">
        
        <h1 style="padding-top: 15px; display:flex; justify-content:center;">Mi Carrito</h1>
    </div>
    <div style="display:flex; justify-content:center;">
    <div class="ZonaObjeto" id="ZonaCarrito">
    <?php
    session_start();
    include('contenido.php');
    $IDCliente = $_SESSION["id"];
    $car = mysqli_query($conexion,"SELECT * FROM carrito WHERE ID_Cliente='$IDCliente'");
    
    while($cliente = mysqli_fetch_array($car)){
        $objeto = $cliente['ID_Objeto'];
        $con = mysqli_query($conexion,"SELECT * FROM objetos WHERE ID='$objeto'");
        while($consulta = mysqli_fetch_array($con)){
    ?>
        <div class="ObjetoCarritoSolo">
            
            <div style="background-image: url(images/<?php echo $consulta['imagen'] ?>)" class="ImagenCarrito" alt="..."></div>
            <div style="float: left">
                <h5 class="TituloCarrito"><?php echo $consulta['Nombre'] ?></h5>
                <p class="DescripcionCarrito"><?php echo $consulta['Descripcion'] ?></p>
                <p class="DescripcionCarrito">Cantidad pedida: <?php echo $cliente['Cantidad'] ?></p>
                <p class="PrecioCarrito">Precio: $<?php 
                $precio = floatval($consulta['precio']);
                $cantidad = floatval($cliente['Cantidad']);
                $precio = $precio * $cantidad;
            echo $precio ?></p>
            </div>
            <div id="BotonesCarrito">
                <div class="btnCarrito" id="BorrarCarrito" onclick="Borrar(<?php 
                $objetoID = $cliente['ID'];
                echo $objetoID ?>)"><img src="pageImagenes/Eliminar.png"></div>
            </div>
            
        </div>
    <?php
    }}
    ?>
        <form id="OpcionBorrar" method="post" action="borrarCarrito.php">
                <input id="IDObjeto" name="IDObjeto" value="" style="display: none"> 
        </form>
        <div id="ContenedorBtnComprar">
        <div id="ComprarFinal" onclick="Comprar()">Comprar</div>
        </div>
    </div>
    </div>
    <div id="footer">
        <div class="contenido">
            <div>
                <ul class="seccionFooter" style="float: left;">
                    <li style="list-style-type: none;"><b>Contáctanos</b></li>
                    <li>(656) 617-1474</li>
                    <li class=" letraCorreo2">enkor.multiservicios@gmail.com</li>
                    <li>Ciudad Juárez, Chihuahua</li>
                </ul>

                <a href="../Contacto.html" style="text-decoration: none; color: black;"><button id="botonMensaje">Envíanos un mensaje</button></a>

                <ul class="seccionFooter">
                    <li style="list-style-type: none;"><b>Sobre Nosotros</b></li>
                    <li><a href="../QuienesSomos.html">¿Quiénes somos?</a></li>
                    <li><a href="../NuestrosClientes.html">Nuestros clientes</a></li>
                    <li><a href="../NuestrosServicios.html">Nuestros servicios</a></li>
                    <li><a href="../AvisoPrivacidad.html">Aviso de privacidad</a></li>
                    <li><a href="PaginaExtra/Cuenta.php">Volver a inicio de sesión</a></li>
                </ul>
            </div>
            <p style="text-align: center; position: relative; bottom: -20px; width: 100%; float: left"> 2025 © TODOS LOS DERECHOS RESERVADOS POR ENKOR-TECH</p>
            
            <p style="text-align: center; position: relative; bottom: -20px; width: 100%; float: left; font-size: 8px;">Imágenes del sitio web extraidas de www.vecteezy.com, www.pixabay.com, www.freepik.es y www.flaticon.es</p>
        </div>
    </div>
    
    <script>
        var mapaTextoActual = 0;
        function toggleMenu(){
            var x = document.querySelectorAll(".elNav");
            
            if (x[0].classList.contains('invisibleCelular')) {
                for (var i = 0; i < x.length; i++) {
                    x[i].classList.remove('invisibleCelular');
                }
            } else {
                for (var i = 0; i < x.length; i++) {
                    x[i].classList.add('invisibleCelular');
                }
            }
        }
        
        function Comprar(){
            alert("Objetos del carrito han sido comprados");
        }
        
        function Borrar(id){
            alert("Objeto ha sido borrado del carrito");
            document.getElementById("IDObjeto").value = id;
            document.getElementById("OpcionBorrar").submit(); 
        }
        
    </script>
</body>

</html>