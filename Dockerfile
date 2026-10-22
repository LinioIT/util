FROM php:8.3.36-cli

RUN apt-get update \
    && apt-get install -y --no-install-recommends ca-certificates libzip-dev unzip \
    && docker-php-ext-install zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint

WORKDIR /app

ENV COMPOSER_CACHE_DIR=/tmp/composer-cache

ENTRYPOINT ["sh", "/usr/local/bin/docker-entrypoint"]
