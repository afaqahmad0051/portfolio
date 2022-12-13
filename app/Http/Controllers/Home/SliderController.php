<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlide;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    public function HomeSlider()
    {
        $homeSlide = HomeSlide::find(1);
        return view('admin.home_slide.slider_all',compact('homeSlide'));
    }

    public function UpdateSlider(Request $request, $id)
    {
        if ($request->file('home_slide')) {
            $image = $request->file('home_slide');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(636,852)->save('upload/slider_images/'.$name_gen);
            $save_url = 'upload/slider_images/'.$name_gen;
            HomeSlide::findOrFail($id)->update([
                'title' => $request->title,                
                'short_title' => $request->short_title,                
                'video_url' => $request->video_url,                
                'home_slide' => $save_url,                
            ]);
            $notification = array(
                'message' => 'Slider updated with image',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            HomeSlide::findOrFail($id)->update([
                'title' => $request->title,                
                'short_title' => $request->short_title,                
                'video_url' => $request->video_url,           
            ]);
            $notification = array(
                'message' => 'Slider updated without image',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
}
