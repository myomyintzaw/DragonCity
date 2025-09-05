<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Validate;

class UserController extends Controller
{
    //Profile
    public function profile()
    {
        return view('profile');
    }

    //Profile Edit
    public function edit(Request $request)
    {
        // dd($request->toArray());
        //Validation
        $this->vali($request);

        //Data Arrange
        $data = $this->dataArrange($request);


        //Image Store
        if ($request->hasFile('image')) {
            $dbImage = User::where('id', Auth::user()->id)->value('image');

            //Delete old image from storage file
            if ($dbImage != null) {
                Storage::delete('public/profile/' . $dbImage);
            }
            $imageName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/profile', $imageName);

            $data['image'] = $imageName;
        }
        //   dd($data->toArray());
        //   dd($registers->toArray());
        User::where('id', Auth::user()->id)->update($data);

        return back()->with(['success' => 'profile update success..']);
    }

    // Change Password
    public function password(Request $request)
    {
        // dd($request->toArray());

        $this->passwordVali($request);

        $dbData = User::where('id', Auth::user()->id)->first();
        $dbPassword = $dbData->password;
        if (Hash::check($request->oldPassword, $dbPassword)) {
            $newPassword = Hash::make($request->newPassword);
            User::where('id', Auth::user()->id)->update(['password' => $newPassword]);

            Auth::guard('web')->logout();
            return redirect()->route('login')->with(['success'=>'Change password success']);
        }else{
            return back()->with(['error'=>'old password do not match']);
        }

        // dd('validation success');
    }


    //Private function Change Password Validation
    private function passwordVali($request)
    {
        $rules = [
            'oldPassword' => 'required',
            'newPassword' => 'required | min:6 | different:oldPassword',
            'confirmPassword' => 'required|same:newPassword',
        ];

        Validator::make($request->all(), $rules)->validate();
    }


    //Private Function for Data Arrange
    private function dataArrange($request)
    {
        return [
            'name' => $request->name,
            'gender' => $request->gender,
            'age' => $request->age,
            'phone' => $request->phone,
            'address' => $request->address
        ];
    }


    //Private Function for Validation
    private function vali($request)
    {
        $rules = [
            'name' => 'required | string',
            'age' => 'required',
            'phone' => 'required',
            'image' => 'image | mimes:jpeg,jpg,png',
            'address'=>'required',
        ];
        //  | between:13,100
        $message = [
            'name.required' => 'please enter your name',
            'name.string' => 'only letter accepted',
            'age.required' => 'please enter your age',
            // 'age.between' => 'must between 13 and 100',
            'phone.required' => 'please enter your phone',
            'image.image' => 'image file type only accepted',
            'image.mimes' => 'image format must be jpeg,jpg or png'

        ];
        Validator::make($request->all(), $rules, $message)->validate();
    }
}
