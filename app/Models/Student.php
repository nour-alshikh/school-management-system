<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Student extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];

    protected $guarded = [];

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }
    public function blood_type()
    {
        return $this->belongsTo(BloodType::class);
    }
    public function guardian()
    {
        return $this->belongsTo(Guardian::class);
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
