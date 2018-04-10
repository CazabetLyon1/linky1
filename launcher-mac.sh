#!/usr/bin/env bash

docker stop nginx
docker stop php_fpm
docker stop api
docker stop mysql
docker stop mongo

docker-compose up --build &

#Wait before start cron
IP_ADDRESS=$(docker inspect --format='{{.NetworkSettings.Networks.rc1linky_default.IPAddress}}' php_fpm)
while [ -z $IP_ADDRESS ]
do
    sleep 1
    IP_ADDRESS=$(docker inspect --format='{{.NetworkSettings.Networks.rc1linky_default.IPAddress}}' php_fpm)
done


echo "Starting Cron"
docker exec php_fpm cron
echo "Starting Cron : Done"