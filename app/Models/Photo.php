<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $uploads ='/images/';

    use HasFactory;
    protected  $fillable=[
        'file'
    ];

public function  getFileAttribute($value){
    return $this->uploads.$value;
}
}
