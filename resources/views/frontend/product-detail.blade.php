
@extends('frontend.layouts.master')

@section('title')
    Product Detail
@endsection

@section('contents')
<section class="detail-products">
    <div class="row">
          <div class="col-md-6">
            <h5 class="mt-4">
              <span class="text-secondary">Trang chủ </span><span class="text-dark">/ Sản Phẩm {{ $productDetail->name }}</span>
            </h5>
            <div id="carouselExampleIndicators" class="carousel slide mt-4" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                @for($i = 0; $i < count($productDetail->productImageGalleries); $i++)
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i+1 }}" aria-label="Slide {{ $i+1 }}"></button>
                @endfor
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="{{ asset('uploads/' . $productDetail->thumb_image) }}" class="d-block w-100 rounded" alt="...">
                </div>
                @foreach ($productDetail->productImageGalleries as $gallery)
                    <div class="carousel-item">
                    <img src="{{ asset('uploads/'.$gallery->image) }}" class="d-block w-100 rounded" alt="...">
                  </div>
                @endforeach
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
          <div class="col-md-6">
                <form class="shopping-cart-form">
                    <div class="mt-5 justify-content-between">
                        <h1 class="fw-bold p-4">{{ $productDetail->name }} - <span class="text-danger fw-bold">{{ $productDetail->product_type }}</span></h1>
                        <h2 class="fw-bold px-3">{{ $productDetail->price }} đ</h2>
                        <p class="px-3 mt-4"><span class="fw-bold">Short description  : </span>{{ $productDetail->short_description }}</p>

                        <div class="row">
                            <input type="hidden" value="{{ $productDetail->id }}" name="product_id">
                            @foreach ($productDetail->productVariants as $variant)
                                <div class="col-md-3">
                                    <p class="px-3 mt-4"><span class="fw-bold">{{ $variant->name }}</span></p>
                                    <select class="form-select d-grid gap-2 d-md-block px-3" name="variants_items[]" aria-label="Default select example">
                                        @foreach ($variant->productVariantItems as $variantItem)
                                            <option {{ $variantItem->is_default == 1 ? "selected" : "" }} value="{{ $variantItem->id }}">{{ $variantItem->name }} ({{ $variantItem->price }} VNĐ)</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endforeach
                    </div>
                    <div class="d-grid gap-2 d-md-block px-3 mt-5">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                            <span class="btn btn-primary px-2 product-decrement">
                                <i class="fas fa-minus"></i>
                            </span>

                            <input id="form1" min="1" max="100" name="quantity" value="1" type="number"
                                class="form-control form-control-sm ms-1 product-qty"  style="width: 50px;"/>

                            <span class="btn btn-primary px-2 ms-1 product-increment">
                                <i class="fas fa-plus"></i>
                            </span>
                            </div>
                            <div class="col-md-8">
                                <button type="submit" class="add_cart btn btn-dark px-2 rounded-pill float-end text-danger fw-bold" style="width: 300px;"><i class="fa-solid fa-bag-shopping fa-xl" style="color: #ffffff;"></i>  Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </form>
                    <hr class="mt-3">
                    <div class="d-grid gap-2 d-md-block px-3 mt-2">
                        <div class="row">
                                <div class="col-md-4 mt-3 text-center">
                                <i class="fa-brands fa-slack fa-2xl" style="color: #000000;"></i>
                                <p class="pt-3">Đổi trả cực dễ chỉ cần số điện thoại.</p>
                                </div>
                                <div class="col-md-4 mt-3 text-center">
                                <i class="fa-solid fa-truck-fast fa-2xl" style="color: #000000;"></i>
                                <p class="pt-3">Miễn phí vận chuyển cho đơn hàng trên 200k.</p>
                                </div>
                                <div class="col-md-4 mt-3 text-center">
                                <i class="fa-solid fa-arrow-right fa-2xl" style="color: #000000;"></i>
                                <p class="pt-3">60 ngày đổi trả vì bất kỳ lý do gì.</p>
                                </div>
                                <div class="col-md-4 mt-3 text-center">
                                <i class="fa-solid fa-phone fa-2xl" style="color: #000000;"></i>
                                <p class="pt-3">Hotline 0399915969 hỗ trợ từ 8h - 22h mỗi ngày.</p>
                                </div>
                                <div class="col-md-4 mt-3 text-center">
                                <i class="fa-regular fa-clock fa-2xl" style="color: #000000;"></i>
                                <p class="pt-3">Đến tận nơi nhận hàng trả, hoàn tiền trong 24h.</p>
                                </div>
                                <div class="col-md-4 mt-3 text-center">
                                <i class="fa-brands fa-space-awesome fa-2xl" style="color: #000000;"></i>
                                <p class="pt-3">Giao hàng nhanh toàn quốc.</p>
                                </div>
                        </div>
                    </div>
                    <hr class="mt-2">
                    <h4>Long Descriptsion
                            <button class="btn btn-dark float-end" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                +
                        </button>
                    </h4>
                    <div class="collapse" id="collapseExample">
                        <p>- {{ $productDetail->short_description }}</p>
                    </div>

          </div>
    </div>
    <hr class="mt-5">
    <div class="row">
        <div class="card text-center border-0">
          <div class="card-body">
            <h2 class="card-title">Chi tiết sản phẩm: Quần Jeans nam Basics dáng Regular Straight</h2>
            <img src="{{ asset('frontend/images/products/detail/ed1.webp') }}" class="img-fluid mt-2" alt="...">
            <div class="d-flex">
              <a href="#" class="btn btn-dark d-flex text-center" style="margin-left: 640px;" data-bs-toggle="collapse" data-bs-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">Xem Thêm <i class="fa-solid fa-arrow-down fa-xl mt-2 ms-3" style="color: #ffffff;"></i></a>
            </div>
            <div class="collapse" id="collapseExample1">
                <img src="{{ asset('frontend/images/products/detail/ed2.webp') }}" class="img-fluid mt-2" alt="...">
                <img src="{{ asset('frontend/images/products/detail/ed3.webp') }}" class="img-fluid mt-2" alt="...">
                <img src="{{ asset('frontend/images/products/detail/ed4.webp') }}" class="img-fluid mt-2" alt="...">
            </div>
          </div>
          <div class="card-footer text-muted">
              <p class="fw-normal">Chưa có đánh giá</p>
              <p class="fst-italic">Hãy mua và đánh giá sản phẩm này nhé!</p>
              <i class="fa-solid fa-code fa-xl bg-secondary"></i>
          </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

         // increment product quantity
         $('.product-increment').on('click', function () {
                let input = $(this).siblings('.product-qty');
                let quantity = parseInt(input.val()) + 1;
                input.val(quantity);
        });
        // decrement product quantity
        $('.product-decrement').on('click', function () {
                let input = $(this).siblings('.product-qty');
                let quantity = parseInt(input.val()) - 1;
                if(quantity < 1){
                    quantity = 1;
                }
                input.val(quantity);
        });

        // Add to cart
        $('.shopping-cart-form').on('submit', function(event){
            event.preventDefault();
            let formData =$(this).serialize();
            console.log(formData);
            $.ajax({
                type: "POST",
                url: "{{ route('shop.add-to-cart') }}",
                data: formData,
                success: function (data) {
                    getCartCount();
                    toastr.success(data.message);
                },
                error: function (data) {

                }
            });
        });

        function getCartCount() {
            $.ajax({
                type: "GET",
                url: "{{ route('shop.cart-count') }}",
                success: function (data) {
                    $('#cart-count').text(data);
                },
                error: function (data) {

                }
            });
        }
    });
</script>
@endpush
