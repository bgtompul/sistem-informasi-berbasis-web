<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mapel extends Model
{
    use HasFactory;
    public $table ='mapel';
    public $primaryKey='id_mapel';
    public $fillable=array('nama_mapel','id_jurusan');
    public $timestamps=false;
}
