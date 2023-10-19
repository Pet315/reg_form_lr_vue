FROM php:8.0-apache

RUN docker-php-ext-install pdo pdo_mysql

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

RUN echo "xdebug.remote_enable=on" >> /usr/local/etc/php/php.ini
RUN echo "xdebug.remote_autostart=off" >> /usr/local/etc/php/php.ini

