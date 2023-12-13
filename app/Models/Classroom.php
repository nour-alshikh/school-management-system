<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classroom extends Model
{
    use HasTranslations;

    public $translatable = ['class_name'];

    protected $table = 'classrooms';
    public $timestamps = true;

    protected $fillable = ['class_room', 'grade_id'];

    public function grades()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
