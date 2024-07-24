<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamar';

    protected $fillable = [
        'id_kamar',
        'nama_kamar',
        'jenis_kamar',
        'ukuran_kamar',
        'harga',
    ];
    public function dataHotel(){
        return $this->hasOne(Hotel::class,'id_hotel');
    }
}
