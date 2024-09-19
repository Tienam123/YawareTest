FROM php:8.2-fpm

# Arguments defined in .Docker.yml
ARG user
ARG uid

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    gettext \
    libicu-dev \
    zip \
    unzip \
    libmagickwand-dev \
    --no-install-recommends \
   && docker-php-ext-configure gd --with-freetype --with-jpeg \
        && docker-php-ext-install gd \
  && apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gettext intl && \
    pecl install xdebug zip imagick && \
    docker-php-ext-enable xdebug zip imagick

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user && \
    mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Set working directory
WORKDIR /var/www

# Set PHP configurations
RUN echo "post_max_size = 150M" >> /usr/local/etc/php/php.ini && \
    echo "upload_max_filesize = 150M" >> /usr/local/etc/php/php.ini && \
    echo "memory_limit = 2048M" >> /usr/local/etc/php/php.ini

USER $user

# Install php-amqplib via Composer
#RUN composer require php-amqplib/php-amqplib
USER root
# Ensure proper permissions for /var/www
RUN chown -R $user:$user /var/www

USER $user
