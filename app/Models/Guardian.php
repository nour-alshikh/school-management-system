<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Guardian extends Model
{
    use HasTranslations;

    public $translatable = ['father_name', 'father_job', 'mother_name', 'mother_job'];
    protected $guarded = [];
    protected $table = 'guardians';
    public $timestamps = true;
}
