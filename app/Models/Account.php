<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $table = 'Accounts';
    protected $fillable = ['user_name','balance','acountNumber','cash'];
    //protected $primaryKey = 'id';
}
