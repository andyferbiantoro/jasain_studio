<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = "team";
    protected $fillable = [
       'nama','posisi_team','path','iamge'
   ];
}
