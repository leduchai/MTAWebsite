<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $table = 'contact';
    protected $fillable =['email','phone','name','message'];
    public $timestamps = false;
}
