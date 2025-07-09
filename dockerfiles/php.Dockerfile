FROM php:8.4-cli

RUN apt-get update \
 && apt-get install -y --no-install-recommends \
      git \
      curl \
      zip \
      unzip \
      libzip-dev \
      libonig-dev \
      libxml2-dev \
 && docker-php-ext-install \
      pdo_mysql \
      mbstring \
      zip \
      xml \
      pcntl \
 && rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer \
    | php -- --install-dir=/usr/local/bin --filename=composer \
 && composer global require laravel/installer

ENV PATH="/root/.composer/vendor/bin:${PATH}"

WORKDIR /app

CMD ["bash"]
