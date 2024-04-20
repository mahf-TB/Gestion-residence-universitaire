<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return User::paginate(1);
        return User::whereIn('type', ['P-service' , 'P-maintenance' , 'P-accueil'])->paginate(5);
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $user = User::create($request->validated());

        if ($user) {
            return response()->json([
                'status' => 'sucess',
                'message' => 'creation user est sucess...',
            ]);
        } else {
            return response()->json([
                'status' => 'Falied',
                'message' => 'Error lors du creation user...',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
            return User::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $res = $user->update($request->all());
        if ($res) {
            return response()->json([
                'status' => 'sucess',
                'message' => 'update user est sucess...',
            ]);
        } else {
            return response()->json([
                'status' => 'Falied',
                'message' => 'Error lors du update user...',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $res = $user->delete();
        if ($res) {
            return response()->json([
                'status' => 'sucess',
                'message' => 'suppression user est sucess...',
            ]);
        } else {
            return response()->json([
                'status' => 'Falied',
                'message' => 'Error lors du suppression user...',
            ]);
        }
    }
}
