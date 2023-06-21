<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    public $table="siswa";
    public $primaryKey="id_siswa";
    public $fillable=array("id_jurusan","username_siswa","password_siswa","nama_siswa","nis_siswa","nisn_siswa","jk_siswa","alamat_siswa","foto_siswa");
    public $timestamps=false;
}
