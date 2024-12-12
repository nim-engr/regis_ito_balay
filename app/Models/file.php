<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class file extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_name',
        'file_path',
        'file_size',
        'file_type',
        'uploaded_at',
    ];

    public $timestamps = false; // Disable Laravel's default timestamps if not needed
}
