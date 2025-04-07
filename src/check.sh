#!/bin/bash

echo "Статический анализ с PHPStan (Larastan)..."
./vendor/bin/phpstan analyse --memory-limit=1G

echo ""
echo "Применение Pint (Laravel CS Fixer)..."
./vendor/bin/pint

echo ""
echo "Прогон тестов..."
php artisan test

echo ""
echo "Аудит зависимостей..."
composer audit
