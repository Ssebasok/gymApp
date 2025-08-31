# Rutas de Prueba - API Laravel

## Descripción
Estas rutas te permiten probar la funcionalidad básica de tu API Laravel, incluyendo operaciones CRUD en la base de datos.

## Base URL
```
http://127.0.0.1:8000/api/test
```

## Rutas Disponibles

### 1. Agregar Usuario de Prueba
**POST** `/api/test/add-user`

Crea un usuario de prueba en la base de datos.

**Respuesta exitosa (201):**
```json
{
    "success": true,
    "message": "Usuario de prueba creado exitosamente",
    "user": {
        "id": 1,
        "name": "Usuario Test",
        "email": "test@example.com",
        "created_at": "2025-08-30T15:30:00.000000Z"
    }
}
```

**Respuesta si ya existe (200):**
```json
{
    "success": false,
    "message": "El usuario de prueba ya existe",
    "user": {
        "id": 1,
        "name": "Usuario Test",
        "email": "test@example.com"
    }
}
```

### 2. Obtener Todos los Usuarios
**GET** `/api/test/users`

Obtiene todos los usuarios de la base de datos.

**Respuesta exitosa (200):**
```json
{
    "success": true,
    "message": "Usuarios obtenidos exitosamente",
    "count": 1,
    "users": [
        {
            "id": 1,
            "name": "Usuario Test",
            "email": "test@example.com",
            "created_at": "2025-08-30T15:30:00.000000Z"
        }
    ]
}
```

### 3. Eliminar Usuario de Prueba
**DELETE** `/api/test/delete-user`

Elimina el usuario de prueba de la base de datos.

**Respuesta exitosa (200):**
```json
{
    "success": true,
    "message": "Usuario de prueba eliminado exitosamente"
}
```

**Respuesta si no existe (404):**
```json
{
    "success": false,
    "message": "El usuario de prueba no existe"
}
```

## Cómo Probar las Rutas

### Usando cURL

#### 1. Agregar usuario de prueba:
```bash
curl -X POST http://127.0.0.1:8000/api/test/add-user
```

#### 2. Obtener todos los usuarios:
```bash
curl -X GET http://127.0.0.1:8000/api/test/users
```

#### 3. Eliminar usuario de prueba:
```bash
curl -X DELETE http://127.0.0.1:8000/api/test/delete-user
```

### Usando Postman

1. **Crear una nueva colección**
2. **Agregar las 3 rutas con los métodos correspondientes**
3. **Usar la URL base:** `http://127.0.0.1:8000/api/test/`

### Usando el navegador

Solo puedes probar la ruta GET directamente en el navegador:
```
http://127.0.0.1:8000/api/test/users
```

## Flujo de Prueba Recomendado

1. **Primero:** Ejecutar `GET /api/test/users` para ver usuarios existentes
2. **Segundo:** Ejecutar `POST /api/test/add-user` para crear el usuario de prueba
3. **Tercero:** Ejecutar `GET /api/test/users` para verificar que se creó
4. **Cuarto:** Ejecutar `DELETE /api/test/delete-user` para limpiar
5. **Quinto:** Ejecutar `GET /api/test/users` para verificar que se eliminó

## Información del Usuario de Prueba

- **Nombre:** Usuario Test
- **Email:** test@example.com
- **Contraseña:** password123 (hasheada en la base de datos)

## Notas Importantes

- ✅ Las rutas están protegidas contra errores con try-catch
- ✅ Se verifica si el usuario ya existe antes de crearlo
- ✅ Se devuelven respuestas JSON estructuradas
- ✅ Se incluyen códigos de estado HTTP apropiados
- ✅ La contraseña se hashea automáticamente

## Próximos Pasos

Una vez que hayas probado estas rutas exitosamente, puedes:

1. Crear tus propios controladores
2. Agregar más rutas para tu aplicación
3. Implementar autenticación
4. Crear más modelos y migraciones

¡Tu API está lista para ser expandida! 🚀

