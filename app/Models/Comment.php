<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_comment",
        "post_id",
        "description_comment",
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_comment');
    }
}
