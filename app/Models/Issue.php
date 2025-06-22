<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $table = "issues";
    protected $fillable = ['user_id', 'lawyer_id', 'title', 'contents', 'issue_finished'];
}
