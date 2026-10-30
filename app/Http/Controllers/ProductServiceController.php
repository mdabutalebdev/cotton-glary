<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\View\View;

class ProductServiceController extends Controller
{
    /**
     * Public "Product & Service" showcase — active categories with their active products.
     */
    public function index(): View
    {
        $categories = Category::query()
            ->where('is_active', true)
            ->with(['products' => fn ($q) => $q->where('is_active', true)
                ->orderBy('sort_order')
                ->orderBy('name')])
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get()
            ->filter(fn ($category) => $category->products->isNotEmpty())
            ->values();

        return view('products.index', compact('categories'));
    }
}
