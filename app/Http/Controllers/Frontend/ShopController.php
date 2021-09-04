<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function ShopPage() {
        $product = Product::query();

        if(!empty($_GET['category'])) {
            $slugs = explode(',', $_GET['category']);
            $catIds = Category::select('id')->whereIn('category_slug_en', $slugs)->pluck('id')->toArray();
            $products = $product->whereIn('category_id', $catIds)->paginate(6); 
        }
        if(!empty($_GET['brand'])) {
            $slugs = explode(',', $_GET['brand']);
            $brandIds = Brand::select('id')->whereIn('brand_slug_en', $slugs)->pluck('id')->toArray();
            $products = $product->whereIn('brand_id', $brandIds)->paginate(6); 
        }
        else {
            $products = Product::where('status', 1)->orderBy('id', 'DESC')->paginate(12);
        }

        $brands = Brand::orderBy('brand_name_en', 'ASC')->get();
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        return view('frontend.shop.shop_page', compact('products', 'categories', 'brands'));
    }

    public function ShopFilter(Request $request) {
        // dd($request->all());
        $data = $request->all();

        // Filter by Category
        $catUrl = "";
            if(!empty($data['category'])){
                foreach($data['category'] as $category) {
                    if(empty($catUrl)) {
                        $catUrl .= '&category='.$category;
                    }else {
                        $catUrl .= ','.$category;
                    }
                }
            }

        // Filter by Brand
        $brandUrl = "";
            if(!empty($data['brand'])){
                foreach($data['brand'] as $brand) {
                    if(empty($brandUrl)) {
                        $brandUrl .= '&brand='.$brand;
                    }else {
                        $brandUrl .= ','.$brand;
                    }
                }
            }


            return redirect()->route('shop.page',$catUrl.$brandUrl);
    }
}
