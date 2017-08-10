FROM nginx:alpine
MAINTAINER Spring Signage <info@springsignage.com>

COPY ./output /usr/share/nginx/html
COPY ./nginx.conf /etc/nginx/conf.d/default.conf