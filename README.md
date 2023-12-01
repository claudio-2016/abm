# ABM - DEVOPS

## Simple ABM en Laravel 8 con PHP v.8 para DEVOPS (CI/DI)

Se incluyen el .env y vendor para evitar errores y rapido despliegue ya que es un 
modelo para pruebas. El mismo docker-compose.yml incluye imagen de PHPmyadmin 
para el test o verificación de la DB (MySql).

Recuerde que esto es solo un modelo para pruebas y los comando no estan 
automatizados por otros medio (Jenkins, Puppet, etc.) ya que la idea es 
familiarizar en el uso de las herramientas primarias antes de la automatizacion
del deploy.

El ABM es simple, su funcion es la de agregar, eliminar y/o modificar diferente
Notas. Una vez levantado los servicios y ejecutado las migraciones debe ingresar
a 'http://localhost:8080' o http://ip_servidor:8080' si no lo esta ejecutando
en su maquina local.


## Modo de uso

Una vez clonado el repositorio simplemente debe ejecutar los siguientes comandos.
Recuerde anteponer el prefijo 'sudo' para la ejecución de 'docker compose' si no
tiene agregado su USUARIO al grupo de Docker.

La imagen que se crea para ofrecer el servicio de Laravel genera un usuario
de nombre 'docker' y en caso de necesitar realizar modificaciones o setups
sobre apache debe emplear el prefijo 'sudo' y al solicitar el password del user
el mismo es 'docker' (sin comillas).

----------------------------------------------------------------------------------------

Para iniciar el proyecto y dentro del mismo:

docker compose up -d

La primera vez este proceso puede durar unos minutos ya que hace el build de las
imagenes necesarias, luego es rapido.

----------------------------------------------------------------------------------------

Para verificar el estado (comando que ejecuto el contenedor al iniciar, mapeo de 
puertos, tiempo de crearcion y activo, nombres y otros) puede usar:

docker compose ps

----------------------------------------------------------------------------------------

Para verificar los logs de los contenedores en tiempo real:

docker compose logs -f

para salir:

Ctrl+c

----------------------------------------------------------------------------------------

Ingresar al contenedor que contiene Laravel y apache:

docker exec -it abm-app /bin/bash

Esto lo que ofrece es una sesion iterativa empleando bash para poder ejecutar
de ser necesario comandos tanto a nivel del OS como con composer entre otros.

Para salir:

exit

----------------------------------------------------------------------------------------

Ejecutar migraciones:

php artisan migrate


----------------------------------------------------------------------------------------

Verificar y probar ABM:

http://localhost:8080

http://ip_servidor:8080

----------------------------------------------------------------------------------------

Detenar el servicio:

docker compose down

----------------------------------------------------------------------------------------






