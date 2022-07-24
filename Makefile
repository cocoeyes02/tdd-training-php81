PHP = docker-compose run --rm php

.PHONY: up down

up:
	docker-compose up -d --force-recreate --build

down:
	docker-compose down