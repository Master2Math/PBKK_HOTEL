<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoice';

    protected $fillable = [
        'id_invoice',
        'deskripsi',
        'status',
        'tanggal',
        'besar_dp',
        'id_reservasi',
    ];

    public function reservasi(){
        return $this->belongsTo(Reservasi::class, 'id_reservasi');
    }


}
