<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $fillable = ['user', 'status', 'remarks' , 'activity' , 'activity_id'];

    public function activity()
    {
        return $this->belongsTo(Post::class);
    }    
}
