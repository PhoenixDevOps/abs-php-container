FROM php:5.6-apache

# Install the AWS SDK for PHP
WORKDIR /var/www/html
RUN \
    apt-get update && \
    apt-get -y install wget && \
    wget https://github.com/aws/aws-sdk-php/releases/download/2.8.18/aws.phar && \
    chmod 777 aws.phar

# Copy our source code to the container
ADD app/www/public /var/www/html/

# Listen on port 80
EXPOSE 80
