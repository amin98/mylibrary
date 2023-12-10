# Use an official PHP runtime as a parent image
FROM php:8.1-fpm

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Install dependencies
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        libzip-dev \
        zip \
        unzip \
        nodejs \
        npm \
    && rm -rf /var/lib/apt/lists/*

# Install required PHP extensions
RUN docker-php-ext-install zip pdo_mysql

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy only the necessary files needed for dependency installation
COPY composer.json composer.lock ./
COPY package.json ./

# Install project dependencies
RUN composer install --no-scripts --no-autoloader

# Copy the rest of the application files
COPY . .

# Generate the autoload files and optimize Composer autoloader
RUN composer dump-autoload --optimize

# Install Node.js dependencies and build assets
RUN npm install

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

