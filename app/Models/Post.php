<?php

namespace App\Models;
use Laravelista\Comments\Commentable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use Commentable;
    
   protected $fillable = [
        'title',
        'body',
        'user_id',
        
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function creator(){
        return $this->belongsTo('App\Models\User','user_id');
    }
   
    }
