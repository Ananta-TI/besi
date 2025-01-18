{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/> --}}

@extends('layout')

@section('content')

    <head>
        <!-- Tambahkan link Animate.css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    </head>
    <div id="home" class="bg-static ">
        <h1 class="text-7xl font-bold text-yellow-500 mb-4 text-center animate__animated animate__fadeInDown">Welcome to Our
            Website</h1>
        <p class="text-lg font-bold text-white mb-6 text-center animate__animated animate__fadeInUp">Explore our products!
        </p>
    </div>

    <br>
    <div id="products" class="container products-section"><br>
        <h4  class="font-bold mb-4 text-center animate__animated animate__fadeInDown">Selamat Datang</h4>
        <h3  class="font-bold mb-4 text-center animate__animated animate__fadeInDown"><em><strong>Sukses Jaya Bersama</strong></em></h3>
        <h1 class="font-bold mb-4 text-center animate__animated animate__fadeInDown"><span>Supplier Wire Rope Terlengkap &amp; Terpercaya</span>
        </h1>
        <br>
        <p  class="mb-4 text-center animate__animated animate__fadeInDown"><a class="no-underline" href="/"><strong><span style="color: #333333;">Supplier Wire
                        Rope</span></strong></a>, Chain Block &amp; Alat – Alat Lifting, Kami Akan Menjadi Partner dan
            Solusi Anda Di Bidang Lifting Equipment, Pelayanan &amp; Respon yang Cepat Dari Kami Akan Sangat Membantu Anda
            Dalam Menyelesaikan Kebutuhan Anda. Pelanggan Adalah Raja, Kepuasan Pelanggan Adalah Kebanggaan Untuk Kami</p>
            <br>
            <div class="flex flex-wrap justify-center">
                @foreach ($products as $product)
                    <div class="product-card">
                        <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
                        <h3 class="text-xl font-semibold mt-4">{{ $product->name }}</h3>

                        <p class="text-gray-600">
                            {{ implode(' ', array_slice(explode(' ', $product->description), 0, 0)) }}
                            {{-- @if (str_word_count($product->description) > 10) --}}
                                 <a class=" no-underline"  href="{{ route('products.show', $product->id) }}"> Read More </a>
                        </p>
                    </div>
                @endforeach
            </div>

    </div>
    <br>

{{-- about --}}
<h1 id="about" class="text-5xl font-bold text-gray-800 mb-12 text-center">About</h1>
<div class="section-container py-8">
    @foreach ($about as $item)
    <div class="content-box mb-12 text-center">
        @if ($item->image)
            <!-- Tampilkan Gambar Jika Ada -->
            <img src="{{ asset('images/abouts/' . $item->image) }}" class="mx-auto mb-6 rounded-lg">
        @endif
        <div>
            <h2 class="font-bold text-2xl text-gray-800 mb-4">{{ $item->title }}</h2>
            <p class="text-gray-600 leading-relaxed">{{ $item->description }}</p>
        </div>
    </div>
    @endforeach
</div>


   <!-- Section Industries -->
   <
    {{-- pabrik --}}
    <div class="industries-section">
        <h2>Kami Melayani Pelanggan dari berbagai Pasar Industri Berikut:</h2>
        <div class="container mx-auto px-4 py-14">
            <div class="industries-grid">
                @if($industries->isNotEmpty())
                <div class="row">
                    @foreach($industries as $industry)
                        <div class="col-md-4 mb-4 container">
                            <div>
                                <img style="max-width: 300px; width: 100%; height: auto;" src="{{ asset('storage/' . $industry->image) }}" class="card-img-top" alt="{{ $industry->name }}">
                                <div class="card-body">
                                    {{-- <h5 class="card-title">{{ $industry->name }}</h5> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            </div>
        </div>
    </div>
    <br>
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

    <h1 id="brand" class="container flex items-center justify-center max-w-screen-lg text-4xl font-bold">
        Brand
    </h1>

    <swiper-container class="container" pagination="true" effect="coverflow" grab-cursor="true" centered-slides="true"
        slides-per-view="auto" coverflow-effect-rotate="50" coverflow-effect-stretch="0" coverflow-effect-depth="100"
        coverflow-effect-modifier="1" coverflow-effect-slide-shadows="false" autoplay="true">
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
@endsection
