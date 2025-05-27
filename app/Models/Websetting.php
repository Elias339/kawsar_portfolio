<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Websetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'profile',
        'logo',
        'phone',
        'address',

        'banner_title',
        'banner_image',
        'profession',
        'resume',
        'about_title',
        'about_description',

        'linkedin',
        'facebook',
        'instagram',
        'youtube',
        'behance',
        'dribbble',
        'pinterest',
        'twitter',
    ];

}
