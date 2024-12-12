<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keperluan extends Model
{
    use HasFactory;

    protected $table = 'keperluans';

    protected $guarded = [];
    public function bahanKeluar()
    {
        return $this->hasMany(BahanKeluar::class, 'id_keperluan');
    }
}
