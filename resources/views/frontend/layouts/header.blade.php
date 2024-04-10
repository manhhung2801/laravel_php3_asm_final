<header>
    <div class="row">
      <nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 40px;">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <img class="nav-link" src="https://www.coolmate.me/images/logo-coolmate-v2.svg" alt="" width="90px" height="40px">
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">CM24</a>
              </li>
              <li class="nav-item">
                <a class="nav-link">84RISING*</a>
              </li>
              <li class="nav-item">
                <a class="nav-link">COOLXPRINT</a>
              </li>
            </ul>
            <div class="d-flex">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" href="#">Tham gia CoolClub <i class="fa-solid fa-star fa-lg" style="color: #50555e;"></i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link">Blog</a>
                  </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <nav class="navbar navbar-expand-lg navbar-light bg-secondary justify-content-center" style="height: 40px;">
          <h6 class="text-white text-center">Đồ đông sẵn sàng giao ngay đến <a href="" class="text-white">Mua Ngay </a> <i class="fa-solid fa-arrow-up fa-rotate-90 fa-sm" style="color: #ffffff;"></i></h6>
      </nav>
      <nav class="navbar navbar-expand-lg navbar-light bg-dark h-25">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('shop.home') }}">
              <img src="https://www.coolmate.me/images/logo-coolmate-new.svg?v=1" alt="">
          </a>
          <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse ms-5" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item active bg-danger">
                <a class="nav-link text-white fw-bold disabled" aria-current="page" href="#">SALE </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white fw-bold" href="{{ route('shop.list-product') }}">LOẠI SẢN PHẨM</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white fw-bold" href="#">ĐỒ THỂ THAO</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white fw-bold" href="#">MẶC HÀNG NGÀY</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white fw-bold" href="./tintuc.html">TIN TỨC</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white fw-bold" href="#">SẢN XUẤT RIÊNG</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white fw-bold" href="./vechungtoi.html">CARE&SHARE</a>
              </li>
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Tìm kiếm sản phẩm..." aria-label="Search">
            </form>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item dropdown">
                <a class="nav-link text-white dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa-solid fa-user-large fa-xl" style="color: #ffffff;"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                  <li><a class="dropdown-item" href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket fa-lg" style="color: #ff4747;"></i> Đăng Nhập</a></li>
                  <li><a class="dropdown-item" href="{{ route('register') }}"><i class="fa-solid fa-registered fa-lg" style="color: #ff4747;"></i> Đăng Ký</a></li>
                  <li><a class="dropdown-item" href="#"><i class="fa-regular fa-address-card fa-lg" style="color: #ff4747;"></i> Profile</a></li>
                  <li><a class="dropdown-item" href="#"><i class="fa-solid fa-gear fa-lg" style="color: #ff4747;"></i> Setting</a></li>
                    @if(Auth::user())
                        <li><hr class="dropdown-divider bg-white"></li>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="fa-solid fa-right-from-bracket fa-lg" style="color: #ff4747;"></i>
                                    Đăng Xuất
                                </a>
                            </li>
                        </form>

                    @endif
                </ul>
              </li>
              <li class="nav-item bg-white">
                @if(Auth::user())
                    <h5 class="ps-3 pt-2 pe-3 text-success">{{ Auth::user()->name }}</h5>
                @endif
              </li>
              <li class="nav-item">
                <a class="nav-link position-relative" href="{{ route('shop.show-cart') }}">
                    <i class="fa-solid fa-bag-shopping fa-xl" style="color: #ffffff;"></i>
                    <span id="cart-count" class="position-absolute top-3 start-100 translate-middle badge rounded-pill bg-danger">
                      {{ Cart::content()->count() }}
                    </span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
