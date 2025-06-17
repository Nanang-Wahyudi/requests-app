## How to install

-   rename .env.example menjadi .env

-   konfigurasi db :
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=8889
    DB_DATABASE=request_app
    DB_USERNAME=root
    DB_PASSWORD=root

-   php artisan key:generate
-   php artisan migrate
-   composer install atau composer update
-   jalankan aplikasi : php artisan serve
-   perintah clear cache : php artisan optimize
