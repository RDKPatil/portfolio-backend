#!/bin/sh

echo "Clearing config..."
php artisan config:clear

echo "Caching config..."
php artisan config:cache

echo "Running migrations..."
php artisan migrate --force

echo "Starting Apache..."
apache2-foreground
