cd /var/www

cp .env.example .env

composer dump-autoload

export COMPOSER_ALLOW_SUPERUSER=1
php -d memory_limit=-1 /usr/bin/composer --no-interaction install --no-dev

chown -R www:www /var/www/
chmod -R 777 storage/

php artisan key:generate
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear