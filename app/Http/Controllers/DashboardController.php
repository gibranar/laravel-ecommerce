<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        foreach($products as $product)
        {
            $product->total = $product->price_sell * $product->quantity;
            $product->margin = round(($product->price_sell - $product->price_buy)/$product->price_buy * 100, 2);
        }

        if($request->wantsJson())
        {
            return response()->json([
                'margins' => $products->sortBy('margin',SORT_REGULAR,true)->take(5)->values()->all(),
                'quantities' => $products->sortBy('quantity',SORT_REGULAR,true)->take(5)->values()->all(),
            ]);
        }
        return view('dashboard', compact('products'));
    }
}
