#!/usr/bin/env bash

docker stop nginx
docker stop php_fpm
docker stop api
docker stop mysql
docker stop mongo

docker-compose up --build &

sed '/rc1-linky/d' /etc/hosts > tmp
cat tmp > /etc/hosts
rm tmp

#Wait before start cron
IP_ADDRESS=$(docker inspect --format='{{.NetworkSettings.Networks.rc1linky_default.IPAddress}}' api)
while [ -z $IP_ADDRESS ]
do
    sleep 1
    IP_ADDRESS=$(docker inspect --format='{{.NetworkSettings.Networks.rc1linky_default.IPAddress}}' api)
done

echo "$IP_ADDRESS api.rc1-linky.fr" >> /etc/hosts

IP_ADDRESS=$(docker inspect --format='{{.NetworkSettings.Networks.rc1linky_default.IPAddress}}' php_fpm)
while [ -z $IP_ADDRESS ]
do
    sleep 1
    IP_ADDRESS=$(docker inspect --format='{{.NetworkSettings.Networks.rc1linky_default.IPAddress}}' php_fpm)
done

IP_ADDRESS=$(docker inspect --format='{{.NetworkSettings.Networks.rc1linky_default.IPAddress}}' nginx)
while [ -z $IP_ADDRESS ]
do
    sleep 1
    IP_ADDRESS=$(docker inspect --format='{{.NetworkSettings.Networks.rc1linky_default.IPAddress}}' nginx)
done

echo "$IP_ADDRESS rc1-linky.fr" >> /etc/hosts


echo "Starting Cron"
docker exec php_fpm cron
echo "Starting Cron : Done"