<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domasno extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'domasno';
    protected $hidden = ['ucenici'];

}
