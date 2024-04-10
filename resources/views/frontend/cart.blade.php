
@extends('frontend.layouts.master')

@section('title')
    Cart
@endsection

@section('contents')
<section class="show-cart mb-5">
    <div class="row">
          <div class="col-md-8 border-end">

                <div class="row">
                      <div class="col-md-12">
                          <h1 class="ms-2 mt-4">Giỏ hàng</h1>
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col"><p class="text-secondary pt-3">#</p></th>
                                <th scope="col"><p class="text-secondary pt-3">Description</p></th>
                                <th scope="col"><p class="text-secondary pt-3">Price</p></th>
                                <th scope="col"><p class="text-secondary pt-3 ms-2">Options</p></th>
                                <th scope="col"><p class="text-secondary ps-5 pt-3">Qauntity</p></th>
                                <th scope="col"><a class="btn btn-danger mt-2 clear_cart">Delete Cart</a></th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                    <tr>
                                        <th scope="row"><img src="{{ asset('uploads/'.$item->options->image) }}" class="img-fluid" style="width: 150px;;height: 200px;" alt="..."></th>
                                        <td>
                                            <h6 class="mt-4">{{ $item->name }}</h6>
                                            <p class="mt-4" id="{{ $item->rowId }}">Subtotal: {{ ($item->price + $item->options->variants_total) * $item->qty }} đ</p>
                                        </td>
                                        <td>
                                            <p class="mt-4">{{ $item->price }} đ</p>
                                        </td>
                                        <td>
                                            <ul class="list-group list-group-flush mt-1">
                                                @foreach ($item->options->variants as $key => $variant)
                                                    <li class="list-group-item">{{ $key }} : {{ $variant['name'] }} ({{ $variant['price'] }}) đ</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <div class="d-flex pt-5 product_qty_wrapper">
                                                <button class="btn btn-primary px-2 product-decrement">
                                                    <i class="fas fa-minus"></i>
                                                </button>

                                                <input id="form1" min="1" max="100" name="quantity" data-rowid="{{ $item->rowId }}" value="{{ $item->qty }}" type="number" class="form-control form-control-sm ms-1 product-qty"  style="width: 50px;"/>

                                                <button class="btn btn-primary px-2 ms-1 product-increment">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                        </td>
                                        <td>
                                            <a href="{{ route('shop.cart.remove-product', $item->rowId) }}">
                                                <i class="fa-solid fa-trash-can fa-xl ms-5" style="color: #000000; padding-top: 65px"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                    @if(count($cartItems) === 0)
                                        <td colspan="6">
                                            <h5 class="mt-4 text-center">Cart is empty!</h5>
                                        </td>
                                    @endif
                            </tbody>
                          </table>
                      </div>
                </div>
          </div>
          @php
              function total(){
                $total = 0;
                foreach (Cart::content() as $product) {
                    $total += ($product->price + $product->options->variants_total) * $product->qty;
                }
                return $total;
              }
          @endphp
          <div class="col-md-4">
              <div class="row">
                <div class="col-md-12 mt-3">
                    <h6 class="ms-5 mt-2 mb-2 text-danger fst-italic">Vouchers</h6>
                    <ul class="list-group">
                        @foreach ($vouchers as $voucher)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $voucher->code }}
                                <span class="badge bg-primary rounded-pill">Giảm: {{ $voucher->discount }} đ</span>
                          </li>
                        @endforeach
                      </ul>
                </div>
                  <hr class="mt-5 mb-3">
                  <div class="col-md-12">
                      <div class="border border-primary border-2 rounded">
                          <h6 class="ms-5 mt-2 mb-2 text-danger fst-italic">Nhập Voucher cho đơn hàng</h6>
                      </div>
                      <p class="fst-italic mt-2">Có 13 người đang thêm cùng sản phẩm giống bạn vào giỏ hàng.</p>
                  </div>
                  <div class="col-md-8">
                  <form id="voucher_form">
                        <input type="text" class="form-control" name="voucher_code" id="exampleFormControlInput1" placeholder="Nhập mã giảm giá">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-secondary">Áp Dụng</button>
                    </div>
                  </form>
                  <div class="col-md-12">
                      <p class="mt-3">Sử dụng Voucher <i class="fa-solid fa-gift fa-lg" style="color: #000000;"></i></p>
                      <hr class="mt-3">
                      <p class="mt-3">Tạm tính
                          <span class="float-end" id="total1">{{ total() }} đ<br>
                      </p>
                      <p class="mt-3">Giảm giá
                          <span class="float-end voucher_apply">
                              0đ
                          </span><br>
                      </p>
                      <p class="mt-3">Phí giao hàng
                          <span class="float-end">Miễn phí</span>
                      </p>
                      <hr class="mt-3">
                      <p class="mt-3">Tổng
                          <span class="float-end"> <span class="float-end fs-5 fw-bold" id="total2">{{ total() }} đ</span><br></span>
                      </p>
                      <hr class="mt-5">
                      @if(Auth::user())
                        <a class="btn btn-dark rounded-pill" href="{{ route('shop.checkout-order') }}">Checkout</a>
                      @else
                        <a class="link-primary">Vui đăng nhập để thanh toán đơn hàng</a>
                      @endif
                  </div>
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
                let rowId = input.data('rowid');
                input.val(quantity);
                $.ajax({
                    url: "{{ route('shop.cart.update-quantity') }}",
                    method: "POST",
                    data: {
                        rowId: rowId,
                        quantity: quantity
                    },

                    success: function (data) {
                        if(data.status === "success"){
                            let subTotalAmount = "Subtotal: " + data.product_total + " đ";
                            $(productId).text(subTotalAmount);

                            // total
                            let total1 = $("#total1");
                            total1.text(data.total + " đ");
                            let total2 = $("#total2");
                            total2.text(data.total + " đ");

                            toastr.success(data.message);
                        }
                    },
                    error: function (data) {

                    }
                });
        });
        // decrement product quantity
        $('.product-decrement').on('click', function () {
                let input = $(this).siblings('.product-qty');
                let quantity = parseInt(input.val()) - 1;
                let rowId = input.data('rowid');
                if(quantity < 1){
                    quantity = 1;
                }
                input.val(quantity);
                $.ajax({
                    url: "{{ route('shop.cart.update-quantity') }}",
                    method: "POST",
                    data: {
                        rowId: rowId,
                        quantity: quantity
                    },
                    success: function (data) {
                        if(data.status === "success"){
                            let productId = '#'+rowId;
                            let totalAmount = "Subtotal: " + data.product_total + " đ";
                            $(productId).text(totalAmount);

                            // total
                            let total1 = $("#total1");
                            total1.text(data.total + " đ");
                            let total2 = $("#total2");
                            total2.text(data.total + " đ");

                            toastr.success(data.message);
                        }
                    },
                    error: function (data) {

                    }
                });
        });

        /** Clear Cart */
        $('.clear_cart').on('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: "Are you sure?",
                text: "This action will clear your cart!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, clear it!"
            }).then((result) => {

                if (result.isConfirmed) {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('shop.clear.cart') }}",
                        success: function(data) {
                            if(data.status === "success"){
                                window.location.reload();
                            }
                        },
                        error: function(xhr, status, error){
                            console.log(error);
                        }
                    });
                }
            });
        });

        // apply Voucher on cart
        $('#voucher_form').on("submit", function(e) {
            e.preventDefault();

            let formData = $(this).serialize();
            $.ajax({
                type: "GET",
                url: "{{ route('shop.apply-voucher') }}",
                data: formData,
                success: function (data) {
                    if(data.status === "error"){
                        toastr.error(data.message);
                    }
                    if(data.status === "success"){
                        let total1 = $("#total1");
                        total1.text(data.total_apply_voucher + " đ");
                        let total2 = $("#total2");
                        total2.text(data.total_apply_voucher + " đ");

                        let voucher = $('.voucher_apply');
                        voucher.text(data.voucher.discount + " đ");
                        toastr.success(data.message);
                    }
                },
                error: function(data){
                    console.log(data);
                }
            });
        });


    });
</script>
@endpush
