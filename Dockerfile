FROM stackbrew/ubuntu:saucy

MAINTAINER geoffrey.bachelet@gmail.com

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update -y
RUN apt-get install -y vim curl nginx php5-fpm php5-mysql mysql-server daemontools

RUN mkdir /var/www
RUN curl -sL http://wordpress.org/latest.tar.gz | tar xzC /var/www

RUN cp -r /var/www/wordpress/wp-content /var/www

RUN echo "[global]\ndaemonize = no" > /etc/php5/fpm/pool.d/daemonize.conf
RUN echo "\ndaemon off;" >> /etc/nginx/nginx.conf

ADD nginx-vhost.conf /etc/nginx/sites-available/default
ADD wp-config.php /var/www/wp-config.php
ADD service /etc/service
ADD entrypoint.sh /entrypoint.sh

EXPOSE 80

ENTRYPOINT ["/bin/bash", "/entrypoint.sh"]