<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facilities extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
    ];
    
}
