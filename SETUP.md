# Restaurant Reservation System - Setup Guide

## Persyaratan
- PHP 8.3+
- MySQL 8.0+
- Composer
- Node.js & NPM
- Git

## Instalasi Step-by-Step

### 1. Clone Repository
```bash
git clone https://github.com/dwipariandi7-design/restaurant-reservation-system.git
cd restaurant-reservation-system
```

### 2. Install Composer Dependencies
```bash
composer install
```

### 3. Copy Environment File
```bash
cp .env.example .env
```

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Configure Database
Edit file `.env` dan sesuaikan dengan konfigurasi database Anda:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=restaurant_reservation
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Create Database
```bash
mysql -u root -p
CREATE DATABASE restaurant_reservation;
EXIT;
```

### 7. Run Migrations
```bash
php artisan migrate
```

### 8. Run Seeders
```bash
php artisan db:seed
```

### 9. Install NPM Dependencies
```bash
npm install
```

### 10. Build Frontend Assets
```bash
npm run dev
```

Untuk production:
```bash
npm run build
```

### 11. Create Storage Link
```bash
php artisan storage:link
```

### 12. Run Server
```bash
php artisan serve
```

Aplikasi akan berjalan di: `http://localhost:8000`

## Default Credentials

### Admin
- Email: `admin@restaurant.local`
- Password: `password`
- URL: `http://localhost:8000/admin/dashboard`

### Customer Service
- Email: `cs@restaurant.local`
- Password: `password`
- URL: `http://localhost:8000/cs/dashboard`

### Pelanggan
- Email: `customer@restaurant.local`
- Password: `password`
- URL: `http://localhost:8000/customer/dashboard`

## Troubleshooting

### 1. Permission Denied Error
```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

### 2. Key missing error
```bash
php artisan key:generate
```

### 3. Migration Error
```bash
# Reset database
php artisan migrate:fresh --seed
```

### 4. Npm install error
```bash
rm -rf node_modules package-lock.json
npm install
```

## Fitur yang Tersedia

✅ Role-Based Access Control (Admin, CS, Customer)
✅ Sistem Reservasi Meja
✅ Sistem Pemesanan Menu
✅ Dashboard Analytics
✅ Manajemen Pengguna
✅ Manajemen Meja & Menu
✅ Sistem Rating & Review
✅ Sistem Keluhan Pelanggan
✅ Laporan PDF & Excel
✅ Notifikasi Real-time
✅ Mobile Responsive

## Dokumentasi API

API documentation akan tersedia di: `/api/documentation`

## Support

Jika ada pertanyaan atau masalah, silakan buat issue di repository ini.

## License

MIT License
