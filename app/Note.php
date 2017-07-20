<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Note;
class Note extends Model
{
    protected $fillable=['title','body','notebook_id'];

    public function notebook(){
    	return $this->belongsTo(Notebook::class);
    }
}
