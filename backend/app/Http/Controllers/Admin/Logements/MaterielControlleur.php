<?php

namespace App\Http\Controllers\Admin\Logements;

use App\Http\Controllers\Controller;
use App\Http\Requests\MaterielRequest;
use App\Models\Materiel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaterielControlleur extends Controller
{
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
