<?php

namespace Modules\Event\Entities;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['name','event_id','quantity','status','price'];
}
