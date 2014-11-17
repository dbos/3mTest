#!/bin/bash
php artisan migrate:rollback
php artisan migrate
php artisan db:seed
mysql -u homestead -p homestead -e 'select name from users;'
