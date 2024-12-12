<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    use HasFactory;

    protected $table = 'bahans';

    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function bahanMasuk()
    {
        return $this->hasMany(BahanMasuk::class, 'id_bahan');
    }

    public function bahanKeluar()
    {
        return $this->hasMany(BahanKeluar::class, 'id_bahan');
    }
}
