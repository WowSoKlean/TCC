# Base image for PHP 8.2 with FPM
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Install system dependencies required for Laravel
# Added gnupg and lsb-release for adding new repositories (like Node.js)
RUN apt-get update && apt-get install -y \
    git \
    curl \
    gnupg \
    lsb-release \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq-dev # PostgreSQL driver

# ---- NEW SECTION TO INSTALL NODE.JS AND NPM ----
# Add the NodeSource repository for Node.js 20.x (a stable LTS version)
RUN curl -sL https://deb.nodesource.com/setup_20.x | bash -
# Install Node.js (which includes npm)
RUN apt-get install -y nodejs
# ------------------------------------------------

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions required by Laravel
RUN docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd

# Install Composer (PHP package manager)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy existing application directory contents
COPY . .

# Change ownership of the application directory
RUN chown -R www-data:www-data /var/www/html

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]


