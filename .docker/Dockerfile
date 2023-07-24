FROM php:8.2-apache

# Set the working directory inside the container
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update \
    && apt-get install -y \
        libicu-dev \
        libpq-dev \
        libzip-dev \
        unzip

# Install PHP extensions
RUN docker-php-ext-install \
    intl \
    pdo \
    pdo_pgsql \
    zip \
    pdo \
    pdo_mysql \
    opcache

# Install XDEBUG
RUN pecl install xdebug apcu
# Enable XDEBUG
RUN docker-php-ext-enable xdebug apcu

RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

# Enable Apache modules
RUN a2enmod rewrite

# Install Composer and dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Enable Apache mod_rewrite and mod_headers
RUN a2enmod rewrite headers

# You can add your own aliases here
RUN echo 'alias console="php /var/www/html/bin/console"' >> ~/.bashrc
RUN echo 'alias phpstan="/var/www/html/vendor/phpstan/phpstan/phpstan"' >> ~/.bashrc
RUN echo 'alias dsu="/var/www/html/bin/console d:s:u --force --complete"' >> ~/.bashrc

# Expose port 80 for Apache
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]
