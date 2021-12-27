## Tutorial Instalasi

1. Jalankan perintah git clone https://github.com/danikaharu/arsip.git di terminal
2. Jalankan perintah composer install di terminal
3. Duplikat file .env.example, lalu rename menjadi .env.
4. Kembali ke terminal, php artisan key:generate.
5. Setting koneksi database di file .env (DB_DATABASE, DB_USERNAME, DB_PASSWORD).
6. Jalankan perintah php artisan migrate Jika di cek di phpmyadmin, seharusnya tabel sudah muncul.
7. Jalankan perintah php artisan db:seed --class=UserTableSeeder untuk membuat pengguna
8. Terakhir jalankan perintah php artisan serve
