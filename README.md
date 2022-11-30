## Tentang

APSM (Aplikasi Pengelolaan Surat Menyurat) merupakan aplikasi yang dibuat untuk mengelola surat keluar dan masuk.

## Jenis Repository

Repo ini memiliki prefix "rp" yang berarti "repository pribadi".
Artinya repository ini di khususkan penggunaan pribadi pemilik repository.
Berada di github publik sebagai bentuk arsip.
Jika ingin melakukan modifikasi silahkan sesuaikan dengan environment anda.

## Persyaratan

-   Webserver (apache,nginx)
-   Database SQL (mysql,mariadb)
-   PHP >= 7.3
-   PHP Ekstensi (BCMath,Ctype,Fileinfo,JSON,Mbstring,OpenSSL,PDO,Tokenizer,XML)
-   Package Manager PHP (composer)

## Instalasi

-   Jalankan di terminal "git clone https://github.com/FebrianYudhis/rp-apsm.git"
-   Jalankan di terminal "composer install"
-   Rename .env.example menjadi .env dan sesuaikan dengan environment anda
-   Jalankan di terminal "php artisan key:generate"
-   Jalankan di terminal "php artisan migrate"
-   Jalankan di terminal "php artisan sweetalert:publish"
-   Jalankan di terminal "php artisan storage:link"

## Penggunaan

Untuk membuat akun,silahkan hapus dulu route "register" di dalam "routes/web.php" dan kunjungi /register
[OPT] Kemudian jika sudah membuat akun dan bisa login,kembalikan lagi route "register" sebelumnya yang sudah dihapus,untuk mengunci halaman daftar.

## License

The MIT License (MIT).
