<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    use HasFactory;
    public $table ='kelas';
    public $primaryKey ='id_kelas';
    public $fillable = array('id_jurusan','id_tahun','nama_kelas');
    public $timestamps = false;
}
