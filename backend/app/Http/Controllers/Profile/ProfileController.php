<?php

namespace App\Http\Controllers\Profile;

use App\Customs\Services\PasswordService;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
        public function __construct(private  PasswordService $service){}

        /**
         * Method pour changer le password
         */
        public function changeUserPassword(PasswordRequest $request){
                return $this->service->changePassword($request->validated());
        }
}
