<?php

namespace App\Http\Controllers\Resident;

use App\Http\Controllers\Controller;
use App\Models\Maintenance;
use Illuminate\Http\Request;

class ReparationController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $Mainte = Maintenance::where('id_user', $id)->orderBy('created_at', 'desc')->get();

        $dataRes =  $Mainte->map(function ($items) {
            return [
                "id" => $items->id,
                "type" => $items->type_probleme,
                "design" => $items->description,
                "status" => $items->status,
                "image" => $items->imageUrl(),
                "user" => $items->user->username,
                "date" => $items->created_at,
            ];
        })->values();

        return  $dataRes;
    }

    public function annulerDemande()
    {
        
    }
}
