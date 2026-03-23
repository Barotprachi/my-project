<div>

    <h2 class="mb-4">🛍 Add Product</h2>

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="card p-4 mb-5 shadow" enctype="multipart/form-data">

        <div class="row">
            <div class="col-md-6 mb-3">
                <input type="text" wire:model="name" class="form-control" placeholder="Product Name">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-md-6 mb-3">
                <input type="text" wire:model="slug" class="form-control" placeholder="Slug">
                @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <textarea wire:model="description" class="form-control mb-3" placeholder="Description"></textarea>

        <div class="row">
            <div class="col-md-4 mb-3">
                <input type="number" wire:model="price" class="form-control" placeholder="Price">
                @error('price') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-md-4 mb-3">
                <input type="number" wire:model="stock" class="form-control" placeholder="Stock">
            </div>

            <div class="col-md-4 mb-3">
                <select wire:model.live="category_id" class="form-control">
                    <option value="">Select Category</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
                @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <select wire:model.live="subcategory_id" class="form-control">
                <option value="">Select Subcategory</option>
                @foreach($subcategories as $sub)
                    <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                @endforeach
            </select>
            @error('subcategory_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div wire:loading wire:target="category_id">
            
        </div>
        

        <input type="file" wire:model="image" class="form-control mb-3">
        @error('image') <small class="text-danger d-block mb-2">{{ $message }}</small> @enderror

        <div wire:loading wire:target="image">
        </div>

        @if($image)
            <img src="{{ $image->temporaryUrl() }}" alt="Preview" class="img-thumbnail mb-3" style="max-height: 200px;">
        @endif

        <button class="btn btn-primary"
                wire:loading.attr="disabled"
                wire:target="image,save">
            {{$product_id ? 'Update Product' : 'Save Product'}}
        </button>
    </form>

    <h2 class="mb-4">Product List</h2>

    <div class="row">
        @foreach($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card shadow h-100">

                    @if($product->image)
                        <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top" style="height:200px; object-fit:cover;">
                    @endif

                    <div class="card-body">
                        <h5>{{ $product->name }}</h5>
                        <p class="text-muted">₹{{ $product->price }}</p>

                        <button wire:click="edit({{ $product->id }})" 
                                class="btn btn-warning btn-sm">
                            Edit
                        </button>

                        <button wire:click="delete({{ $product->id }})" 
                                class="btn btn-danger btn-sm">
                            Delete
                        </button>
                    </div>

                </div>
            </div>
        @endforeach
    </div>

</div>
