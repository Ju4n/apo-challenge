FROM php:8.3-apache

# Set working directory
WORKDIR /var/www/chivilcoy

### MODS
RUN a2enmod rewrite && a2enmod remoteip && a2enmod ssl

RUN apt-get update && apt-get install -y \
    vim \
    git \
    zip \
    unzip \
    libcurl3-dev \
    libzip-dev \
    zlib1g-dev

### PHP Extensions
RUN docker-php-ext-install curl mysqli pdo pdo_mysql zip

# Install composer 2
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer  --2

### Add parameters
USER root

RUN echo 'vm.max_map_count=262144' >> /etc/sysctl.conf
RUN echo "date.timezone=America/Argentina/Buenos_Aires" >> /usr/local/etc/php/php.ini
RUN echo "max_input_vars = 500000" >> /usr/local/etc/php/php.ini
RUN echo "post_max_size = 200M" >> /usr/local/etc/php/php.ini
RUN echo "upload_max_filesize = 50M" >> /usr/local/etc/php/php.ini
RUN echo "memory_limit=1000M" >> /usr/local/etc/php/php.ini
