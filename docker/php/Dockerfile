FROM php:8.0-fpm

ARG USER_ID=1000
ARG GROUP_ID=1000
ARG LOCAL_IP=host.docker.internal

COPY --from=composer:2.2.25 /usr/bin/composer /usr/local/bin/composer
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/

RUN install-php-extensions pdo_mysql intl zip mbstring bcmath gd opcache exif xdebug

COPY docker/php/php-ini-overrides.ini $PHP_INI_DIR/conf.d/99-overrides.ini
COPY docker/php/entrypoint.sh /entrypoint.sh

RUN chmod +x /entrypoint.sh \
    && sed -i "s/{LOCAL_IP}/${LOCAL_IP}/g" $PHP_INI_DIR/conf.d/99-overrides.ini \
    && usermod -u ${USER_ID} www-data \
    && groupmod -g ${GROUP_ID} www-data

COPY . /var/www/html/

WORKDIR /var/www/html

ENTRYPOINT ["/entrypoint.sh"]
