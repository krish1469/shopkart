<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPost;
use App\Models\Blog\BlogPostCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class BlogController extends Controller
{
    public function BlogCategory() {
        $blogcategory = BlogPostCategory::latest()->get();
        return view('backend.blog.category.category_view', compact('blogcategory'));
    }

    public function BlogCategoryStore(Request $request) {
        $request->validate([
            'blog_category_name_en' => 'required',
            'blog_category_name_hin' => 'required',
        ], [
            'blog_category_name_en.required' => 'Please Input Blog Category Name English',
            'blog_category_name_hin.required' => 'Please Input Blog Category Name Hindi',
        ]);

        BlogPostCategory::insert([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_hin' => $request->blog_category_name_hin,
            'blog_category_slug_en' => strtolower(str_replace(' ', '-', $request->blog_category_name_en)),
            'blog_category_slug_hin' => str_replace(' ', '-', $request->blog_category_name_hin),
            'created_at' =>Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Blog Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function BlogCategoryEdit($id) {
        $blogcategory = BlogPostCategory::findOrFail($id);
        return view('backend.blog.category.category_edit', compact('blogcategory'));
    }

    public function BlogCategoryUpdate(Request $request) {
        $blogcat_id = $request->id;

        BlogPostCategory::findOrFail($blogcat_id)->update([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_hin' => $request->blog_category_name_hin,
            'blog_category_slug_en' => strtolower(str_replace(' ', '-', $request->blog_category_name_en)),
            'blog_category_slug_hin' => str_replace(' ', '-', $request->blog_category_name_hin),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Blog Category Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('blog.category')->with($notification);
    }

    public function BlogCategoryDelete($id) {
        BlogPostCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Category Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }




    // -================================== View Blog Post All Methods =============================== //


    public function ManageBlogPost() {
        $blogpost = BlogPost::latest()->get();
        return view('backend.blog.post.manage_post', compact('blogpost'));
    }

    public function AddBlogPost() {
        $blogcategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::latest()->get();
        return view('backend.blog.post.post_add', compact('blogpost', 'blogcategory'));
    }

    public function BlogPostStore(Request $request) {
        $request->validate([
            'post_title_en' => 'required',
            'post_title_hin' => 'required',
            'category_id' => 'required',
            'post_image' => 'required',
            'post_details_en' => 'required',
            'post_details_hin' => 'required',
        ], [
            'post_title_en.required' => 'Please Input Blog Post Title English',
            'post_title_hin.required' => 'Please Input Blog Post title Hindi',
            'category_id.required' => 'Please select Blog Category',
            'post_image.required' => 'Please upload Blog post Image',
            'post_details_en.required' => 'Please Input Blog Post Details English',
            'post_details_hin.required' => 'Please Input Blog Post Details Hindi',
        ]);

        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(780, 433)->save('upload/blog-post/' . $name_gen);
        $save_url = 'upload/blog-post/' . $name_gen;

        BlogPost::insert([
            'category_id' => $request->category_id,
            'post_title_en' => $request->post_title_en,
            'post_title_hin' => $request->post_title_hin,
            'post_slug_en' => strtolower(str_replace(' ', '-', $request->post_title_en)),
            'post_slug_hin' => str_replace(' ', '-', $request->post_title_hin),
            'post_image' => $save_url,
            'post_details_en' => $request->post_details_en,
            'post_details_hin' => $request->post_details_hin,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Blog Post Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage.post')->with($notification);
    }

    public function BlogPostEdit($id) {
        $blogcategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::findOrFail($id);
        return view('backend.blog.post.post_edit', compact('blogpost', 'blogcategory'));
    }

    public function BlogPostDataUpdate(Request $request) {
        $post_id = $request->id;
        BlogPost::findOrFail($post_id)->update([
            'category_id' => $request->category_id,
            'post_title_en' => $request->post_title_en,
            'post_title_hin' => $request->post_title_hin,
            'post_slug_en' => strtolower(str_replace(' ', '-', $request->post_title_en)),
            'post_slug_hin' => str_replace(' ', '-', $request->post_title_hin),
            'post_details_en' => $request->post_details_en,
            'post_details_hin' => $request->post_details_hin,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Blog Post Updated Without Image Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage.post')->with($notification);
    }

    public function PostThumbnailImageUpdate(Request $request) {
        $post_id = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);

        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(780, 433)->save('upload/blog-post/' . $name_gen);
        $save_url = 'upload/blog-post/' . $name_gen;

        BlogPost::findOrFail($post_id)->update([
            'post_image' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Blog Post Thumbnail Image Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage.post')->with($notification);
    }

    public function BlogPostDelete($id) {
        $blogpost = BlogPost::findOrFail($id);
        unlink($blogpost->post_image);
        BlogPost::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Post Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
