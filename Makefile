.PHONY: up down php db composer-install

MAKEPATH := $(abspath $(lastword $(MAKEFILE_LIST)))
PWD := $(dir $(MAKEPATH))

up:
	docker-compose up -d --build

down:
	docker-compose down

web:
	docker exec -it apo-web bash

db:
	docker exec -it apo-db bash

test:
	docker exec -it apo-db phpunit

composer-install:
	docker exec -it apo-web composer install

phpstan:
	docker exec -it apo-web vendor/bin/phpstan analyse

phpunit:
	docker exec -it apo-web vendor/bin/phpunit

codefixer:
	docker exec -it apo-web vendor/bin/php-cs-fixer fix src
