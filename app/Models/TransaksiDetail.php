<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user',
        'total',
        'no_meja',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_user' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }

    public function idUser()
    {
        return $this->belongsTo(User::class,'id_user');
    }

    public function transaksiItems()
    {
        return $this->hasMany(TransaksiItem::class,'id_transaksi_detail');
    }

    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class,'id_transaksi_detail');
    }
}
