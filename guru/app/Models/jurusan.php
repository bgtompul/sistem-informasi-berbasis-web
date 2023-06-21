<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    use HasFactory;
    public $table = "jurusan";
    public $primaryKey = "id_jurusan";
    public $fillable = array('nama_jurusan');
    public $timestamps = false;
}
