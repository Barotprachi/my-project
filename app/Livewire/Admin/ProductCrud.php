<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class ProductCrud extends Component
{
    use WithFileUploads;

    public $name, $slug, $description, $price, $stock, $category_id, $subcategory_id, $image, $product_id;

    public function save()
    {
        $validated = $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:products,slug,' . $this->product_id,
            'price' => 'required|numeric',
            'category_id' => 'required',
            'subcategory_id' => 'required|exists:subcategories,id',
            'image' => 'nullable|image|max:2048|mimes:jpg,jpeg,png',
        ]);

        if ($this->product_id) {
            $product = Product::find($this->product_id);
            $imagePath = $product->image;

            if ($this->image instanceof TemporaryUploadedFile) {
                $imagePath = $this->image->store('products', 'public');
            }

            $product->update([
                'name' => $validated['name'],
                'slug' => $validated['slug'],
                'description' => $this->description,
                'price' => $validated['price'],
                'stock' => $this->stock,
                'category_id' => $validated['category_id'],
                'subcategory_id' => $validated['subcategory_id'],
                'image' => $imagePath,
            ]);

            session()->flash('message', 'Product Updated Successfully');
        } else {
            $imagePath = $this->image instanceof TemporaryUploadedFile
                ? $this->image->store('products', 'public')
                : null;

            Product::create([
                'name' => $validated['name'],
                'slug' => $validated['slug'],
                'description' => $this->description,
                'price' => $validated['price'],
                'stock' => $this->stock,
                'category_id' => $validated['category_id'],
                'subcategory_id' => $validated['subcategory_id'],
                'image' => $imagePath,
            ]);

            session()->flash('message', 'Product Added Successfully');
        }

        $this->reset();
    }

    public function edit($id)
    {
        $product = Product::find($id);

        $this->product_id = $id;
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->stock = $product->stock;
        $this->category_id = $product->category_id;
        $this->subcategory_id = $product->subcategory_id;
        $this->image = null;
    }

    public function delete($id)
    {
        Product::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.admin.product-crud', [
            'products' => Product::latest()->get(),
            'categories' => Category::all(),
            'subcategories' => $this->category_id
                ? Subcategory::where('category_id', $this->category_id)->get()
                : collect(),
        ])->layout('layouts.app');
    }

    public function updatedCategoryId($value)
    {
        $this->subcategory_id = null;
    }
}
