<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataEmail extends Model
{
    use HasFactory;

    protected $table = 'data_email';

    protected $fillable = [
        'ni', 'gd', 'gb', 'nama_p', 'nama_e',
        'jabatan', 'hp', 'Kd_dinas', 'tanggal',
        'jenis', 'gol', 'status'
    ];
}
