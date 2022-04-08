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
        'transaksi_detail_id',
        'menu_id',
        'jumlah',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'transaksi_detail_id' => 'integer',
        'menu_id' => 'integer',
    ];

    public function transaksiDetail()
    {
        return $this->belongsTo(TransaksiDetail::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
