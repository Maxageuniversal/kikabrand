# Use PHP 8.2 as base image
FROM php:8.2-cli

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip pdo pdo_mysql \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add a non-root user
RUN useradd -m appuser
USER appuser

# Set the Composer home environment variable
ENV COMPOSER_HOME=/home/appuser/.composer

# Copy the application code and change ownership
COPY --chown=appuser:appuser . .

# Copy the composer files
COPY --chown=appuser:appuser composer.json composer.lock ./

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader -vvv

# Expose port
EXPOSE 8000

# Start the PHP development server
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
