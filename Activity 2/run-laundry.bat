@echo off
cd /d "%~dp0"
echo Starting Laundry Service Package CRUD...
echo URL: http://127.0.0.1:8000/laundry-services
php artisan optimize:clear
php artisan serve --host=127.0.0.1 --port=8000
