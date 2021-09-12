<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spka extends Model
{
    use HasFactory;
    // protected $primaryKey = 'Kd_dinas';

    protected $table = 'tb_dinas';

    protected $fillable = [
        'Kd_dinas', 'Nm_dinas'
    ];

      public function kontrol(){
        return $this->hasMany(Kontrol::class,'skpa_id','id');
    }
}
