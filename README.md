<p align="center"><a href="https://wish.xnor.one" target="_blank"><img src="https://wish.xnor.one/frontend/images/Wish.png" width="400" alt="Laravel Logo"></a></p>

## About Wish

Looking for the perfect gift? Look no further than **[Wish](https://wish.xnor.one/)**!

Our website is a treasure trove of unique and exciting products that will bring a smile :smile: to your loved ones' faces.

With the ability to create and share _wish lists_, you can easily let others know what you've been dreaming of.

From trendy fashion items to must-have tech innovations, we have everything you need to make your gifting experience truly memorable.

Get ready to make a wish and find the ideal gift on Wish!

## Prerequisites

-   Git
-   PHP 8
-   Http server (nginx/apache)
-   Composer
-   MySQL

## Setup Steps

1. clone the project with git
   `git clone git@github.com:leylalogos/WISH.git`
2. [setup **nginx** to serve the web app](#nginx-configuration)
3. in the project root directory:
   `composer install`
4. write the enviourment variables into `.env`
   `cp ./.env.example ./.env` then edit .env file\*\*
5. [setup database user](#mysql-configuration)
6. [setup **permissions** on storage and cache folder](#permissions-configuration)
7. run the setup & optimization commands
8. run `npm install`

```
artisan key:generate
php artisan migrate
php artisan route:cache
php artisan config:cache
php artisan view:cache
```

### Nginx configuration

```
server {
    listen 80;
    server_name [domain];
    root [project roo path]/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-XSS-Protection "1; mode=block";
    add_header X-Content-Type-Options "nosniff";

    index index.html index.htm index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

## MySQL configuration

```
create database wish;
CREATE USER 'wish_user'@'%' IDENTIFIED BY 'PASSWORD';
GRANT ALL PRIVILEGES ON wish.* TO 'wish_user'@'%';
FLUSH PRIVILEGES;

```

## Permissions configuration

```
sudo chown -R $USER:www-data .
sudo find . -type f -exec chmod 664 {} \;
sudo find . -type d -exec chmod 775 {} \;
sudo chgrp -R www-data storage bootstrap/cache
sudo chmod -R ug+rwx storage bootstrap/cache

```
