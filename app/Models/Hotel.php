<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $table = 'hotel';

    protected $fillable = [
        'id_hotel',
        'harga',
        'available_room',
        'tanggal',
        'alamat_mhs',
        'id_kamar',
    ];

}
