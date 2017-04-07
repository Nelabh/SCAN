<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
   protected $fillable = [
        'user_id', 'address', 'contact','father'
    ];
public $timestamps = false;
protected $table = "user_details";
}
