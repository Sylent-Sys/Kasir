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
DROP PROCEDURE IF EXISTS `hapusMenu`
CREATE PROCEDURE `hapusMenu`(IN `idMenu` INT) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER DELETE FROM `menus` WHERE `menus`.`id`=idMenu
```
## Trigger
```sql
DROP TRIGGER IF EXISTS `kurangStok`
CREATE TRIGGER `kurangStok` AFTER INSERT ON `transaksi_items` FOR EACH ROW UPDATE `menus` SET `menus`.`stok`=`menus`.`stok`-new.jumlah WHERE `menus`.`id`=new.menu_id
```
## Proses Pengerjaan
1. Buat Blueprint dan build
2. Pastikan hasil Migrationmu sudah ada procedure dan trigger
3. Pastikan Modelsmu sudah sesuai
4. Buat Helpers Globals.php RoleUser.php
5. Buat Layouts
    app.blade.php
    header.blade.php
    sidebar.blade.php
    title.blade.php
    print.blade.html
    transaksi.blade.php
    laporan.blade.php > ambil aja dari table yang lu buat di index-laporan.blade.php
6. Buat Login
    ```bash
    php artisan make:livewire Auth.Login
    ```
    Login.php
    login.blade.php
7. Buat Register
    ```bash
    php artisan make:livewire Auth.Register
    ```
    Register.php
    register.blade.php > ambil saja dari login.blade.php tinggal tambahin input untuk password, ganti event di tag form, dan kata2 di tag a jadi “Sudah Punya Akun?” hrefny ke login
8. Buat Dashboard
    ```bash
    php artisan make:livewire Dashboard
    ```
    Dashboard.php
    dashboard.blade.php
    table.blade.php
    admin.blade.php
    guest.blade.php > cuma div yang isiny "Selamat Datang Di Aplikasi Kami"
9.  Buat Index Menu
    ```bash
    php artisan make:livewire Menu.IndexMenu
    ```
    IndexMenu.php
    index-menu.blade.php
    card.blade.php
10. Buat Add Menu
    ```bash
    php artisan make:livewire Menu.AddMenu
    ```
    AddMenu.php
    add-menu.blade.php
11. Buat Edit Menu
    ```bash
    php artisan make:livewire Menu.EditMenu
    ```
    EditMenu.php
    edit-menu.blade.php > ambil aja dari add-menu.php dengan catatan ganti di Title jadi “Edit Menu”, form event jadi edit, terus wire:model semuany dari data. ke menu. dan di input gambar jadi gambar saja
12. Buat Pesanan
    ```bash
    php artisan make:livewire Pesanan.IndexPesanan
    ```
    IndexPesanan.php
    index-pesanan.blade.php
13. Buat IndexTransksi
    ```bash
    php artisan make:livewire Transaksi.IndexTransaksi
    ```
    IndexTransaksi.php
    index-transaksi.blade.php
14. Buat FormPembayaran
    ```bash
    php artisan make:livewire Transaksi.FormPembayaran
    ```
    FormPembayaran.php
    form-pembayaran-blade.php
15. Buat IndexLaporan
    ```bash
    php artisan make:livewire Laporan.IndexLaporan
    ```
    IndexLaporan.php > passing data
    index-laporan.blade.php
16.  Buat Controller Print
    ```bash
    php artisan make:controller PrintController
    ```
    PrintController.php
