<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'address', 'phone', 'logo', 'favicon', 'status', 'meta_title', 'meta_description', 'meta_keyword', 'google_analytics'];

    public function logo():Attribute
    {
        return Attribute::make(
            get: fn($value) => $value != null ? Storage::url($value) : asset('back/dist/img/AdminLTELogo.png')
        );
    }
    public function favicon():Attribute
    {
        return Attribute::make(
            get: fn($value) => $value != null ? Storage::url($value) : asset('back/dist/img/AdminLTELogo.png')
        );
    }
}
