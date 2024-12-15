@extends('layout')

@section('content')

<div id="home" class=" bg-static">
    <h1 class="text-7xl font-bold text-yellow-500 mb-4 text-center">Welcome to Our Website</h1>
    <p class="text-lg font-bold text-white mb-6 text-center">Explore our products!</p>
</div>

<div id="products" class="products-section">
    <h1 class="  text-3xl font-bold text-black mb-4 text-center">Our Product</h1>
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

<h1 id="about" class="  text-5xl font-bold text-black mb-4 text-center">About Us</h1>
<div  class="section-container">

    <div class="content-box">
        <img src="{{ asset('images/home.png') }}" alt="Ship image">
        <p><strong>Keluarga Besi Tua</strong> adalah Supplier (Pemasok) Lifting yang mapan dan kredibel dari <strong>Wire Rope</strong> dan <strong>Chain Slings</strong>, rakitan dan Produk Rigging lainnya ke sektor Minyak & Gas, lepas pantai, laut, pertambangan, dan konstruksi di seluruh Indonesia. Kami akan terus belajar, beradaptasi, dan berusaha menjadi mitra rigging dan lifting yang handal. Kami selalu berusaha menjadi mitra lifting yang dapat diandalkan oleh Anda.</p>
        <p><strong>SJ Bersama</strong><br>Supplier Jual Wire Rope Berkualitas</p>
    </div>

    <div class="content-box">
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
    <div class="industries-grid">
        <img src="{{ asset('images/slider-1.jpg') }}" alt="Construction">
        <img src="{{ asset('images/slider-1.jpg') }}" alt="Mining">
        <img src="{{ asset('images/slider-1.jpg') }}" alt="Offshore">
        <img src="{{ asset('images/slider-1.jpg') }}" alt="Shipping">
        <img src="{{ asset('images/slider-1.jpg') }}" alt="Ports">
        <img src="{{ asset('images/slider-1.jpg') }}" alt="Manufacturing">
    </div>
</div>



{{-- Footer --}}
<footer>
    <p>&copy; {{ date('Y') }} Sukses Jaya Bersama. All rights reserved.</p>
    <p>Contact Me:
        <a href="mailto:contact@sjbersama.com">contact@sjbersama.com</a> |
        <a href="tel:+6281234567890">+62 812-3456-7890</a>
    </p>
    <p>Follow us on
        <a href="https://instagram.com/sjbersama" target="_blank">Instagram</a>
    </p>
</footer>

@endsection
