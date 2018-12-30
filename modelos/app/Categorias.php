<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorias extends Model{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
