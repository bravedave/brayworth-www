FROM dunglas/frankenphp

RUN apt-get update && apt-get install -y git zip unzip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
