<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien';
    protected $guarded = ['id'];

    public function kunjungan()
    {
        return $this->hasMany(Kunjungan::class, 'pasien_id', 'id');
    }
}
