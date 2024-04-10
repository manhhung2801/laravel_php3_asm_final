
@extends('frontend.layouts.master')

@section('title')
    Checkout Order
@endsection

@section('contents')
<section class="show-cart mb-5">
    <div class="row">
          <div class="col-md-7 border-end">
                <div class="row rounded bg-light mt-4 w-100 pb-3">
                    <div class="col-md-4">
                      <a href="#" class="btn btn-dark mt-4 ms-5 rounded-pill">Tham gia CoolClub</a>
                    </div>
                    <div class="col-md-8">
                      <p class="card-text float-end mt-4">Tham gia CoolClub để nhận voucher 15% cho đơn hàng đầu tiên và ghi nhận hoàn tiền trên từng đơn hàng.</p>
                    </div>
                </div>
                <form action="{{ route('shop.order') }}" method="POST">
                    @csrf
                    <div class="row">
                            <div class="col-md-12">
                                <h1 class="float-start mt-4">Thông tin vận chuyển</h1>
                            </div>
                            <div class="col-md-6 mt-4">
                            <input type="text" class="form-control rounded" name="username"  placeholder="Họ tên">
                            </div>
                            <div class="col-md-6 mt-4">
                            <input type="number" class="form-control rounded" name="phone" placeholder="Số điện thoại">
                            </div>
                            <div class="col-md-12 mt-3">
                            <input type="email" class="form-control rounded" name="email"  placeholder="Email">
                            </div>
                            <div class="col-md-12 mt-3">
                            <textarea class="form-control rounded" id="exampleFormControlTextarea1" name="address" rows="3" placeholder="Địa chỉ(ví dụ: 102, Vạn Phúc, phường Vạn Phúc)" ></textarea>
                            </div>

                            <div class="col-md-12 mt-3">
                            <input type="text" class="form-control rounded" name="note"  placeholder="Ghi chú thêm(Ví dụ: Giao hàng giờ hành chính)">
                            </div>
                            <div class="col-md-12 mt-5">
                                <h1>Hình thức thanh toán</h1>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-check border border-1 rounded px-5">
                                            <input class="form-check-input mt-4" type="checkbox" value="" id="flexCheckDefault" checked>
                                            <img src="./images/cart/pay0.svg" alt="" style="width: 50px; margin-bottom: 20px;" class="ms-2">
                                            <label class="form-check-label pt-3 ms-2" for="flexCheckDefault">
                                            COD <br>Thanh toán khi nhận hàng
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <p>Nếu bạn không hài lòng với sản phẩm của chúng tôi? Bạn hoàn toàn có thể trả lại sản phẩm. Tìm hiểu thêm <span class="fw-bold">tại đây</span>.</p>
                                    </div>
                                    <div class="col-md-12 mt-3 mb-5">
                                        <button type="submit" class="btn btn-dark w-100">Order</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </form>
          </div>
          <div class="col-md-5">
            <div class="row">
                <hr class="mt-5 mb-3">
                <div class="col-md-12">
                    <div class="border border-primary border-2 rounded">
                        <h6 class="mt-2 mb-2 text-danger fst-italic text-center fw-bold">Order</h6>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr class="mt-3">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-primary">Tạm tính: <span class="float-end">{{ $total }} đ</span>
                        </li>
                        <li class="list-group-item">Voucher:
                            @if (session()->exists('applyVoucher'))
                                <span>{{ session('applyVoucher')->name  }}</span>
                                - code:
                                <code class="fw-bold">{{ session('applyVoucher')->code }}</code>
                                <span class="float-end">{{ session('applyVoucher')->discount ?? 0 }} đ</span>
                            @else
                                <span class="float-end">0 đ</span>
                            @endif

                        </li>
                        <li class="list-group-item">Giá giảm:
                            @if (session()->exists('applyVoucher'))
                                <span class="float-end">{{ session('applyVoucher')->discount ?? 0 }} đ</span>
                            @else
                                <span class="float-end">0 đ</span>
                            @endif
                        </li>
                        <li class="list-group-item">Phí giao hàng: <span class="float-end">Miễn phí</span></li>
                        <li class="list-group-item">
                            Tổng:
                            @if (session()->exists('applyVoucher') && session()->exists('totalApplyVoucher'))
                                <span class="float-end fs-5 fw-bold">{{ session('totalApplyVoucher') ?? 0 }} đ</span><br><br>
                                <span class="text-danger float-end">(Đã giảm {{  session('applyVoucher')->discount ?? 0 }} đ khi áp dụng voucher)</span>
                            @else
                                <span class="float-end fs-5 fw-bold">{{ $total }} đ</span><br>
                            @endif
                        </li>
                    </ul>
                    <hr class="mt-5">
                    <a class="btn btn-dark rounded-pill" href="{{ route('shop.manager-order') }}">Kiểm tra đơn hàng</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
