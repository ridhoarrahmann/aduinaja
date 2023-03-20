<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    // use HasFactory;
    public $timestamps=false;
    public $fillable=[
    		'tanggapan_id_pengaduan',
    		'tgl_tanggapan',
    		'tanggapan',
    		'id_petugas',
    ];
    protected $table='tanggapan';
}
