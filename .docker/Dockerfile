# Use image which contains apache with php
FROM php:8.1.2-apache
RUN apt-get update && apt-get upgrade -y
# Install packages needed to install php extensions
RUN apt-get install git zlib1g-dev libxml2-dev libzip-dev zip unzip -y
# Install PHP extensions
RUN docker-php-ext-install zip intl mysqli pdo pdo_mysql opcache
# Install NPM
RUN apt-get install npm -y
# Upgrade npm to latest version
RUN npm install -g npm
# Install node manager - n
RUN npm install -g n
# Install latest stable node version
RUN n stable
# Install latest stable Yarn
RUN npm install --global yarn
# Install XDEBUG
RUN pecl install xdebug-3.1.3 && docker-php-ext-enable xdebug
# Install composer command
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer
# Install symfony command
RUN curl -sS https://get.symfony.com/cli/installer | bash && mv /root/.symfony/bin/symfony /usr/local/bin/symfony
# Set umask to 0000 (newly created files will have 777 permissions)
RUN echo "umask 0000" >> /root/.bashrc
