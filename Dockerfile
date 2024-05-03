FROM php:8.3.2-apache

RUN apt update \
    && apt-get install -y --no-install-recommends \
     git

WORKDIR /var/www/html
COPY . /var/www/html
RUN php phing.phar build -verbose
RUN chown -R www-data /var/www/html

EXPOSE 80
CMD php phing.phar deploy -verbose ; apache2-foreground
