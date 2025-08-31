<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class addUserController extends Controller{

    public function addUser(Request $request){
        try{
            //Voy a chequear si el usuario existe
            $userExist = User::where('email', $request->email)->count();

            if ($userExist == 1 ){
                return response()-> json(
                    [
                        'success' => false,
                        'message' => 'Existe el usuario.'
 
                    ], 200);
            }elseif($userExist == 0){

                return response()-> json([
                    'success' => false,
                    'messaje' => 'FUNCION DE REGISTRO DE USUARIO EN PROGRESO'
                ], 200);
            }

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

}