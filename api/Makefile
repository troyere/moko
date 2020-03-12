# Accessing targets from the outside or inside the container

COMPOSER_BIN = ./composer.phar
PHP_BIN = php

# Help

TARGETS:=$(MAKEFILE_LIST)

.PHONY: help
help: ## This help
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(TARGETS) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

# Static Analysis

.PHONY: phpstan
phpstan: vendor
	$(PHP_BIN) vendor/bin/phpstan analyse src tests --level=max

# Project installation

.PHONY: install
install: vendor

vendor: composer.json composer.lock
	$(COMPOSER_BIN) install
