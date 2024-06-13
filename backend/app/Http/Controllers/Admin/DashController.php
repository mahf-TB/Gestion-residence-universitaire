<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use App\Models\Logement;
use App\Models\User;
use Illuminate\Http\Request;

class DashController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }

    public function index(){
        $data = [
            "etudiants" => Etudiant::get()->count(),
            "logements" => Logement::get()->count(),
            "users" => User::get()->count(),
        ];
        return $data;
    }

    public function index_staff()
    {
       $user = User::where('type', '!=' , 'user')->paginate(5);
        // event(new HelloEvents($user->items()));
        foreach ($user as $item){

            $item['photo'] =$item->photo ? $item->imageUrl(): '';
        }
        return $user;
    }

}
