# Título del Proyecto

Página para administrar las reservas de un restaurante.

## Comenzando 🚀

_Estas instrucciones te permitirán obtener una copia del proyecto en funcionamiento en tu máquina local para propósitos de desarrollo y pruebas._

Mira **Deployment** (Despliegue) para conocer como desplegar el proyecto.


### Pre-requisitos 📋

_Que cosas necesitas para instalar el software y como instalarlas_

```
XAMPP - Será necesario para alojar tanto la DDBB como iniciar el servidor Apache
Descarga: https://www.apachefriends.org/es/index.html
GIT - Necesario para poder ejecutar comandos de GIT
Descarga: https://git-scm.com

```

### Instalación 🔧

_Una serie de ejemplos paso a paso que te dice lo que debes ejecutar para tener un entorno de desarrollo ejecutandose_

_Clonar el repositorio de GitHub a tu ordenador_

``` 
git clone https://github.com/ivnaguinaga/PR1.git
```

_Creación fichero config.php_

```
En la carpeta services crea un fichero llamado config.php e introduce los datos de la DB:

<?php

define("SERVIDOR","localhost"); 
define("USUARIO","root"); 
define("PASSWORD",""); 
define("BD","bd_restaurant");
```

_Importar la base de datos_
```
Importa la base de datos del repositorio a tu PhpMyAdmin, recuerda tener activados los servicios Apache y MySQL de XAMPP
```

## Despliegue 📦

Puedes probarla en [Infinity Web Host](http://pr1ivan.infinityfreeapp.com/)

Utiliza el usuario de prueba para loggear "David" y la contraseña "qweQWE123"

## Construido con 🛠️

_Menciona las herramientas que utilizaste para crear tu proyecto_

* [Visual Studio Code](https://code.visualstudio.com/) - El editor de código fuente
* [XAMPP](https://www.apachefriends.org/es/index.html) - Servidor web Apache y gestor de base de datos.

## Contribuyendo 🖇️

Por favor lee el [CONTRIBUTING.md](https://gist.github.com/ivnaguinaga) para detalles de nuestro código de conducta, y el proceso para enviarnos pull requests.

## Wiki 📖

Puedes encontrar mucho más de cómo utilizar este proyecto en nuestra [Wiki](https://github.com/ivnaguinaga/PR1/wiki)

## Versionado 📌

0.1.95

## Autores ✒️

_Menciona a todos aquellos que ayudaron a levantar el proyecto desde sus inicios_

* **Iván Aguinaga** - *Trabajo Inicial* - [ivnaguinaga](https://github.com/ivnaguinaga)
* **Arnau Balart** - *Trabajo Inicial* - [arnaubalart](https://github.com/arnaubalart)
* **David Ortega** - *Trabajo Inicial* - [DaveOC45](https://github.com/DaveOC45)

También puedes mirar la lista de todos los [contribuyentes](https://github.com/dannylarrea/CONDE-DOCKU21/graphs/contributors) quíenes han participado en este proyecto. 

## Licencia 📄

Este proyecto está bajo la Licencia (Tu Licencia) - mira el archivo [LICENSE.md](LICENSE.md) para detalles

## Expresiones de Gratitud 🎁

* Comenta a otros sobre este proyecto 📢
* Invita una cerveza 🍺 o un café ☕ a alguien del equipo. 
* Da las gracias públicamente 🤓.
* etc.
