<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MCCs extends Model
{
    use HasFactory;

    protected $table = 'MCCs';
    protected $fillable = ['code','category'];
    //protected $primaryKey = 'id';

}
