#!/bin/bash
#this code will be run in the ./.git/hooks/post-receive
composer install --optimize-autoloader --no-dev
php artisan migrate --force -vv
npm install
npm run build
php artisan config:cache
php artisan view:cache
php artisan route:cache

