<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    public $table='guru';
    public $primaryKey='id_guru';
    public $fillable=array('username_guru','password_guru','nama_guru','nip_guru','jk_guru','hp_guru','alamat_guru','email_guru','foto_guru');
    public $timestamps=false;
}
