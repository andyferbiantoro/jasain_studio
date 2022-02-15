<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
   protected $table = "portofolio";
   protected $fillable = [
     'judul','jenis_project','deskripsi','image'
 ];
}
