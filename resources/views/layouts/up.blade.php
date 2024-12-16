
<style>
   .main {
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    background-color: #fff;
    width: 100%;
}

.img {
    height: 100px;
    width: 200px;
    margin-top: 50px;
    margin-bottom: -50px;
    margin-left: 30px;
}

.info {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 20px;
}

.info p {
    margin-right: 30px;
}

/* Media Query untuk tampilan mobile */
@media (max-width: 768px) {
    .img {
        width: 100%; /* Mengubah lebar gambar menjadi 100% */
        height: auto; /* Menjaga rasio aspek gambar */
        margin-left: 0; /* Menghapus margin kiri */
        margin-top: 20px; /* Mengurangi margin atas */
        margin-bottom: 20px; /* Mengurangi margin bawah */
    }

    .info {
        flex-direction: column; /* Mengubah arah flex menjadi kolom */
        align-items: flex-start; /* Mengatur item ke kiri */
        justify-content: flex-start; /* Mengatur konten ke atas */
        gap: 10px; /* Mengurangi jarak antar elemen */
    }

    .info p {
        margin-right: 0; /* Menghapus margin kanan */
        margin-bottom: 10px; /* Menambahkan margin bawah untuk jarak antar paragraf */
    }
}
</style>
<main class="main" id="info">

    <div >
        <img src="images/Home.png" alt="Logo Perusahaan" class="img animate__animated animate__fadeIn animate__delay-1s">
    </div>
    <div class="info">
        <p class="text-gray-700 font-bold ">021-22622786 |</p>
        <p class="text-gray-700">Open Hours: <br> MON-FRI 09:00 - 17:00</p>
        <p class="text-gray-700 font-bold">Mangga Dua Square Lt. 1 Blok C, HC No. 008</p>
    </div>
</main>



