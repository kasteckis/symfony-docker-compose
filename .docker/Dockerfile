# Use image which contains apache with php
FROM php:8.2-apache
RUN apt-get update && apt-get upgrade -y
# Install packages needed to install php extensions
RUN apt-get install git zlib1g-dev libxml2-dev libzip-dev zip unzip -y
# Install PHP extensions
RUN docker-php-ext-install zip intl mysqli pdo pdo_mysql opcache
# Install XDEBUG
RUN pecl install xdebug
# Enable XDEBUG
RUN docker-php-ext-enable xdebug
# Install composer command
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer
# Set umask to 0000 (newly created files will have 777 permissions)
RUN echo "umask 0000" >> /root/.bashrc
