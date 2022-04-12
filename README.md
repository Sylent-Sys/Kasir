# Panduan Projek UKK Kasir
## Dependensi
1. Laravel Blueprint
2. Laravel Livewire
3. Laravel Debugbar
## Perintah di CLI Yang Harus Di Ketik
```bash
php artisan storage:link
php artisan blueprint:build
```
## Procedure
```sql
DROP  PROCEDURE  IF  EXISTS  `hapusMenu`;
CREATE  PROCEDURE  `hapusMenu`(IN  `idMenu`  INT) NOT DETERMINISTIC CONTAINS SQL  SQL  SECURITY DEFINER DELETE  FROM  `menus`  WHERE  `menus`.`id`=idMenu;
```
## Trigger
```sql
DROP TRIGGER IF  EXISTS  `kurangStok`;
CREATE TRIGGER `kurangStok`  AFTER  INSERT  ON  `transaksi_items` FOR EACH ROW  UPDATE  `menus`  SET  `menus`.`stok`=`menus`.`stok`-new.jumlah  WHERE  `menus`.`id`=new.menu_id;
```
## Proses Pengerjaan
### Buat Blueprint dan build
### Pastikan hasil Migrationmu sudah ada procedure dan trigger
### Pastikan Modelsmu sudah sesuai
### Buat Gate di AuthServiceProvider
### Buat Helpers Globals.php RoleUser.php
### Buat Layouts
1. app.blade.php
2. header.blade.php
3. sidebar.blade.php
4. title.blade.php
5. print.blade.html
6. transaksi.blade.php
7. laporan.blade.php > ambil aja dari table yang lu buat di index-laporan.blade.php
### Buat Login
```bash
php artisan make:livewire Auth.Login
```
1. Login.php
2. login.blade.php
### Buat Register
```bash
php artisan make:livewire Auth.Register
```
1. Register.php
2. register.blade.php > ambil saja dari login.blade.php tinggal tambahin input untuk password, ganti event di tag form, dan kata2 di tag a jadi “Sudah Punya Akun?” hrefny ke login
### Buat Dashboard
```bash
php artisan make:livewire Dashboard
```
1. Dashboard.php
2. dashboard.blade.php
3. table.blade.php
4. admin.blade.php
5. guest.blade.php > cuma div yang isiny "Selamat Datang Di Aplikasi Kami"
### Buat Index Menu
```bash
php artisan make:livewire Menu.IndexMenu
```
1. IndexMenu.php
2. index-menu.blade.php
3. card.blade.php
### Buat Add Menu
```bash
php artisan make:livewire Menu.AddMenu
```
1. AddMenu.php
2. add-menu.blade.php
### Buat Edit Menu
```bash
php artisan make:livewire Menu.EditMenu
```
1. EditMenu.php
2. edit-menu.blade.php > ambil aja dari add-menu.php dengan catatan ganti di Title jadi “Edit Menu”, form event jadi edit, terus wire:model semuany dari data. ke menu. dan di input gambar jadi gambar saja
### Buat Pesanan
```bash
php artisan make:livewire Pesanan.IndexPesanan
```
1. IndexPesanan.php
2. index-pesanan.blade.php
### Buat Transksi
```bash
php artisan make:livewire Transaksi.IndexTransaksi
```
1. IndexTransaksi.php
2. index-transaksi.blade.php
### Buat FormPembayaran
```bash
php artisan make:livewire Transaksi.FormPembayaran
```
1. FormPembayaran.php
2. form-pembayaran-blade.php
### Buat IndexLaporan
```bash
php artisan make:livewire Laporan.IndexLaporan
```
1. IndexLaporan.php > passing data
2. index-laporan.blade.php
### Buat Controller Print
```bash
php artisan make:controller PrintController
```
1. PrintController.php
