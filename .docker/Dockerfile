FROM php:8.1-fpm

EXPOSE 8080

RUN apt-get update && apt-get install -y \
    vim \
    git \
    curl \
    zip \
    unzip \
    libedit-dev \
    libicu-dev \
    libxml2-dev \
    libzip-dev \
    libpng-dev \
    libpq-dev

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install -j$(nproc) \
    intl \
    soap \
    gd \
    mysqli \
    pgsql \
    bcmath \
    sockets \
    pcntl \
    pdo_mysql

RUN pecl install xdebug  \
    swoole  \
    redis \
    && docker-php-ext-enable xdebug  \
    swoole  \
    redis  \
    pgsql \
    mysqli

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ADD docker-entrypoint.sh /usr/local/bin/
