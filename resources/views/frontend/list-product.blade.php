@extends('frontend.layouts.master')

@section('title')
    list products
@endsection

@section('contents')
<section class="category-products">
    <div class="row">
         <div class="col-md-12">
               <h1 class="ms-3 mt-5">TẤT CẢ SẢN PHẨM</h1>
               <div class="ms-5 mt-2 mb-4">
                <a class="btn btn-primary fw-bold rounded-pill" href="{{ route('shop.filter-product-category', "all") }}">Tất cả</a>
                @foreach ($categories as $category)
                    <a class="btn btn-secondary fw-bold rounded-pill" href="{{ route('shop.filter-product-category', $category->id) }}">{{ $category->name }}</a>
                @endforeach
               </div>
         </div>
    </div>
    <div class="row row-cols-1 row-cols-md-5 g-4">
        @foreach ($products as $product)
            <div class="col">
                <div class="card border-0">
                    <img src="{{ asset('uploads/'.$product->thumb_image) }}" class="card-img-top" alt="..." height="360px">
                    <div class="card-body mt-0 pt-0">
                        <h6 class="card-title pt-0 mt-1">
                            {{ $product->name }}
                        </h6>
                        <p class="card-text pt-0 fs-6 text-secondary">{{ $product->short_description }}</p>
                        <span class="text-dark fst-italic pt-0 fs-6">{{ $product->long_description }}</span>
                        <p class="fw-bold pt-1 fs-6">349.000đ</p>
                        <a href="{{ route('shop.product.show', $product->id) }}" class="btn btn-danger btn-sm card-text pt-0 fs-6 text-white float-end">Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
   </div>
   <div class="row row-cols-1 row-cols-md-1 g-4 mt-5">
        <div class="col pr-5">
            {{ $products->links() }}
        </div>
   </div>

   <div class="row">
       <div class="col-md-12">
         <hr class="mt-3 mb-3"></li>
       </div>
       <div class="col-md-12">
           <div class="position-relative mt-5">
             <div class="position-absolute top-0 start-50 translate-middle">
               <button class="btn btn-dark text-white fw-bold rounded-pill d-flex">XEM THÊM</button>
             </div>
           </div>
             <p class="text-secondary text-center p-4">Hiển thị 1 - 25 trên tổng số 200000 sản phẩm.</p>
       </div>
   </div>
</section>
<section class="banner-1">
 <div class="row row-cols-1 row-cols-md-3 g-4">
   <div class="col">
     <div class="card border-0">
       <img src="./images/bcate1.avif" class="card-img-top" alt="...">
     </div>
   </div>
   <div class="col">
     <div class="card border-0">
       <img src="./images/bcate2.avif" class="card-img-top" alt="...">
     </div>
   </div>
   <div class="col">
     <div class="card border-0">
       <img src="./images/bcate3.avif" class="card-img-top" alt="...">
     </div>
   </div>
 </div>
</section>
@endsection
