FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip nginx nodejs npm

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --no-dev --optimize-autoloader
RUN npm install && npm run build

# Konfigurasi Nginx lengkap dengan penanganan file statis
RUN echo 'server {\n\
    listen 8080;\n\
    index index.php index.html;\n\
    root /var/www/public;\n\
    \n\
    location / {\n\
        try_files $uri $uri/ /index.php?$query_string;\n\
    }\n\
    \n\
    location ~* \.(css|js|png|jpg|jpeg|gif|ico|svg|woff|woff2|ttf|eot)$ {\n\
        expires max;\n\
        log_not_found off;\n\
        try_files $uri =404;\n\
    }\n\
    \n\
    location ~ \.php$ {\n\
        include fastcgi_params;\n\
        fastcgi_pass 127.0.0.1:9000;\n\
        fastcgi_index index.php;\n\
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;\n\
    }\n\
}' > /etc/nginx/sites-available/default

RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

EXPOSE 8080

CMD service nginx start && php-fpm