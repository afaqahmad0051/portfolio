<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function footer()
    {
        $footer = Footer::find(1);
        return view('admin.footer.footer_view',compact('footer'));
    }
    public function UpdateFooter(Request $request, $id)
    {
        Footer::findOrFail($id)->update([
            'number' => $request->number,
            'short_description' => $request->short_description,
            'country' => $request->country,
            'address' => $request->address,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
        ]);
        $notification = array(
            'message' => 'Footer updated',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
