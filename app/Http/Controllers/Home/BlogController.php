<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function Blog()
    {
        $blog = Blog::latest()->get();
        return view('admin.blog.blog_listing',compact('blog'));
    }

    public function AddBlog()
    {
        $categories = BlogCategory::orderBy('blog_category','asc')->get();
        return view('admin.blog.blog_add',compact('categories'));
    }

    public function StoreBlog(Request $request)
    {
        if ($request->file('blog_image')) {
            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(430,327)->save('upload/blog_images/'.$name_gen);
            $save_url = 'upload/blog_images/'.$name_gen;
            Blog::insert([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'blog_image' => $save_url,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Blog Inserted',
                'alert-type' => 'success'
            );
            return redirect()->route('blog')->with($notification);
        }
    }
    
    public function EditBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::orderBy('blog_category','asc')->get();
        return view('admin.blog.blog_edit',compact('blog','categories'));
    }

    public function UpdateBlog(Request $request, $id)
    {
        if ($request->file('blog_image')) {
            $blog_image = Blog::findOrFail($id);
            $img = $blog_image->blog_image;
            unlink($img);
            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(430,327)->save('upload/blog_images/'.$name_gen);
            $save_url = 'upload/blog_images/'.$name_gen;
            Blog::findOrFail($id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'blog_image' => $save_url,
                'updated_t' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Blog updated with image',
                'alert-type' => 'success'
            );
            return redirect()->route('blog')->with($notification);
        }else{
            Blog::findOrFail($id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'updated_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Blog updated without image',
                'alert-type' => 'success'
            );
            return redirect()->route('blog')->with($notification);
        }
    }

    public function DeleteBlog($id)
    {
        $blog_image = Blog::findOrFail($id);
        $img = $blog_image->blog_image;
        unlink($img);
        Blog::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Blog deleted',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
