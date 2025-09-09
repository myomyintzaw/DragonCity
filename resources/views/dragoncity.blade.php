@extends('layout')

@section('title', 'Royal Dragon')



@section('content')
    <!---Success message---->
    <div class="text-center mx-2" style="margin-top: 90px;">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-square-check me-2"></i> <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <!---End Success message---->


    <!-- ======= Home Section ======= -->
    <section id="home" class="hero d-flex align-items-center section-bg">
        <div class="container">
            <!-- ======= Hero Text ======= -->
            <div class="row justify-content-between gy-5">
                <div
                    class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
                    <h2 data-aos="fade-up">Follow Your Dreams <br> With Our Services </h2>
                    <p data-aos="fade-up" data-aos-delay="100">Royal Dragon is one of the best laptop shop in U.S and you
                        can
                        order from anywhere and anytime.We have good services for your... </p>
                    <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                        <a href="/#product" class="btn-book-a-table">Order Now!</a>
                        <a href="https://www.google.com/search?q=microsoft+surface+advideo&oq=microsoft+surface+advideo&gs_lcrp=EgZjaHJvbWUyBggAEEUYOTIHCAEQIRigAdIBCjc0MzYwajBqMTWoAgiwAgHxBU3wKBPzAjCc&sourceid=chrome&ie=UTF-8#fpstate=ive&vld=cid:77c19a5e,vid:0Z0dNyjvYPM,st:0"
                            class="glightbox btn-watch-video d-flex align-items-center"><i
                                class="bi bi-play-circle"></i><span></span></a>Best Selling
                    </div>

                </div>

                <!-- ======= Home Carousel Images ======= -->
                <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
                    {{-- ------------- Add  Carousel ------------- --}}
                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="10000">
                                <img src="{{ asset('user/images/laptops/image1.png') }}" class="d-block w-100"
                                    alt="laptop">
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="{{ asset('user/images/laptops/image2.png') }}" class="d-block w-100"
                                    alt="laptop">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('user/images/laptops/image3.png') }}" class="d-block w-100"
                                    alt="laptop">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('user/images/laptops/image4.png') }}" class="d-block w-100"
                                    alt="laptop">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('user/images/laptops/image5.png') }}" class="d-block w-100"
                                    alt="laptop">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

            </div>
    </section>
    <!-- End Hero Section -->


    {{-- {{dd($productData->toArray())}} --}}


    <!-- ======= Products Section ======= -->
    <section id="product" class="menu">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Products</h2>
                <p>Check Our <span>Laptop List</span></p>
            </div>

            <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

                <li class="nav-item">
                    <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#acer">
                        <h4>Acer</h4>
                    </a>
                </li><!-- End tab nav item -->

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#asus">
                        <h4>Asus</h4>
                    </a><!-- End tab nav item -->

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#dell">
                        <h4>Dell</h4>
                    </a>
                </li><!-- End tab nav item -->

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#lenovo">
                        <h4>Lenovo</h4>
                    </a>
                </li><!-- End tab nav item -->

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#msi">
                        <h4>MSI</h4>
                    </a>
                </li><!-- End tab nav item -->

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#microsoft">
                        <h4>MS Surface</h4>
                    </a>
                </li><!-- End tab nav item -->
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#toshiba">
                        <h4>Toshiba</h4>
                    </a>
                </li><!-- End tab nav item -->
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#samsung">
                        <h4>Samsung</h4>
                    </a>
                </li><!-- End tab nav item -->
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#apple">
                        <h4>Apple</h4>
                    </a>
                </li><!-- End tab nav item -->
            </ul>

            <!--======== Acer Products ========-->
            <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
                <div class="tab-pane fade active show" id="acer">

                    {{-- <div class="row gy-5">
                        @foreach ($products as $product)
                            @if ($product->category_id == 1)
                                <div class="col-lg-4 menu-item">
                                    <a href="{{ asset('images/' . $product->image) }}" class="gl   --}}

                    <!-- =====Acer Brand ======= -->
                    @if (isset($productData) && $productData->isNotEmpty())
                        <div class="tab-header text-center">
                            <p>Best Selling Laptop</p>
                            {{-- <p>Brand</p> --}}
                            <h3>Acer</h3>
                        </div>
                        <!-- ===== List of Acer Products ===== gy-5 -->
                        <div class="row">

                            @foreach ($productData as $product)
                                @if ($product->category_id == 1)
                                    {{-- col-md-6 glightbox --}}
                                    <div class="col-lg-4 menu-item">
                                        <a href="{{ route('dragoncity.shop', $product->id) }}" class=""><img
                                                src="{{ asset('storage/products/' . $product->image) }}"
                                                class="menu-img img-fluid" alt="product image"></a>
                                        <h4>{{ $product->name }}</h4>
                                        <p class="ingredients">{{ $product->series }}</p>
                                        {{-- <p class="ingredients">
                                        {{ $product->description }}
                                    </p> --}}
                                        <p class="price">
                                            ${{ $product->price }}
                                        </p>
                                    </div>
                                @endif
                            @endforeach
                            {{-- {{ $productData->links() }} --}}

                    @endif

                </div>
            </div>
            <!-- End Acer Products -->


            <!--======== Asus Products ========-->
            <div class="tab-content" data-aos="" data-aos-delay="300">
                <div class="tab-pane fade " id="asus">

                    <!-- =====Asus Brand ======= -->
                    @if (isset($productData) && $productData->isNotEmpty())
                        <div class="tab-header text-center">
                            <p>Best Selling Laptop</p>
                            <h3>Asus</h3>
                        </div>
                        <!-- ===== List of Asus Products =====-->
                        <div class="row  gy-5 ">

                            @foreach ($productData as $product)
                                @if ($product->category_id == 2)
                                    {{-- col-md-6 glightbox --}}
                                    <div class="col-lg-4 menu-item">
                                        <a href="{{ route('dragoncity.shop', $product->id) }}" class=""><img
                                                src="{{ asset('storage/products/' . $product->image) }}"
                                                class="menu-img img-fluid" alt="product image"></a>
                                        <h4>{{ $product->name }}</h4>
                                        <p class="ingredients">{{ $product->series }}</p>

                                        <p class="price">
                                            ${{ $product->price }}
                                        </p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        {{-- {{ $productData->links() }} --}}

                    @endif

                </div>
            </div>
            <!-- End Asus Products -->





            <!--======== Dell Products ========-->
            <div class="tab-content" data-aos="" data-aos-delay="300">
                <div class="tab-pane fade" id="dell">

                    <!-- =====Dell Brand ======= -->
                    @if (isset($productData) && $productData->isNotEmpty())
                        <div class="tab-header text-center">
                            <p>Best Selling Laptop</p>
                            <h3>Dell</h3>
                        </div>
                        <!-- ===== List of Dell Products =====-->
                        <div class="row  gy-5 ">

                            @foreach ($productData as $product)
                                @if ($product->category_id == 3)
                                    {{-- col-md-6 glightbox --}}
                                    <div class="col-lg-4 menu-item">
                                        <a href="{{ route('dragoncity.shop', $product->id) }}" class=""><img
                                                src="{{ asset('storage/products/' . $product->image) }}"
                                                class="menu-img img-fluid" alt="product image"></a>
                                        <h4>{{ $product->name }}</h4>
                                        <p class="ingredients">{{ $product->series }}</p>

                                        <p class="price">
                                            ${{ $product->price }}
                                        </p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <!-- End Dell Products -->





            <!--======== Lenovo Products ========-->
            <div class="tab-content" data-aos="" data-aos-delay="300">
                <div class="tab-pane fade" id="lenovo">

                    <!-- =====Lenovo Brand ======= -->
                    @if (isset($productData) && $productData->isNotEmpty())
                        <div class="tab-header text-center">
                            <p>Best Selling Laptop</p>
                            <h3>Lenovo</h3>
                        </div>
                        <!-- ===== List of Lenovo Products =====-->
                        <div class="row  gy-5 ">

                            @foreach ($productData as $product)
                                @if ($product->category_id == 4)
                                    <div class="col-lg-4 menu-item">
                                        <a href="{{ route('dragoncity.shop', $product->id) }}" class=""><img
                                                src="{{ asset('storage/products/' . $product->image) }}"
                                                class="menu-img img-fluid" alt="product image"></a>
                                        <h4>{{ $product->name }}</h4>
                                        <p class="ingredients">{{ $product->series }}</p>

                                        <p class="price">
                                            ${{ $product->price }}
                                        </p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <!-- End Lenovo Products -->





            <!--======== Msi Products ========-->
            <div class="tab-content" data-aos="" data-aos-delay="300">
                <div class="tab-pane fade" id="msi">

                    <!-- =====Msi Brand ======= -->
                    @if (isset($productData) && $productData->isNotEmpty())
                        <div class="tab-header text-center">
                            <p>Best Selling Laptop</p>
                            <h3>Msi</h3>
                        </div>
                        <!-- ===== List of Msi Products =====-->
                        <div class="row  gy-5 ">

                            @foreach ($productData as $product)
                                @if ($product->category_id == 5)
                                    <div class="col-lg-4 menu-item">
                                        <a href="{{ route('dragoncity.shop', $product->id) }}" class=""><img
                                                src="{{ asset('storage/products/' . $product->image) }}"
                                                class="menu-img img-fluid" alt="product image"></a>
                                        <h4>{{ $product->name }}</h4>
                                        <p class="ingredients">{{ $product->series }}</p>

                                        <p class="price">
                                            ${{ $product->price }}
                                        </p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <!-- End Msi Products -->




            <!--======== Microsoft Products ========-->
            <div class="tab-content" data-aos="" data-aos-delay="300">
                <div class="tab-pane fade" id="microsoft">

                    <!-- =====Microsoft Brand ======= -->
                    @if (isset($productData) && $productData->isNotEmpty())
                        <div class="tab-header text-center">
                            <p>Best Selling Laptop</p>
                            <h3>Microsoft</h3>
                        </div>
                        <!-- ===== List of Microsoft Products =====-->
                        <div class="row  gy-5 ">

                            @foreach ($productData as $product)
                                @if ($product->category_id == 6)
                                    <div class="col-lg-4 menu-item">
                                        <a href="{{ route('dragoncity.shop', $product->id) }}" class=""><img
                                                src="{{ asset('storage/products/' . $product->image) }}"
                                                class="menu-img img-fluid" alt="product image"></a>
                                        <h4>{{ $product->name }}</h4>
                                        <p class="ingredients">{{ $product->series }}</p>

                                        <p class="price">
                                            ${{ $product->price }}
                                        </p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <!-- End  Microsoft Products -->



            <!--======== Toshiba Products ========-->
            <div class="tab-content" data-aos="" data-aos-delay="300">
                <div class="tab-pane fade" id="toshiba">

                    <!-- =====Toshiba Brand ======= -->
                    @if (isset($productData) && $productData->isNotEmpty())
                        <div class="tab-header text-center">
                            <p>Best Selling Laptop</p>
                            <h3>Toshiba</h3>
                        </div>
                        <!-- ===== List of Toshiba Products =====-->
                        <div class="row  gy-5 ">

                            @foreach ($productData as $product)
                                @if ($product->category_id == 7)
                                    <div class="col-lg-4 menu-item">
                                        <a href="{{ route('dragoncity.shop', $product->id) }}" class=""><img
                                                src="{{ asset('storage/products/' . $product->image) }}"
                                                class="menu-img img-fluid" alt="product image"></a>
                                        <h4>{{ $product->name }}</h4>
                                        <p class="ingredients">{{ $product->series }}</p>

                                        <p class="price">
                                            ${{ $product->price }}
                                        </p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <!-- End Toshiba Products -->


                <!--======== Samsung Products ========-->
            <div class="tab-content" data-aos="" data-aos-delay="300">
                <div class="tab-pane fade" id="samsung">

                    <!-- =====Samsung Brand ======= -->
                    @if (isset($productData) && $productData->isNotEmpty())
                        <div class="tab-header text-center">
                            <p>Best Selling Laptop</p>
                            <h3>Samsung</h3>
                        </div>
                        <!-- ===== List of Samsung Products =====-->
                        <div class="row  gy-5 ">

                            @foreach ($productData as $product)
                                @if ($product->category_id == 8)
                                    <div class="col-lg-4 menu-item">
                                        <a href="{{ route('dragoncity.shop', $product->id) }}" class=""><img
                                                src="{{ asset('storage/products/' . $product->image) }}"
                                                class="menu-img img-fluid" alt="product image"></a>
                                        <h4>{{ $product->name }}</h4>
                                        <p class="ingredients">{{ $product->series }}</p>

                                        <p class="price">
                                            ${{ $product->price }}
                                        </p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <!-- End Samsung Products -->



       <!--======== Apple Products ========-->
            <div class="tab-content" data-aos="" data-aos-delay="300">
                <div class="tab-pane fade" id="apple">

                    <!-- =====Apple Brand ======= -->
                    @if (isset($productData) && $productData->isNotEmpty())
                        <div class="tab-header text-center">
                            <p>Best Selling Laptop</p>
                            <h3>Apple</h3>
                        </div>
                        <!-- ===== List of Apple Products =====-->
                        <div class="row  gy-5 ">

                            @foreach ($productData as $product)
                                @if ($product->category_id == 9)
                                    <div class="col-lg-4 menu-item">
                                        <a href="{{ route('dragoncity.shop', $product->id) }}" class=""><img
                                                src="{{ asset('storage/products/' . $product->image) }}"
                                                class="menu-img img-fluid" alt="product image"></a>
                                        <h4>{{ $product->name }}</h4>
                                        <p class="ingredients">{{ $product->series }}</p>

                                        <p class="price">
                                            ${{ $product->price }}
                                        </p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <!-- End Apple Products -->


            {{-- {{ $productData->links() }} --}}
        </div>


    </section>
    <!-- End Product Section -->



    <!-- ========= Cart Button Section ======== -->
@section('cartBtn')
    {{-- <a class="btn-book-a-table" href="#book-a-table"> <i class="fa-solid fa-cart-shopping me-2"></i>Cart</a> --}}

    <a class="btn btn-danger position-relative" href="{{ route('cart') }}"> <i
            class="fa-solid fa-cart-shopping me-2"></i>Cart
        @if (count($cartData) != 0)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-white text-danger">
                {{-- {{ isset($cartData) ? count($cartData) : 0 }} --}}
                {{ count($cartData) }}
            </span>
        @endif
    </a>
@endsection
<!-- ========= End Cart Button Section ======== -->



<!-- ======= About Section ======= -->
<section id="about" class="about">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h2>About Us</h2>
            <p>Learn More <span>About Royal Dragon Company</span></p>
        </div>

        <div class="row gy-4">
            <div class="col-lg-7 position-relative about-img"
                style="background-image: url('{{ asset('images/company.jpg') }}') ;" data-aos="fade-up"
                data-aos-delay="150">
            </div>
            <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
                <div class="content ps-0 ps-lg-5">
                    <p class="fst-italic">
                        DataDOCK (A-Datadock) is one of the best selling laptop shop in Euro.
                        We have over 8,000 employees.
                        Since 1998.
                        Our first priority is customer's satisfaction.
                        Royal Dragon laptop selling Showrooms are opening in E.U and the whole world.
                        We are working together with many different suppliers.We are trying the best for customers.
                    </p>
                    <div class="position-relative mt-4">
                        <img src="{{ asset('images/alienware.jpg') }}" class="img-fluid" alt="">
                        <a href="https://www.youtube.com/watch?v=CAoBs4tiCEw" class="glightbox play-btn"></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section><!-- End About Section -->



<!-- ======= Why Us Section ======= -->
<section id="why-us" class="why-us section-bg">
    <div class="container" data-aos="fade-up">
        <div class="row gy-4">
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="why-box">
                    <h3>Why Choose Royal Dragon?</h3>
                    <p>
                        Because Royal Dragon has a strong global presence.
                        It has very strong customer services and quick delivery system.
                        Laptop prices are resonable and it has always promotion and give presents.
                        Great warranty and reparing services are maing point for every customers.
                        You can order different variety of laptops and their spare parts.
                    <div class="text-center">
                        <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
                    </div>
                </div>
            </div><!-- End Why Box -->
            <div class="col-lg-8 d-flex align-items-center">
                <div class="row gy-4">

                    <div class="col-xl-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-clipboard-data"></i>
                            <h4>Strong Financial Performance</h4>
                            <p>Royal Dragon Corporate have strong financial performance. Globally,the financial
                                performance
                                of R-Dragon has been strong.</p>
                        </div>
                    </div><!-- End Icon Box -->

                    <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-gem"></i>
                            <h4>Our Promise</h4>
                            <p>The R-Dragon team lives by our people promise: Be your best self. Make a difference. Have
                                fun. We have experts service technician and they are waiting for your problems.
                            </p>
                        </div>
                    </div><!-- End Icon Box -->

                    <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-inboxes"></i>
                            <h4>R-Dragon's Mission</h4>
                            <p>Our principles of cooperation, respect, responsibility, transparency,
                                and innovation, our's main focus is the success of its business
                                partners, employees, and consumers.</p>
                        </div>
                    </div><!-- End Icon Box -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Why Us Section -->




<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Testimonials</h2>
            <p>What Are They <span>Saying About Us</span></p>
        </div>

        <div class="slides-1 swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <div class="row gy-4 justify-content-center">
                            <div class="col-lg-6">
                                <div class="testimonial-content">
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        Proin iaculis purus consequat sem cure digni ssim donec porttitora entum
                                        suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et.
                                        Maecen aliquam, risus at semper.
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                    <h3>Daxton Travis</h3>
                                    <h4>Ceo &amp; Founder</h4>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 text-center">
                                <img src="{{ asset('user/images/profile/female1.jpg') }}"
                                    class="img-fluid testimonial-img" alt="">
                            </div>
                        </div>
                    </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <div class="row gy-4 justify-content-center">
                            <div class="col-lg-6">
                                <div class="testimonial-content">
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        Export tempor illum tamen malis malis eram quae irure esse labore quem
                                        cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua
                                        noster fugiat irure amet legam anim culpa.
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                    <h3>Georgia Pineda</h3>
                                    <h4>Designer</h4>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 text-center">
                                <img src="{{ asset('user/images/profile/male3.jpg') }}"
                                    class="img-fluid testimonial-img" alt="">
                            </div>
                        </div>
                    </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <div class="row gy-4 justify-content-center">
                            <div class="col-lg-6">
                                <div class="testimonial-content">
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla
                                        quem veniam duis minim tempor labore quem eram duis noster aute amet eram
                                        fore quis sint minim.
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                    <h3>Jena Karlis</h3>
                                    <h4>Store Owner</h4>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 text-center">
                                <img src="{{ asset('user/images/profile/female2.jpg') }}"
                                    class="img-fluid testimonial-img" alt="female">
                            </div>
                        </div>
                    </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <div class="row gy-4 justify-content-center">
                            <div class="col-lg-6">
                                <div class="testimonial-content">
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor
                                        noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat
                                        legam esse veniam culpa fore nisi cillum quid.
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                    <h3>John Larson</h3>
                                    <h4>Entrepreneur</h4>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 text-center">
                                <img src="{{ asset('user/images/profile/admin1.jpg') }}"
                                    class="img-fluid testimonial-img" alt="">
                            </div>
                        </div>
                    </div>
                </div><!-- End testimonial item -->

            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section>
<!-- End Testimonials Section -->


<!-- ======= Events Section ======= -->
<section id="events" class="events">
    <div class="container-fluid" data-aos="fade-up">

        <div class="section-header">
            <h2>Events</h2>
            <p>Share <span>Your Moments</span> In Our Promotion</p>
        </div>

        <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">

                <div class="swiper-slide event-item d-flex flex-column justify-content-end"
                    style="background-image: url({{ asset('images/event1.png') }})">
                    <p class="description">
                        Quo corporis voluptas ea ad. Consectetur inventore sapiente ipsum voluptas eos omnis facere.
                        Enim facilis veritatis id est rem repudiandae nulla expedita quas.
                    </p>
                </div><!-- End Event item -->

                <div class="swiper-slide event-item d-flex flex-column justify-content-end"
                    style="background-image: url({{ asset('images/event2.png') }})">
                    <p class="description">
                        In delectus sint qui et enim. Et ab repudiandae inventore quaerat doloribus. Facere nemo
                        vero est ut dolores ea assumenda et. Delectus saepe accusamus aspernatur.
                    </p>
                </div><!-- End Event item -->

                <div class="swiper-slide event-item d-flex flex-column justify-content-end"
                    style="background-image: url({{ asset('images/event3.png') }})">
                    <p class="description">
                        Laborum aperiam atque omnis minus omnis est qui assumenda quos. Quis id sit quibusdam. Esse
                        quisquam ducimus officia ipsum ut quibusdam maxime. Non enim perspiciatis.
                    </p>
                </div><!-- End Event item -->

                <div class="swiper-slide event-item d-flex flex-column justify-content-end"
                    style="background-image: url({{ asset('images/event4.png') }})">
                    <p class="description">
                        Quo corporis voluptas ea ad. Consectetur inventore sapiente ipsum voluptas eos omnis facere.
                        Enim facilis veritatis id est rem repudiandae nulla expedita quas.
                    </p>
                </div><!-- End Event item -->

            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section>
<!-- End Events Section -->



<!-- ======= Gallery Section ======= -->
<section id="gallery" class="gallery section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>gallery</h2>
            <p>Check <span>Our Gallery</span></p>
        </div>

        <div class="gallery-slider swiper">
            <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                        href="user/images/laptops/image1.png"><img src="user/images/laptops/image1.png"
                            class="img-fluid" alt=""></a>
                </div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                        href="user/images/laptops/image2.png"><img src="user/images/laptops/image2.png"
                            class="img-fluid" alt=""></a>
                </div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                        href="user/images/laptops/image3.png"><img
                            src="user/images/laptops/image3.png"class="img-fluid" alt=""></a>
                </div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                        href="user/images/laptops/image4.png"><img src="user/images/laptops/image4.png"
                            class="img-fluid" alt=""></a>
                </div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                        href="user/images/laptops/image5.png"><img
                            src="user/images/laptops/image5.png"class="img-fluid" alt=""></a>
                </div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                        href="user/images/laptops/image6.png"><img src="user/images/laptops/image6.png"
                            class="img-fluid" alt=""></a>
                </div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                        href="user/images/laptops/image7.png"><img src="user/images/laptops/image7.png"
                            class="img-fluid" alt=""></a>
                </div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                        href="user/images/laptops/image8.png"><img src="user/images/laptops/image8.png"
                            class="img-fluid" alt=""></a>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section>
<!-- End Gallery Section -->



<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Contact</h2>
            <p>Need Help? <span>Contact Us</span></p>
        </div>

        <div class="row gy-4">

            <div class="col-md-6">
                <div class="info-item  d-flex align-items-center">
                    <i class="icon bi bi-map flex-shrink-0"></i>
                    <div>
                        <h3>Our Address</h3>
                        <p>A108 Adam Street, New York, NY 535022</p>
                    </div>
                </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
                <div class="info-item d-flex align-items-center">
                    <i class="icon bi bi-envelope flex-shrink-0"></i>
                    <div>
                        <h3>Email Us</h3>
                        <p>Dtock.admin@gmail.com</p>
                    </div>
                </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
                <div class="info-item  d-flex align-items-center">
                    <i class="icon bi bi-telephone flex-shrink-0"></i>
                    <div>
                        <h3>Call Us</h3>
                        <p>+1 5589 55488 55</p>
                    </div>
                </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
                <div class="info-item  d-flex align-items-center">
                    <i class="icon bi bi-share flex-shrink-0"></i>
                    <div>
                        <h3>Opening Hours</h3>
                        <div><strong>Mon-Sat:</strong> 9AM - 8PM;
                            <strong>Sunday:</strong> Closed
                        </div>
                    </div>
                </div>
            </div><!-- End Info Item -->

        </div>

        <!--Start Contact Form -->
        <div class="form-control mt-0">
            <form action="{{ route('contact') }}" method="post" role="form" class=" p-3 p-md-4">
                @csrf
                <div class="row mt-4">
                    <div class="col-xl-6">
                        <input type="text" name="name" @error('name') is-invalid @enderror class="form-control"
                            id="name" placeholder="Name" value="{{ old('name') }}">
                        @error('name')
                            <div class="text-danger offset-xxl-2 offset-3">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xl-6">
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                        @error('email')
                            <div class="text-danger offset-xxl-2 offset-3">{{ $message }}</div>
                        @enderror
                    </div>

                </div>


                <div class="mt-4">
                    <input type="tel" class="form-control " name="phone" id="phone"
                        placeholder="Tel - 09668921869" value="{{ old('phone') }}" pattern="[0-9]{9,15}" required>

                    {{-- <div class="form-group"> --}}
                    {{-- <input type="tel" value="" class="form-control" id="u_tel" name="phone"  placeholder="Tel"  required data-required-error="Kérjük, adja meg a telefonszámát"  minlength="8" maxlength="15">
                                       <div class="help-block with-errors"></div> --}}
                    {{-- </div> --}}
                </div>

                <div class="mt-4">
                    <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="5"
                        placeholder="Message" required>{{ old('message') }}</textarea>

                    @error('message')
                        <div class="text-danger offset-xxl-2 offset-3">{{ $message }}</div>
                    @enderror
                </div>


                <div class="text-center mt-4"><button class="btn btn-danger text white" type="submit">Send
                        Message</button></div>
            </form>
        </div>
        <!--End Contact Form -->
    </div>
</section>
<!-- End Contact Section -->

<!-- Start Google Maps -->
<div class="mb-0">
    <iframe style="border:0; width: 100%; height: 350px;"
        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
        frameborder="0" allowfullscreen></iframe>
</div>
<!-- End Google Maps -->

@endsection
