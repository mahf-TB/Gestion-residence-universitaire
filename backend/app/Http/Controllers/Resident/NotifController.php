<?php

namespace App\Http\Controllers\Resident;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotifController extends Controller
{
    public function indexNotification(){
        $data = Notification::orderBy('created_at', 'desc')->get();
        return $data;
    }

    public function readAll(Request $request){
        if ($request->id) {
            return  Notification::find($request->id)->update(['read' => 1]);
        }
        return  Notification::where('read' , 0)->update(['read' => 1]);
       
    }
}
