# Examen-Ambientes



-----------AMBIENTES---------------
//instalamos MySql
sudo apt-get install mysql-client

//Instalamos apache
sudo apt-get install apache2

//instalamos mysql server
sudo apt-get install mysql-server

//instalamos php Mysql
sudo apt-get install php5-mysql

// instalamos php my admin
sudo apt-get install phpmyadmin

////////////////----------------------///////////////////////

//crear un nuevo proyecto
composer create-project symfony/framework-standard-edition NOMBRE_PROYECTO

//crear un controlador
php bin/console generate:controller
nombre: AppBundle:Nombre(en sigular)
anotacion
.twig
ruta /ruta/ruta
action:nombreAction (siempre termina en action)

//creamos la base de datos
php bin/console doctrine:database:create

//creamos una entidad
php bin/console generate:entity
nombre:AppBundle:Nombre

//creamos el schema
php bin/console doctrine:schema:create

//actualizamos el schema
php bin/console doctrine:schema:update

//creamos guetters y setters
php bin/console doctrine:generate:entities AppBundle

//limpiamos la cache
php bin/console cache:clear

// creamos un formulario
php bin/console generate:doctrine:form AppBundle:Carrera

//crud
php bin/console generate:doctrine:crud 

//ver rutas
console debug:router

// importnate para cambiar los roles
console fos:user:promote nombre_usuario  ROLE_ADMIN


//FOSUserBundle
http://symfony.com/doc/master/bundles/FOSUserBundle/index.html

//Override form FOSUser
http://symfony.com/doc/master/bundles/FOSUserBundle/overriding_forms.html

















