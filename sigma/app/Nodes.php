<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nodes extends Model
{
    protected $table = 'nodes';
    protected $fillable = ['category','label','x','y','z','b','g','r','size'];
    
    public function category()
    {
        return $this->belongsTo(\App\Categories::class,'category');
    }
}
