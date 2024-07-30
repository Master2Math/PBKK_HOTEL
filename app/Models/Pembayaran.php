<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';

    protected $fillable = [
        'id_pembayaran',
        'customer_id',
        'tanggal',
        'metode_bayar',
        'id_invoice',
    ];

    protected $primaryKey = 'id';

    // <<<<<<<<<<<<<<<<
    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    
    public function invoice(){
        return $this->belongsTo(Invoice::class, 'id_invoice');
    }

}
