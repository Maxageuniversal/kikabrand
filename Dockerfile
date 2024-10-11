# Use the official PHP image from Docker Hub
FROM php:8.1-fpm

# Set the working directory inside the container
WORKDIR /var/www

# Install dependencies
COPY composer.lock composer.json ./
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo pdo_mysql \
    && apt-get clean

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the rest of the application code
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Expose the port on which your application will run
EXPOSE 9000

# Start the PHP FastCGI Process Manager
CMD ["php-fpm"]
