<div class="row">

    <div class="col-md-6">
        @if($product->image)
            <img src="{{ asset('storage/'.$product->image) }}" 
                 class="img-fluid rounded shadow">
        @endif
    </div>

    <div class="col-md-6">
        <h2>{{ $product->name }}</h2>

        <h4 class="text-muted mb-3">₹{{ $product->price }}</h4>

        <p>{{ $product->description }}</p>

        <button class="btn btn-dark mt-3">
            Add to Cart
        </button>
    </div>

</div>