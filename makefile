DC = docker compose
D = docker

.PHONY: up down build dev

up:
	$(DC) up -d

down:
	$(DC) down

build:
	$(DC) up -d --build

composer-dumpautoload:
	$(D) exec php_app composer dumpautoload

composer-install:
	$(D) exec php_app composer install

# Dev: remove containers, refaz o build e instala dependências
dev: down build composer-install