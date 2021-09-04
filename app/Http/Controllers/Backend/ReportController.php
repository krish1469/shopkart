<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use DateTime;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function ReportView() {
        return view('backend.reports.report_view');
    }

    public function SearchByDate(Request $request) {
        // return $request->all();
        $date = new DateTime($request->date);
        $formatDate = $date->format('d F Y');
        // return $formatDate;
        $orders = Order::where('order_date', $formatDate)->latest()->get();
        return view('backend.reports.report_show', compact('orders'));
    }

    public function SearchByMonth(Request $request) {
        $orders = Order::where('order_month', $request->month)->where('order_year', $request->year)->latest()->get();
        return view('backend.reports.report_show', compact('orders'));
    }

    public function SearchByYear(Request $request) {
        $orders = Order::where('order_year', $request->year)->latest()->get();
        return view('backend.reports.report_show', compact('orders'));
    }
}
