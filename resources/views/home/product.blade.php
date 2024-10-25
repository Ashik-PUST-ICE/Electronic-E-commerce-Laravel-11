
@include('home.css')

<div class="container">
    <!-- Centered Header for Latest Products -->
    <div class="my-4 text-center">
        <h2 style="font-weight: bold; color: #333;">All Latest Products</h2>
    </div>

    <div class="row">
        @foreach($products as $product)
        <div class="mb-4 col-md-3 col-xs-6">
            <div class="text-center border rounded shadow-sm product" style="border-color: #ff0000;">
                <!-- Product Image -->
                <div class="py-3 text-center product-img">
                    <img src="{{ asset('products/' . $product->image) }}" alt="{{ $product->title }}" class="img-fluid product-image" style="max-height: 250px;">
                </div>
                <!-- Product Details -->
                <div class="px-3 text-center product-body">
                    <p class="product-category text-muted small">CATEGORY</p> <!-- Category -->
                    <h3 class="mb-1 product-name font-weight-bold" style="color: #dc3545;">{{ $product->title }}</h3> <!-- Product Name -->

                    <!-- Price Section -->
                    <div class="mb-2 price-section">
                        <span class="price-current text-danger" style="font-size: 24px;">Price: ${{ $product->price }}</span> <!-- Current Price -->
                        @if($product->old_price)
                        <span class="price-old text-muted" style="text-decoration: line-through; font-size: 18px;">${{ $product->old_price }}</span> <!-- Old Price -->
                        @endif
                    </div>

                    <!-- Action Buttons (Icons) -->
                    <div class="mb-3 product-btns d-flex justify-content-center">
                        <a href="{{ url('product_details', $product->id) }}" class="mx-2 btn btn-light"><i class="fa fa-eye"></i> View Product</a> <!-- Quick View -->
                    </div>
                </div>

                <!-- Add to Cart Button -->
                <div class="py-3 text-center add-to-cart">
                    <a href="{{ url('add_cart', $product->id) }}" class="btn btn-danger btn-sm" style="background-color: #ff0000; border-radius: 20px; font-weight: bold; padding: 2px 2px; font-size: 10px;">
                        ADD TO CART
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@include('home.js')

<style>
    .product {
        background-color: #fff;
        margin-bottom: 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid #ff0000;
    }

    .product:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .product-img img {
        max-height: 250px;
        object-fit: contain;
        border-radius: 10px;
        transition: transform 0.3s ease; /* Smooth zoom effect */
    }

    .product-img:hover img {
        transform: scale(1.3); /* Stronger zoom effect on hover */
    }

    .price-section {
        display: flex;
        justify-content: center;
        gap: 10px;
        align-items: baseline;
    }

    .add-to-cart .btn {
        background-color: #ff0000;
        border-radius: 30px;
        font-weight: bold;
    }

    .add-to-cart .btn:hover {
        background-color: #cc0000;
    }

    /* Center the header and add margin */
    h2 {
        margin: 20px 0;
        font-size: 28px;
        font-weight: bold;
        color: #333;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .product-img img {
            max-height: 150px;
        }
    }
</style>
