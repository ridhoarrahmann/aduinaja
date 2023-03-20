<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_kategori extends Model
{
    // use HasFactory;
      public $timestamps = false;
      protected $fillable=[
      	'id_kategori',
      	'nama_sub_kategori'
      ];
      protected $table='Sub_kategori';
}
