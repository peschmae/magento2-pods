FROM php:7.1-fpm

RUN requirements="libpng-dev libmcrypt-dev libmcrypt4 libcurl3-dev libfreetype6 libjpeg62-turbo libjpeg62-turbo-dev libfreetype6-dev libicu-dev libxslt1-dev" \
    && apt-get update \
    && apt-get install -y $requirements \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd \
    && docker-php-ext-install mcrypt \
    && docker-php-ext-install mbstring \
    && docker-php-ext-install zip \
    && docker-php-ext-install intl \
    && docker-php-ext-install xsl \
    && docker-php-ext-install soap \
    && docker-php-ext-install bcmath \
    && requirementsToRemove="libpng-dev libmcrypt-dev libcurl3-dev libfreetype6-dev libjpeg62-turbo-dev" \
    && apt-get purge --auto-remove -y $requirementsToRemove

RUN pecl install -o -f redis-3.1.6 \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis \
    && apt-get clean

COPY ./docker-php-ext-redis.ini /usr/local/etc/php/conf.d/docker-php-ext-redis.ini

RUN mkdir -p /var/www/magento2 && \
  chown -R www-data:www-data /var/www/magento2

USER www-data

COPY ./index.php /var/www/magento2/pub/
COPY ./mysql-test.php /var/www/magento2/pub/
COPY ./session-test.php /var/www/magento2/pub/
COPY ./magento-composer.jpg /var/www/magento2/pub/
