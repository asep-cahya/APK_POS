<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;
use App\Models\User;

class Jenis extends Model
{
    protected $table = 'jenis';

    protected $fillable = [
        'nama_jenis',
        'keterangan',
        'created_by',
    ];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'jenis_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
