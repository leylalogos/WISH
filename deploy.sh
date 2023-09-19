#!/bin/bash

composer install --optimize-autoloader --no-dev
php artisan migrate
php artisan config:cache
php artisan view:cache
php artisan route:cache

