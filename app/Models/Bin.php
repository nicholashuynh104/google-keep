<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bin extends Model
{
    use HasFactory;
    protected $filable = ['user_id','title','notes'];
    protected $table = 'bins';
}
