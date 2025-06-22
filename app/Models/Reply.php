<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = "replys";
    protected $fillable = ['post_id', 'lawyer_id', 'contents'];
}
