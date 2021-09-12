<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontrol extends Model
{
    use HasFactory;

    protected $table = 'kontrol';

    protected $fillable = [
        'tgl','jam', 'server', 'deskripsi_masalah', 'kategori',
        'deskripsi_penyelesaian', 'koordinasi', 'ket','pelapor','no_hp','email', 'skpa_id'
    ];

     public function skpa(){
        return $this->belongsTo(Spka::class,'skpa_id','id');
    }

    // protected $casts = [
    //     'created_at' => 'datetime:Y-m-d H:m:s',
    //     'updated_at' => 'datetime:Y-m-d H:m:s',
    // ];
}
