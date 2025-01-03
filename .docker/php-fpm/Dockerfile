FROM php:8.3.15-fpm

WORKDIR /var/www/service

RUN apt-get update && apt-get install --no-install-recommends -y \
    librabbitmq-dev \
    zlib1g-dev \
    libssl-dev \
    openssl \
    libmcrypt-dev \
    libpng-dev \
    libgd-dev \
    git \
    libicu-dev \
    libxml2-dev \
    libzip-dev \
    fish \
    openssh-client

RUN pecl install redis && docker-php-ext-enable redis

RUN docker-php-ext-install \
       pdo_mysql \
       zip \
       iconv \
       gd \
       opcache \
       bcmath \
       intl \
       soap \
       sockets

RUN chmod 777 /var --recursive

RUN git config --global --add safe.directory '*'

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
