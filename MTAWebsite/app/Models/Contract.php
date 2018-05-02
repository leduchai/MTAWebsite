<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    //
     //
    protected $table = 'contract';
    protected $fillable =['images','url','title'];
    public $timestamps = false;
}
