<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        return view('user.pages.contact');
    }

    public function StoreMessage(Request $request)
    {
        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Your Message Send Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);           
    }

    public function contactList()
    {
        $contact = Contact::latest()->get();
        return view('admin.contact.contact_list',compact('contact'));
    }

    public function contactDelete($id)
    {
        Contact::findOrFail($id)->delete();
        $notification = array(
            'message' => 'User Message Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);           
    }
}
