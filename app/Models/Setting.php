<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'address', 'phone', 'logo', 'favicon', 'meta_title', 'meta_description', 'meta_keyword', 'google_analytics'];
}
