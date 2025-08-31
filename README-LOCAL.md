# Configuración para Desarrollo Local

## Estado Actual
✅ **Configuración completada exitosamente**

Tu aplicación Laravel está configurada para desarrollo local usando la base de datos MySQL de Railway.

## Configuración de Base de Datos
- **Host**: centerbeam.proxy.rlwy.net
- **Puerto**: 58408
- **Base de datos**: railway
- **Usuario**: root
- **Contraseña**: JxeyFIJMyCqttBaEXPornreSWGiZhIFj

## Comandos Útiles

### Iniciar el servidor de desarrollo
```bash
php artisan serve
```
La aplicación estará disponible en: http://127.0.0.1:8000

### Ejecutar migraciones
```bash
php artisan migrate
```

### Ejecutar seeders (si los tienes)
```bash
php artisan db:seed
```

### Limpiar caché
```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

### Compilar assets (si usas Vite)
```bash
npm run dev
```

## Archivos de Configuración

- **`.env`**: Configuración actual (desarrollo con Railway)
- **`.env.backup`**: Respaldo de la configuración original
- **`.env.production`**: Configuración para producción

## Scripts de Cambio de Configuración

### Cambiar a configuración local
```bash
switch-to-local.bat
```

### Cambiar a configuración de producción
```bash
switch-to-production.bat
```

## Verificar Estado

### Probar conexión a la base de datos
```bash
php artisan tinker --execute="DB::connection()->getPdo(); echo 'Conexión exitosa!';"
```

### Verificar rutas disponibles
```bash
php artisan route:list
```

## Notas Importantes

1. **Seguridad**: Nunca subas el archivo `.env` a Git (ya está en `.gitignore`)
2. **Base de datos**: Estás usando la base de datos de Railway, asegúrate de no hacer cambios destructivos
3. **Desarrollo**: Para desarrollo local intensivo, considera instalar MySQL localmente

## Solución de Problemas

### Si la conexión falla:
1. Verifica que la base de datos de Railway esté activa
2. Revisa las credenciales en el archivo `.env`
3. Ejecuta `php artisan config:clear`

### Si las migraciones fallan:
1. Verifica la conexión a la base de datos
2. Asegúrate de que el usuario tenga permisos suficientes
3. Revisa los logs en `storage/logs/laravel.log`

## Próximos Pasos

1. Crear tus modelos y migraciones
2. Configurar autenticación si es necesario
3. Crear tus controladores y rutas
4. Desarrollar tu API

¡Tu entorno de desarrollo está listo! 🚀
