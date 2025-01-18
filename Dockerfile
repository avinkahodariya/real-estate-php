# Use an official PHP image with Composer pre-installed
FROM php:8.1-cli

# Set working directory
WORKDIR /var/www/html

# Copy project files into the container
COPY . .

# Install Composer inside the container
RUN curl -sS https://getcomposer.org/installer | php -- \
    && mv composer.phar /usr/local/bin/composer \
    && composer install --no-dev --optimize-autoloader

# Expose port (if using a web server)
EXPOSE 80

# Start PHP built-in server (change index.php if needed)
CMD ["php", "-S", "0.0.0.0:80", "-t", "public"]
