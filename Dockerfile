FROM php:7.2-apache
RUN apt-get update
RUN docker-php-ext-install pdo pdo_mysql
RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

RUN apt-get install -y git zlib1g-dev \
 && docker-php-ext-install zip \
 && a2enmod rewrite \
 && sed -i 's!/var/www/html!/var/www/public!g' /etc/apache2/sites-available/000-default.conf \
 && mv /var/www/html /var/www/public \
 && curl -sS https://getcomposer.org/installer \
  | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www
