<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    public $table='tugas';
    public $primaryKey='id_tugas';
    public $fillable=array('id_materi','nama_tugas','file_tugas');
    public $timestamps=false;
}
