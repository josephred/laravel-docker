
composer create-project --prefer-dist laravel/laravel laravel

docker exec -it laravel_app bash
docker exec -it laravel_app php artisan cache:table
docker exec -it laravel_app php artisan migrate

docker exec -it laravel_app php artisan cache:clear
docker exec -it laravel_app php artisan config:clear
docker exec -it laravel_app php artisan config:cache

docker-compose up -d nginx
docker-compose down --remove-orphans
docker-compose up -d --build
docker ps





docker exec -it laravel_app php artisan make:model Task -m
docker exec -it laravel_app php artisan make:controller TaskController --resource
docker exec -it laravel_app php artisan route:list

docker exec -it laravel_app php artisan make:model Task



Guarda el archivo y reinicia Nginx con:
docker-compose down
docker-compose up -d --build


docker exec -it laravel_app php artisan config:clear
docker exec -it laravel_app php artisan cache:clear
docker exec -it laravel_app php artisan view:clear
docker exec -it laravel_app php artisan config:cache

