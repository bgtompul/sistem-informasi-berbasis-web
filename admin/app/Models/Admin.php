<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    public $table="admin";
    public $primaryKey="id_admin";
    public $fillable=array("username_admin","password_admin","nama_admin","foto_admin");
    public $timestamps=false;
}
