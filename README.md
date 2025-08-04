# Aplikasi Berita Laravel (Tes Teknis)

Aplikasi web sederhana yang dibangun dengan Laravel untuk menampilkan berita dari API eksternal (NewsAPI.org) dan juga memiliki fitur manajemen artikel (CRUD) di database lokal.

## Fitur Utama

- **Berita dari API Eksternal:** Menampilkan berita terkini dan hasil pencarian dari NewsAPI.org.
- **Pencarian Berita:**
    - Pencarian berita global dari API berdasarkan judul.
    - Pencarian artikel lokal dari database berdasarkan judul.
- **Manajemen Artikel (CRUD):**
    - Halaman khusus untuk menambah, melihat, mengedit, dan menghapus artikel di database lokal.
- **Tampilan Responsif:** Dibuat menggunakan Bootstrap 5 untuk tampilan yang baik di desktop maupun mobile.

## Teknologi yang Digunakan

- **Backend:** Laravel 12, PHP 8.2
- **Frontend:** HTML, Bootstrap 5
- **Database:** MySQL
- **API Eksternal:** NewsAPI.org

## Cara Setup & Instalasi

1.  **Clone repositori ini:**
    ```bash
    git clone [https://github.com/USERNAME/NAMA_REPO.git](https://github.com/USERNAME/NAMA_REPO.git)
    cd NAMA_REPO
    ```

2.  **Install dependensi Composer:**
    ```bash
    composer install
    ```

3.  **Buat file `.env`:**
    ```bash
    cp .env.example .env
    ```

4.  **Generate application key:**
    ```bash
    php artisan key:generate
    ```

5.  **Konfigurasi database di file `.env`:**
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=db_aplikasi_berita
    DB_USERNAME=root
    DB_PASSWORD=
    ```

6.  **Jalankan migrasi database:**
    ```bash
    php artisan migrate
    ```

7.  **Dapatkan API Key dari [NewsAPI.org](https://newsapi.org/)** dan tambahkan ke file `.env`:
    ```env
    NEWS_API_KEY=MASUKKAN_API_KEY_ANDA_DI_SINI
    ```

8.  **Jalankan server development:**
    ```bash
    php artisan serve
    ```

9.  Buka **`http://127.0.0.1:8000`** di browser Anda.
