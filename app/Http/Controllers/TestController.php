<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
    /**
     * Función de prueba que agrega un usuario
     */
    public function addTestUser()
    {
        try {
            // Verificar si el usuario de prueba ya existe
            $existingUser = User::where('email', 'test@example.com')->first();
            
            if ($existingUser) {
                return response()->json([
                    'success' => false,
                    'message' => 'El usuario de prueba ya existe',
                    'user' => $existingUser
                ], 200);
            }

            // Crear el usuario de prueba
            $user = User::create([
                'name' => 'Usuario Test',
                'email' => 'test@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Usuario de prueba creado exitosamente',
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'created_at' => $user->created_at
                ]
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el usuario de prueba',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Función para obtener todos los usuarios
     */
    public function getAllUsers()
    {
        try {
            $users = User::select('id', 'name', 'email', 'created_at')->get();
            
            return response()->json([
                'success' => true,
                'message' => 'Usuarios obtenidos exitosamente',
                'count' => $users->count(),
                'users' => $users
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener los usuarios',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Función para eliminar el usuario de prueba
     */
    public function deleteTestUser()
    {
        try {
            $user = User::where('email', 'test@example.com')->first();
            
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'El usuario de prueba no existe'
                ], 404);
            }

            $user->delete();

            return response()->json([
                'success' => true,
                'message' => 'Usuario de prueba eliminado exitosamente'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el usuario de prueba',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
