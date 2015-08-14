FROM php:5.6-apache

# Copy our source code to the container
ADD app/ /var/www/html/

# Install composer
WORKDIR /root
RUN \
    apt-get update && \
    apt-get -y install wget && \
    wget https://github.com/aws/aws-sdk-php/releases/download/2.8.18/aws.phar && \
    chmod 777 /root/aws.phar

# Listen on port 80
EXPOSE 80
