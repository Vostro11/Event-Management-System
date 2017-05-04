<?php

namespace Modules\Event\Entities;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = ['name','email','address','mobile','type','website','client_id','event_id'];
}
