#!/bin/sh

if [ "$APP_ENV" = "local" ]
then
    exit 0;
fi

# public/ に移植したシステムの環境整備
cd /var/www/includes

# composerの実行
export COMPOSER_ALLOW_SUPERUSER=1
php -d memory_limit=-1 /usr/bin/composer --no-interaction install --no-dev


# laravel の環境整備
cd /var/www/laravel/

cp .env.local .env

# composerの実行
export COMPOSER_ALLOW_SUPERUSER=1

if [ "$APP_ENV" = "dev" ]
then
  # dev 環境用 開発ツール有り
  php -d memory_limit=-1 /usr/bin/composer --no-interaction install
else
  # prd stg 環境用 開発ツール無し
  php -d memory_limit=-1 /usr/bin/composer --no-interaction install --no-dev
fi

# キャッシュクリア
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

chown -R www:www /var/www/

