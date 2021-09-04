<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Image;

class AdminUserController extends Controller
{
    public function AllAdminUserRole() {
        $adminuser = Admin::where('type', 2)->latest()->get();
        return view('backend.role.all_admin_users_role', compact('adminuser'));
    }

    public function AddAdminUserRole() {
        return view('backend.role.admin_users_role_create');
    }

    public function StoreAdminUserRole(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            // 'phone' => 'required',
            'password' => 'required',
        ], [
            'name.required' => 'Please Input Admin User Name English',
            'email.required' => 'Please Input Admin User Email Hindi',
            // 'phone.required' => 'Please Input Admin User Contact Number',
            'password.required' => 'Please Input Admin User Password',
        ]);

        $image = $request->file('profile_photo_path');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(225, 225)->save('upload/admin_images/' . $name_gen);
        $save_url = 'upload/admin_images/' . $name_gen;

        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'brand' => $request->brand,
            'category' => $request->category,
            'product' => $request->product,
            'slider' => $request->slider,
            'coupons' => $request->coupons,
            'shipping' => $request->shipping,
            'blog' => $request->blog,
            'setting' => $request->setting,
            'orders' => $request->orders,
            'returnorders' => $request->returnorders,
            'stock' => $request->stock,
            'review' => $request->review,
            'reports' => $request->reports,
            'alluser' => $request->alluser,
            'adminuserrole' => $request->adminuserrole,
            'type' => 2,
            'profile_photo_path' => $save_url,
            'created_at' => Carbon::now(),
            
        ]);

        $notification = array(
            'message' => 'Admin User Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.admin.users')->with($notification);
    }

    public function EditAdminUserRole($id) {
        $adminuser = Admin::findOrFail($id);
        return view('backend.role.admin_users_role_edit', compact('adminuser'));
    }

    public function UpdateAdminUserRole(Request $request) {
        $admin_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('profile_photo_path')) {
            unlink($old_img);
            $image = $request->file('profile_photo_path');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(225, 225)->save('upload/admin_images/' . $name_gen);
            $save_url = 'upload/admin_images/' . $name_gen;

            Admin::findOrFail($admin_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'brand' => $request->brand,
                'category' => $request->category,
                'product' => $request->product,
                'slider' => $request->slider,
                'coupons' => $request->coupons,
                'shipping' => $request->shipping,
                'blog' => $request->blog,
                'setting' => $request->setting,
                'orders' => $request->orders,
                'returnorders' => $request->returnorders,
                'stock' => $request->stock,
                'review' => $request->review,
                'reports' => $request->reports,
                'alluser' => $request->alluser,
                'adminuserrole' => $request->adminuserrole,
                'type' => 2,
                'profile_photo_path' => $save_url,
                'created_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Admin User Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.admin.users')->with($notification);
        } else {
            Admin::findOrFail($admin_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'brand' => $request->brand,
                'category' => $request->category,
                'product' => $request->product,
                'slider' => $request->slider,
                'coupons' => $request->coupons,
                'shipping' => $request->shipping,
                'blog' => $request->blog,
                'setting' => $request->setting,
                'orders' => $request->orders,
                'returnorders' => $request->returnorders,
                'stock' => $request->stock,
                'review' => $request->review,
                'reports' => $request->reports,
                'alluser' => $request->alluser,
                'adminuserrole' => $request->adminuserrole,
                'type' => 2,
                'created_at' => Carbon::now(),
                
            ]);

            $notification = array(
                'message' => 'Admin User Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.admin.users')->with($notification);
        }
    }

    public function DeleteAdminUserRole($id) {
        $adminimg = Admin::findOrFail($id);
        $img = $adminimg->profile_photo_path;
        unlink($img);

        Admin::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Admin User Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
