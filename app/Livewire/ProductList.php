<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;

class ProductList extends Component
{
    public $search = '';
    public $category_id = '';
    public $subcategory_id = '';
    public $searchInput = '';
    public $categoryInput = '';
    public $subcategoryInput = '';

    public function mount()
    {
        $this->searchInput = $this->search;
        $this->categoryInput = $this->category_id;
        $this->subcategoryInput = $this->subcategory_id;
    }

    public function updatedCategoryId($value)
    {
        $this->subcategory_id = '';
    }

    public function updatedCategoryInput($value)
    {
        $this->subcategoryInput = '';
    }

    public function applyFilters()
    {
        $this->search = trim($this->searchInput);
        $this->category_id = $this->categoryInput;
        $this->subcategory_id = $this->subcategoryInput;
    }

    public function resetFilters()
    {
        $this->reset([
            'search',
            'category_id',
            'subcategory_id',
            'searchInput',
            'categoryInput',
            'subcategoryInput',
        ]);
    }

    public function render()
    {
        $query = Product::query();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        if ($this->category_id) {
            $query->where('category_id', $this->category_id);
        }

        if ($this->subcategory_id) {
            $query->where('subcategory_id', $this->subcategory_id);
        }

        return view('livewire.product-list', [
            'products' => $query->latest()->get(),
            'categories' => Category::with('products')->get(),
            'subcategories' => $this->categoryInput
                ? Subcategory::where('category_id', $this->categoryInput)->get()
                : collect(),
        ])->layout('layouts.app');
    }
}
