# Website Berita SDGs 

Berikut adalah panduan lengkap untuk melakukan instalasi dan menjalankan proyek ini di lingkungan pengembangan lokal Anda setelah meng-clone dari GitHub.

---

## Prasyarat

Pastikan perangkat lunak berikut sudah terinstal di komputer Anda:
- PHP (versi 8.2 atau lebih baru)
- Composer
- Node.js & NPM
- Database MySQL

---

## 🚀 Panduan Instalasi Cepat

Panduan ini mengasumsikan Anda sudah berhasil melakukan `git clone` dan sudah berada di dalam direktori proyek melalui terminal.

### 1. Instal Semua Dependensi
Perintah pertama akan menginstal paket PHP (Laravel, Filament, dll.), dan yang kedua akan menginstal paket JavaScript.

```bash
composer install
npm install
```

### 2. Konfigurasi Lingkungan (.env)
Salin file konfigurasi contoh, lalu buat kunci enkripsi unik untuk aplikasi Anda.

```bash
cp .env.example .env
php artisan key:generate
```

### 3. Setup Database
a. **Buat Database:** Buat sebuah database baru di MySQL (misalnya melalui phpMyAdmin) dengan nama `website_berita`.

b. **Atur Koneksi:** Buka file `.env` yang baru saja dibuat. Sesuaikan baris `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` dengan konfigurasi database lokal Anda.
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=website_berita
DB_USERNAME=root
DB_PASSWORD=
```

c. **Migrasi & Seeding:** Perintah ini akan membuat semua struktur tabel dan mengisinya dengan data awal (kategori SDGs & contoh berita) agar website tidak kosong.
```bash
php artisan migrate:fresh --seed
```

### 4. Buat Symbolic Link
```bash
php artisan setup:storage
```

### 5. Jalankan Server Pengembangan
Anda perlu menjalankan dua perintah ini di **dua terminal terpisah**.

**Terminal 1 (Server Backend Laravel):**
```bash
php artisan serve
```

**Terminal 2 (Server Frontend Vite):**
```bash
npm run dev
```

---

## ✅ Selesai!

Sekarang website Anda sudah berjalan dan siap digunakan.

- **Halaman Berita Publik:**
  Buka `http://127.0.0.1:8000/berita`

- **Panel Admin (CMS):**
  Buka `http://127.0.0.1:8000/admin`

- **Akun Admin Awal:**
  - **Email:** `admin@seeder.com`
  - **Password:** `password`

