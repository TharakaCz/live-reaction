<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPasswordHistory extends Model
{
    use HasFactory;

    protected $table = 'users_password_history';
    protected $primaryKey = 'id';

    public $timestamps = true;
}
