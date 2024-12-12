<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;

    protected $fillable = ['Task_name', 'Task_desc', 'name', 'file', 'Deadline', 'Priority','created_by'];

    public function user()
    {
        return $this->belongsTo(User::class, 'name', 'id'); // 'name' in tasks refers to 'id' in users
    }
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

}



