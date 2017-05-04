<?php

namespace Modules\Client\Entities;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
    	'client_name',
    	'mobile',
    	'address',
    	'mobile',
    	'expire_on',
    	'status',
        'slag'
    ];

    protected $hidden = [
    	
    ];
}
