<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanKeluar extends Model
{
    use HasFactory;

    protected $table = 'bahan_keluars';

    protected $guarded = [];

    public function bahan()
    {
        return $this->belongsTo(Bahan::class, 'id_bahan');
    }
    public function keperluan()
    {
        return $this->belongsTo(Keperluan::class, 'id_keperluan');
    }
}
