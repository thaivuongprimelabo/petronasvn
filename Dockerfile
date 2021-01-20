FROM php:7.2-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    git \
    libzip-dev \
    libpng-dev \
    zip \
    unzip

RUN docker-php-ext-configure zip --with-libzip

RUN docker-php-ext-install pdo_mysql zip gd

RUN curl --silent --show-error https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

ADD . /var/www
ADD ./docker/nginx/conf.d/ /etc/nginx/conf.d/

RUN sh /var/www/docker/setup.sh