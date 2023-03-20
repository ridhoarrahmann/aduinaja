<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Notification;
use App\Notifications\PengaduanBaruNotification;
use Illuminate\Notifications\Notifiable;
 // use \Illuminate\Notifications\Notifiable;
class Masyarakat extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;
    // use HasFactory;
    protected $fillable = [
        'nama',
        'nik',
        'email',
        'password',
        'username',
        'telp'
        // add all other fields
    ];
    protected $table = 'masyarakat';
    protected $primaryKey = 'id_masyarakat';
}