<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';

    protected $fillable = [
        'customer_id',
        'nik',
        'nama_customer',
        'email',
        'country',
    ];

    // // >>>>>>>>>>>>>>>>>>>
    // public function customer(){
    //     return $this->hasOne(Reservasi::class,'customer_id');
    // }
    
}
