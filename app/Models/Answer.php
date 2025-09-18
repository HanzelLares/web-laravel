<?php

namespace App\Models;

use App\Models\Question;
use App\Models\User;    
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /** @use HasFactory<\Database\Factories\AnswerFactory> */
    use HasFactory;

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable'); // Polymorphic relationship, commentable because it can be used by multiple models (like Question and Answer)
    }
    
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
