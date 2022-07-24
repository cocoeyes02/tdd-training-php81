PHP = docker-compose run --rm php

.PHONY: up down composer test

up:
	docker-compose up -d --force-recreate --build

down:
	docker-compose down

composer:
	$(PHP) composer $(CMD)

test:
	$(PHP) vendor/phpunit/phpunit/phpunit tests/