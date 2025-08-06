# 📦 Request App

Aplikasi manajemen permintaan layanan berbasis Laravel.

---

## 🛠️ Cara Install & Menjalankan Aplikasi

### 1. Clone Repository

### 2. Copy `.env.example` and Rename menjadi `.env`

### 3. Konfigurasi Database di `.env`
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=8889
DB_DATABASE=request_app
DB_USERNAME=root
DB_PASSWORD=root 
```

### 4. Konfigurasi Email di `.env`
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email
MAIL_PASSWORD="your_smtp_password"
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your_email
MAIL_FROM_NAME="Request App"
```

---

## 📦 Instalasi Dependency

### 1. Install Dependensi PHP
```bash
composer install
``` 
Jika terjadi error, coba:
```bash
composer update
``` 

### 2. Generate Application Key
```bash
php artisan key:generate
``` 

### 3. Jalankan Migrasi Database & Seeder
```bash
php artisan migrate --seed
``` 

---

## 🚀 Menjalankan Aplikasi
```bash
php artisan serve
``` 

---

## 🧹 Perintah Tambahan
```bash
php artisan optimize
``` 