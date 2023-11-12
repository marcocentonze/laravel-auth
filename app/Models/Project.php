<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['title', 'slug', 'cover_image', 'description', 'github_link', 'website_link'];

    public static function generateSlug($string)
    {
        return Str::slug($string, '-');
    }
}
