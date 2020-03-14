# Accessing targets from the outside or inside the container

COMPOSER_BIN = ./composer.phar
PHP_BIN = php

# Static Analysis

.PHONY: phpstan
phpstan:
	$(PHP_BIN) vendor/bin/phpstan analyse src tests --level=max

# Check Code Style

.PHONY: phpcs
phpcs:
	$(PHP_BIN) vendor/bin/phpcs

# Fix Code Style

.PHONY: phpcsfix
phpcsfix:
	$(PHP_BIN) vendor/bin/phpcbf

# Project Installation

.PHONY: install
install: vendor

vendor: composer.json composer.lock
	$(COMPOSER_BIN) install
