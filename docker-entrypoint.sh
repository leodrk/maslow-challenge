#!/bin/bash

set -e

dockerize -wait tcp://mysql:3306 -timeout 1m

php artisan migrate:reset
php artisan migrate
php artisan db:seed

exec "$@"
