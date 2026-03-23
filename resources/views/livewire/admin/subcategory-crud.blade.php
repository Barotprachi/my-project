<div>

    <h2 class="mb-4"> Add Subcategory</h2>

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="card p-4 mb-4 shadow">

        <div class="row">
            <div class="col-md-6 mb-3">
                <input type="text" wire:model="name" class="form-control" placeholder="Sub Category Name">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror

            </div>

            <div class="col-md-6 mb-3">
                <input type="text" wire:model="slug" class="form-control" placeholder="Slug">
                @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <select wire:model="category_id" class="form-control mb-3">
                <option value="">Select Category</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
                @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror

        </div>

        <button class="btn btn-primary">
            {{ $subcategory_id ? 'Update SubCategory' : 'Add SubCategory' }}
        </button>
    </form>

    <h2 class="mb-4">Sub Category List</h2>

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Slug</th>
            <th>Category</th>
            <th>Action</th>
        </tr>

        @foreach($subcategories as $cat)
        <tr>
            <td>{{ $cat->name }}</td>
            <td>{{ $cat->slug }}</td>
            <td>{{ $cat->category->name ?? 'N/A' }}</td>
            <td>
                <button wire:click="edit({{ $cat->id }})" class="btn btn-warning btn-sm">Edit</button>
                <button wire:click="delete({{ $cat->id }})" class="btn btn-danger btn-sm">Delete</button>
            </td>
        </tr>
        @endforeach

    </table>

</div>