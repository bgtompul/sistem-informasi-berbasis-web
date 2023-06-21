<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tahun_ajaran extends Model
{
    use HasFactory;
    public $table = "tahun_ajaran";
    public $primaryKey = "id_tahun";
    public $fillable = array('tahun_ajaran');
    public $timestamps = false;
}
