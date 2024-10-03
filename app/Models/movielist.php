<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movielist extends Model
{
    use HasFactory;
    protected $fillable= ['title','director','hero','herione','music_director','rating','story'];
}
