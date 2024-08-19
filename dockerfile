# PHP image
FROM php:8.3.9-fpm-alpine

# seting work directory (Appache/Nginx configure server in this directory)
WORKDIR /var/www/html

# Install dependencies
RUN apk --no-cache add \
    bash \
    git \
    curl \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    zip \
    unzip \
    icu-dev

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql zip intl

# Install Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Copy existing application directory contents
COPY . .

# To change ownership of directories in container chown is change owner in linux -R to change not only the directory
# But all of their subdirectories as well 
# You need to write some datas in when you run a laravel app so you have to give permission for that by changing owner
# first www-data is user and second one is group that owns directories and files and you give access to 2 paths in command 
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Install application dependencies
RUN composer install --prefer-dist --no-dev --optimize-autoloader --no-scripts --no-progress

# Expose port 8000 and start php-fpm server
EXPOSE 8000
CMD ["php-fpm"]