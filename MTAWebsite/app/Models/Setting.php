<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $table = 'setting';
    protected $fillable =['description','slogan','phone','email','address','facebook','map'];
    public $timestamps = false;
}
