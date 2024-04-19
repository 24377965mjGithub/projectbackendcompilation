<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserManagement extends Controller
{

    public function addStaff(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8']
        ]);

        if (User::create([
            'name' => $request->name,
            'role' => 'staff',
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ])) {
            return response()->json('Staff Added Successfully.');
        }
    }

    public function updateName(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        $id = Auth::user()->id;
        if (User::where('id', $id)->update(['name' => $request->name])) {
            return response()->json('Name Updated Successfully.');
        }
    }

    public function updateEmail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);


        $id = Auth::user()->id;
        if (User::where('id', $id)->update(['email' => $request->email])) {
            return response()->json('Email Updated Successfully.');
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'oldpass' => ['required'],
            'newpass' => ['required']
        ]);

        $id = Auth::user()->id;
        $oldpass = Auth::user()->password;
        $oldpassInput = $request->oldpass;
        $newpassInput = $request->newpass;

        if (Hash::check($oldpassInput, $oldpass)) {
            if (User::where('id', $id)->update(['password' => Hash::make($newpassInput)])) {
                return response()->json('Password Updated Successfully.');
            }
        } else {
            return response()->json("Incorrect Password");
        }
    }

    public function deleteUser(Request $request)
    {
        $request->validate([
            'id' => ['required']
        ]);

        if (User::where('id', $request->id)->delete()) {
            return response()->json('User Deleted Successfully.');
        }
    }
}
