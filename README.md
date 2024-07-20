# Wordpress Docker Development

Crea plugins y temas con este entorno de desarrollo en docker.

Monta las carpetas `plugins` y `themes` el wp-content para que puedas comenzar a desarrollar tus plugins y temas.

## TLTR;

* Levanta un entorno de desarollo mediante `docker-compose`. 
* Crea volumenes para las carpetas `plugins` y `themes`.
* Ajusta los permisos de archivos.
* Inicializa el Wordpress y configuralo.

## How to

1. Levanta los contenedores

```bash
docker compose up -d
```
2. Cambia el permiso de escritura para las carpetas `plugins` y  `themes`, así podrás añadir tus archivos de desarrollo.

```bash
sudo chmod o+w plugins
sudo chmod o+w themes
```
3. Accede a http://localhost:8080 y configura Wordpress. Es un buen momento para actualizar, instalar los temas y plugins que requira tu desarrollo.

4. Crea los archivos necesarios para tu desarrollo.



## Configuración Wordpress 

Para simplificar el acceso te recomiendo seleccionar la siguientes credenciales.

**Nota:** Selecciona la opción `Confirma el uso de una clave débil` para que puedas utilizar una contraseña fácil de recordar.

```
user: root
pass: root 
```


## Docker compose 

Algunos comandos utilizar para desarrollo.

```bash
docker compose up -d # Levanta los contenedores
docker compose stop # Detiene los contenedores
docker compose rm # Elimina los contenedores

docker compose logs -f --tail 5 wordpress # Logs
docker compose exec -it wordpress /bin/bash # Accede al shell
```

## .gitignore

Evita seguir archivos innecesarios incluyendo en el gitignore la carpeta `plugins` y `themes`. 

Para añadir las carpetas utiliza la condición de no ignorar con `!`:

```
plugins/*
!plugins/my-plugin 

themes/*
!themes/my-theme
```

Adicionalmente, puedes seguir cambios utilizando la opción `-f` 

```bash
git add -f {directorio}  
```


## Acceder a php desde Visual Studio Code
Visual Studio Code puede validar el PHP de forma automática pero requiere tener una máquina PHP activa. 

Se puede utlizar el PHP del contendor wordpress. Por este motivo se crea el archivo `php`

```bash
path=$(printf '%s\n' "${PWD##*/}")
command="docker-compose exec wordpress php "$@""
echo "Running php on docker wordpress"
$command
```

Ajusta el permiso de ejecución

```bash
chmod +x ./php
```

Luego, en las preferencias del visual studio incluye la opción `php.validate.executablePath`.

```json
{
  "editor.tabSize": 2,
  "security.allowedUNCHosts": [
    "wsl.localhost"
  ],
  "php.validate.executablePath": "/home/angel/git/savittar/savittar-wordpress/php"
}
```

