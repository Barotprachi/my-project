<div>

    <h2 class="mb-4">Add Category</h2>

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="card p-4 mb-4 shadow">

        <div class="row">
            <div class="col-md-6 mb-3">
                <input type="text" wire:model="name" class="form-control" placeholder="Category Name">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                
            </div>

            <div class="col-md-6 mb-3">
                <input type="text" wire:model="slug" class="form-control" placeholder="Slug">
                @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <button class="btn btn-primary">
            {{ $category_id ? 'Update Category' : 'Add Category' }}
        </button>
    </form>

    <h2 class="mb-4">Category List</h2>

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Slug</th>
            <th>Action</th>
        </tr>

        @foreach($categories as $cat)
        <tr>
            <td>{{ $cat->name }}</td>
            <td>{{ $cat->slug }}</td>
            <td>
                <button wire:click="edit({{ $cat->id }})" class="btn btn-warning btn-sm">Edit</button>
                <button wire:click="delete({{ $cat->id }})" class="btn btn-danger btn-sm">Delete</button>
            </td>
        </tr>
        @endforeach

    </table>

</div>