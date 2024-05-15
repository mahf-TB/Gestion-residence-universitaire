<?php

namespace App\Http\Controllers\Resident;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NotifController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }
    
    public function indexNotification(){
        $data = Notification::orderBy('created_at', 'desc')->get();
        return $data->map(function ($items) {
            $message =  json_decode($items->message);
            $service = Service::with('user')->find($message->id_service);
            if ($items->user_id){
                $user = User::find($items->user_id);
            }
            return [
                "id" => $items->id,
                "read" => $items->read,
                "message" => $message ,
                "user" => $user ?? '' ,
                "service" => $service ,
                "image" =>  Storage::disk('public')->url($message->image),
                "date" => $items->updated_at,
            ];
        })->values();
    }

    public function readAll(Request $request){
        if ($request->id) {
            return  Notification::find($request->id)->update(['read' => 1]);
        }
        return  Notification::where('read' , 0)->update(['read' => 1]);
       
    }
}
