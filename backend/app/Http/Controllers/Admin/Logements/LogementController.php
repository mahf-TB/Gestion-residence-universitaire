<?php

namespace App\Http\Controllers\Admin\Logements;

use App\Http\Controllers\Controller;
use App\Http\Requests\BatimentRequest;
use App\Http\Requests\LogementRequest;
use App\Models\Batiment;
use App\Models\Logement;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class LogementController extends Controller
{

    public function index()
    {
        $Mainte = Logement::with('batiment')->get();
        $dataRes =  $Mainte->map(function ($items) {
            return [
                "id" => $items->id,
                "type_logement" => $items->type_logement,
                "num_logement" => $items->num_logement,
                "prix" => $items->prix,
                "image" =>  $items->image == null ? '' :$items->imageUrl() ,
                "isImage" => $items->image,
                "status" => $items->status,
                "batiment" => $items->batiment,
                "date" => $items->updated_at,
            ];
        })->values();

        return $dataRes;
    }
    public function getTypeLogement()
    {
        $type = Logement::select('type_logement')->distinct()->get();
        return response()->json([
            'status' => 'success',
            'dataType' => $type,
        ]);
    }
    public function getLogement(Request $request)
    {
        $type = $request->type_logement;
        $logement = Logement::where('type_logement', $type)->where('status', 'libre')->get();
        // dd();
        return response()->json([
            'status' => 'success',
            'logement' => $logement,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(LogementRequest $request)
    {
        try {
            $bat = Batiment::find($request->id_batiment);
            $log = Logement::where('num_logement', $request->num_logement)->where('id_batiment', $request->id_batiment)->get();
            $nbEtage = ($bat->nb_etages * 100) + 100;

            if (count($log) <= 0 &&  $nbEtage > $request->num_logement) {

                $data = $request->validated();
                $image = $request->file('image');

                if ($image && $request->hasFile('image')) {
                    $data['image'] = $image->store('/Logements', 'public');
                }

                $logement = Logement::create($data);
                if ($logement) {
                    return response()->json([
                        'status' => 'sucess',
                        'message' => 'Logement created successfully...',
                    ]);
                } else {
                    return response()->json([
                        'status' => 'failed',
                        'message' => 'Logement created failure...',
                    ]);
                }
            } else {

                if (count($log) > 0) {
                    return response()->json([
                        'status' => 'numero',
                        'message' => 'Numero de logement est deja enregistrer',
                    ]);
                } else {
                    return response()->json([
                        'status' => 'etage',
                        'message' => 'logement est au dela de etage et trop grand.',
                    ]);
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    } 

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       $loge =  Logement::with('batiment')->find($id);
       $loge['imageUrl'] = $loge->image==null?'':$loge->imageUrl();
       $loge['image'] = $loge->image;
        return $loge ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, LogementRequest $request)
    {
        $loge = Logement::findOrFail($id);
        if ($loge->image != $request->image){
            if ($loge->image ) {
                Storage::disk('public')->delete($loge->image);
            }
        }
        $data = $request->validated();
        $res = $loge->update($data);
        if ($res) {  
            return response()->json([
                'status' => 'success',
                'new' => $loge->fresh(),
                'message' => 'Logement updated successfully',
            ]);
        }
    }


    public function uploadImage(Request $request){
        if ($request->image_old) {
            Storage::disk('public')->delete($request->image_old);
        }
        $image = $request->file('image');
        if ( $image && $request->hasFile('image')) {
            $data = $image->store('/Logements', 'public');
            return $data;
        }

    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Logement = Logement::find($id);
        if ($Logement->image) {
            Storage::disk('public')->delete($Logement->image);
        }
        $isDelete =  $Logement->delete();
        if ($isDelete) {
            return response()->json([
                'status' => 'success',
                'message' => 'Logement delete successfully',
            ]);
        } else {
            return response()->json([
                'status' => 'Failure',
                'message' => 'Logement delete failed',
            ]);
        }
    }
}
