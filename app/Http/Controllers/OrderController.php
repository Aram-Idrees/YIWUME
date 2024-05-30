<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Logic to store order
        return redirect()->back()->with('success', 'Order placed successfully!');
    }
}
