<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Model;
use Notification;
use App\Notifications\PengaduanBaruNotification;
 
 use \Illuminate\Notifications\Notifiable;


class Petugas extends Authenticatable
{
        use Notifiable;
    public $timestamps = false;
      // use HasFactory;
      protected $fillable = [
        'nama_petugas',
        'username',
        'password',
        'telp',
        'level',
        
        // add all other fields
    ];
    protected $table = 'petugas';
    protected $primaryKey = 'id_petugas';
}
