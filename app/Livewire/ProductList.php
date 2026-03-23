<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class ProductList extends Component
{
    public function render()
    {
        // dd(Category::with('products')->get());
        return view('livewire.product-list', [
            'products' => Product::latest()->get(),
            'categories' => Category::with('products')->get()
        ])->layout('layouts.app');
    }
}