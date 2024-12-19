# Guide to run project
composer install

cp .env.example .env

php artisan key:generate

### Generate file cache
cd storage/ 

mkdir -p framework/{sessions,views,cache}  

chmod -R 775 framework  

php artisan view:clear 

### Config file manager
composer require unisharp/laravel-filemanager

php artisan vendor:publish --tag=lfm_config

php artisan vendor:publish --tag=lfm_public

php artisan storage:link

### Migration database
php artisan migrate

php artisan serve
