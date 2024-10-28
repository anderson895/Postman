<?php

// app/Models/Post.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Add 'user_id' to the fillable properties
    protected $fillable = ['title', 'content', 'user_id'];
}
