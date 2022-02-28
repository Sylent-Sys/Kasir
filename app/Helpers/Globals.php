<?php
namespace App\Helpers;
class Globals {
    public static function rupiah($angka) {
        return "Rp " . number_format($angka,2,',','.');
    }
    public static function check_image_path($path) {
        return str_contains($path, 'https') ? $path : asset('storage/' . $path);
    }
}
