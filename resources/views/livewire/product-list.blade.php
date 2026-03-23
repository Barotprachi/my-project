<div>
    <div class="d-flex justify-content-between align-items-end mb-5">
        <div>
            <h6 class="text-primary fw-bold text-uppercase mb-1" style="letter-spacing: 1px;">Exclusive Collection</h6>
            <h2 class="fw-bold m-0">Explore Our Products</h2>
        </div>
        <a href="#" class="btn btn-outline-dark rounded-pill px-4 btn-sm">View All</a>
    </div>

    <style>
        .product-card {
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 12px;
            overflow: hidden;
        }
        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.08) !important;
        }
        .product-image-wrapper {
            overflow: hidden;
            background: #f1f1f1;
        }
        .card-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        .price-tag {
            font-size: 1.2rem;
            font-weight: 700;
            color: #111;
        }
    </style>

    <div class="row">
        @foreach($products as $product)
            <div class="col-6 col-md-4 col-lg-3 mb-4">
                <div class="card h-100 shadow-sm product-card">
                    
                    <div class="product-image-wrapper">
                        @if($product->image)
                            <img src="{{ asset('storage/'.$product->image) }}" 
                                 class="card-img-top" 
                                 style="height:280px; object-fit:cover;"
                                 alt="{{ $product->name }}">
                        @else
                            <div class="d-flex align-items-center justify-content-center text-muted" style="height:280px;">
                                No Image
                            </div>
                        @endif
                    </div>

                    <div class="card-body p-4">
                        <h5 class="card-title text-dark">{{ $product->name }}</h5>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="price-tag">₹{{ number_format($product->price, 2) }}</span>
                            <a href="/product/{{ $product->id }}" class="btn btn-dark btn-sm rounded-pill px-3">
                                View
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
    <hr class="my-5">

<h2 class="mb-4 text-center">Shop by Category</h2>

@foreach($categories ?? [] as $category)
    <h3 class="mt-4 mb-3">{{ $category->name }}</h3>

    <div class="row">
        @foreach($category->products as $product)

            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow">

                    @if($product->image)
                        <img src="{{ asset('storage/'.$product->image) }}" 
                             class="card-img-top" 
                             style="height:200px; object-fit:cover;">
                    @endif

                    <div class="card-body text-center">
                        <h5>{{ $product->name }}</h5>
                        <p class="text-muted">₹{{ $product->price }}</p>

                        <a href="/product/{{ $product->id }}" 
                           class="btn btn-dark btn-sm">
                            View Details
                        </a>
                    </div>  

                </div>
            </div>

        @endforeach
    </div>

@endforeach
</div>
