#!/usr/bin/env bash

echo "Starting Docker..."

docker-compose up --build -d

echo "Installing composer..."
docker exec boldking_php bash -c "composer install && composer dump-autoload"

echo "Generating app key..."
docker exec boldking_php bash -c "php artisan key:generate"

echo "Running migrations..."
docker exec boldking_php bash -c "php artisan migrate --seed"