PHP = docker-compose run --rm money

.PHONY: composer test

composer:
	$(PHP) composer $(CMD)

test:
	$(PHP) vendor/phpunit/phpunit/phpunit tests/