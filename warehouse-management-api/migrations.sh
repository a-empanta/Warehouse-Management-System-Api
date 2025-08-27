#!/bin/bash

docker exec -it php-cli php artisan make:model Warehouse -m

docker exec -it php-cli php artisan make:model Product -m

docker exec -it php-cli php artisan make:model Stock -m

docker exec -it php-cli php artisan make:model Order -m

docker exec -it php-cli php artisan make:model Transfer -m