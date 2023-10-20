FROM php:7.4-fpm

WORKDIR /var/www/reg_form_php

RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip

CMD ["php-fpm"]
RUN pecl install xdebug && docker-php-ext-enable xdebug


