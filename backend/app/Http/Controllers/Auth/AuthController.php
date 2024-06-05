<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Etudiant;
use App\Models\Logement;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function getUser()
    {
        $user = auth()->user();

        //recuperer le compte de l'etudiant
        $USR = User::findOrFail($user->id);
        $user['photo'] = $USR->photo == null ? '' : $USR->imageUrl();

        if ($user->id_etudiant) {
            $etudiant =  Etudiant::find($user->id_etudiant);
            //recuperer le collocateur de l'etudiant
            $colloc = Etudiant::where('id_logement', $etudiant->id_logement)->get();
            $colloc = $colloc->filter(function ($items) use ($etudiant) {
                return $items->id != $etudiant->id;
            });
            $logement = Logement::findOrFail($etudiant->id_logement);
            $logement['imageUrl'] = $logement->image == null ? '' : $logement->imageUrl();
        }

        return response()->json([
            'status' => 'success',
            'etudiant' => $etudiant ?? '',
            'logement' => $logement ?? '',
            'colloc' => $colloc ?? '',
            'user' => $user,
        ]);
    }

    public function login(LoginRequest $request)
    {
        $token = Auth::attempt($request->validated());
        if ($token) {
            return $this->responsewithToken($token, auth()->user());
        } else {
            return response()->json([
                'status' => 'Falied to connecting',
                'message' => 'invalid for login',
            ], 203);
        }
    }

 
    public function register(RegisterRequest $request)
    {
        $etudiant = Etudiant::find($request->id_etudiant);
        if ($etudiant) {
            if ($etudiant->email == $request->email) {
                # code...
                $user = User::create($request->validated());
                if ($user) {
                    $token = auth()->login($user);
                    return $this->responseWithToken($token, $user);
                } else {
                    return response()->json([
                        'status' => 'Falied',
                        'message' => 'Error lors du creation user...',
                    ]);
                }
            }
            return response()->json([
                'status' => 'Falied',
                'message' => 'Error de adresse email, different..',
            ]);
        }
    }


    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => true,
            'message' => 'user logout...',
        ]);
    }


    public function responseWithToken($token, $user)
    {
        return response()->json([
            'status' => 'success',
            'type' => 'bearer ',
            'user' => $user,
            'access_token' => $token,
        ]);
    }
}
