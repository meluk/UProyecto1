# Primera práctica de PHP

La práctica consiste en hacer una aplicación de registro de usuarios de principio a fin.

El esqueleto de la aplicación ha sido creado para usted, el código ha sido documentado con detalladas instrucciones, 
sólo falta que funcione.

La aplicación, para el usuario final, consta de cuatro páginas:

- **Register**: donde el usuario podrá crear una cuenta
- **Login**: donde el usuario usará la cuenta que creó e iniciar sesión
- **Home**: contenido restringido únicamente a usuarios que tienen una sesión activa en el sistema
- **Logout**: el usuario podrá descartar su sesión en el sistema usando esta página

La estructura de archivos es la siguiente:

- **back-end**: contiene la aplicación de PHP, junto con las rutas que serán usadas por AngularJS. Inicie revisando  
el archivo `back-end/index.php`
- **front-end**: contiene la aplicación de AngularJS que se conecta a PHP. Ya están creadas las rutas, los  
controladores y servicios, con comentarios sobre que se debe realizar en cada uno. Inicie revisando el siguiente  
archivo: `front-end/js/app.js`

## Pasos para correr el proyecto
1. Clone el proyecto de `git@github.com:leopic/pr1-practica-php-01.git`
2. Instale `composer` https://getcomposer.org/doc/00-intro.md
3. Acceda a la raíz del proyecto mediante la línea de comandos y ejecute: `$: composer.phar install`
4. Acceda a su `localhost`, incluyendo el puerto que usa comúnmente y acceda a `http://localhost/pr1-practica-php-01/`

## Base de datos
Actualmente el proyecto carece de una conexión a una base de datos, usted debe:

1. Crear un usuario de base de datos
2. Crear una base de datos para ese usuario
3. Asignarle los privilegios necesarios a ese usuario
4. Verificar que puede conectarse a la base de datos usando dicho usuario, esto lo puede realizar con alguna de las  
herramientas mencionadas en clase (`MySQLWorkbench` ó `phpmyadmin`)
5. Crear una tabla de `usuarios` que contenga por lo menos los siguientes campos, todos obligatorios
	- id: número entero auto incrementable
 	- email: string
 	- password: string
 	- full_name: string
6. Una vez creada la tabla, diríjase al archivo `StorageService.php` y siga las instrucciones

En general, puede agregar archivos o funciones nuevas, sin embargo es poco probable que tenga que remover alguno de los 
archivos que se le brinda. Está en completa libertad de hacer cambios en la aplicación, desde cambiar el diseño, hasta
 el contenido de la página de contenido restringido. Sin embargo la aplicación debe:

- Usar MySQL para la persistencia
- Mantener la funcionalidad existente
- Mantener la separación de capas provista, osea debe mantener el concepto de Controladores, Enrutamiento, Servicios 
 y Persistencia, tanto en el `Back-End`, como en el `Front-End`

Una vez listo el proyecto, remueva los excesivos comentarios através del código a medida de que vaya completando los 
 pasos.

La práctica programada es evaluada y en parejas, la fecha de entrega es miércoles 23 de marzo (miércoles santo) a las 
11:59pm. No habrá extensiones para la entrega.

Si tiene consultas efectuelas por correo a `lpicadoo@ucenfotec.ac.cr`, le responderé a la brevedad posible.
