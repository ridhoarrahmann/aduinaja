<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{

    // use HasFactory;
    public $timestamps=false;
    public $fillable=[
	'id_kategori',
	'id_sub_kategori',
	'tgl_pengaduan',
	'nik',
	'isi_laporan',
	'foto',
	'status'
    ];
    protected $table ='pengaduan';
}
