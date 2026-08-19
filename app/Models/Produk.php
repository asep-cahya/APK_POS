<?php

namespace App\Models;

use App\Models\Jenis;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'user_id',
        'jenis_id',
        'foto',
        'nama',
        'harga_jual',
        'harga_beli',
        'stok'
     ];

      public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

     public function ItemPenjualan()
    {
        return $this->hasMany(ItemPenjualan::class, 'produk_id');
    }
     public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'jenis_id');
    }
}
