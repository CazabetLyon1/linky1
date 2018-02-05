FROM nginx
MAINTAINER Alexandre BRUYAT
ADD default.conf /etc/nginx/conf.d/default.conf
RUN mkdir /etc/nginx/ssl
ADD nginx.crt /etc/nginx/ssl/nginx.crt
ADD nginx.key /etc/nginx/ssl/nginx.key