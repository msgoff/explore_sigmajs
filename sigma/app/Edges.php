<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edges extends Model
{
    protected $table = 'edges';
    protected $fillable = ['source', 'target'];
}
