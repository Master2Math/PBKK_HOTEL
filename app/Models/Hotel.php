<?php

namespace App\Models;

use App\Models\Hotel;
use App\Models\Kamar;

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
        'id_kamar',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (is_null($model->tanggal)) {
                $model->tanggal = now()->toDateString();
            }
        });
    }

    protected $primaryKey = 'id';

    // <<<<<<<<<<<<<<<<
    public function kamar(){
        return $this->belongsTo(Kamar::class, 'id_kamar');
    }



    // >>>>>>>>>>>>>>>>>>>
    // public function dataReservasi(){
    //     return $this->hasOne(Reservasi::class,'id_reservasi');
    // }

    public function reservasi()
{
    return $this->hasMany(Reservasi::class, 'id_hotel');
}

    // public function kelas(){
    //     return $this->belongsTo(Kelas::class, 'id_kelas');
    // }

    // public function matakuliah(){
    //     return $this->belongsTo(Matakuliah::class, 'id_matkul');
    // }
}
