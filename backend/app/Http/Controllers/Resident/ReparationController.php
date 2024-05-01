<?php

namespace App\Http\Controllers\Resident;

use App\Http\Controllers\Controller;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReparationController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $Mainte = Maintenance::where('id_user', $id)->orderBy('created_at', 'desc')->get();

        $dataRes =  $Mainte->map(function ($items) {
            $user = $items['user'];
            $user['photo'] = $user->photo ? $user->imageUrl() : null;
            return [
                "id" => $items->id,
                "type" => $items->type_probleme,
                "design" => $items->description,
                "status" => $items->status,
                "image" =>  $items->image == null ? '' :$items->imageUrl() ,
                "user" => $user,
                // "user" => $items->user->imageUrl(),
                "date" => $items->created_at,
            ];
        })->values();

        return  $dataRes;
    }

    public function annulerDemande(Request $request)
    {
        $main = Maintenance::find($request->id);
        
        if ($main) {
            if ($main->image) {
                Storage::disk('public')->delete($main->image);
            }
            
            $Del =  $main->delete();
            if ($Del) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Reparation annuler avec successfully',
                ]);
            }
        }
    }
}
