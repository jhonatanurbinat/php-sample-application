FROM php:8.2-apache

MAINTAINER Jhonatan Urbina <jhonatanurbinat@gmail.com>


WORKDIR /var/www/html


#RUN apt-get update && \
#    apt-get install -y \
#        git \
#        unzip \
#        libzip-dev \
#        libonig-dev \
#    --no-install-recommends && \
#    rm -rf /var/lib/apt/lists/*

# PHP extension
RUN requirements="zlib1g-dev libicu-dev git curl" \
    && apt-get update && apt-get install -y \
        git \
        unzip \
        wget \
        libzip-dev \
        libonig-dev \
    --no-install-recommends \
    $requirements && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install intl \
    && docker-php-ext-install zip \
    && apt-get purge --auto-remove -y

# Apache & PHP configuration
RUN a2enmod rewrite
ADD docker/apache/apache-app.conf /etc/apache2/sites-available/000-default.conf
ADD docker/php/php.ini /usr/local/etc/php/php.ini
ADD docker/php/php.ini /usr/local/etc/php/php.ini-development
ADD docker/php/php.ini /usr/local/etc/php/php.ini-production

# Install composer
#RUN curl -sS https://getcomposer.org/installer | php \
#    && mv composer.phar /usr/bin/composer

COPY . .

RUN wget https://getcomposer.org/composer.phar 
RUN	chmod u+x composer.phar && ./composer.phar install
RUN ln --symbolic --no-dereference --force config-dev config


# Add the application

#WORKDIR /app

# Install dependencies
#RUN composer install -o

#RUN composer install -o 
#&& \
 #   ln --symbolic --no-dereference --force config-dev config

# Ensure that the production container will run with the www-data user
#RUN chown www-data .

#CMD ["/app/docker/apache/run.sh"]