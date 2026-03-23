<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;

class CategoryCrud extends Component
{
    public $name, $slug, $category_id;
    public function render()
    {
        return view('livewire.admin.category-crud',[
            'categories' => Category::latest()->get()
        ])->layout('layouts.app');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'slug'=>'required|unique:categories,slug,'. $this->category_id,
        ]);

        if($this->category_id)
        {
            Category::find($this->category_id)->update([
                'name' => $this->name,
                'slug' =>$this->slug,
            ]);

            session()->flash('message','Category Updated');
        }
        else
        {
            Category::create([
                'name' => $this->name,
                'slug' => $this->slug,
            ]);

            session()->flash('message', 'Category Added');
        }

        $this->reset();
    }

    public function edit($id)
    {
        $cat = Category::find($id);

        $this->category_id = $id;
        $this->name = $cat->name;
        $this->slug = $cat->slug;
    }

    public function delete($id)
    {
        Category::find($id)->delete();
    }
}
