<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswakelas extends Model
{
    use HasFactory;
    public $table='siswa_kelas';
    public $primaryKey='id_siswa_kelas';
    public $fillable=array('id_siswa','id_kelas');
    public $timestamps=false;
}
