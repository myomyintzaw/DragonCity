<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    //Contact From Customer
    public function contact(Request $request)
    {
        // dd($request->toArray());

        $this->vali($request);
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        return back()->with(['success' => 'Thank for sending contact message, after will be rely email or phone.']);
    }

    //Contact List (Admin Dashboard)
    public function list()
    {
        $data = Contact::paginate(10);
        return view('admin.contactList', compact('data'));
    }


    //Contact Detail
    public function detail($id)
    {
        $data = Contact::where('id', $id)->first();
        return view('admin.contactDetail', compact('data'));
    }


    //Contact Delete
    public function delete($id)
    {
        Contact::where('id', $id)->delete();
        return back()->with(['success' => 'Contact message remove done.']);
    }




    //Private function for Validation
    private function vali($request)
    {
        $rules = [
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required',
        ];

        Validator::make($request->all(), $rules)->validate();
    }
}
