## ERD Poliklinik (BK)
![ERD Digital Platform Reseller](https://github.com/pearlgw/digital-platform-juan/blob/main/public/img/erd_digital_platform_reseller.png)

# Panduan Menjalankan Proyek Laravel

Panduan ini menjelaskan langkah-langkah untuk menjalankan proyek Laravel yang telah di-clone dari GitHub

### Langkah 1: Clone Repository

Langkah pertama adalah meng-clone repository proyek dari GitHub ke mesin lokal Anda. Jalankan perintah berikut di terminal:

```bash
git clone https://github.com/pearlgw/digital-platform-juan.git
```
### Langkah 2: Menyalin File .env

```bash
cd digital-platform-juan
cp .env.example .env
```

### Langkah 3: Instalasi Dependensi

```bash
composer install
```

### Langkah 4: Menghasilkan Key Aplikasi

```bash
php artisan key:generate
```

### Langkah 5: Migrasi Database

```bash
php artisan migrate
```

### Langkah 6: Menjalankan Seeder

```bash
php artisan db:seed
```

### Langkah 7: Membuat Link Storage

```bash
php artisan storage:link
```

### Langkah 8: Menjalankan Server

```bash
php artisan serve
```

## Demo
https://gw-poliklinik.natagw.my.id (base on Desktop)
