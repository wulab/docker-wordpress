docker-wordpress
================

Simple Dockerfile to run Wordpress inside a Docker container.

Usage
-----

Build the image:

    docker build -t ubermuda/docker-wordpress .

Or just pull the trusted build:

    docker pull ubermuda/docker-wordpress

Run
---

    docker run -d -P --name wordpress ubermuda/docker-wordpress


Configure nginx as a reverse proxy
----------------------------------

Retrieve your container's port:

    docker port wordpress 80

Use this configuration in nginx:

    server {
            listen  80;
            server_name jira.dev;
            location / {
                proxy_pass http://127.0.0.1:{{ port }}/;
                proxy_redirect     off;
                proxy_set_header   Host $host;
                proxy_set_header   X-Real-IP $remote_addr;
                proxy_set_header   X-Forwarded-For $proxy_add_x_forwarded_for;
                proxy_set_header   X-Forwarded-Host $server_name;
            }
    }