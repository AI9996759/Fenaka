<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    protected $table ='locations';
    protected $fillable = ['name','code'];
}
