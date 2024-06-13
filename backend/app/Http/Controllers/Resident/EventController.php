<?php

namespace App\Http\Controllers\Resident;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Evenement;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $data = Evenement::with('user')->orderBy('updated_at', 'desc')->get();
        return response()->json([
            'data' => $data,
            'message' => 'All Evenement',
            'status' =>  true
        ]);
    }
    public function addEnvenement(EventRequest $request)
    {
        $data = $request->validated();
        $dateEvenement = Carbon::parse($data['date_evenement']);
        //$dateEvenement = Carbon::createFromFormat('Y-m-d H:i:s', $data['date_evenement']);
        $data['date_evenement'] = $dateEvenement;
        $main = Evenement::create($data);
        return response()->json([
            'data' => $main,
            'message' => 'Enregistrer bien effectuer',
            'status' =>  true
        ]);
    }
}
