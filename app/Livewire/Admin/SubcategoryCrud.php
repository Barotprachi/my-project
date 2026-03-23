<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Subcategory;
use App\Models\Category;

class SubcategoryCrud extends Component
{
    public $name, $slug, $category_id, $subcategory_id;

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:subcategories,slug,' . $this->subcategory_id,
            'category_id' => 'required',
        ]);

        if ($this->subcategory_id) {
            Subcategory::find($this->subcategory_id)->update([
                'name' => $this->name,
                'slug' => $this->slug,
                'category_id' => $this->category_id,
            ]);

            session()->flash('message', 'Subcategory Updated');
        } else {
            Subcategory::create([
                'name' => $this->name,
                'slug' => $this->slug,
                'category_id' => $this->category_id,
            ]);

            session()->flash('message', 'Subcategory Added');
        }

        $this->reset();
    }

    public function edit($id)
    {
        $sub = Subcategory::find($id);

        $this->subcategory_id = $id;
        $this->name = $sub->name;
        $this->slug = $sub->slug;
        $this->category_id = $sub->category_id;
    }

    public function delete($id)
    {
        Subcategory::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.admin.subcategory-crud', [
            'subcategories' => Subcategory::latest()->get(),
            'categories' => Category::all(),
        ])->layout('layouts.app');
    }
}