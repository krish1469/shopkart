<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPost;
use App\Models\Blog\BlogPostCategory;
use Illuminate\Http\Request;

class UserBlogController extends Controller
{
    public function AddBlogPost() {
        $blogcategory = BlogPostCategory::latest()->paginate(3);
        $blogpost = BlogPost::latest()->paginate(3);
        return view('frontend.blog.blog_list', compact('blogcategory', 'blogpost'));
    }

    public function BlogPostDetails($id) {
        $blogcategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::findOrFail($id);
        return view('frontend.blog.blog_details', compact('blogpost', 'blogcategory'));
    }

    public function BlogCategoryWisePost($category_id) {
        $blogcategory = BlogPostCategory::latest()->paginate(3);
        $blogpost = BlogPost::where('category_id', $category_id)->orderBy('id', 'DESC')->paginate(3);
        return view('frontend.blog.blog_categorywise_list', compact('blogcategory', 'blogpost'));
    }
}
