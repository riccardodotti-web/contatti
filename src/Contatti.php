<?php

namespace Rdotti\Contatti;

use Illuminate\Database\Eloquent\Model;

class Contatti extends Model
{
    //
    protected $fillable = ['firstname','lastname','email','message'];
}
