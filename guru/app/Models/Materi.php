<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    public $table='materi';
    public $primaryKey='id_materi';
    public $fillable=array('id_mapel','nama_materi','file_materi');
    public $timestamps=false;
}
