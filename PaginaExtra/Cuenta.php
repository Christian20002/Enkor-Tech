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
    <?php
    include('registro.php');
    ?>
    <div id="fondoContacto">
    <h1 style="width: 100%; text-align: center">Entrar a cuenta</h1>
    <div class="contenido" id="zonaContacto">
        <form id="contactoForm" method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
            <div id="cuentaFormText">
                <div>
                    <section>
                        <label for="firstname">Usuario: </label>
                        <input id="inptUsuario" type="text" name="usuario" class="formIntroducir"  required oninvalid="this.setCustomValidity('Este no es un texto aceptable')" oninput="this.setCustomValidity('')" title="Favor de introducir un texto" maxlength="25" value="<?= $usuario ?>">
                    </section>
                    <section>
                        <label for="lastname">Contraseña: </label>
                        <input id="inptContra" type="text" name="contraseña" class="formIntroducir"  required oninvalid="this.setCustomValidity('Este no es un texto aceptable')" oninput="this.setCustomValidity('')" title="Favor de introducir un texto" maxlength="25" value="<?= $contraseña ?>">
                    </section>
                    
                    <p id="mensajeError" style="color: red"><?= $correcto ?></p>
                    
                    <section>
                        <div class="botonesCuentaDiv"><button id="IniciarSesionBtn" class="botonesCuenta" name="iniciarSesion">Iniciar Sesion</button></div>
                        <div class="botonesCuentaDiv"><button id="CrearCuentaBtn" class="botonesCuenta" name="crearCuenta">Crear Cuenta</button></div>
                    </section>
                </div>
            </div>
        </form>
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
        
        const form = document.getElementById("contactoForm");
        const usuario = document.getElementById("inptUsuario");
        const contra = document.getElementById("inptContra");
        
        /*form.addEventListener('submit', function(e){
            e.preventDefault();
            
            const usuarioValue = usuario.value;
            const contraValue = contra.value;
            
            localStorage.setItem('elUsuario', usuarioValue);
            localStorage.setItem('elContra', contraValue);
        })
        */
        
        function errorIniciar(){
            var y1 = document.getElementById("mensajeError");
	        y1.innerHTML = "El usuario no existe";
        }
        
        function errorCrear(){
            var y1 = document.getElementById("mensajeError");
	        y1.innerHTML = "Esta cuenta ya existe";
        }
        
        function errorContra(){
            var y1 = document.getElementById("mensajeError");
	        y1.innerHTML = "La contraseña es incorrecta";
        }
    </script>
</body>

</html>