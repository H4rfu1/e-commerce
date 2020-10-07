<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_role extends Model
{
    protected $table = 'user_role';
    protected $primaryKey = 'id';

    public $timestamps = false;
}
