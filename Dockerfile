FROM php:8.4-apache

WORKDIR /var/www/html

RUN a2enmod rewrite
