# Accessing targets from the outside or inside the container

COMPOSER_BIN = ./composer.phar
PHP_BIN = php

# Test

.PHONY: test
test:
	$(PHP_BIN) vendor/bin/phpunit --testdox

# Static Analysis

.PHONY: phpstan
phpstan:
	$(PHP_BIN) vendor/bin/phpstan analyse src tests --level=max

# Check Code Style

.PHONY: cs
cs:
	$(PHP_BIN) vendor/bin/phpcs

# Fix Code Style

.PHONY: csfix
csfix:
	$(PHP_BIN) vendor/bin/phpcbf

# Project Installation

.PHONY: install
install: vendor

vendor: composer.json composer.lock
	$(COMPOSER_BIN) install
