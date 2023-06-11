<?php

namespace Modules\Portfolio\Entities;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'address', 'bio', 'cv', 'cover_letter', 'facebook', 'linkedin', 'youtube', 'status'
    ];
    
    public function cv():Attribute
    {
        return Attribute::make(
            get: fn($value) => $value != null ? Storage::url($value) : ''
        );
    }
    public function coverLetter():Attribute
    {
        return Attribute::make(
            get: fn($value) => $value != null ? Storage::url($value) : ''
        );
    }
}
