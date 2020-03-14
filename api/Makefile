# Accessing targets from the outside or inside the container

COMPOSER_BIN = ./composer.phar
PHP_BIN = php

# Static Analysis

.PHONY: phpstan
phpstan:
	$(PHP_BIN) vendor/bin/phpstan analyse src tests --level=max

# Coding Standards

.PHONY: phpcsfix
phpcsfix:
	$(PHP_BIN) vendor/bin/php-cs-fixer fix

# Project Installation

.PHONY: install
install: vendor

vendor: composer.json composer.lock
	$(COMPOSER_BIN) install
