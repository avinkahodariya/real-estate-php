FROM php:8.1-apache

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Expose port 80 for HTTP traffic
EXPOSE 80

# Start Apache in foreground
CMD ["apache2-foreground"]
