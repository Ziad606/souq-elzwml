@extends('layouts.app')

@section('content')
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">New Products</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
                                <li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
                                <li><a data-toggle="tab" href="#tab1">Cameras</a></li>
                                <li><a data-toggle="tab" href="#tab1">Accessories</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <!-- product -->
                                    {{-- {{ dd($products) }} --}}

                                    @foreach ($products as $product)
                                        <div class="product "
                                            onclick="window.location.href='{{ route('products.show', $product->id) }}'">
                                            <div class="product-label">
                                                <span class="sale">-30%</span>
                                                <span class="new">NEW</span>
                                            </div>
                                            <div class="product-img">
                                                @if ($product->first_image)
                                                    <img src="{{ asset('/storage/product_images/' . $product->first_image->image_name) }}"
                                                        class="card-img-top" alt="...">
                                                @else
                                                    <p>No image available</p>
                                                @endif
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">
                                                    @foreach ($subCategories as $subCategory)
                                                        @if ($subCategory->id == $product->category_id)
                                                            {{ $subCategory->name }}
                                                        @break
                                                    @endif
                                                @endforeach
                                            </p>
                                            <h3 class="product-name"><a href="#">{{ $product->name }}</a></h3>
                                            <h4 class="product-price">{{ $product->price }}<sup>EGP</sup></h4>

                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                        class="tooltipp">add to wishlist</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span
                                                        class="tooltipp">quick view</span></button>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                                <!-- /product -->
                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- /Products tab & slick -->
        </div>
    </div>
</div>
@endsection
