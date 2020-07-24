<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicerequests extends Model
{
    protected $table ='service_requests';
    protected $fillable = ['name'];
}