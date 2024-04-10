<?php

namespace App\Customs\Services;

use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Hash;

class PasswordService
{

    /**
     * Method pour changer motdepasse
     */
    public function changePassword($data)
    {
        // $this->validateCurrentPassword($data['current_password']);
        if (password_verify($data['current_password'], auth()->user()->password)) {
            //update passeword
            $updatePassword = auth()->user()->update([
                'password' => Hash::make($data['password'])
            ]);
            if ($updatePassword) {
                return response()->json([
                    'status' => 201,
                    'message' => 'password user update successfully'
                ]);
            } else {
                return response()->json([
                    'status' => 402,
                    'message' => 'password user update failed'
                ]);
            }
        }else {
            return response()->json([
                'status' => 402,
                'message' => 'Current password is incorrect.'
            ]);
        }
    }
}
