<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    protected $fillable=['name'];
    //variable must be $fillable,it contains data to store in database

    public function notes()
    {
    	return $this->hasMany(Note::class);
    }
}
