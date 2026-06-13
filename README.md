# Restaurant Reservation System

Sistem manajemen reservasi restoran modern yang dibangun dengan Laravel 12, dirancang untuk memudahkan pelanggan melakukan pemesanan meja dan menu, serta membantu admin dan customer service mengelola operasional restoran.

## 🚀 Fitur Utama

### Admin
- Dashboard dengan statistik lengkap
- Manajemen pengguna (Admin, CS, Pelanggan)
- Manajemen restoran dan meja
- Manajemen menu dan kategori
- Manajemen reservasi
- Laporan PDF & Excel

### Customer Service (CS)
- Dashboard operasional
- Kelola reservasi masuk
- Check-in pelanggan
- Kelola pesanan makanan
- Kelola keluhan pelanggan
- Notifikasi real-time

### Pelanggan
- Profil dan edit informasi
- Sistem reservasi meja
- Pemesanan menu online
- Review dan rating
- Riwayat reservasi dan pesanan
- Pengajuan keluhan

## 📋 Requirements

- PHP 8.3+
- MySQL 8.0+
- Composer
- Node.js & NPM

## 🔧 Installation

### 1. Clone Repository
```bash
git clone https://github.com/dwipariandi7-design/restaurant-reservation-system.git
cd restaurant-reservation-system
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Setup Environment
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Database Configuration
Update database settings di `.env`:
```
DB_DATABASE=restaurant_reservation
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Run Migrations & Seeders
```bash
php artisan migrate --seed
```

### 6. Storage Link
```bash
php artisan storage:link
```

### 7. Build Assets
```bash
npm run build
```

### 8. Run Server
```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`

## 👥 Default User Accounts

### Admin
- Email: `admin@restaurant.local`
- Password: `password`

### Customer Service
- Email: `cs@restaurant.local`
- Password: `password`

### Customer
- Email: `customer@restaurant.local`
- Password: `password`

## 🎨 Technology Stack

- **Backend:** Laravel 12
- **Database:** MySQL
- **Frontend:** Bootstrap 5, Blade Templating
- **Authentication:** Laravel Breeze
- **Authorization:** Spatie Laravel Permission
- **Charts:** Chart.js
- **Tables:** DataTables
- **Alerts:** SweetAlert2
- **PDF:** DOMPDF
- **Excel:** Maatwebsite Excel

## 🔒 Security

- Role-Based Access Control (RBAC)
- Middleware untuk proteksi route
- Validation untuk semua input
- CSRF Protection
- XSS Prevention

## 📊 Database Schema

Sistem menggunakan 13 tabel utama:
- users
- roles
- permissions
- tables
- categories
- menus
- reservations
- orders
- order_details
- reviews
- complaints
- notifications
- restaurant_settings

## 📄 License

MIT License

## 👨‍💻 Author

Dwi Pariandi - Restaurant Reservation System

---

**Happy Coding! 🎉**
