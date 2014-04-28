docker-wordpress
================

Simple Dockerfile to run [Wordpress](http://wordpress.com/) inside a [Docker](http://docker.io) container.

Usage
-----

Build the image:

    docker build -t ubermuda/docker-wordpress .

Or just pull the trusted build:

    docker pull ubermuda/docker-wordpress

You might want to have the database and `wp-content` in shared volumes. To do so, you need to create a data container that will only hold data. You just have to run a container with the `-v` option to create volumes:

    docker run \
        --name wordpress-data \
        -v /var/lib/mysql \
        -v /var/www/wordpress/wp-content \
        busybox \
        /bin/true

__OR__ you could write a Dockerfile for your data container, for example in a `wordpress-data/`:

    FROM        busybox
    VOLUME      ["/var/lib/mysql", "/var/www/wordpress/wp-content"]
    ENTRYPOINT  ["/bin/true"]

then build and run it:

    docker build -t ubermuda/docker-wordpress-data wordpress-data/
    docker run --name wordpress-data ubermuda/docker-wordpress-data

Any way you chose, you can now use your newly created volumes in the wordpress container:

    docker run -d -P \
        --name wordpress \
        --volumes-from wordpress-data \
        ubermuda/docker-wordpress

Configure nginx as a reverse proxy
----------------------------------

Retrieve your container's port:

    docker port wordpress 80

Use this configuration in nginx, changing `{{ port }}` and `{{ server_name }}` accordingly:

    server {
            listen  80;
            server_name {{ server_name }};
            location / {
                proxy_pass http://127.0.0.1:{{ port }}/;
                proxy_redirect     off;
                proxy_set_header   Host $host;
                proxy_set_header   X-Real-IP $remote_addr;
                proxy_set_header   X-Forwarded-For $proxy_add_x_forwarded_for;
                proxy_set_header   X-Forwarded-Host $server_name;
            }
    }

Disclaimer
----------

This image contains default configurations for nginx, php5 and mysql. It is *not* recommended for production. However, if you're willing to contribute better configurations, please open a pull request!