<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;
    protected $table = 'reservasi';

    protected $fillable = [
        'id_reservasi',
        'customer_id',
        'tanggal',
        'tanggal_mulai',
        'tanggal_akhir',
        'id_hotel',
    ];
    protected $primaryKey = 'id';

    // <<<<<<<<<<<<<<<<
    public function hotel(){
        return $this->belongsTo(Hotel::class, 'id_hotel');
    }
    
    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    

}
