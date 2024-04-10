<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ManagerOrderController extends Controller
{
    public function index() {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return view('frontend.manager-orders', compact('orders'));
    }
}
