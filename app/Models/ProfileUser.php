<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileUser extends Model
{
    use HasFactory;
    protected $table = 'profile_user'; 
    protected $fillable = ['name', 'profession', 'full_name', 'email', 'phone', 'address'];
}
