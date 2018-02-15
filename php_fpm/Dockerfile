FROM php:7.0-fpm
RUN apt-get update \
    && apt-get install -y apt-utils \
    && apt-get install -y cron

RUN apt-get install -y zlib1g-dev libicu-dev g++ libssl-dev

RUN pecl install apcu-5.1.5 && \
    docker-php-ext-enable apcu && \
    docker-php-ext-install \
        intl \
        mbstring \
        pdo_mysql \
        zip \
        bcmath \
        opcache

RUN pecl install mongodb \
    && echo "extension=mongodb.so" > /usr/local/etc/php/conf.d/ext-mongodb.ini

ADD cron-laravel /etc/cron.d/cron-laravel
RUN chmod 777 /etc/cron.d/cron-laravel
RUN touch /var/log/cron.log
RUN crontab /etc/cron.d/cron-laravel