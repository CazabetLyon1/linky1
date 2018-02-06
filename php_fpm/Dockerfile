FROM php:7.0-fpm
RUN apt-get update \
    && apt-get install -y apt-utils \
    && apt-get install -y cron
#    && pecl install mongodb
#    && docker-php-ext-enable mongodb
#RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
#    && php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
#    && php composer-setup.php \
#    && php -r "unlink('composer-setup.php');"

ADD cron-laravel /etc/cron.d/cron-laravel
RUN chmod 777 /etc/cron.d/cron-laravel
RUN touch /var/log/cron.log
RUN crontab /etc/cron.d/cron-laravel