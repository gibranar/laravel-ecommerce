<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $table = 'users_detail';
    
    protected $fillable = [
        'name', 'profession', 'full_name', 'email', 'phone', 'address'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
