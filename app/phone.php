<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phone extends Model
{
    //
    protected $table = 'phones';
    public $primarykey = 'id';
    public $timestamp = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
