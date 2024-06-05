<?php

namespace App\Http\Controllers\Admin;

use App\Events\HelloEvents;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $user = User::whereIn('type', ['P-service' , 'P-maintenance' , 'P-accueil'])->paginate(5);
        // event(new HelloEvents($user->items()));
        foreach ($user as $item){

            $item['photo'] =$item->photo ? $item->imageUrl(): '';
        }
        return $user;
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
