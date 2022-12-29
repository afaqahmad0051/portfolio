<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PortfolioController extends Controller
{
    public function portfolio()
    {
        $portfolio = Portfolio::latest()->get();
        return view('admin.portfolio.portfolio_listing',compact('portfolio'));
    }

    public function Addportfolio()
    {
        return view('admin.portfolio.portfolio_add');
    }

    public function StorePortfolio(Request $request)
    {
        $request->validate([
            'portfolio_name' => 'required',
            'portfolio_title' => 'required',
            'portfolio_image' => 'required',
        ]);
        if ($request->file('portfolio_image')) {
            $image = $request->file('portfolio_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1020,519)->save('upload/portfolio_images/'.$name_gen);
            $save_url = 'upload/portfolio_images/'.$name_gen;
            Portfolio::insert([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
                'portfolio_image' => $save_url,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Portfolio Inserted',
                'alert-type' => 'success'
            );
            return redirect()->route('portfolio')->with($notification);
        }
    }

    public function EditPortfolio($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.portfolio_edit',compact('portfolio'));
    }

    public function UpdatePortfolio(Request $request, $id)
    {
        if ($request->file('portfolio_image')) {
            $portfolio_image = Portfolio::findOrFail($id);
            $img = $portfolio_image->portfolio_image;
            unlink($img);
            $image = $request->file('portfolio_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1020,519)->save('upload/portfolio_images/'.$name_gen);
            $save_url = 'upload/portfolio_images/'.$name_gen;
            Portfolio::findOrFail($id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
                'portfolio_image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Portfolio updated with image',
                'alert-type' => 'success'
            );
            return redirect()->route('portfolio')->with($notification);
        }else{
            Portfolio::findOrFail($id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
                'updated_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Portfolio updated without image',
                'alert-type' => 'success'
            );
            return redirect()->route('portfolio')->with($notification);
        }
    }

    public function DeletePortfolio($id)
    {
        $portfolio_image = Portfolio::findOrFail($id);
        $img = $portfolio_image->portfolio_image;
        unlink($img);
        Portfolio::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Portfolio deleted',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function PortfolioDetails($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('user.pages.portfolio',compact('portfolio'));
    }
}
