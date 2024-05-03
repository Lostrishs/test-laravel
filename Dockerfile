FROM php:8.3.2-apache

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -i -e "s+/var/www/html+$APACHE_DOCUMENT_ROOT+g" /etc/apache2/sites-available/*.conf \
    && sed -i -e "s+/var/www/+${APACHE_DOCUMENT_ROOT}/+g" /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf \
    && apt update \
    && apt-get install -y --no-install-recommends \
     git

WORKDIR /var/www/html
COPY . /var/www/html
RUN php phing.phar build -verbose
RUN chown -R www-data /var/www/html

EXPOSE 80
CMD php phing.phar deploy -verbose ; apache2-foreground
