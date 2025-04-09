FROM php:8.2-apache

# Instala extensões necessárias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Instala o Composer no container PHP
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Ativa o módulo de reescrita do Apache
RUN a2enmod rewrite

# Define o diretório raiz do Apache
WORKDIR /var/www/html
