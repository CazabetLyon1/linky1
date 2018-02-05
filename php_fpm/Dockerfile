FROM php:7.0-fpm
RUN apt-get update \
    && apt-get install -y php-pear \
    && apt-get install -y php5-dev \
    && apt-get install -y apt-utils \
    && apt-get install -y git \
    && apt-get install -y zip unzip \
    && apt-get install -y cron \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb

ADD cron-laravel /etc/cron.d/cron-laravel
RUN chmod 777 /etc/cron.d/cron-laravel
RUN touch /var/log/cron.log
RUN crontab /etc/cron.d/cron-laravel