@echo off
echo Cambiando a configuración LOCAL...
copy .env.local .env
echo Configuración LOCAL activada!
echo.
echo Para ejecutar la aplicación:
echo php artisan serve
echo.
pause
