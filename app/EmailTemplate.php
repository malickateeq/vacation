<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emailtemplate extends Model
{
    protected $table = 'emailtemplate';
    protected $fillable = ['name', 'content'];

}
