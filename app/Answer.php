<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function question()
    {
        //define relationship between answers and questions
        //each answer belongs to only one question
        //so we have to specify the name of Question model
        return $this->belongsTo('App\Question'); //this is one->many relationship
    }
}
