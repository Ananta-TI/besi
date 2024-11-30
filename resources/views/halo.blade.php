
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil eCommerce</title>
    {{-- <link rel="stylesheet" href="styles.css"> --}}
    <style>
       body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

header {
    background: #35424a;
    color: #ffffff}

header h1 {
    margin: 0;
}

nav ul {
    list-style: none;
    padding: 0;
}

nav ul li {
    display: inline;
    margin: 0 15px;
}

nav a {
    color: #ffffff;
    text-decoration: none;
}

nav a:hover {
    text-decoration: underline;
}

.products, .about, .contact {
    background: #ffffff;
    margin: 20px auto;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    max-width: 600px;
}

h2 {
    color: #35424a;
}

.product {
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 20px;
    text-align: center;
}

.product img {
    max-width: 100%;
    height: auto;
}

.price {
    font-weight: bold;
    color: #e74c3c;
}

button {
    background: #35424a;
    color: #ffffff;
    border}


    </style>
</head>
<body>
    <header>
        <h1>Toko Online Anda</h1>
        <nav class="-mx-3 flex flex-1 justify-end">
            @auth
                <a
                    href="{{ url('/dashboard') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                >
                    Dashboard
                </a>
            @else
                <a
                    href="{{ route('login') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                >
                    Log in
                </a>

                @if (Route::has('register'))
                    <a
                        href="{{ route('register') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        Register
                    </a>
                @endif
            @endauth
        </nav>
    </header>

    <section id="products" class="products">
        <h2>Produk Kami</h2>
        <div class="product">
            <img src="https://via.placeholder.com/150" alt="Produk 1">
            <h3>Nama Produk 1</h3>
            <p>Deskripsi singkat tentang produk 1.</p>
            <p class="price">Rp 100.000</p>
            <button>Beli Sekarang</button>
        </div>
        <div class="product">
            <img src="https://via.placeholder.com/150" alt="Produk 2">
            <h3>Nama Produk 2</h3>
            <p>Deskripsi singkat tentang produk 2.</p>
            <p class="price">Rp 200.000</p>
            <button>Beli Sekarang</button>
        </div>
        <div class="product">
            <img src="https://via.placeholder.com/150" alt="Produk 3">
            <h3>Nama Produk 3</h3>
            <p>Deskripsi singkat tentang produk 3.</p>
            <p class="price">Rp 150.000</p>
            <button>Beli Sekarang</button>
        </div>
    </section>

    <section id="about" class="about">
        <h2>Tentang Kami</h2>
        <p>Kami adalah toko online yang menyediakan berbagai produk berkualitas dengan harga terjangkau. Kami berkomitmen untuk memberikan pelayanan terbaik kepada pelanggan kami.</p>
    </section>

    <section id="contact" class="contact">
        <h2>Kontak Kami</h2>
        <p>Jika Anda memiliki pertanyaan atau ingin mengetahui lebih lanjut, silakan hubungi kami di:</p>
        <p>Email: <a href="mailto:info@tokoonline.com">info@tokoonline.com</a></p>
        <p>Telepon: +62 812 3456 7890</p>
    </section>

    {{-- <section id="login" class="login">
        <h2>Login</h2>
        <form>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Masuk</button>
        </form>
    </section>

    <section id="register" class="register">
        <h2>Registrasi</h2>
        <form>
            <label for="reg-name">Nama:</label>
            <input type="text" id="reg-name" name="name" required>
            <label for="reg-email">Email:</label>
            <input type="email" id="reg-email" name="email" required>
            <label for="reg-password">Password:</label>
            <input type="password" id="reg-password" name="password" required>
            <button type="submit">Daftar</button>
        </form>
    </section> --}}

    <footer>
        <p>&copy; 2023 Toko Online Anda. Semua hak dilindungi.</p>
    </footer>
</body>
</html>
