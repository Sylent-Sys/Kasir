<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_transaksi_detail',
        'id_menu',
        'jumlah',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_transaksi_detail' => 'integer',
        'id_menu' => 'integer',
    ];

    public function transaksiDetail()
    {
        return $this->belongsTo(TransaksiDetail::class,'id_transaksi_detail');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class,'id_menu');
    }

    public function idTransaksiDetail()
    {
        return $this->belongsTo(TransaksiDetail::class,'id_transaksi_detail');
    }

    public function idMenu()
    {
        return $this->belongsTo(Menu::class,'id_menu');
    }
}
