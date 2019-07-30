container_php = php-fpm
container_mysql = mysql
container_nginx = nginx

start: #start docker containers @docker-compose up -d
	@docker-compose up -d

stop: #stop docker containers
	@docker-compose down

status: #show docker's containers
	@sudo docker ps

connect_php: #Connect to APP container
	@docker-compose exec $(container_php) bash

connect_mysql: #Connect to DB container
	@docker-compose exec $(container_mysql) bash

connect_nginx: #Connect to container_server container
	@docker-compose exec $(container_nginx) /bin/sh
