<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Table name
    protected $table = 'posts';
    //Primary key
    public $primaryKey ='id';
    //Timestamps
    public $timestamps = true;

    // A post can have only 1 user
    public function user(){
        return $this->belongsTo('App\user');
    }

}
