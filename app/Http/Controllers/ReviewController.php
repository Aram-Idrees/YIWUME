<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request, Product $product)
    {
        // Validation and logic to store review for a product
        return redirect()->back()->with('success', 'Review submitted successfully!');
    }
}
