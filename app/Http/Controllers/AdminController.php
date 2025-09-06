<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //Dashboard
    public function dashboard()
    {
        return view('admin.admin-dashboard');
    }

    //User Account List
    public function userList()
    {
        $data = User::where('role', 'user')->paginate(10);
        return view('admin.userList', compact('data'));
    }

    //User Account Detial
    public function userDetail($id)
    {
        // dd($id);
        $user = user::where('id', $id)->first();
        return view('admin.UserDetail', compact('user'));
    }


    // User Account Promote to Admin
    public function promote($id)
    {
        User::where('id', $id)->update(['role' => 'admin']);
        return redirect()->route('user.list')->with(['success' => 'User role has been done as Admin']);
    }

    //User Account Delete
    public function userDelete($id)
    {
        $dbImage = User::where('id', $id)->value('image');
        if ($dbImage != NULL) {
            Storage::delete('public/profile/' . $dbImage);
        }
        User::where('id', $id)->delete();
        return back()->with(['success' => 'User account has been removed.']);
    }







    //Admin Account List
    public function adminList()
    {
        $data = User::where('role', 'admin')->paginate(10);
        return view('admin.adminList', compact('data'));
    }

    //Admin Account Detial
    public function adminDetail($id)
    {
        // dd($id);
        $admin = user::where('id', $id)->first();
        return view('admin.adminDetail', compact('admin'));
    }

    // Admin Account Demote as user
    public function demote($id)
    {
        User::where('id', $id)->update(['role' => 'user']);
        return redirect()->route('admin.list')->with(['success' => 'Admin role has been demote as User']);
    }


    //Admin Account Delete
    public function adminDelete($id)
    {
        $dbImage = User::where('id', $id)->value('image');
        if ($dbImage != NULL) {
            Storage::delete('public/profile/' . $dbImage);
        }
        User::where('id', $id)->delete();
        return back()->with(['success' => 'Admin account has been removed!']);
    }
}
