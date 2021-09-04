<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    public function AddProduct(){
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.product_add', compact('categories', 'brands'));
    }

    public function StoreProduct(Request $request) {
        $request->validate([
            'brand_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_id' => 'required',
            'product_name_en' => 'required',
            'product_name_hin' => 'required',
            'product_code' => 'required',
            'product_qty' => 'required',
            'product_tags_en' => 'required',
            'product_tags_hin' => 'required',
            'product_size_en' => 'required',
            // 'product_size_hin' => 'required',
            // 'product_color_en' => 'required',
            // 'product_color_hin' => 'required',
            // 'selling_price' => 'required',
            // 'discount_price' => 'required',
            'short_descp_en' => 'required',
            'short_descp_hin' => 'required',
            'long_descp_en' => 'required',
            'long_descp_hin' => 'required',
            'product_thumbnail' => 'required',
            'multi_img' => 'required',
            'file' =>'required|mimes:jpeg,png,jpg,zip,pdf|max:30720',
        ], [
            'brand_id.required' => 'Please Select Brand',
            'category_id.required' => 'Please Select Category',
            'subcategory_id.required' => 'Please Select Sub Category',
            'subsubcategory_id.required' => 'Please Select Sub-Sub Category',
            'product_name_en.required' => 'Please Input Product Name English',
            'product_name_hin.required' => 'Please Input Product Name Hindi',
            'product_code.required' => 'Please Input Product Code',
            'product_qty.required' => 'Please Input Product Quantity',
            'product_tags_en.required' => 'Please Input Product Tags English',
            'product_tags_hin.required' => 'Please Input Product Tags Hindi',
            // 'product_size_en.required' => 'Please Input Product Size English',
            // 'product_size_hin.required' => 'Please Input Product Size Hindi',
            // 'product_color_en.required' => 'Please Input Product Colour English',
            // 'product_color_hin.required' => 'Please Input Product Colour Hindi',
            'selling_price.required' => 'Please Input Selling Price',
            // 'discount_price.required' => 'Please Input Discount Price',
            'short_descp_en.required' => 'Please Input Short Description English',
            'short_descp_hin.required' => 'Please Input Short Description Hindi',
            'long_descp_en.required' => 'Please Input Long Description English',
            'long_descp_hin.required' => 'Please Input Long Description English',
            'product_thumbnail.required' => 'Please Upload Product Thumbnail',
            'multi_img.required' => 'Please Upload Product Images',
        ]);

        if($files = $request->file('file')) {
            $destinationPath = 'upload/pdf'; // upload path
            $digitalItem = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath,$digitalItem);
        }

        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thumbnail/' . $name_gen);
        $save_url = 'upload/products/thumbnail/' . $name_gen;

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_hin' => $request->product_name_hin,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_hin' => str_replace(' ', '-', $request->product_name_hin),
            'product_code' => $request->product_code,

            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_hin' => $request->product_tags_hin,
            'product_size_en' => $request->product_size_en,
            'product_size_hin' => $request->product_size_hin,
            'product_color_en' => $request->product_color_en,
            'product_color_hin' => $request->product_color_hin,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_hin' => $request->short_descp_hin,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_hin' => $request->long_descp_hin,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'product_thumbnail' => $save_url,
            'digital_file' => $digitalItem,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        // Mutiple Images Upload Start //
        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/multi_images/' . $make_name);
            $uploadPath = 'upload/products/multi_images/' . $make_name;

            MultiImg::insert([
                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),
            ]);
        }
        // End Multiple Images Upload //

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage.product')->with($notification);

    }

    public function ManageProduct() {
        $products = Product::latest()->get();
        return view('backend.product.product_view', compact('products'));
    }

    public function ProductDetails($id) {
        $multiImgs = MultiImg::where('product_id', $id)->get();

        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();
        $products = Product::findOrFail($id);
        return view('backend.product.product_details', compact('categories', 'brands', 'subcategory', 'subsubcategory', 'products', 'multiImgs'));
    }

    public function EditProduct($id) {
        $multiImgs = MultiImg::where('product_id', $id)->get();

        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();
        $products = Product::findOrFail($id);
        return view('backend.product.product_edit', compact('categories', 'brands', 'subcategory', 'subsubcategory', 'products', 'multiImgs'));
    }

    public function ProductDataUpdate(Request $request) {
        $product_id = $request->id;
        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_hin' => $request->product_name_hin,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_hin' => str_replace(' ', '-', $request->product_name_hin),
            'product_code' => $request->product_code,

            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_hin' => $request->product_tags_hin,
            'product_size_en' => $request->product_size_en,
            'product_size_hin' => $request->product_size_hin,
            'product_color_en' => $request->product_color_en,
            'product_color_hin' => $request->product_color_hin,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_hin' => $request->short_descp_hin,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_hin' => $request->long_descp_hin,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Updated Without Image Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage.product')->with($notification);
    }

    // Multiple Image //
    public function MultiImageUpdate(Request $request) {
        $imgs = $request->multi_img;

        foreach($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name); 

            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/multi_images/'.$make_name);
            $uploadPath = 'upload/products/multi_images/'.$make_name;

            MultiImg::where('id',$id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),  
            ]);
        } // End For each

        $notification = array(
            'message' => 'Product Images Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // Product Main Thumbnail Update //
    public function ThumbnailImageUpdate(Request $request) {
        $pro_id = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);

        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thumbnail/' . $name_gen);
        $save_url = 'upload/products/thumbnail/' . $name_gen;

        Product::findOrFail($pro_id)->update([
            'product_thumbnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Thumbnail Image Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // MultiImage Delete //
    public function MultiImageDelete($id) {
        $oldimg = MultiImg::findOrFail($id);
        unlink($oldimg->photo_name);
        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Image Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // Product Active And Inactive Update //
    public function ProductInactive($id) {
        Product::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Product is Inactive Now',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function ProductActive($id) {
        Product::findOrFail($id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Product is Active Now',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // Delete Products //
    public function ProductDelete($id) {
        $product = Product::findOrFail($id);
        unlink($product->product_thumbnail);
        Product::findOrFail($id)->delete();
        
        $images = MultiImg::where('product_id', $id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            MultiImg::where('product_id', $id)->delete();
        }

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    // Stock Management Methods

    public function ProductStock() {
        $products = Product::latest()->get();
        return view('backend.product.product_stock', compact('products'));
    }

}
