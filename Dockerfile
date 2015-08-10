FROM phusion/baseimage:0.9.17

# Copy files over
ADD ./nginx /build/nginx
ADD ./php-fpm /build/php-fpm

RUN add-apt-repository ppa:ondrej/php5-5.6 && \
    apt-get update && \
    apt-get -y upgrade && \

    # Make all install programs non-interactice (necessary for shell script usage)
    export DEBIAN_FRONTEND=noninteractive && \

    # Update permissions
    chmod -R u+x /build/* && \

    # Install Nginx and PHP5
    apt-get -y install nginx php5-fpm php5-mysql php5-imagick php5-mcrypt php5-curl php5-cli php5-intl php5-gd php5-xdebug curl && \

    # Setup Nginx
    mkdir -p /var/www
    /build/nginx/setup.sh && \

    # # Setup PHP
    /build/php-fpm/setup.sh && \

    # # Clean up after ourselves
    apt-get clean && \
    rm -Rf /var/lib/apt /tmp/* /var/tmp/* && \
    rm -Rf /build

# Listen on ports 80 and 443
EXPOSE 80 443

CMD ["service nginx start"]
