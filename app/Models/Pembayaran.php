<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user',
        'id_transaksi_detail',
        'bayar',
        'kembalian',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_user' => 'integer',
        'id_transaksi_detail' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }

    public function transaksiDetail()
    {
        return $this->belongsTo(TransaksiDetail::class,'id_transaksi_detail');
    }

    public function idUser()
    {
        return $this->belongsTo(User::class,'id_user');
    }

    public function idTransaksiDetail()
    {
        return $this->belongsTo(TransaksiDetail::class,'id_transaksi_detail');
    }
}
