FROM nginx:stable

COPY ./nginx.conf /etc/nginx/nginx.conf
COPY ./site.conf /etc/nginx/conf.d/default.conf

RUN touch /var/run/nginx.pid && \
  chown -R www-data:www-data /var/run/nginx.pid && \
  chown -R www-data:www-data /var/cache/nginx && \
  mkdir -p /var/www/magento2/pub && \
  chown -R www-data:www-data /var/www/magento2

USER www-data

COPY ./index.php /var/www/magento2/pub/
COPY ./session-test.php /var/www/magento2/pub/
COPY ./magento-composer.jpg /var/www/magento2/pub/

EXPOSE 8080
