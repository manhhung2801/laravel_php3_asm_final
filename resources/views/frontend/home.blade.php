@extends('frontend.layouts.master')

@section('title')
    Home
@endsection

@section('contents')
 {{-- Start slide show  --}}
@include('frontend.layouts.slide-show')
 {{-- Etart slide show  --}}
  <section class="main-products">
       <div class="row">
            <div class="col-md-12">
                  <h1 class="ms-5 mt-2">
                    <button class="btn btn-dark fw-bold rounded-pill">Sản phẩm hot</button>
                    <button class="btn btn-outline-white border-dark fw-bold rounded-pill">Bán hạy nhất</button>
                    <span class="float-end">
                      <a href="" class="text-dark fs-5">Xem Thêm</a>
                    </span>
                  </h1>
            </div>
       </div>
       <div class="row row-cols-1 row-cols-md-5 g-4">
        {{-- <div class="col">
          <div class="card border-0">
            <img src="{{ asset('frontend/images/products/product-main/pro1.avif') }}" class="card-img-top" alt="..." height="360px">
            <div class="card-body mt-0 pt-0">
              <h6 class="card-title pt-0 ">
                Jeans Basics dáng Slim fit
              </h6>
              <p class="card-text pt-0 fs-6 text-secondary">Đen wash</p>
              <p class="fw-bold pt-0 fs-6">349.000đ</p>
              <span class="text-primary fst-italic pt-0 fs-6">Mua 2 bất kỳ giảm thêm 10%</span>
            </div>
          </div>
        </div> --}}

       @foreach ($productsHot as $product)
            <div class="col">
                <div class="card border-0">
                    <a href="{{ route('shop.product.show', $product->id) }}">
                        <img src="{{ asset("uploads/" . $product->thumb_image) }}" class="card-img-top" alt="..." height="360px">
                    </a>
                <div class="card-body mt-0 pt-0">
                    <h6 class="card-title pt-1">
                        {{ $product->name }}
                    </h6>
                    <p class="fw-bold pt-0 fs-6"> {{ $product->price }} đ</p>
                    <span class="text-primary fst-italic pt-0 fs-6">{{ $product->short_description }}</span>
                    <a href="{{ route('shop.product.show', $product->id) }}" class="btn btn-danger btn-sm card-text pt-0 fs-6 text-white float-end">Detail</a>
                </div>
                </div>
            </div>
        @endforeach
      </div>
  </section>
  <section class="banner-1">
    <div class="row">
         <div class="col-md-12 mt-3 cd">
              <img src="{{ asset('frontend/images/banner1.webp') }}" class="img-fluid" alt="...">
         </div>
    </div>
  </section>
  <section class="products-2">
    <div class="row">
         <div class="col-md-12">
               <h4 class="mt-5">
                 SẢN PHẨM THU ĐÔNG
                 <span class="float-end">
                   <a href="" class="text-dark fs-5">Xem Thêm</a>
                 </span>
               </h4>
         </div>
    </div>
    <div class="row row-cols-1 row-cols-md-5 g-4">
     <div class="col">
       <div class="card border-0">
         <img src="{{ asset('frontend/images/products/product-main/pro7.avif') }}" class="card-img-top" alt="..." height="360px">
         <div class="card-body mt-0 pt-0">
           <h6 class="card-title pt-0 ">
             Jeans Basics dáng Slim fit
           </h6>
           <p class="card-text pt-0 fs-6 text-secondary">Đen wash</p>
           <p class="fw-bold pt-0 fs-6">349.000đ</p>
           <span class="text-primary fst-italic pt-0 fs-6">Mua 2 bất kỳ giảm thêm 10%</span>
         </div>
       </div>
     </div>
     <div class="col">
       <div class="card border-0">
         <img src="{{ asset('frontend/images/products/product-main/pro7.avif') }}" class="card-img-top" alt="..." height="360px">
         <div class="card-body mt-0 pt-0">
           <h6 class="card-title pt-0 ">
             Jeans Basics Regular Straight
           </h6>
           <p class="card-text pt-0 fs-6 text-secondary">Xanh sáng</p>
           <p class="fw-bold pt-0 fs-6">490.000đ</p>
           <span class="text-primary fst-italic pt-0 fs-6">Mua 2 bất kỳ giảm thêm 10%</span>
         </div>
       </div>
     </div>
     <div class="col">
       <div class="card border-0">
         <img src="{{ asset('frontend/images/products/product-main/pro8.avif') }}" class="card-img-top" alt="..." height="360px">
         <div class="card-body mt-0 pt-0">
           <h6 class="card-title pt-0 ">
             T-Shirt thể thao Active
           </h6>
           <p class="card-text pt-0 fs-6 text-secondary">Thoáng khí</p>
           <p class="fw-bold pt-0 fs-6">199.000đ</p>
           <span class="text-primary fst-italic pt-0 fs-6">Mua 3 bất kỳ giảm thêm 15%</span>
         </div>
       </div>
     </div>
     <div class="col">
       <div class="card border-0">
         <img src="{{ asset('frontend/images/products/product-main/pro9.avif') }}" class="card-img-top" alt="..." height="360px">
         <div class="card-body mt-0 pt-0">
           <h6 class="card-title pt-0 ">
             T-Shirt thể thao Active
           </h6>
           <p class="card-text pt-0 fs-6 text-secondary">Thoáng khí</p>
           <p class="fw-bold pt-0 fs-6">199.000đ</p>
           <span class="text-primary fst-italic pt-0 fs-6">Mua 3 bất kỳ giảm thêm 15%</span>
         </div>
       </div>
     </div>
     <div class="col">
       <div class="card border-0">
         <img src="{{ asset('frontend/images/products/product-main/pro10.avif') }}" class="card-img-top" alt="..." height="360px">
         <div class="card-body mt-0 pt-0">
           <h6 class="card-title pt-0 ">
             Áo thể thao Active V2
           </h6>
           <p class="card-text pt-0 fs-6 text-secondary">Co giãn</p>
           <p class="fw-bold pt-0 fs-6">399.000đ</p>
           <span class="text-primary fst-italic pt-0 fs-6">Mua 3 bất kỳ giảm thêm 25%</span>
         </div>
       </div>
     </div>
   </div>
  </section>
  <section class="banner-2">
    <div class="row">
         <div class="col-md-12 mt-3 cd">
              <img src="{{ asset('frontend/images/banner3.webp') }}" class="img-fluid" alt="...">
         </div>
    </div>
  </section>
  <section class="products-3">
    <div class="row">
         <div class="col-md-12">
               <h4 class="mt-5">
                SẢN PHẨM CHẠY BỘ
                 <span class="float-end">
                   <a href="" class="text-dark fs-5">Xem Thêm</a>
                 </span>
               </h4>
         </div>
    </div>
    <div class="row row-cols-1 row-cols-md-4 g-4">
     <div class="col">
       <div class="card border-0">
         <img src="{{ asset('frontend/images/products/product-main/pro11.avif') }}" class="card-img-top" alt="..." height="360px">
         <div class="card-body mt-0 pt-0">
           <h6 class="card-title pt-0 ">
             Jeans Basics dáng Slim fit
           </h6>
           <p class="card-text pt-0 fs-6 text-secondary">Đen wash</p>
           <p class="fw-bold pt-0 fs-6">349.000đ</p>
           <span class="text-primary fst-italic pt-0 fs-6">Mua 2 bất kỳ giảm thêm 10%</span>
         </div>
       </div>
     </div>
     <div class="col">
       <div class="card border-0">
         <img src="{{ asset('frontend/images/products/product-main/pro12.avif') }}" class="card-img-top" alt="..." height="360px">
         <div class="card-body mt-0 pt-0">
           <h6 class="card-title pt-0 ">
             Jeans Basics Regular Straight
           </h6>
           <p class="card-text pt-0 fs-6 text-secondary">Xanh sáng</p>
           <p class="fw-bold pt-0 fs-6">490.000đ</p>
           <span class="text-primary fst-italic pt-0 fs-6">Mua 2 bất kỳ giảm thêm 10%</span>
         </div>
       </div>
     </div>
     <div class="col">
       <div class="card border-0">
         <img src="{{ asset('frontend/images/products/product-main/pro13.avif') }}" class="card-img-top" alt="..." height="360px">
         <div class="card-body mt-0 pt-0">
           <h6 class="card-title pt-0 ">
             T-Shirt thể thao Active
           </h6>
           <p class="card-text pt-0 fs-6 text-secondary">Thoáng khí</p>
           <p class="fw-bold pt-0 fs-6">199.000đ</p>
           <span class="text-primary fst-italic pt-0 fs-6">Mua 3 bất kỳ giảm thêm 15%</span>
         </div>
       </div>
     </div>
     <div class="col">
       <div class="card border-0">
         <img src="{{ asset('frontend/images/products/product-main/pro14.avif') }}" class="card-img-top" alt="..." height="360px">
         <div class="card-body mt-0 pt-0">
           <h6 class="card-title pt-0 ">
             T-Shirt thể thao Active
           </h6>
           <p class="card-text pt-0 fs-6 text-secondary">Thoáng khí</p>
           <p class="fw-bold pt-0 fs-6">199.000đ</p>
           <span class="text-primary fst-italic pt-0 fs-6">Mua 3 bất kỳ giảm thêm 15%</span>
         </div>
       </div>
     </div>
   </div>
  </section>
  <section class="banner-3">
    <div class="row">
         <div class="col-md-12 px-5 mt-5">
              <img src="{{ asset('frontend/images/banner4.webp') }}" class="img-fluid" alt="...">
              <h2 class="overlay">Góp phần mang lại cuộc <br> sống tươi đẹp <br class="mobile--hidden">hơn cho tụi nhỏ</h2>
              <button class="btn btn-light border-dark fw-bold rounded-pill bt-img">VỀ CARE & SHARE</button>
         </div>
    </div>
  </section>
  <section class="banner-4">
    <div class="row">
         <div class="col-md-12 px-5 mt-ct">
              <img src="{{ asset('frontend/images/banner5.avif') }}" class="img-fluid" alt="...">
         </div>
    </div>
  </section>
  <section class="banner-5">
         <div class="row row-cols-1 row-cols-md-2 g-4 mt-1">
            <div class="col">
              <div class="card border-0">
                <img src="{{ asset('frontend/images/banner6.png') }}" class="card-img-top" alt="...">
              </div>
            </div>
            <div class="col">
              <div class="card border-0">
                <img src="{{ asset('frontend/images/banner7.png') }}" class="card-img-top" alt="...">
              </div>
            </div>
         </div>
  </section>
@endsection
