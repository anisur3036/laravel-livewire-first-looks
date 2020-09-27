<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $fillable = ['body', 'user_id'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
