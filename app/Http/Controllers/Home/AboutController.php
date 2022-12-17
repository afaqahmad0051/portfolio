<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Image;

class AboutController extends Controller
{
    public function about()
    {
        $about = About::find(1);
        return view('admin.about.about_view',compact('about'));
    }

    public function UpdateAbout(Request $request, $id)
    {
        if ($request->file('about_image')) {
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(523,605)->save('upload/admin_images/'.$name_gen);
            $save_url = 'upload/admin_images/'.$name_gen;
            About::findOrFail($id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'about_description' => $request->about_description,
                'skills_description' => $request->skills_description,
                'about_image' => $save_url,
            ]);
            $notification = array(
                'message' => 'About updated with image',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            About::findOrFail($id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'about_description' => $request->about_description,
                'skills_description' => $request->skills_description,
            ]);
            $notification = array(
                'message' => 'About updated without image',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function HomeAbout()
    {
        $about = About::find(1);
        return view('user.pages.about',compact('about'));
    }

    public function AboutMultiImage()
    {
        return view('admin.about.about_images');
    }

    public function StoreMultiImage(Request $request)
    {
        $images = $request->file('multi_image');
        foreach ($images as $image) {
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(523,605)->save('upload/admin_images/'.$name_gen);
            $save_url = 'upload/admin_images/'.$name_gen;
            About::findOrFail($id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'about_description' => $request->about_description,
                'skills_description' => $request->skills_description,
                'about_image' => $save_url,
            ]);
            $notification = array(
                'message' => 'About updated with image',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);           
        }
    }
}
