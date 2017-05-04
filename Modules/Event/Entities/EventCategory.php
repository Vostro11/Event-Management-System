<?php

namespace Modules\Event\Entities;

use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    protected $fillable = ['name','parent_id','event_id'];
}
