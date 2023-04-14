FROM php:7-fpm
COPY --chown=www-data:www-data . /var/www

RUN cd /var/www && \
  php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
  php composer-setup.php && \
  cat composer.json && \
  ls -al && \
  php composer.phar install
