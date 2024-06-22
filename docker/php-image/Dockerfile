FROM php:8.3-fpm

ARG UID=1000
ARG GID=1000
ARG UNAME=www-data
ARG UGROUP=www-data
RUN usermod  --uid $UID $UNAME
RUN groupmod --gid $GID $UGROUP


RUN apt-get clean all
RUN apt-get update -y
RUN apt-get install -y git libzip-dev zlib1g-dev zip p7zip

# COMPOSER
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /bin/composer
#/COMPOSER

RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install zip

CMD php-fpm