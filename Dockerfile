FROM nginx:latest as nginx

FROM php:7-fpm as php
RUN apt-get update && \
    apt-get install -y \
        libzip-dev \
        libssl-dev \
        zip \
    && docker-php-ext-install \
        zip \
    && pecl install mongodb \
    && docker-php-ext-enable \
        mongodb

FROM mongo:latest as mongo

FROM node:latest as node
