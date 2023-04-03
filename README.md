Laravel docker

The project must be mounted using docker:

- Start docker daemon
  - Abre la terminal
  - Inicia el servicio de Docker con el siguiente comando:  
    `sudo service docker start`  
    Si el servicio ya está en ejecución, se mostrará un mensaje indicando que el servicio ya está activo.
  -  Verifica el estado del servicio Docker para asegurarte de que esté en ejecución con el siguiente comando:  
     `sudo service docker status`  
     Si el servicio está en ejecución, se mostrará un mensaje que indica "active (running)".
  - Para asegurarte de que Docker se inicie automáticamente en el arranque del sistema, ejecuta el siguiente comando:  
    `sudo systemctl enable docker`  
    ESTE ÚLTIMO PASO NO ES NECESARIO CON LO POCO QUE USO DOCKER.  
    Este comando configura el servicio de Docker para que se inicie automáticament en el arranque del sistema.

  Una vez que hayas completado estos pasos, Docker daemon estará en ejecución y podrás utilizar la interfaz de línea  
  de comandos de Docker para administrar contenedores y crear imágenes.

- Run your docker machine: docker-compose up -d
- Go into docker machine: docker exec -it laravel-php /bin/zsh
- From inside the machine:
  - Run: composer install
  - Copy the .env.example to .env
  - Run: php artisan key:generate
- Web running on http://localhost:8088
- Api status check running on GET request: http://localhost:8088/api/status
- Swagger running on http://localhost:8082/
- Postman base collection file can be found on src/postman
- phpMyAdmin running on http://localhost:9191
  - user: root
  - password: secret
- As database we use MySQL:
  - database name: laravel
  - database user: root
  - database password: secret



- To stop de container:
  docker-compose stop

:)