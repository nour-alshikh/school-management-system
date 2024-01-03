<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuardianAttachment extends Model
{
    use HasFactory;

    protected $fillable = ['file_name', 'guardian_id'];
}
