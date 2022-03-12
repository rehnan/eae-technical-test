FROM php:7.4-fpm-alpine

# for laravel lumen run smoothly
RUN apk --no-cache add \
php7 \
php7-fpm \
php7-pdo \
php7-mbstring \
php7-openssl

# for our code run smoothly
RUN apk --no-cache add \
php7-json \
php7-dom \
curl \
php7-curl

# install postgres depenencies
ENV build_pkgs="postgresql-dev"
ENV runtime_pkgs=""

RUN \
    mkdir -p /run \
    build_pkgs="" && \
    runtime_pkgs="nginx" && \
    apk --update add --no-cache ${build_pkgs} ${runtime_pkgs} && \
    docker-php-ext-install pdo_pgsql pgsql sockets && \
    rm -rf /tmp/* && \
    apk del ${build_pkgs} && \
    rm -rf /var/cache/apk/*

RUN \
    apk add --no-cache --no-progress --virtual BUILD_DEPS_PHP_PGSQL postgresql-dev \
    && apk add --no-cache --no-progress postgresql-libs \
    && docker-php-ext-install pdo_pgsql

# for composer & our project depency run smoothly
RUN apk --no-cache add \
php7-phar \
php7-xml \
php7-xmlwriter

# if need composer to update plugin / vendor used
RUN php7 -r "copy('http://getcomposer.org/installer', 'composer-setup.php');" && \
php7 composer-setup.php --install-dir=/usr/bin --filename=composer && \
php7 -r "unlink('composer-setup.php');"

# copy all of the file in folder to /src
COPY . /src
WORKDIR /src

RUN composer install

ADD .env /src/.env
RUN chmod -R 777 storage
