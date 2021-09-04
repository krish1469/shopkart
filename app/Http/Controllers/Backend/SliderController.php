<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    public function SliderView() {
        $sliders = Slider::latest()->get();
        return view('backend.slider.slider_view', compact('sliders'));
    }

    public function SliderStore(Request $request) {
        $request->validate([
            'slider_img' => 'required',
        ], [
            'slider_img.required' => 'Please Upload Slider Image',
        ]);

        $image = $request->file('slider_img');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(870, 370)->save('upload/slider/' . $name_gen);
        $save_url = 'upload/slider/' . $name_gen;

        Slider::insert([
            'title_en' => $request->title_en,
            'title_hin' => $request->title_hin,
            'title_slug_en' => strtolower(str_replace(' ', '-', $request->title_en)),
            'title_slug_hin' => str_replace(' ', '-', $request->title_hin),
            'description_en' => $request->description_en,
            'description_hin' => $request->description_hin,
            'slider_img' => $save_url,
        ]);

        $notification = array(
            'message' => 'Slider Inserted Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->back()->with($notification);
    }

    public function SliderEdit($id) {
        $sliders = Slider::findOrFail($id);
        return view('backend.slider.slider_edit', compact('sliders'));
    }

    public function SliderUpdate(Request $request){
        $slider_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('slider_img')) {

            unlink($old_img);
            $image = $request->file('slider_img');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(870, 370)->save('upload/slider/' . $name_gen);
            $save_url = 'upload/slider/' . $name_gen;

            Slider::findOrFail($slider_id)->update([
                'title_en' => $request->title_en,
                'title_hin' => $request->title_hin,
                'title_slug_en' => strtolower(str_replace(' ', '-', $request->title_en)),
                'title_slug_hin' => str_replace(' ', '-', $request->title_hin),
                'description_en' => $request->description_en,
                'description_hin' => $request->description_hin,
                'slider_img' => $save_url,
            ]);

            $notification = array(
                'message' => 'Slider Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('manage.slider')->with($notification);
        } else {
            Slider::findOrFail($slider_id)->update([
                'title_en' => $request->title_en,
                'title_hin' => $request->title_hin,
                'title_slug_en' => strtolower(str_replace(' ', '-', $request->title_en)),
                'title_slug_hin' => str_replace(' ', '-', $request->title_hin),
                'description_en' => $request->description_en,
                'description_hin' => $request->description_hin,
            ]);

            $notification = array(
                'message' => 'Slider Updated Without Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('manage.slider')->with($notification);
        }
    }

    public function SliderDelete($id) {
        $slider = Slider::findOrFail($id);
        $img = $slider->slider_img;
        unlink($img);
        Slider::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Slider Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    // Product Active And Inactive Update //
    public function SliderInactive($id) {
        Slider::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Slider is Inactive Now',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function SliderActive($id) {
        Slider::findOrFail($id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Slider is Active Now',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
