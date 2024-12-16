<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

@extends('layout')

@section('content')
<head>
    <!-- Tambahkan link Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<div id="home" class="bg-static ">
    <h1 class="text-7xl font-bold text-yellow-500 mb-4 text-center animate__animated animate__fadeInDown">Welcome to Our Website</h1>
    <p class="text-lg font-bold text-white mb-6 text-center animate__animated animate__fadeInUp">Explore our products!</p>
</div>

<br>
<div id="products" class="container products-section"><br>
    <h1 class="  text-3xl font-bold mb-4 text-center animate__fadeInDown">Our Product</h1>
    <div class="flex flex-wrap justify-center">
        @foreach ($products as $product)
        <div class="product-card">
            <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
            <h3 class="text-xl font-semibold mt-4">{{ $product->name }}</h3>
            <p class="text-gray-600">Rp.{{ number_format($product->price, 2) }}</p>
            <button class="mt-4 bg-yellow-500 text-white py-2 px-4 rounded">Add to Cart</button>
        </div>
        @endforeach
    </div>
</div>
<br>

<h1 id="about" class="  text-5xl font-bold text-black mb-4 text-center">They no like Us</h1>
<div  class="section-container container">

    <div class="content-box">
        <img src="{{ asset('images/home.png') }}" alt="Ship image">
        <p><strong>Keluarga Besi Tua</strong> adalah Supplier (Pemasok) Lifting yang mapan dan kredibel dari <strong>Wire Rope</strong> dan <strong>Chain Slings</strong>, rakitan dan Produk Rigging lainnya ke sektor Minyak & Gas, lepas pantai, laut, pertambangan, dan konstruksi di seluruh Indonesia. Kami akan terus belajar, beradaptasi, dan berusaha menjadi mitra rigging dan lifting yang handal. Kami selalu berusaha menjadi mitra lifting yang dapat diandalkan oleh Anda.</p>
        <p><strong>SJ Bersama</strong><br>Supplier Jual Wire Rope Berkualitas</p>
    </div>

    <div id="about" class="content-box">
        <h2 class="section-title">Mengapa Anda Memilih Kami?</h2>
        <div class="why-choose-us">
            <div>
                <i class="fas fa-clock"></i>
                <div>
                    <h3>Pengiriman Tepat Waktu</h3>
                    <p>Informasikan metode pengiriman dengan jelas, lalu percayakan sisanya kepada kami.</p>
                </div>
            </div>
            <div>
                <i class="fas fa-check-circle"></i>
                <div>
                    <h3>Jaminan Kualitas Produk</h3>
                    <p>Kami memberikan solusi & jaminan produk aman, asli & bersertifikat.</p>
                </div>
            </div>
            <div>
                <i class="fas fa-tag"></i>
                <div>
                    <h3>Harga Kompetitif & Bersahabat</h3>
                    <p>Kami mengutamakan kenyamanan & ketenangan Anda dalam bertransaksi.</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- pabrik --}}
<div class="industries-section">
    <h2>Kami Melayani Pelanggan dari berbagai Pasar Industri Berikut:</h2>
    <div class="container">

        <div class="industries-grid">
            <img src="{{ asset('images/slider-1.jpg') }}" alt="Construction">
            <img src="{{ asset('images/slider-1.jpg') }}" alt="Mining">
            <img src="{{ asset('images/slider-1.jpg') }}" alt="Offshore">
            <img src="{{ asset('images/slider-1.jpg') }}" alt="Shipping">
            <img src="{{ asset('images/slider-1.jpg') }}" alt="Ports">
            <img src="{{ asset('images/slider-1.jpg') }}" alt="Manufacturing">
        </div>
    </div>
</div>
<br>
<head>
    <style>

      swiper-container {
        width: 100%;
        padding-top: 50px;
        padding-bottom: 50px;
      }

      swiper-slide {
        background-position: center;
        background-size: cover;
        width: 200px;
        height: 200px;
      }

      swiper-slide img {
        display: block;
        width: 100%;
      }
    </style>
  </head>

  <body>
    <h1  id="brand" class="container flex items-center justify-center max-w-screen-lg text-4xl font-bold">
        Brand
    </h1>

    <swiper-container
      class="container"
      pagination="true"
      effect="coverflow"
      grab-cursor="true"
      centered-slides="true"
      slides-per-view="auto"
      coverflow-effect-rotate="50"
      coverflow-effect-stretch="0"
      coverflow-effect-depth="100"
      coverflow-effect-modifier="1"
      coverflow-effect-slide-shadows="false"
      autoplay="true">
      <swiper-slide>
        <img src="../images/laravel.png" />
      </swiper-slide>
      <swiper-slide>
        <img src="../images/vscode.png" />
      </swiper-slide>
      <swiper-slide>
        <img src="../images/html.png" />
      </swiper-slide>
      <swiper-slide>
        <img src="../images/css.png" />
      </swiper-slide>
      <swiper-slide>
        <img src="../images/js.png" />
      </swiper-slide>
      <swiper-slide>
        <img src="../images/php.png" />
      </swiper-slide>
      <swiper-slide>
        <img src="../images/gpt.png" />
      </swiper-slide>

    </swiper-container>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
  </body>


@endsection
