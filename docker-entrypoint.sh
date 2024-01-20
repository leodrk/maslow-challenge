#!/bin/bash

set -e

php artisan migrate:reset
php artisan migrate
php artisan db:seed

exec "$@"
