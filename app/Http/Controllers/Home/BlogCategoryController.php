<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function BlogCategory()
    {
        $category = BlogCategory::latest()->get();
        return view('admin.blog_category.blog_category_listing',compact('category'));
    }

    public function AddCategory()
    {
        return view('admin.blog_category.blog_category_add');
    }

    public function StoreCategory(Request $request)
    {
        BlogCategory::insert([
            'blog_category' => $request->blog_category,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Category Inserted',
            'alert-type' => 'success'
        );
        return redirect()->route('blog.category')->with($notification);
    }

    public function EditCategory($id)
    {
        $category = BlogCategory::findOrFail($id);
        return view('admin.blog_category.blog_category_edit',compact('category'));
    }

    public function UpdateCategory(Request $request, $id)
    {
        BlogCategory::findOrFail($id)->update([
            'blog_category' => $request->blog_category,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Category Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('blog.category')->with($notification);
    }
    
    public function DeleteCategory($id)
    {
        BlogCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Category deleted',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
