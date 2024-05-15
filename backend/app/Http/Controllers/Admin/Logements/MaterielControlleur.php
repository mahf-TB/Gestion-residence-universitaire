<?php

namespace App\Http\Controllers\Admin\Logements;

use App\Http\Controllers\Controller;
use App\Http\Requests\MaterielRequest;
use App\Models\Materiel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaterielControlleur extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }
    public function index(){
        $Mainte = Materiel::where('id_user', auth()->user()->id)->get();
        $dataRes =  $Mainte->map(function ($items) {
            return [
                "id" => $items->id,
                "nom" => $items->nom,
                "description" => $items->description,
                "qte" => $items->qte,
                "image" =>  $items->image == null ? '' :$items->imageUrl() ,
                "isImage" => $items->image,
                "date" => $items->updated_at,
            ];
        })->values();
        return $dataRes;
    }
    //
    public function store(MaterielRequest $request){
        $data = $request->validated();
        $image = $request->file('image');

        if ($image && $request->hasFile('image')) {
            // dd($request->file('image'));
            $data['image'] = $image->store('/Materiel/user-'. auth()->user()->id, 'public');
        }

        $creat = Materiel::create($data);

        if ($creat){
            return response()->json([
                'status' => 'sucess',
                'message' => 'Logement created successfully...',
            ]);
        }
    }

    public function deleteMateriel($id){
        $materiel = Materiel::find($id);
        if ($materiel->image) {
            Storage::disk('public')->delete($materiel->image);
        }
        $isDelete =  $materiel->delete();
        if ($isDelete) {
            return response()->json([
                'status' => 'success',
                'message' => 'materiel delete successfully',
            ]);
        } else {
            return response()->json([
                'status' => 'Failure',
                'message' => 'materiel delete failed',
            ]);
        }
    }
}
