#!/bin/sh
mkdir -p /var/www/html/runtime /var/www/html/web/assets
exec docker-php-entrypoint php-fpm
