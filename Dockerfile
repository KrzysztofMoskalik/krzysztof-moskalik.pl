FROM webdevops/php-nginx:8.2 AS base

WORKDIR /app
COPY . /app
RUN chmod -R 755 /app

FROM base as app-prod
RUN composer install --no-interaction --optimize-autoloader --no-dev
ENV APP_ENV=prod

FROM base as app-dev
RUN composer install --no-interaction --optimize-autoloader
ENV APP_ENV=dev