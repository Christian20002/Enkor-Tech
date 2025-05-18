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
    <div class="contenido" style="margin-bottom: 30px;">
        <div id="parteInicio">
            <a href="Carrito.php">
            <div id="BtnIrACarrito">Ir a Carrito</div></a>
            <h1 style="padding-top: 15px;">ENKOR-TECH</h1>
            <h2>Bienvenido a ENKOR-TECH</h2>
        </div>
        <p style="float: left">
            ENKOR-TECH es una empresa que realiza servicios a máquinas de refrigeración. Nuestro enfoque es el servicio de mantenimiento preventivo y correctivo a equipos de ciclos térmicos con sus diferentes variantes, tales como: Humedad, Altitud, Choque térmico, entre otros
            <br><br>
            A continuación, puede revisar nuestro catálogo.
        </p>
    </div>
    
    <div id="ListaSeccion">
    <?php
    session_start();
        
    if (isset($_SESSION['id'])){
        $id = $_SESSION['id'];
    } else{
        $id = 0;
    }
    include('contenido.php');
    include('addCarrito.php');
    $con = mysqli_query($conexion,"SELECT * FROM objetos");
    
    while($consulta = mysqli_fetch_array($con)){
    ?>
    
    <div class="ZonaObjeto">
        <a onclick="showObjeto('<?php echo $consulta['ID'] ?>', '<?php echo $consulta['imagen'] ?>', '<?php echo $consulta['Nombre'] ?>', '<?php echo $consulta['Descripcion'] ?>', '<?php 
        $cantidadCliente = $consulta['cantidad'];
        $objetoActual = $consulta['ID'];
        $car = mysqli_query($conexion,"SELECT * FROM carrito WHERE ID_CLiente='$id' AND ID_Objeto='$objetoActual'");
        while($cliente = mysqli_fetch_array($car)){
            $cantidadCliente = $cantidadCliente - $cliente['Cantidad'];
        }
        echo $cantidadCliente ?>', '<?php echo $consulta['precio'] ?>')"><div style="background-image: url(images/<?php echo $consulta['imagen'] ?>)" class="ImagenObjeto" alt="..."></div></a>
        
        <h5 class="ObjetoTitulo"><?php echo $consulta['Nombre'] ?></h5>
        <p class="ObjetoDescripcion"><?php echo $consulta['Descripcion'] ?></p>
        <p class="ObjetoCantidad">Cantidad en Stock: <?php
        
        echo $cantidadCliente ?></p>
        <p class="ObjetoPrecio">$<?php echo $consulta['precio'] ?></p>
        
        <a class="BotonLlenarCarrito" onclick="showObjeto('<?php echo $consulta['ID'] ?>', '<?php echo $consulta['imagen'] ?>', '<?php echo $consulta['Nombre'] ?>', '<?php echo $consulta['Descripcion'] ?>', '<?php echo $cantidadCliente ?>', '<?php echo $consulta['precio'] ?>')"><img src="pageImagenes/CarroCompra.png"></a>
    </div>
    
        <?php
    }
    ?>
    <div id="fondoObjetoEspecifico" class="makeDisable makeDisable2" onclick="hideObjeto()">
        
    </div>    
    <div id="ObjetoEspecifico" class="makeDisable makeDisable2">
        <div id="ImagenEspecifico" style="background-image: url(images/Clavo-1.jpg)" class="ImagenObjeto" alt="..."></div>
        <div id="TopEspecifico">
            <h5 id="TituloEspecifico" class="ObjetoTitulo">Nombre</h5>
            <p id="DescripcionEspecifico" class="ObjetoDescripcion">Descripcion</p>
            <p id="CantidadEspecifico" class="ObjetoCantidad">Cantidad en Stock: 0</p>
            <p id="PrecioEspecifico" class="ObjetoPrecio">Precio: $1.00</p>
        </div>
        <div id="MedioEspecifico">
            <h5 id="TituloCarrito">Añadir a carrito:</h5>
        </div>
        <div id="BottomEspecifico">
            <form id="LlenarCarrito" method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
            <a class="ObjetoPlus" onclick="plusCantidad(-1)"><p>&#10094;</p></a>
            <input id="CantComprarEspecifico" class="CantidadComprar" type="text" inputmode="numeric" name="cantidadComprar" pattern="[0-9]" max="999" min="1" maxlength="3" contenteditable="false" value="1">
            <a class="ObjetoMinus" onclick="plusCantidad(1)"><p>&#10095;</p></a>
            <input id="cantidadStorage" style="display: none" name="cantidad" value="">
            <input id="IDStorage" style="display: none" name="ID_objeto" value="">
            <input id="userStorage" style="display: none" name="ID_cliente" value="<?php echo $id ?>">
            </form>
            <a id="BotonCarritoEspecifico" onclick="confirmMensaje()"><img src="pageImagenes/CarroCompraBlanco.png"></a>
            <h1 id="outOfStock" class="invisible">Sin Inventario</h1>
            
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
        
        const inpt = document.getElementById("CantComprarEspecifico");
        
        function showObjeto(id, imagen, Nombre, Descripcion, cantidad, precio){
            var x = document.getElementById("fondoObjetoEspecifico");
            var y = document.getElementById("ObjetoEspecifico");
            if (x.classList.contains('makeDisable')){
                x.classList.remove("makeDisable2");
                y.classList.remove("makeDisable2");
            }
            x.classList.remove("makeDisable");
            x.classList.add("makeAble");
            y.classList.remove("makeDisable");
            y.classList.add("makeAble");
            
            inpt.value = 1;
            
            document.getElementById("ImagenEspecifico").style = "background-image: url(images/" + imagen + ")";
                
            document.getElementById("TituloEspecifico").innerHTML = Nombre;
                
            document.getElementById("DescripcionEspecifico").innerHTML = Descripcion;
                
            document.getElementById("CantidadEspecifico").innerHTML = "Cantidad en Stock: " + cantidad;
            
            if(cantidad == 0){
                document.getElementById("BotonCarritoEspecifico").classList.add("invisible");
                document.getElementById("outOfStock").classList.remove("invisible");
            } else if (document.getElementById("BotonCarritoEspecifico").classList.contains("invisible")){
               document.getElementById("BotonCarritoEspecifico").classList.remove("invisible");
                document.getElementById("outOfStock").classList.add("invisible");
            }
                
            document.getElementById("PrecioEspecifico").innerHTML = "Precio por pieza: $" + precio;
            
            document.getElementById("cantidadStorage").value = cantidad;
            document.getElementById("IDStorage").value = id;
        }
        
        function hideObjeto(){
            var x = document.getElementById("fondoObjetoEspecifico");
            var y = document.getElementById("ObjetoEspecifico");
            x.classList.add("makeDisable");
            x.classList.remove("makeAble");
            y.classList.add("makeDisable");
            y.classList.remove("makeAble");
        }
        
        function confirmMensaje(){
            document.getElementById("cantidadStorage").value = document.getElementById("CantComprarEspecifico").value;
            alert("Objeto ha sido agregado al carrito");
            document.getElementById("LlenarCarrito").submit(); 
            hideObjeto();
        }
        
        function plusCantidad(n){
            const limite = document.getElementById("cantidadStorage").value;
            inpt.value = parseInt(inpt.value) + parseInt(n);
            if (inpt.value != "NaN"){
            if (inpt.value <= 0){
                inpt.value = 1;
            } else if (inpt.value > parseInt(limite)){
                inpt.value = parseInt(limite);
            }
            } else{
                inpt.value = 1;
            }
        }
        
        inpt.addEventListener("keydown", (e)=>{
            const expre = /[0-9+]/;
            const teclasPermitidas = ["Backspace", "ArrowLeft", "ArrowRight", "Delete"];
            if (!teclasPermitidas.includes(e.key) && !expre.test(e.key)) {e.preventDefault();}
        })
        
        inpt.addEventListener("focusout", (e)=>{
            const limite = document.getElementById("cantidadStorage").value;
            if (inpt.value == "0" || inpt.value == ""){
                inpt.value = 1;
            } else if (inpt.value > parseInt(limite)){
                inpt.value = parseInt(limite);
            }
        })
    </script>
</body>

</html>