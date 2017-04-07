<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'added_by', 'question', 'a','b','c','d','correct'
    ];
protected $table = "questions";
}
