<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mengajar extends Model
{
    use HasFactory;
    public $table='mengajar';
    public $primaryKey='id_mengajar';
    public $fillable=array('id_guru','id_mapel','id_kelas');
    public $timestamps=false;
}
