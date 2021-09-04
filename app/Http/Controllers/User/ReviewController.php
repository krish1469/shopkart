<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function ReviewStore(Request $request) {
        $product = $request->product_id;

        $request->validate([
            'summary' => 'required',
            'comment' => 'required',
        ]);

        Review::insert([
            'product_id' => $product,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'summary' => $request->summary,
            'rating' => $request->rating,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Review is submitted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // Admin Manage Review Methods

    public function PendingReview() {
        $review = Review::where('status', 0)->orderBy('id', 'DESC')->get();
        return view('backend.review.pending_review', compact('review'));
    }

    public function ReviewApprove($id) {
        Review::where('id', $id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Review Approved and Published Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function PublishedReview() {
        $review = Review::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('backend.review.published_review', compact('review'));
    }

    public function DeleteReview($id) {
        Review::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Review Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
