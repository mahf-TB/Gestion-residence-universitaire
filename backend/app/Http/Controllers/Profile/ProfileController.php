<?php

namespace App\Http\Controllers\Profile;

use App\Customs\Services\PasswordService;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
        public function __construct(private  PasswordService $service)
        {
        }

        /**
         * Method pour changer le password
         */
        public function changeUserPassword(PasswordRequest $request)
        {
                return $this->service->changePassword($request->validated());
        }

        public function ajouterPhotoProfile(Request $request)
        {
                $user = auth()->user();
                $data = $request->all();
                $image = $request->file('photo');

                if ($user->photo) {
                        Storage::disk('public')->delete($user->photo);
                }
                if ($image && $request->hasFile('photo')) {
                        $data['photo'] = $image->store('/Profile', 'public');
                }

                $res = $user->update($data);

                if ($res) {
                        return response()->json([
                                'status' => 'success',
                                'message' => 'Uploaded Image updated successfully',
                        ]);
                }
        }
        
}
