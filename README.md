# SkilLink

[![Laravel](https://img.shields.io/badge/Laravel-12-red?logo=laravel)](https://laravel.com/)
[![PHP](https://img.shields.io/badge/PHP-8.2-blue?logo=php)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-blue?logo=mysql)](https://www.mysql.com/)

**Skillink** adalah platform yang menghubungkan penyedia keahlian atau layanan dengan klien potensial di sekitar mereka. Platform ini memudahkan individu berbakat untuk mempromosikan keahlian mereka, sekaligus membantu pengguna menemukan penyedia layanan yang terpercaya.

---

## Fitur Utama

-   Explore skill providers dengan filter kategori
-   Halaman detail provider lengkap dengan bio, skills, rating, dan review
-   Admin dashboard: CRUD skill providers & categories, monitoring review
-   Responsif, modern, dan menggunakan style Tailwind + Glassmorphism

---

## Teknologi

-   **Backend:** Laravel 12 (PHP 8.2+)
-   **Database:** MySQL 8.0
-   **Frontend:** Blade + Tailwind CSS
-   **File Storage:** Laravel Storage (`public` disk)
-   **Icon Library:** `mallardduck/blade-lucide-icons`

---

## Struktur Halaman

1. **Explore Page:** Daftar penyedia skill dengan filter kategori, rating, dan lokasi.
2. **Detail Page:** Profil provider, kontak, skills, review, tombol aksi (WhatsApp / Jadwal Konsultasi).
3. **About Page:** Informasi Skillink, keunggulan, dan manfaat.
4. **Admin Dashboard:** Statistik, CRUD skill provider, CRUD kategori, review terbaru.

---

## Style

-   Layout responsif dengan max-width, card dengan shadow, border-radius besar
-   **Glassmorphism:** bg-white/60 + backdrop-blur pada card section
-   Buttons rounded-full dengan hover color transition (biru `#3B82F6`, hijau `#10B981`)
-   Typography Tailwind default (sans-serif)
-   Grid responsive di halaman explore, flex layout untuk profile header

---

## Cuplikan Website

**Home Page:**  
![Explore](/screenshoot/ss-1.png)

**Explore Skill:**  
![Detail](/screenshoot/ss-2.png)

**Admin Dashboard:**  
![Dashboard](/screenshoot/ss-3.png)

---

## Setup Project

1. Clone repository

```bash
git clone <repo-url>
cd skillink
```

2. Install dependencies

```bash
composer install
npm install
npm run dev
```

3. Setup environment

```bash
cp .env.example .env
php artisan key:generate
```

4. Setup database

```bash
php artisan migrate
```

5. Serve aplikasi

```bash
php artisan serve
```

> admin email = admin@skillink.test , password = Skill123

---

## Generate Dummy Data

Skillink sudah menyiapkan dummy data untuk testing dan development:

1. Jalankan seeder:

```bash
php artisan db:seed --class=SkillinkDemoSeeder
```

2. Fitur dummy termasuk:

-   Skill providers dengan nama, lokasi, dan nomor telepon Indonesia
-   Kategori skill
-   Reviews
-   Foto dummy (folder public/storage/dummy)

> Catatan: File dummy tidak akan terhapus saat provider dihapus, kecuali file asli di luar folder dummy/.
