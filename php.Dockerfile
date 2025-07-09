# Use PHP 8.4 CLI (with FPM bits there if you ever need them)
FROM php:8.4-cli

# 1. Install system deps, PHP extensions, Git & SSH client
RUN apt-get update \
 && apt-get install -y --no-install-recommends \
      git \
      openssh-client \
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

# 2. Install Composer & the Laravel installer
RUN curl -sS https://getcomposer.org/installer \
    | php -- --install-dir=/usr/local/bin --filename=composer \
 && composer global require laravel/installer

# 3. Make sure global composer bin is on PATH
ENV PATH="/root/.composer/vendor/bin:${PATH}"

# 4. Create SSH folder (you’ll mount your keys there)
RUN mkdir -p /root/.ssh && chmod 700 /root/.ssh

# 5. Work in /workspace
WORKDIR /app

# 6. Drop you into bash by default
ENTRYPOINT ["bash"]
