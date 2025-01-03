COMPOSE_FILE := docker-compose.yml

.PHONY: all
all: build up

.PHONY: build
build:
	@docker-compose -f $(COMPOSE_FILE) build

.PHONY: up
up:
	@docker-compose -f $(COMPOSE_FILE) up -d

.PHONY: stop
stop:
	@docker-compose -f $(COMPOSE_FILE) stop

.PHONY: down
down:
	@docker-compose -f $(COMPOSE_FILE) down

.PHONY: restart
restart: stop up

.PHONY: logs
logs:
	@docker-compose -f $(COMPOSE_FILE) logs -f

.PHONY: clean
clean: down
	@docker-compose -f $(COMPOSE_FILE) down -v

.PHONY: ps
ps:
	@docker-compose -f $(COMPOSE_FILE) ps

.PHONY: exec-php
exec-php:
	@docker exec -it api_php-fpm /bin/bash

.PHONY: exec-mysql
exec-mysql:
	@docker exec -it api_mysql /bin/bash

.PHONY: exec-redis
exec-redis:
	@docker exec -it api_redis /bin/bash

.PHONY: help
help:
	@echo "Usage: make [target]"
	@echo ""
	@echo "Available targets:"
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sed 's/:.*## /    /' | sort