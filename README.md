# Enkor-Tech

Este documento es para una página web de una empresa llamada Enkor-Tech. Se le agregó una sección de tienda Online que utiliza bases de datos, la cual puede accederse desde cualquier página en el footer.

El funcionamiento de la base de datos no funciona con SQL, debido a que utiliza SQL, el cual no es utilizable en GitHub (pero si funcionaría en páginas web además de esta). En el caso de descargar todo el archivo y crear la base de datos con un servidor local, este funcionaría correctamente. Lo que se hizo originalmente fue crear un servidor local utilizando la aplicación XAMPP, y se creó una base de datos llamada "imágenes" con 3 tablas, llamadas "objetos", "cuentas" y "carrito".

La tabla "objetos" cuenta con los datos "ID", "Nombre", "Descripcion", "imagen", "cantidad" y "precio"
La tabla "cuentas" cuenta con los datos "ID", "usuario", "contraseña" y "correo"
La tabla "carrito" cuenta con los datos "ID", "ID_Cliente", "ID_Objeto" y "Cantidad"

En el caso de que se creen esta base de datos, con estas tablas, con un servidor local y con los archivos de este proyecto en el contenido de XAMPP (en su carpeta de htdocs), el proyecto funciona. Debido a que el acceso de la página web real no está en mis manos para poder generar realmente los cambios (y no tengo la capacidad de comprar otro servidor que cuente con base de datos), esta es la mejor opción de funcionamiento.
