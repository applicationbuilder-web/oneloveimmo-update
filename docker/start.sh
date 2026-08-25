#!/bin/sh

set -e

echo "🚀 Démarrage de OneLove Immo..."

echo "📁 Préparation des permissions Laravel..."
chown -R www-data:www-data /var/www/html/storage
chown -R www-data:www-data /var/www/html/bootstrap/cache

echo "🧹 Nettoyage des caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear

echo "⚙️ Mise en cache de la configuration..."
php artisan config:cache

echo "🗄️ Exécution des migrations..."
php artisan migrate --force

echo "🌐 Démarrage de PHP-FPM..."
php-fpm -D

echo "🌍 Démarrage de Nginx..."
nginx -g "daemon off;"