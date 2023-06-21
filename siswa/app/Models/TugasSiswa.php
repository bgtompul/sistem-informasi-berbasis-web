<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasSiswa extends Model
{
    use HasFactory;
    public $table='tugas_siswa';
    public $primaryKey='id_tugas_siswa';
    public $fillable=array('id_siswa_kelas','id_tugas','file_tugas_siswa');
    public $timestamps=false;
}
