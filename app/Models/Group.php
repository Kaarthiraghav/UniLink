<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'lecturer_id'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'group_user')->withTimestamps();
    }


    // public function lecturer()
    // {
    //     return $this->belongsTo(User::class, 'lecturer_id');
    // }
}
