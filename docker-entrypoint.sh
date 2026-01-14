#!/bin/sh

echo "Running migrations..."
php artisan migrate --force

echo "Caching config..."
php artisan config:clear
php artisan config:cache

echo "Starting Apache..."
apache2-foreground
