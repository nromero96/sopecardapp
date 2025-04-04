<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RenimaUser extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'renima_id', 'is_completed', 'completed_at'];

}
