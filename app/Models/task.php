<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;

    protected $fillable = ['Task_name', 'Task_desc', 'name', 'file', 'Deadline', 'urgent'];

    public function user()
    {
     return $this->belongsTo(User::class, 'user_id');
    }
}



