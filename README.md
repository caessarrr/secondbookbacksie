# Konsep Aplikasi Marketplace SecondBook (MVP)

## 1. Deskripsi Umum
Aplikasi marketplace ini adalah platform online di mana berbagai pemilik toko dapat mendaftar dan menjual buku kepada pelanggan. Admin memiliki kontrol penuh untuk mengelola pengguna, produk, dan transaksi.

## 2. Peran Pengguna

### Admin
- Mengelola pengguna (pemilik toko dan pelanggan)
- Mengelola produk
- Mengelola kategori buku
- Mengelola transaksi dan laporan penjualan
- Memoderasi konten yang masuk

### Pemilik Toko (Seller)
- Mendaftar dan mengelola akun
- Menambah, mengedit, dan menghapus produk (buku)
- Mengelola stok produk
- Melihat dan mengelola pesanan dari pelanggan
- Melihat laporan penjualan toko mereka
- Melihat penghasilan dan melakukan penarikan dana

### Pelanggan (Customer)
- Mendaftar dan mengelola akun
- Melihat dan mencari produk (buku)
- Menambahkan produk ke keranjang belanja
- Melakukan checkout dan pembayaran
- Melihat riwayat pembelian dan status pesanan

## 3. Fitur Utama

### Registrasi dan Autentikasi
- Sistem registrasi dan login untuk admin, pemilik toko, dan pelanggan
- Reset password

### Manajemen Produk
- Admin dan pemilik toko dapat menambah, mengedit, dan menghapus produk
- Fitur upload gambar produk
- Kategori produk

### Manajemen Pengguna
- Admin dapat melihat, mengedit, dan menghapus akun pengguna
- Pemilik toko dan pelanggan dapat mengelola profil mereka

### Transaksi
- Pelanggan dapat menambah produk ke keranjang dan melakukan checkout
- Sistem pembayaran (misalnya integrasi dengan payment gateway)
- Konfirmasi pesanan dan pemberitahuan status

### Dashboard
- Admin memiliki dashboard untuk melihat statistik pengguna, produk, dan penjualan
- Pemilik toko memiliki dashboard untuk melihat statistik penjualan dan penghasilan toko mereka
- Fitur penarikan dana bagi pemilik toko

### Search dan Filter
- Pelanggan dapat mencari produk berdasarkan nama, kategori, atau filter lainnya

### Notifikasi
- Notifikasi email untuk konfirmasi pendaftaran, pemesanan, dan update status pesanan

### Review dan Rating
- Pelanggan dapat memberikan review dan rating pada produk yang dibeli

## 4. Struktur Database (HighLevel)

### Admin
- id, name, email, password, created_at, updated_at

### Seller
- id, name, email, password, phone (opsional), address (opsional), created_at, updated_at

### Customer
- id, name, email, password, phone (opsional), address (opsional), created_at, updated_at

### Stores
- id, seller_id (foreign key to Seller), store_name, store_details, created_at, updated_at

### Products
- id, store_id (foreign key to Stores), name, description, author, isbn, price, stock, category_id (foreign key to Categories), images, created_at, updated_at

### Categories
- id, name, created_at, updated_at

### Orders
- id, customer_id (foreign key to Customer), total_amount, status, created_at, updated_at

### Order_Items
- id, order_id (foreign key to Orders), product_id (foreign key to Products), quantity, price, created_at, updated_at

### Reviews
- id, product_id (foreign key to Products), customer_id (foreign key to Customer), rating, comment, created_at, updated_at

### Withdrawals
- id, seller_id (foreign key to Seller), amount, status, created_at, updated_at

### Earnings
- id, seller_id (foreign key to Seller), total_earnings, available_for_withdrawal, pending_withdrawal, created_at, updated_at

## 5. User Flow

### Admin
1. Login ke dashboard admin
2. Melihat statistik pengguna dan transaksi
3. Mengelola pengguna (menambah, mengedit, menghapus)
4. Mengelola produk dan kategori
5. Mengelola laporan penjualan
6. Menyetujui atau menolak permintaan penarikan dana dari pemilik toko

### Pemilik Toko (Seller)
1. Registrasi dan login
2. Membuat dan mengelola toko mereka
3. Menambah dan mengelola produk
4. Melihat dan mengelola pesanan masuk
5. Melihat laporan penjualan dan penghasilan toko mereka
6. Mengajukan permintaan penarikan dana

### Pelanggan (Customer)
1. Registrasi dan login
2. Menjelajah dan mencari produk
3. Menambah produk ke keranjang
4. Melakukan checkout dan pembayaran
5. Melihat riwayat pembelian dan status pesanan

## 6. Teknologi yang Digunakan

**Backend:** Laravel  
**Frontend:** Next.js  
**Database:** MySQL/PostgreSQL  
**Autentikasi:** Laravel Passport/Sanctum  
**Payment Gateway:** Stripe, Midtrans, atau lainnya  
**Perhitungan Ongkir:** Raja Ongkir  
**Deployment:** AWS, DigitalOcean, atau layanan cloud lainnya

## Penutup
Dengan konsep ini, aplikasi marketplace mencakup fitur tambahan yang memungkinkan pelanggan untuk melakukan checkout, serta pemilik toko untuk melihat penghasilan dan melakukan penarikan dana. Struktur database yang diperbarui memastikan bahwa semua informasi terkait peran pengguna, produk, transaksi, dan penarikan dana dikelola dengan baik. Fokus pada MVP tetap dipertahankan untuk memastikan fitur inti berfungsi dengan baik dan siap untuk diuji di pasar.
