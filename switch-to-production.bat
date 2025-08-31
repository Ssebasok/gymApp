@echo off
echo Cambiando a configuración PRODUCCIÓN...
copy .env.production .env
echo Configuración PRODUCCIÓN activada!
echo.
echo Para ejecutar la aplicación:
echo php artisan serve
echo.
pause
