FROM php:5.6-apache

# Copy our source code to the container
ADD app/ /var/www/html/

# Listen on port 80
EXPOSE 80
